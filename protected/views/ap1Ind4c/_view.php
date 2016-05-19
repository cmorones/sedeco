<?php
/* @var $this Ap1Ind4cController */
/* @var $data Ap1Ind4c */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->id_periodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anio')); ?>:</b>
	<?php echo CHtml::encode($data->anio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_trimestre')); ?>:</b>
	<?php echo CHtml::encode($data->id_trimestre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pib')); ?>:</b>
	<?php echo CHtml::encode($data->pib); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('igae')); ?>:</b>
	<?php echo CHtml::encode($data->igae); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('itaee')); ?>:</b>
	<?php echo CHtml::encode($data->itaee); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_reg')); ?>:</b>
	<?php echo CHtml::encode($data->user_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?>:</b>
	<?php echo CHtml::encode($data->user_mod); ?>
	<br />

	*/ ?>

</div>