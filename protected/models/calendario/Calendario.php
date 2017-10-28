<?php

/**
 * This is the model class for table "agenda.calendario".
 *
 * The followings are the available columns in table 'agenda.calendario':
 * @property integer $id_calendario
 * @property string $titulo
 * @property string $resumen
 * @property string $fecha_calendario
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 * @property integer $modified_by
 * @property integer $fk_estatus
 * @property boolean $es_activo
 *
 * The followings are the available model relations:
 * @property Publicaciones[] $publicaciones
 * @property Contenido[] $contenidos
 */
class Calendario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agenda.calendario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, resumen, fecha_calendario, created_date, created_by, modified_date, fk_estatus', 'required'),
			array('created_by, modified_by, fk_estatus', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>50),
			array('resumen', 'length', 'max'=>1000),
			array('es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_calendario, titulo, resumen, fecha_calendario, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo', 'safe', 'on'=>'search'),
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
			'publicaciones' => array(self::HAS_MANY, 'Publicaciones', 'fk_calendario'),
			'contenidos' => array(self::HAS_MANY, 'Contenido', 'fk_calendario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_calendario' => 'Id Calendario',
			'titulo' => 'Titulo',
			'resumen' => 'Resumen',
			'fecha_calendario' => 'Fecha Calendario',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
			'fk_estatus' => 'Fk Estatus',
			'es_activo' => 'Es Activo',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_calendario',$this->id_calendario);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('fecha_calendario',$this->fecha_calendario,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchByDate($date)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_calendario',$this->id_calendario);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('fecha_calendario',$date);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Calendario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
