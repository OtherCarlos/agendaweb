<style type="text/css">

    @import url('<?= Yii::app()->request->baseUrl; ?>/css/main.css');

</style>


<header id="header">
    <div class="inner">
        <a href="index.html" class="logo"><strong>Calendario</strong>WEB</a>
        <nav id="nav">
            <a href="index.html">Home</a>
            <a href="#login">Log In</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>

<section id="banner">
    <div class="inner">
        <header>
            <h1>Organiza tu Agenda</h1>
        </header>

        <div class="flex ">

            <div>
                <span class="icon fa-calendar"></span>
                <h3>Agenda tus Actividades</h3>
                <p>De una mánera facíl y sencilla</p>
            </div>

            <div>
                <span class="icon fa-camera"></span>
                <h3>Agrega Multimedia</h3>
                <p>Sube Imágenes y Vídeos</p>
            </div>

            <div>
                <span class="icon fa-pencil-square-o "></span>
                <h3>Publica tus Ideas</h3>
                <p>Y lleva el orden de las mismas</p>
            </div>

        </div>
        <br><br><br>


        <footer>
            <a href="#" class="button">Ingresa</a>
        </footer>
    </div>
</section>

<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="flex flex-2">
            <article>
                <div class="image round">
                    <img src="<?= Yii::app()->request->baseUrl; ?>/images/calendar_little.jpeg" alt="Pic 01" />
                </div>
                <header>
                    <h3>Organiza tus Tareas</h3>
                </header>
                <p>Agrega tus activades en tu agenda personal y<br />de forma detallada, para obtener un mayor control<br />de tus tareas.</p>
                <footer>
                    <a href="#" class="button">Información</a>
                </footer>
            </article>
            <article>
                <div class="image round">
                    <img src="<?= Yii::app()->request->baseUrl; ?>/images/camera2_little.jpg" alt="Pic 02" />
                </div>
                <header>
                    <h3>Sube archivos Multimedia</h3>
                </header>
                <p>Sube imágenes o vídeos una vez terminadas<br /> tus actividades con el fin de organizar y llevar un mayor control<br /> de tu labores.</p>
                <footer>
                    <a href="#" class="button">Información</a>
                </footer>
            </article>
        </div>
    </div>
</section>

<footer id="footer">
    <div id="login" class="inner">

        <h3>Iniciar Sesión</h3>

        <form action="#" method="post">

            <?php
            $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                'id' => 'logon-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => true,
                ),
            ));
            ?>

            
            <section class="col-md-12">
                
                <div class="col-md-4" style="font-size: 13em; line-height: 0px;">
                    <span class="fa fa-sign-in"></span>
                </div>
                
                <div class="col-md-8 line-login">
                    <div class="field first">
                        <?php
                        echo $form->textFieldGroup($model, 'username', array(
                            'label' => 'Ingrese su Usuario',
                        )); ?>
                    </div>
                    <div class="field first">
                      
                        <?php 
                        echo $form->passwordFieldGroup($model, 'password', array(
                            'label' => 'Contraseña',
                        )); ?>
                  
                    </div>
                    
                </div>
                
            </section>
           
            <ul class="actions">
                <li><input value="Entrar" class="button alt" type="submit"></li>
            </ul>
        </form>

        <div class="copyright">
            &copy; Desarrollado por el Ingeniero Joel Palma.
        </div>

    </div>
</footer>

<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>

    <div class="container">
        
        <div class="row">


            <?php
            //	si el componente CrugeConnector existe lo usa:
      
		if (Yii::app()->getComponent('crugeconnector') != null) {
                if (Yii::app()->crugeconnector->hasEnabledClients) {
                    ?>
                    <div class='crugeconnector'>
                        <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                        <ul>
                            <?php
                            $cc = Yii::app()->crugeconnector;
                            foreach ($cc->enabledClients as $key => $config) {
                                $image = CHtml::image($cc->getClientDefaultImage($key));
                                echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
<?php endif; ?>
