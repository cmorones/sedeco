<?php
/* @var $this HomePrincipalController */
/* @var $model HomePrincipal */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-principal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'form-horizontal'),
)); ?>



	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>

		<div class="form-group">
		<?php echo $form->labelEx($model,'subtutulo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'subtutulo',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'subtutulo'); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre_btn', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nombre_btn',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre_btn'); ?>
		</div>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'_archivo',array('class' => 'col-sm-2 control-label','for'=>"exampleInputFile")); ?>
		<div class="col-sm-10">
			<?php echo $form->fileField($model,'_archivo'); ?>
			<?php echo $form->error($model,'_archivo'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'activo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php //echo $form->checkBox($model,'activo'); 
			echo $form->dropDownList($model,'activo',array('0'=>'Seleccione','Si'=>'Si','No'=>'No'), array('options' => array('0'=>array('selected'=>true))));
			?>
			<?php echo $form->error($model,'activo'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>