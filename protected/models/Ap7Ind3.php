<?php

/**
 * This is the model class for table "ap7Ind3".
 *
 * The followings are the available columns in table 'ap7Ind3':
 * @property integer $id
 * @property integer $rubro
 * @property double $saldo1
 * @property double $colocacion1
 * @property double $amortizacion1
 * @property double $colocacion2
 * @property double $amortizacion2
 * @property double $actualizacion2
 * @property double $saldo2
 * @property double $endeudamiento
 * @property integer $anio
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 * @property integer $periodo_id
 */
class Ap7Ind3 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ap7Ind3';
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
			array('id, rubro, anio, user_reg, user_mod, periodo_id', 'numerical', 'integerOnly'=>true),
			array('saldo1, colocacion1, amortizacion1, colocacion2, amortizacion2, actualizacion2, saldo2, endeudamiento', 'numerical'),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rubro, saldo1, colocacion1, amortizacion1, colocacion2, amortizacion2, actualizacion2, saldo2, endeudamiento, anio, fecha_reg, fecha_mod, user_reg, user_mod, periodo_id', 'safe', 'on'=>'search'),
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
			'saldo1' => 'Saldo1',
			'colocacion1' => 'Colocacion1',
			'amortizacion1' => 'Amortizacion1',
			'colocacion2' => 'Colocacion2',
			'amortizacion2' => 'Amortizacion2',
			'actualizacion2' => 'Actualizacion2',
			'saldo2' => 'Saldo2',
			'endeudamiento' => 'Endeudamiento',
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
		$criteria->compare('saldo1',$this->saldo1);
		$criteria->compare('colocacion1',$this->colocacion1);
		$criteria->compare('amortizacion1',$this->amortizacion1);
		$criteria->compare('colocacion2',$this->colocacion2);
		$criteria->compare('amortizacion2',$this->amortizacion2);
		$criteria->compare('actualizacion2',$this->actualizacion2);
		$criteria->compare('saldo2',$this->saldo2);
		$criteria->compare('endeudamiento',$this->endeudamiento);
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
	 * @return Ap7Ind3 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
