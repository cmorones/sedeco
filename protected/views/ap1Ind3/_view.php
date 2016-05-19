<?php
/* @var $this Ap1Ind3Controller */
/* @var $data Ap1Ind3 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_entidad')); ?>:</b>
	<?php echo CHtml::encode($data->id_entidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anio')); ?>:</b>
	<?php echo CHtml::encode($data->anio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_precio')); ?>:</b>
	<?php echo CHtml::encode($data->valor_precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pib')); ?>:</b>
	<?php echo CHtml::encode($data->pib); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_cambio')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_cambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poblacion')); ?>:</b>
	<?php echo CHtml::encode($data->poblacion); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodo_id')); ?>:</b>
	<?php echo CHtml::encode($data->periodo_id); ?>
	<br />

	*/ ?>

</div>