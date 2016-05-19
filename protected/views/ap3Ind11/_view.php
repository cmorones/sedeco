<?php
/* @var $this Ap3Ind11Controller */
/* @var $data Ap3Ind11 */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('delegacion')); ?>:</b>
	<?php echo CHtml::encode($data->delegacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pea')); ?>:</b>
	<?php echo CHtml::encode($data->pea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po')); ?>:</b>
	<?php echo CHtml::encode($data->po); ?>
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