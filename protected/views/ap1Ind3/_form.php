<?php
/* @var $this Ap1Ind3Controller */
/* @var $model Ap1Ind3 */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap1-ind3-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); //para el id de periodo y el last insert
$id = Yii::app()->request->getQuery('id');

$sql_lid="SELECT MAX(id) as id  FROM ap1Ind3";
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
		<?php echo $form->labelEx($model,'id_entidad'); ?>
		<?php echo $form->dropDownList($model,'id_entidad',CHtml::listData(Entidades::model()->findAll(), 'id', 'nombre'),array ('prompt'=>'Seleccione...'));?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'valor_precio'); ?>
		<?php echo $form->textField($model,'valor_precio'); ?>
		<?php echo $form->error($model,'valor_precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pib'); ?>
		<?php echo $form->textField($model,'pib'); ?>
		<?php echo $form->error($model,'pib'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_cambio'); ?>
		<?php echo $form->textField($model,'tipo_cambio'); ?>
		<?php echo $form->error($model,'tipo_cambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poblacion'); ?>
		<?php echo $form->textField($model,'poblacion'); ?>
		<?php echo $form->error($model,'poblacion'); ?>
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