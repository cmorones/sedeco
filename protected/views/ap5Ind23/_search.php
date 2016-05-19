<?php
/* @var $this Ap5Ind23Controller */
/* @var $model Ap5Ind23 */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'delegacion'); ?>
		 <?php echo $form->dropDownList($model,'delegacion',CHtml::listData(Delegaciones::model()->findAll(), 'id', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php echo $form->dropDownList($model,'rubro',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap5Ind22'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		
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