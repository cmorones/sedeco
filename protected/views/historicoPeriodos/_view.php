<?php
/* @var $this HistoricoPeriodosController */
/* @var $data HistoricoPeriodos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ind')); ?>:</b>
	<?php echo CHtml::encode($data->id_ind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('config')); ?>:</b>
	<?php echo CHtml::encode($data->config); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo1')); ?>:</b>
	<?php echo CHtml::encode($data->titulo1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo2')); ?>:</b>
	<?php echo CHtml::encode($data->titulo2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo3')); ?>:</b>
	<?php echo CHtml::encode($data->titulo3); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nota1')); ?>:</b>
	<?php echo CHtml::encode($data->nota1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nota2')); ?>:</b>
	<?php echo CHtml::encode($data->nota2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nota3')); ?>:</b>
	<?php echo CHtml::encode($data->nota3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuente')); ?>:</b>
	<?php echo CHtml::encode($data->fuente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('validado')); ?>:</b>
	<?php echo CHtml::encode($data->validado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autorizado')); ?>:</b>
	<?php echo CHtml::encode($data->autorizado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_reg')); ?>:</b>
	<?php echo CHtml::encode($data->user_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_mod')); ?>:</b>
	<?php echo CHtml::encode($data->user_mod); ?>
	<br />

	*/ ?>

</div>