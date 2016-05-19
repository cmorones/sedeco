<?php
/* @var $this Ap4Ind12Controller */
/* @var $data Ap4Ind12 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anio')); ?>:</b>
	<?php echo CHtml::encode($data->anio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trimestre')); ?>:</b>
	<?php echo CHtml::encode($data->trimestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rubro2')); ?>:</b>
	<?php echo CHtml::encode($data->rubro2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rubro')); ?>:</b>
	<?php echo CHtml::encode($data->rubro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_reg')); ?>:</b>
	<?php echo CHtml::encode($data->user_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?>:</b>
	<?php echo CHtml::encode($data->user_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo_id')); ?>:</b>
	<?php echo CHtml::encode($data->periodo_id); ?>
	<br />

	*/ ?>

</div>