<?php
/* @var $this HomeReportesController */
/* @var $model HomeReportes */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-reportes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'form-horizontal'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre_btn', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textArea($model,'nombre_btn',array('maxlength'=>200, 'class'=>'form-control')); ?>
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
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>