<?php
/* @var $this Ap9Ind2Controller */
/* @var $model Ap9Ind2 */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mes'); ?>
		<?php echo $form->textField($model,'mes'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php echo $form->dropDownList($model,'rubro',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap9Ind2'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		
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