<?php
/* @var $this Ap1Ind10Controller */
/* @var $model Ap1Ind10 */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php //echo $form->textField($model,'rubro'); ?>
                <?php echo $form->dropDownList($model,'rubro',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap1Ind10'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'rubro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mes'); ?>
		<?php echo $form->textField($model,'mes'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->