<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'memo-enviados-correspondenciaInterna-form',
    'enableAjaxValidation' => false,
        ));
?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Perfil del Usuario</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <?php 
                                                    echo $form->textFieldGroup($user, 'username', 
                                                            array('widgetOptions' => array(
                                                                  
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
                                                    echo $form->textFieldGroup($user, 'email', 
                                                            array('widgetOptions' => array(
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
                                                    echo $form->textFieldGroup($profile, 'nombres', 
                                                            array('widgetOptions' => array(
                                                                'htmlOptions' => array(
                                                                'placeholder' => '',   
                                                                'readOnly' => true))));
                                                 ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php 
                                                    echo $form->textFieldGroup($profile, 'apellidos', 
                                                            array('widgetOptions' => array(
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
                                                    echo $form->textFieldGroup($profile, 'direccion', 
                                                            array('widgetOptions' => array(
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
                                                    echo $form->textFieldGroup($profile, 'ciudad', 
                                                            array('widgetOptions' => array(
                                                                'htmlOptions' => array(
                                                                'placeholder' => '',   
                                                                'readOnly' => true))));
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <?php               
                                                    echo $form->textFieldGroup($profile, 'pais', 
                                                            array('widgetOptions' => array(
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
                                                    echo $form->textFieldGroup($profile, 'sobre_mi', 
                                                            array('widgetOptions' => array(
                                                                'htmlOptions' => array(
                                                                'placeholder' => '', 
                                                                'style' => '',
                                                                'readOnly' => true))));
                                                ?>
                                             
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
 
 <?php $this->endWidget(); ?>