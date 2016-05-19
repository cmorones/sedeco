<?php
/* @var $this Ap1Ind4bController */
/* @var $model Ap1Ind4b */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
	<div class="row">
		<?php echo $form->label($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_trimestre'); ?>
		<?php echo $form->textField($model,'id_trimestre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_sector'); ?>
		<?php echo $form->dropDownList($model,'id_sector',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap1Ind4b'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'id_sector'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->