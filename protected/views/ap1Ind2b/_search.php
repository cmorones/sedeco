<?php
/* @var $this Ap1Ind2bController */
/* @var $model Ap1Ind2b */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	

	<div class="row">
		<?php echo $form->labelEx($model,'id_entidad'); ?>
		<?php echo $form->dropDownList($model,'id_entidad',CHtml::listData(Entidades::model()->findAll(), 'id', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		
	</div>
	<div class="row">
		<?php echo $form->label($model,'id_sector'); ?>
		<?php echo $form->textField($model,'id_sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->