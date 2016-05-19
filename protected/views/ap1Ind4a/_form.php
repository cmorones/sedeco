<?php
/* @var $this Ap1Ind4aController */
/* @var $model Ap1Ind4a */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ap1-ind4a-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); //para el id de periodo y el last insert
$id = Yii::app()->request->getQuery('id');

$sql_lid="SELECT MAX(id) as id  FROM ap1Ind4a";
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
		<?php echo $form->labelEx($model,'id_trimestre'); ?>
		<?php echo $form->textField($model,'id_trimestre'); ?>
		<?php echo $form->error($model,'id_trimestre'); ?>
	</div>

	
        <div class="row">
		<?php echo $form->labelEx($model,'tipo_serie'); ?>
		<?php //echo $form->textField($model,'rubro'); ?>
                <?php echo $form->dropDownList($model,'tipo_serie',CHtml::listData(Relaciones::model()->findAll(array("condition"=>"indicador =  'ap1Ind4a'")), 'columna', 'titulo'),array ('prompt'=>'Seleccione...'));?>
		<?php echo $form->error($model,'tipo_serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_act'); ?>
		<?php echo $form->textField($model,'total_act'); ?>
		<?php echo $form->error($model,'total_act'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vp'); ?>
		<?php echo $form->textField($model,'vp'); ?>
		<?php echo $form->error($model,'vp'); ?>
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