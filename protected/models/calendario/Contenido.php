<?php

/**
 * This is the model class for table "agenda.contenido".
 *
 * The followings are the available columns in table 'agenda.contenido':
 * @property integer $id_contenido
 * @property string $url
 * @property string $nombre
 * @property integer $fk_tipo_contenido
 * @property integer $fk_calendario
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 * @property integer $modified_by
 * @property integer $fk_estatus
 * @property boolean $es_activo
 * @property integer $version
 *
 * The followings are the available model relations:
 * @property Calendario $fkCalendario
 * @property Maestro $fkTipoContenido
 */
class Contenido extends CActiveRecord
{
        public $image;
        public $video;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agenda.contenido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_tipo_contenido, fk_calendario, created_date, created_by, fk_estatus, version', 'required'),
			array('fk_tipo_contenido, fk_calendario, created_by, modified_by, fk_estatus, version', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('url, modified_date, es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_contenido, url, nombre, fk_tipo_contenido, fk_calendario, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo, version', 'safe', 'on'=>'search'),
                        array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true, 'safe' => false),
                        array('video', 'file', 'types'=>'mp4, avi, mkv', 'allowEmpty'=>true, 'safe' => false),
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
			'fkCalendario' => array(self::BELONGS_TO, 'Calendario', 'fk_calendario'),
			'fkTipoContenido' => array(self::BELONGS_TO, 'Maestro', 'fk_tipo_contenido'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contenido' => 'Id Contenido',
			'url' => 'Url',
			'nombre' => 'Nombre',
			'fk_tipo_contenido' => 'Fk Tipo Contenido',
			'fk_calendario' => 'Fk Calendario',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
			'fk_estatus' => 'Fk Estatus',
			'es_activo' => 'Es Activo',
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

		$criteria->compare('id_contenido',$this->id_contenido);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fk_tipo_contenido',$this->fk_tipo_contenido);
		$criteria->compare('fk_calendario',$this->fk_calendario);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contenido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
