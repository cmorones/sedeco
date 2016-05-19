<?php
/* @var $this Ap3Ind2aController */
/* @var $model Ap3Ind2a */

$this->breadcrumbs=array(
	'Ap3 Ind2as'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap3Ind2a', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind2a', 'url'=>array('create')),
	array('label'=>'View Ap3Ind2a', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap3Ind2a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>