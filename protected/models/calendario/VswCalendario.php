<?php

/**
 * This is the model class for table "agenda.vsw_calendario".
 *
 * The followings are the available columns in table 'agenda.vsw_calendario':
 * @property integer $id_calendario
 * @property string $titulo
 * @property string $resumen
 * @property string $fecha_calendario
 * @property string $url
 * @property string $nombre
 * @property integer $fk_tipo_contenido
 * @property string $tipo_contenido
 * @property string $observacion
 * @property integer $version
 */
class VswCalendario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agenda.vsw_calendario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_calendario, fk_tipo_contenido, version', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>50),
			array('resumen, observacion', 'length', 'max'=>1000),
			array('nombre, tipo_contenido', 'length', 'max'=>100),
			array('fecha_calendario, url', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_calendario, titulo, resumen, fecha_calendario, url, nombre, fk_tipo_contenido, tipo_contenido, observacion, version', 'safe', 'on'=>'search'),
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
			'id_calendario' => 'Id Calendario',
			'titulo' => 'Titulo',
			'resumen' => 'Resumen',
			'fecha_calendario' => 'Fecha Calendario',
			'url' => 'Url',
			'nombre' => 'Nombre',
			'fk_tipo_contenido' => 'Fk Tipo Contenido',
			'tipo_contenido' => 'Tipo Contenido',
			'observacion' => 'Observacion',
			'version' => 'Version',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fk_tipo_contenido',$this->fk_tipo_contenido);
		$criteria->compare('tipo_contenido',$this->tipo_contenido,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchbydate($date)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria();
                $criteria->select = 'id_calendario, fecha_calendario';
                $criteria->condition = 'fecha_calendario = :fecha_calendario';
                $criteria->group = 'id_calendario, fecha_calendario';
                $criteria->params = array('fecha_calendario' => $date);
                
                return $count = VswCalendario::model()->count($criteria);
	}
        
        public function searchbydate_content($date)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria();
                $criteria->select = 'id_calendario, fecha_calendario';
                $criteria->condition = 'fecha_calendario = :fecha_calendario AND url IS NOT NULL';
                $criteria->group = 'id_calendario, fecha_calendario';
                $criteria->params = array('fecha_calendario' => $date);
                
                return $count = VswCalendario::model()->count($criteria);
	}
        
        public function searchbydate_media($date)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria();
                $criteria->select = 'id_calendario, fecha_calendario';
                $criteria->condition = 'fecha_calendario = :fecha_calendario AND url IS NOT NULL AND version >= 2';
                $criteria->group = 'id_calendario, fecha_calendario';
                $criteria->params = array('fecha_calendario' => $date);
                
                return $count = VswCalendario::model()->count($criteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VswCalendario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
