<?php

/**
 * This is the model class for table "agenda.publicaciones".
 *
 * The followings are the available columns in table 'agenda.publicaciones':
 * @property integer $id_publicacion
 * @property string $publicacion
 * @property integer $fk_persona
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 * @property integer $modified_by
 * @property integer $fk_estatus
 * @property boolean $es_activo
 * @property integer $fk_calendario
 * @property string $mencionados
 *
 * The followings are the available model relations:
 * @property Calendario $fkCalendario
 */
class Publicaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'agenda.publicaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_persona, created_date, created_by, fk_estatus, fk_calendario', 'required'),
			array('fk_persona, created_by, modified_by, fk_estatus, fk_calendario', 'numerical', 'integerOnly'=>true),
			array('publicacion', 'length', 'max'=>140),
			array('modified_date, es_activo, mencionados', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_publicacion, publicacion, fk_persona, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo, fk_calendario, mencionados', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_publicacion' => 'Id Publicacion',
			'publicacion' => 'Publicacion',
			'fk_persona' => 'Fk Persona',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'modified_date' => 'Modified Date',
			'modified_by' => 'Modified By',
			'fk_estatus' => 'Fk Estatus',
			'es_activo' => 'Es Activo',
			'fk_calendario' => 'Fk Calendario',
			'mencionados' => 'Mencionados',
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

		$criteria->compare('id_publicacion',$this->id_publicacion);
		$criteria->compare('publicacion',$this->publicacion,true);
		$criteria->compare('fk_persona',$this->fk_persona);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('fk_calendario',$this->fk_calendario);
		$criteria->compare('mencionados',$this->mencionados,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchByCalendarioId($id_calendario)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria = new CDbCriteria();
                $criteria->select = '*';
                $criteria->condition = 'fk_calendario = :fk_calendario';
                $criteria->params = array('fk_calendario' => $id_calendario);
                
                return $count = Publicaciones::model()->count($criteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Publicaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
