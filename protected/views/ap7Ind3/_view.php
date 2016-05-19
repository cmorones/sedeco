<?php
/* @var $this Ap7Ind3Controller */
/* @var $data Ap7Ind3 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rubro')); ?>:</b>
	<?php echo CHtml::encode($data->rubro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo1')); ?>:</b>
	<?php echo CHtml::encode($data->saldo1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colocacion1')); ?>:</b>
	<?php echo CHtml::encode($data->colocacion1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amortizacion1')); ?>:</b>
	<?php echo CHtml::encode($data->amortizacion1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colocacion2')); ?>:</b>
	<?php echo CHtml::encode($data->colocacion2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amortizacion2')); ?>:</b>
	<?php echo CHtml::encode($data->amortizacion2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('actualizacion2')); ?>:</b>
	<?php echo CHtml::encode($data->actualizacion2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo2')); ?>:</b>
	<?php echo CHtml::encode($data->saldo2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endeudamiento')); ?>:</b>
	<?php echo CHtml::encode($data->endeudamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anio')); ?>:</b>
	<?php echo CHtml::encode($data->anio); ?>
	<br />

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