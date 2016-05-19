<?php
/* @var $this Ap1Ind5aController */
/* @var $model Ap1Ind5a */

$this->breadcrumbs=array(
	'Ap1 Ind5as'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind5a', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind5a', 'url'=>array('create')),
	array('label'=>'View Ap1Ind5a', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind5a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>