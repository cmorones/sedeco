<?php
/* @var $this Ap5Ind3Controller */
/* @var $model Ap5Ind3 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap5-ind3-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); //para el id de periodo y el last insert
$id = Yii::app()->request->getQuery('id');

$sql_lid="SELECT MAX(id) as id  FROM ap5Ind3";
$lid = Yii::app()->db->createCommand($sql_lid)->queryRow();
$lastid=$lid['id']+1;
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'anio'); ?>
		<?php echo $form->textField($model,'anio'); ?>
		<?php echo $form->error($model,'anio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entidad'); ?>
		 <?php echo $form->dropDownList($model,'entidad',CHtml::listData(Entidades::model()->findAll(), 'id', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'entidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facilidad'); ?>
		<?php echo $form->textField($model,'facilidad'); ?>
		<?php echo $form->error($model,'facilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apertura'); ?>
		<?php echo $form->textField($model,'apertura'); ?>
		<?php echo $form->error($model,'apertura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manejo'); ?>
		<?php echo $form->textField($model,'manejo'); ?>
		<?php echo $form->error($model,'manejo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro'); ?>
		<?php echo $form->textField($model,'registro'); ?>
		<?php echo $form->error($model,'registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cumplimiento'); ?>
		<?php echo $form->textField($model,'cumplimiento'); ?>
		<?php echo $form->error($model,'cumplimiento'); ?>
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