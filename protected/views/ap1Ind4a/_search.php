<?php
/* @var $this Ap1Ind4aController */
/* @var $model Ap1Ind4a */
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
		<?php echo $form->labelEx($model,'tipo_serie'); ?>
		<?php //echo $form->textField($model,'rubro'); ?>
                <?php echo $form->dropDownList($model,'tipo_serie',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap1Ind4a'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->