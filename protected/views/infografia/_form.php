<?php
/* @var $this InfografiaController */
/* @var $model Infografia */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'infografia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data','class' => 'form-horizontal'),
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nombre',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>



	<div class="form-group">
	  <?php echo $form->labelEx($model,'filename',array('class' => 'col-sm-2 control-label','for'=>"exampleInputFile")); ?>
   <div class="col-sm-10">
  
   <?php echo $form->fileField($model,'_archivo'); ?>
   <?php echo $form->error($model,'_archivo'); ?>
  </div>
  </div>

	<div class="form-group">
	  <?php echo $form->labelEx($model,'imagen',array('class' => 'col-sm-2 control-label','for'=>"exampleInputFile")); ?>
   <div class="col-sm-10">
  
   <?php echo $form->fileField($model,'_archivo2'); ?>
   <?php echo $form->error($model,'_archivo2s'); ?>
  </div>
  </div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>