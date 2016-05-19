<?php
/* @var $this Ap7Ind3Controller */
/* @var $model Ap7Ind3 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap7-ind3-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); //para el id de periodo y el last insert
$id = Yii::app()->request->getQuery('id');

$sql_lid="SELECT MAX(id) as id  FROM ap7Ind3";
$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();
$lastid=$lid['id']+1;
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'rubro'); ?>
		<?php echo $form->textField($model,'rubro'); ?>
		<?php echo $form->error($model,'rubro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo1'); ?>
		<?php echo $form->textField($model,'saldo1'); ?>
		<?php echo $form->error($model,'saldo1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colocacion1'); ?>
		<?php echo $form->textField($model,'colocacion1'); ?>
		<?php echo $form->error($model,'colocacion1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amortizacion1'); ?>
		<?php echo $form->textField($model,'amortizacion1'); ?>
		<?php echo $form->error($model,'amortizacion1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colocacion2'); ?>
		<?php echo $form->textField($model,'colocacion2'); ?>
		<?php echo $form->error($model,'colocacion2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amortizacion2'); ?>
		<?php echo $form->textField($model,'amortizacion2'); ?>
		<?php echo $form->error($model,'amortizacion2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actualizacion2'); ?>
		<?php echo $form->textField($model,'actualizacion2'); ?>
		<?php echo $form->error($model,'actualizacion2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo2'); ?>
		<?php echo $form->textField($model,'saldo2'); ?>
		<?php echo $form->error($model,'saldo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endeudamiento'); ?>
		<?php echo $form->textField($model,'endeudamiento'); ?>
		<?php echo $form->error($model,'endeudamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
		<?php echo $form->error($model,'anio'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'id', array('value'=>$lastid)); ?>
		<?php    $cadena=stripos($_SERVER['REQUEST_URI'], 'update');    if($cadena<1){    echo $form->hiddenField($model,'periodo_id', array('value'=>$id));   }else{  echo $form->hiddenField($model,'periodo_id');   }    ?>
		<?php echo $form->hiddenField($model,'fecha_reg', array('value'=>date("Y\-n\-j H:i:s"))); ?>
		<?php echo $form->hiddenField($model,'user_reg', array('value'=>Yii::app()->user->id)); ?>
		
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->