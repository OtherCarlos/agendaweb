<?php

class CalendarioController extends Controller
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
'actions'=>array('index','view','create','update','admin'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','admin'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('delete'),
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
$contenido= Contenido::model()->findAllByAttributes(array('fk_calendario'=>$id,'es_activo'=>TRUE));
$this->render('view',array(
'view'=>$this->loadModel($id),
'contenido'=>$contenido,
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($date)
{
$model=new Calendario;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Calendario'])) {
            $model->titulo = $_POST['Calendario']['titulo'];
            $model->resumen = $_POST['Calendario']['resumen'];
            $model->fecha_calendario = $date;
            $model->created_by = Yii::app()->user->id;
            $model->modified_by = Yii::app()->user->id;
            $model->fk_estatus = 2;
            $model->modified_date = 'now()';
            $model->created_date = 'now()';
            $model->es_activo = true;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_calendario));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $contenido = new Contenido;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if((isset($_POST['Calendario']))&&(isset($_POST['Contenido'])))
{   
        
        $video_validar = CUploadedFile::getInstances($contenido,'video');

        foreach($video_validar as $video){
            $contenido=new Contenido;
            $contenido->video=$video;
            $contenido->image=null;
            $contenido->url='/videos/calendario/'.$id;
            $contenido->nombre=$video->getName();
            $contenido->fk_tipo_contenido = 9;
            $contenido->fk_calendario = $id;
            $contenido->fk_estatus = 5;
            $contenido->created_date = "now()";
            $contenido->created_by = Yii::app()->user->id;
            $contenido->version = "1";
            
            $folder = Yii::getPathOfAlias('webroot').'/videos/calendario/'.$id;
            if (!file_exists($folder)) {
                mkdir($folder);
            }
            
            
            if($contenido->save()){
                    if(!empty($video_validar)){
                        $contenido->image->saveAs($folder .'/'. $video->getName() . '.' . $video->getExtensionName());
                    }
                 }else{
                    echo"<pre>Video";
                    var_dump($contenido->Errors);
                    exit;
                }     
        }
 
        $image_validar = CUploadedFile::getInstances($contenido,'image');
        foreach($image_validar as $image){
            $contenido=new Contenido;
            $contenido->image=$image;
            $contenido->video=null;
            $contenido->url='/image/calendario/'.$id;
            $contenido->nombre=$image->getName();
            $contenido->fk_tipo_contenido = 8;
            $contenido->fk_calendario = $id;
            $contenido->fk_estatus = 5;
            $contenido->created_date = "now()";
            $contenido->created_by = Yii::app()->user->id;
            $contenido->version = "1";
            
            $folder = Yii::getPathOfAlias('webroot').'/images/calendario/'.$id;
            if (!file_exists($folder)) {
                mkdir($folder);
            }
            
            
            if($contenido->save()){
                    if(!empty($image_validar)){
                        $contenido->image->saveAs($folder .'/'. $image->getName() . '.' . $image->getExtensionName());
                    }
                 }else{
                    echo"<pre>Imagen";
                    var_dump($contenido->Errors);
                    exit;
                }     
        }

    
//    die;
$model->attributes=$_POST['Calendario'];
if($model->save()){
$this->redirect(array('view','id'=>$model->id_calendario));
}
}

$this->render('update',array(
'model'=>$model,
'contenido'=>$contenido,
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
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $calendario = new Calendario;
        $dataProvider = new CActiveDataProvider('Calendario');
        $this->render('index', array(
            'dataProvider' => $dataProvider, 'calendario' => $calendario,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($date) {
        $model = new Calendario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Calendario']))
            $model->attributes = $_GET['Calendario'];

        $criteria = new CDbCriteria();
        $criteria->condition = 'fecha_calendario = :fecha_calendario';
        $criteria->params = array(':fecha_calendario' => $date);
        $count = Calendario::model()->find($criteria);

        $this->render('admin', array(
            'model' => $model,
            'date' => $date,
            'count' => $count,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Calendario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'calendario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
