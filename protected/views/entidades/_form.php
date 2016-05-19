<?php
/* @var $this EntidadesController */
/* @var $model Entidades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entidades-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal'),
)); ?>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nombre',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'orden', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'orden',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'orden'); ?>
		</div>
	</div>

	<div class="form-group">
	<div class="col-sm-10">
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->