<?php
/* @var $this Ap1Ind10Controller */
/* @var $model Ap1Ind10 */

$this->breadcrumbs=array(
	'Ap1 Ind10s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind10', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind10', 'url'=>array('create')),
	array('label'=>'View Ap1Ind10', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind10', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>