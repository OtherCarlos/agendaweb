<h1><?php echo ucwords(CrugeTranslator::t("crear nuevo usuario"));?></h1>
<div class="form">
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>
    
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'crugestoreduser-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
    
 <?php
 
 ?>
<div class="row form-group">
	<div class="col">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="col">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
<!--    
    <?php // if (Yii::app()->user->checkAccess('admin')) { ?>

            <div class="col">

                <label class="required">Roles<span class="required">*</span></label>
                <?php
//                $rbac = Yii::app()->user->rbac;
//
//                $listaRolesAsignados = $rbac->roles;
                ?>

                <select name="rol_name" id="rol_name">

                    <?php // foreach ($listaRolesAsignados as $dato) { ?>

                        <option value='<?php // echo $dato->name; ?>'><?php // echo $dato->name; ?></option>

                    <?php // } ?>

                </select>

            </div>
        <?php //  } else { ?>

            <div class="col">

                <label class="required">Roles<span class="required">*</span></label>
                <?php
//                $rbac = Yii::app()->user->rbac;

//                $listaRolesAsignados = $rbac->getAuthAssignments(Yii::app()->user->id);
                ?>

                <select name="rol_name" id="rol_name">

                    <?php
//                    foreach ($rbac->roles as $rol) {
//                        foreach ($listaRolesAsignados as $ra) {
//                            if ($ra->itemName === $rol->name) {
//                                if ($rol->name == 'administrador_sistema') {
//                                    ?>                       
                                    <option value='administrador_unamujer'>Coordinador_Ministro</option>
                                    <option value='consulta_graficas_descargas_busqueda'>Consulta_Estadal</option>
                                    <option value='registrador'>Coordinador_Estadal</option>
                                    <?php
//                                } 
//                            }
//                        }
//                    }
                    ?>

                </select>

            </div>   

        <?php // } ?>   -->

    
    
	<div class="col">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<?php echo $form->textField($model,'newPassword'); ?>
		<?php echo $form->error($model,'newPassword'); ?>
		
		<script>
			function fnSuccess(data){
				$('#CrugeStoredUser_newPassword').val(data);
			}
			function fnError(e){
				alert("error: "+e.responseText);
			}
		</script>
		<?php echo CHtml::ajaxbutton(
			CrugeTranslator::t("Generar una nueva clave")
			,Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
			,array('success'=>'js:fnSuccess','error'=>'js:fnError')
		); ?>
		
	</div>
    
    
    

</div>
    
    <!-- inicio de campos extra definidos por el administrador del sistema -->
<?php 
	if(count($model->getFields()) > 0){
		echo "<div class='row form-group'>";
		echo "<h6>".ucfirst(CrugeTranslator::t("perfil"))."</h6>";
		foreach($model->getFields() as $f){
			// aqui $f es una instancia que implementa a: ICrugeField
			echo "<div class='col'>";
			echo Yii::app()->user->um->getLabelField($f);
			echo Yii::app()->user->um->getInputField($model,$f);
			echo $form->error($model,$f->fieldname);
			echo "</div>";
		}
		echo "</div>";
	}
?>
<!-- fin de campos extra definidos por el administrador del sistema -->
    
<div class="row buttons">
	<?php Yii::app()->user->ui->tbutton("Crear Usuario"); ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>