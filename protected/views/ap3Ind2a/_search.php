<?php
/* @var $this Ap3Ind2aController */
/* @var $model Ap3Ind2a */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'trimestre'); ?>
		<?php echo $form->textField($model,'trimestre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php echo $form->dropDownList($model,'rubro',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap1Ind2a'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'rubro'); ?>
	</div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->