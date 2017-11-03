<script>
    $('#nav-perfil').addClass('active');
</script>

<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/util.js');

$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'perfil_usuario',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">

                        <h4 class="title">Perfil del Usuario
                            <button type="button" class="btn btn-info btn-fill pull-right" id="button_editar">Editar Perfil</button>
                        </h4>

                    </div>

                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php
                                        echo $form->textFieldGroup($user, 'username', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'readOnly' => true)),
                                            'label' => 'Nombre de Usuario',
                                        ));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php
                                        echo $form->textFieldGroup($user, 'email', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'readOnly' => true))));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php
                                        echo $form->textFieldGroup($profile, 'nombres', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'style' => 'text-transform: uppercase;',
                                                    'readOnly' => true))));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php
                                        echo $form->textFieldGroup($profile, 'apellidos', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'readOnly' => true))));
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <?php
                                        echo $form->textFieldGroup($profile, 'direccion', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'readOnly' => true))));
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <?php
                                        echo $form->textFieldGroup($profile, 'ciudad', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'readOnly' => true))));
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <?php
                                        echo $form->textFieldGroup($profile, 'pais', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'readOnly' => true))));
                                        ?>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <?php
                                        echo $form->textFieldGroup($profile, 'sobre_mi', array('widgetOptions' => array(
                                                'htmlOptions' => array(
                                                    'placeholder' => '',
                                                    'style' => '',
                                                    'readOnly' => true))));
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <button id="button_guardar" 
                                    type="submit" 
                                    class="btn btn-info btn-fill pull-right" 
                                    style="display: none">
                                Guardar Perfil
                            </button>

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?= Yii::app()->request->baseUrl ?>/images/profile_user.jpeg"/>
                    </div>
                    <div class="content">
                        <div class="author" >
                            <a href="#">
                                
                                <?php
                                if (empty($profile['foto_perfil'])) {
                                    ?>  
                                    <img class="avatar border-gray" src="<?= Yii::app()->request->baseUrl ?>/images/user.png" alt="..."/>
                                    <?php
                                } else {
                                    ?>
                                    <img class="avatar border-gray" src="<?= Yii::app()->request->baseUrl ?>/images/profile/<?= Yii::app()->user->id . '/' . $profile['foto_perfil'] ?>" alt="..."/>
                                <?php } ?>


                                <h4 class="title"><?= $user["username"] ?><br />
                                    
                                    <?php 
                                       if(empty($profile['nombres'])){
                                           
                                       }else{  
                                         
                                        $profile['nombres'];
                                        $primer_nombre = explode(' ', $profile['nombres']);
                                        
                                        $profile['apellidos'];
                                        $primer_apellido = explode(' ', $profile['apellidos']);
                                           
                                           ?>
                                     
                                    <small> <?= $primer_nombre[0] .' '.$primer_apellido[0] ?></small>
                                    
                                    <?php }  ?>
                                   
                                </h4>
                            </a>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <?php
                            echo $profile->sobre_mi;
                            ?>

                        </div>
                        
                        <div class="row" style="display: none;">
                            <div>
                            <?php echo $form->fileField($profile, 'image'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="button_file" class="button_file">
                                    <span class="fa fa-upload"></span>Seleccionar archivo
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="text-center">
                        <a class="btn" href="http://google.com"><i class="fa fa-facebook-square"></i></a>
                        <a class="btn" href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                        <button href="" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->endWidget(); ?>