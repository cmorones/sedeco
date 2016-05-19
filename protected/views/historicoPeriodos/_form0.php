<?php
/* @var $this HistoricoPeriodosController */
/* @var $model HistoricoPeriodos */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historico-periodos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'form-horizontal'),
)); ?>

	
	<?php echo $form->errorSummary($model); ?>



	<div class="form-group">
		<?php echo $form->labelEx($model,'Nombre del Periodo', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'nombre',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo1', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo1',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo1'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo2', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo2',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo2'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'titulo3', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'titulo3',array('maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'titulo3'); ?>
		</div>
	</div>

   
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'nota1', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
					'model'=>$model,
					'attribute'=>'nota1',
					'toolbar'=>array(
					array(
					'Bold', 'Italic', 'Underline', 'Strike',
					'Subscript', 'Superscript'
					),
						)
					)); 
			?>
			<?php echo $form->error($model,'nota1'); ?>
		</div>
	</div>


	


	<div class="form-group">
		<?php echo $form->labelEx($model,'fuente', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
					'model'=>$model,
					'attribute'=>'fuente',
					'toolbar'=>array(
					array(
					'Bold', 'Italic', 'Underline', 'Strike',
					'Subscript', 'Superscript'
					),
						)
					)); 
			?>
			<?php echo $form->error($model,'fuente'); ?>
		</div>
	</div>
	


	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar', array('class' => 'btn btn-success')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>