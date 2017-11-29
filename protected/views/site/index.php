<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <div class="row">
        <div class="card card-user">
                    <div class="image">
                        <img src="<?= Yii::app()->request->baseUrl ?>/images/profile_user.jpeg"/>
                    </div>
                    <div class="content">
                        <div class="author" >
                                
                                <?php
                                if (empty($user['foto_perfil'])) {
                                    ?>  
                                    <img class="avatar border-gray" src="<?= Yii::app()->request->baseUrl ?>/images/user.png" alt="..."/>
                                    <?php
                                } else {
                                    ?>
                                    <img class="avatar border-gray" src="<?= Yii::app()->request->baseUrl ?>/images/profile/<?= Yii::app()->user->id . '/' . $user['foto_perfil'] ?>" alt="..."/>
                                <?php } ?>


                                <h4 class="title">
                                    
                                    <?php 
                                       if(empty($user['nombres'])){
                                           
                                       }else{  
                                         
                                        $user['nombres'];
                                        $primer_nombre = explode(' ', $user['nombres']);
                                        
                                        $user['apellidos'];
                                        $primer_apellido = explode(' ', $user['apellidos']);
                                           
                                           ?>
                                     
                                    <small> <?= $primer_nombre[0] .' '.$primer_apellido[0] ?></small>
                                    
                                    <?php }  ?>
                                   
                                </h4>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <?php
                            echo $user->sobre_mi;
                            ?>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                Hola, <?= $user->nombres . ' ' . $user->apellidos ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Bienvenido de vuelta!
                            </div>
                        </div>
             
                    </div>
                    
                
                </div>
    </div>
<div class="card">    
</div>
