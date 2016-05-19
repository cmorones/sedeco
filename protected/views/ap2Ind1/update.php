<?php
/* @var $this Ap2Ind1Controller */
/* @var $model Ap2Ind1 */

$this->breadcrumbs=array(
	'Ap2 Ind1s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap2Ind1', 'url'=>array('index')),
	array('label'=>'Create Ap2Ind1', 'url'=>array('create')),
	array('label'=>'View Ap2Ind1', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap2Ind1', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>