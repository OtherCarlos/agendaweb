<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $id_user_profile
 * @property integer $id_user
 * @property string $nombres
 * @property string $apellidos
 * @property string $sobre_mi
 * @property string $direccion
 * @property string $ciudad
 * @property string $pais
 * @property string $foto_perfil
 *
 * The followings are the available model relations:
 * @property CrugeUser $idUser
 */
class UserProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, ciudad, pais', 'length', 'max'=>50),
			array('sobre_mi', 'length', 'max'=>1000),
			array('direccion', 'length', 'max'=>500),
			array('foto_perfil', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user_profile, id_user, nombres, apellidos, sobre_mi, direccion, ciudad, pais, foto_perfil', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'CrugeUser', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user_profile' => 'Id User Profile',
			'id_user' => 'Id User',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'sobre_mi' => 'Sobre Mi',
			'direccion' => 'Direccion',
			'ciudad' => 'Ciudad',
			'pais' => 'Pais',
			'foto_perfil' => 'Foto Perfil',
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

		$criteria->compare('id_user_profile',$this->id_user_profile);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('sobre_mi',$this->sobre_mi,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('foto_perfil',$this->foto_perfil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
