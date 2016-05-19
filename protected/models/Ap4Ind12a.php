<?php

/**
 * This is the model class for table "ap4Ind12a".
 *
 * The followings are the available columns in table 'ap4Ind12a':
 * @property integer $id
 * @property integer $rubro
 * @property double $valor
 * @property integer $rubro2
 * @property integer $trimestre
 * @property integer $apartado
 * @property integer $anio
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 * @property integer $periodo_id
 */
class Ap4Ind12a extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ap4Ind12a';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, rubro, rubro2, trimestre, apartado, anio, user_reg, user_mod, periodo_id', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rubro, valor, rubro2, trimestre, apartado, anio, fecha_reg, fecha_mod, user_reg, user_mod, periodo_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rubro' => 'Rubro',
			'valor' => 'Valor',
			'rubro2' => 'Rubro2',
			'trimestre' => 'Trimestre',
			'apartado' => 'Apartado',
			'anio' => 'Año',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'periodo_id' => 'Periodo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('rubro',$this->rubro);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('rubro2',$this->rubro2);
		$criteria->compare('trimestre',$this->trimestre);
		$criteria->compare('apartado',$this->apartado);
		$criteria->compare('anio',$this->anio);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);
		//$criteria->compare('periodo_id',$this->periodo_id);
                $criteria->compare('periodo_id',$id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ap4Ind12a the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
