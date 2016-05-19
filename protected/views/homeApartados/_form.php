<?php
/* @var $this HomeApartadosController */
/* @var $model HomeApartados */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'home-apartados-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal'),
)); ?>



	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'detalle', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textArea($model,'detalle',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'detalle'); ?>
		</div>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'id_apartado'); ?>
		<?php echo $form->dropDownList($model, 'id_apartado', $indica);?>
		<?php echo $form->error($model,'id_apartado'); ?>
	</div>

	

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class' => 'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->