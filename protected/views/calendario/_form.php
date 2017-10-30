<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'calendario-form',
    'enableAjaxValidation' => false,
        ));
?>

<section class="col-md-12">

    <div class="col-md-8 col-md-offset-2" style="text-align: center;">
        <?php
        echo $form->textFieldGroup($model, 'titulo', array('label' => 'Inserte el Título',
            'widgetOptions' => array(
                'htmlOptions' => array(
                    'class' => 'span5',
                    'maxlength' => 50,
        ))));
        ?>   
    </div>
</section>

<div style="text-align: center;">

    <?php
    echo $form->textAreaGroup($model, 'resumen', array('label' => 'Resumen',
        'widgetOptions' => array(
            'htmlOptions' => array(
                'class' => 'span5',
                'placeholder' => 'Inserte aquí la descripción de la actividad',
                'maxlength' => 1000,
                'style' => 'height: 200px;',
    ))));
    ?>
</div>

<div class="row">
<section class="col-md-12">
    <div class="col-md-6" style="text-align: right">
  
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'htmlOptions' => array(
                    'class' => 'boton_css',
                    'style' => 'border: 2px solid #36302D;',
                ),
                'label' => $model->isNewRecord ? 'GUARDAR' : 'Save',
            ));
            ?>
     
    </div>

    <div class="col-md-6" style="text-align: left">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'link',
            'url' => Yii::app()->createUrl("/Calendario/index"),
            'htmlOptions' => array(
                'class' => 'boton_css',
                'style' => 'border: 2px solid #36302D',
            ),
            'label' => 'REGRESAR',
        ));
        ?>
    </div>

</section>
</div>
<?php $this->endWidget(); ?>
