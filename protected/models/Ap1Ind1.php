<?php

/**
 * This is the model class for table "ap1Ind1".
 *
 * The followings are the available columns in table 'ap1Ind1':
 * @property integer $id
 * @property integer $periodo_id
 * @property integer $entidad
 * @property integer $municipio
 * @property integer $actividad
 * @property double $valor
 * @property integer $usuario
 * @property string $fecha_reg
 */
class Ap1Ind1 extends CActiveRecord
{
	//Configuracion

	

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ap1Ind1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo1, nota1', 'required'),
			array('periodo_id, entidad, municipio, actividad, usuario', 'numerical', 'integerOnly'=>true),
			array('valor', 'numerical'),
			array('fecha_reg', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, periodo_id, entidad, municipio, actividad, valor, usuario, fecha_reg', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related ap1Ind1_hist
		// class name for the relations automatically generated below.
		return array(
				'Entidades' => array(self::BELONGS_TO, 'Entidades', 'entidad'),
				'Delegaciones' => array(self::BELONGS_TO, 'Delegaciones', 'municipio'),
				//'Periodos' => array(self::BELONGS_TO, 'Ap1Ind1Hist', 'periodo_id'),
				'Actividad' => array(self::BELONGS_TO, 'ActividadesEconomicas', 'actividad'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			
			'id' => 'ID',
			'periodo_id' => 'Periodo',
			'entidad' => 'Entidad',
			'municipio' => 'Municipio',
			'actividad' => 'Actividad',
			'valor' => 'Valor',
			'usuario' => 'Usuario',
			'fecha_reg' => 'Fecha Reg',
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
		$criteria->compare('periodo_id',$id);
		$criteria->compare('entidad',$this->entidad);
		$criteria->compare('municipio',$this->municipio);
		$criteria->compare('actividad',$this->actividad);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('usuario',$this->usuario);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ap1Ind1 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
