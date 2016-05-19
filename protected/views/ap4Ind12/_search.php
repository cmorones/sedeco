<?php
/* @var $this Ap4Ind12Controller */
/* @var $model Ap4Ind12 */
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
		<?php echo $form->label($model,'trimestre'); ?>
		<?php echo $form->textField($model,'trimestre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rubro2'); ?>
		<?php echo $form->dropDownList($model,'rubro2',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap4Ind12r2'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'rubro2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php echo $form->dropDownList($model,'rubro',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap4Ind12r1'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'rubro'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->