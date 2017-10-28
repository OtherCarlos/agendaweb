<?php

class UserProfileController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new UserProfile;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['UserProfile']))
{
$model->attributes=$_POST['UserProfile'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_user_profile));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['UserProfile']))
{
$model->attributes=$_POST['UserProfile'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_user_profile));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex() {

    $profile = UserProfile::model()->findByAttributes(array("id_user" => Yii::app()->user->id));
    $media = new SocialMedia;
    $user = CrugeStoredUser::model()->findByAttributes(array("iduser" => Yii::app()->user->id));
    
    if(empty($profile)){
       $profile = new UserProfile; 
    }
     
    if(isset($_POST['UserProfile'])){
        
        $update = UserProfile::model()->findByAttributes(array("id_user" => Yii::app()->user->id));
        
    
        if(empty($update)){
            
            $image = CUploadedFile::getInstance($profile,'image');
            
                $profile = new UserProfile; 
                $profile->id_user = Yii::app()->user->id;

                $profile->nombres = $_POST['UserProfile']['nombres'];
                $profile->apellidos = $_POST['UserProfile']['apellidos'];
                $profile->sobre_mi = $_POST['UserProfile']['sobre_mi'];
                $profile->direccion = $_POST['UserProfile']['direccion'];
                $profile->ciudad = $_POST['UserProfile']['ciudad'];
                $profile->pais = $_POST['UserProfile']['pais'];
                
                if(!empty($image)){
                    $profile->image=CUploadedFile::getInstance($profile,'image');
                    $profile->foto_perfil=Yii::app()->user->id . '.' . $profile->image->getExtensionName();
                
                    $folder = Yii::getPathOfAlias('webroot').'/images/profile/'.Yii::app()->user->id;
                    mkdir($folder);
                }
               
     
                if($profile->save()){
                    
                    if(!empty($image)){
                        $profile->image->saveAs($folder .'/'.Yii::app()->user->id . '.' . $profile->image->getExtensionName());
                    }
 
                    $this->redirect(array('/userProfile/index'));
                }else{
                    echo"<pre>PerfildeUsuario";
                    var_dump($profile->Errors);
                    exit;
                }     
        }else {     
            
           $image = CUploadedFile::getInstance($profile,'image');
          
            
                $update->nombres = $_POST['UserProfile']['nombres'];
                $update->apellidos = $_POST['UserProfile']['apellidos'];
                $update->sobre_mi = $_POST['UserProfile']['sobre_mi'];
                $update->direccion = $_POST['UserProfile']['direccion'];
                $update->ciudad = $_POST['UserProfile']['ciudad'];
                $update->pais = $_POST['UserProfile']['pais'];
                
                if(!empty($image)){ 
                    
                    $update->image=CUploadedFile::getInstance($profile,'image');
                    $update->foto_perfil=Yii::app()->user->id . '.' . $update->image->getExtensionName();
                    $folder = Yii::getPathOfAlias('webroot').'/images/profile/'.Yii::app()->user->id;
                }
                
                
                 
                if($update->update()){  
                    
                        if(!empty($image)){ 
                            $update->image->saveAs($folder .'/'.Yii::app()->user->id . '.' . $update->image->getExtensionName());
                        }
                     
                     $this->redirect(array('/userProfile/index'));
                     
                }else{
                    echo"<pre>UpdatePerfildeUsuario";
                    var_dump($update->Errors);
                    exit;
                }
            
        }
    }
        
    $this->render('/user/index', array(
        'profile'=>$profile, 
        'media'=>$media,
        'user' => $user,
    ));
    
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new UserProfile('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['UserProfile']))
$model->attributes=$_GET['UserProfile'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=UserProfile::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='user-profile-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
