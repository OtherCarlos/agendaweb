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
'actions'=>array('index','view','view_publicar','create','update','update_media','download','admin','publicar'),
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

public function actionView_publicar($id)
{
$image = Contenido::model()->findAllByAttributes(array('fk_calendario' => $id, 'fk_tipo_contenido' => 8, 'publicar' => TRUE));
$video = Contenido::model()->findAllByAttributes(array('fk_calendario' => $id, 'fk_tipo_contenido' => 9, 'publicar' => TRUE));
$publicacion= Publicaciones::model()->findByAttributes(array('fk_calendario'=>$id));
$this->render('view_publicar',array(
'view'=>$this->loadModel($id),
'publicacion'=>$publicacion,
'image'=>$image,
'video'=>$video,
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

if((isset($_POST['Contenido'])))
{   
        
        $video_validar = CUploadedFile::getInstances($contenido,'video');

        foreach($video_validar as $video){
            $contenido=new Contenido;
            $contenido->video=$video;
            $contenido->image=null;
            $contenido->url='/videos/calendario/'.$id.'/';
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
                        $contenido->video->saveAs($folder .'/'. $video->getName());
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
            $contenido->url='/images/calendario/'.$id.'/';
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
                        $contenido->image->saveAs($folder .'/'. $image->getName());
                    }
                 }else{
                    echo"<pre>Imagen";
                    var_dump($contenido->Errors);
                    exit;
                }     
        }

    $this->redirect(array('view','id'=>$model->id_calendario));

}

$this->render('update',array(
'model'=>$model,
'contenido'=>$contenido,
));
}

public function actionUpdate_media($id) {
        $model = $this->loadModel($id);
        $contenido = new Contenido;
        $image = Contenido::model()->findAllByAttributes(array('fk_calendario' => $id, 'fk_tipo_contenido' => 8));
        $video = Contenido::model()->findAllByAttributes(array('fk_calendario' => $id, 'fk_tipo_contenido' => 9));
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if((isset($_POST['Contenido'])))
{   
        (isset($_POST['Contenido']['image'])?$count_image=count($_POST['Contenido']['image']):$count_image=0);
        (isset($_POST['Contenido']['video'])?$count_video=count($_POST['Contenido']['video']):$count_video=0);
        
        $videos = 0;
        if($count_video!=0){
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
                $contenido->version = "2";

                $folder = Yii::getPathOfAlias('webroot').'/videos/calendario/'.$id;
                if (!file_exists($folder)) {
                    mkdir($folder);
                }


                if($contenido->save()){
                        if(!empty($video_validar)){
                            $contenido->video->saveAs($folder .'/'. $video->getName());
                            $videos++;
                        }
                     }else{
                        echo"<pre>Video";
                        var_dump($contenido->Errors);
                        exit;
                    }     
            }
        }
        
        $images = 0;
        if($count_image!=0){
            $image_validar = CUploadedFile::getInstances($contenido,'image');
            
            foreach($image_validar as $image){
                $contenido=new Contenido;
                $contenido->image=$image;
                $contenido->video=null;
                $contenido->url='/images/calendario/'.$id;
                $contenido->nombre=$image->getName();
                $contenido->fk_tipo_contenido = 8;
                $contenido->fk_calendario = $id;
                $contenido->fk_estatus = 5;
                $contenido->created_date = "now()";
                $contenido->created_by = Yii::app()->user->id;
                $contenido->version = "2";

                $folder = Yii::getPathOfAlias('webroot').'/images/calendario/'.$id;
                if (!file_exists($folder)) {
                    mkdir($folder);
                }


                if($contenido->save()){
                        if(!empty($image_validar)){
                            $contenido->image->saveAs($folder .'/'. $image->getName());
                            $images++;
                        }
                     }else{
                        echo"<pre>Imagen";
                        var_dump($contenido->Errors);
                        exit;
                    }     
            }
        }

if((($count_image+$count_video)==($videos+$images))){
$this->redirect(array('view','id'=>$model->id_calendario));
}
}

$this->render('update_media',array(
'model'=>$model,
'contenido'=>$contenido,
'image'=>$image,
'video'=>$video,
));
}

public function actionPublicar($id) {
        $model = $this->loadModel($id);
        $publicar = new Publicaciones();
        $image = VswCalendario::model()->findAllByAttributes(array('id_calendario' => $id, 'fk_tipo_contenido' => 8));
        $video = VswCalendario::model()->findAllByAttributes(array('id_calendario' => $id, 'fk_tipo_contenido' => 9));

if((isset($_POST['Publicaciones']))&&(isset($_POST['VswCalendario'])))
{   
    $imagenes = 0;
    if(isset($_POST['VswCalendario']['imagenes'])){
        foreach ($_POST['VswCalendario']['imagenes'] as $img){
            $contenido = Contenido::model()->findByPk($img);
            $contenido->publicar = TRUE;
            if($contenido->save()){
                $imagenes++;
            } else {
                echo"<pre>Contenido";
                var_dump($contenido->Errors);
                exit;
            }
        }
    }
    
    $videos = 0;
    if(isset($_POST['VswCalendario']['videos'])){
        foreach ($_POST['VswCalendario']['videos'] as $vid){
            $contenido = Contenido::model()->findByPk($vid);
            $contenido->publicar = TRUE;
            if($contenido->save()){
                $videos++;
            } else {
                echo"<pre>Contenido";
                var_dump($contenido->Errors);
                exit;
            }
        }
    }
    
    $publicar = new Publicaciones();
    $publicar->fk_calendario = $id;
    $publicar->publicacion = $_POST['Publicaciones']['publicacion'];
    $publicar->mencionados = $_POST['Publicaciones']['mencionados'];
    $publicar->fk_persona = Yii::app()->user->id;
    $publicar->fk_estatus = 11;
    $publicar->created_by = Yii::app()->user->id;
    $publicar->created_date = "now()";
    $publicar->modified_date = "now()";
    if($publicar->save()){
        $this->redirect(array('view','id'=>$model->id_calendario));
    } else {
        echo"<pre>Publicaciones";
        var_dump($publicar->Errors);
        exit;
    }
}

$this->render('publicar',array(
'model'=>$model,
'publicar'=>$publicar,
'image'=>$image,
'video'=>$video,
));
}

public function actionDownload($url, $name){
    $url = str_replace('-', '/', $url);
    Yii::app()->getRequest()->sendFile($name, file_get_contents(Yii::getPathOfAlias('webroot') . $url . $name));
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
