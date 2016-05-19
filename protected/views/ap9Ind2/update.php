<?php
/* @var $this Ap9Ind2Controller */
/* @var $model Ap9Ind2 */

$this->breadcrumbs=array(
	'Ap9 Ind2s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Create Ap9Ind2', 'url'=>array('create')),
	array('label'=>'View Ap9Ind2', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap9Ind2', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>