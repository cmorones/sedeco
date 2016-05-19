<?php
/* @var $this Ap5Ind4Controller */
/* @var $model Ap5Ind4 */

$this->breadcrumbs=array(
	'Ap5 Ind4s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap5Ind4', 'url'=>array('index')),
	array('label'=>'Create Ap5Ind4', 'url'=>array('create')),
	array('label'=>'View Ap5Ind4', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap5Ind4', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>