<?php
/* @var $this Ap7Ind12Controller */
/* @var $model Ap7Ind12 */

$this->breadcrumbs=array(
	'Ap7 Ind12s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap7Ind12', 'url'=>array('index')),
	array('label'=>'Create Ap7Ind12', 'url'=>array('create')),
	array('label'=>'View Ap7Ind12', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap7Ind12', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>