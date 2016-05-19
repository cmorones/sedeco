<?php
/* @var $this Ap1Ind72Controller */
/* @var $model Ap1Ind72 */

$this->breadcrumbs=array(
	'Ap1 Ind72s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind72', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind72', 'url'=>array('create')),
	array('label'=>'View Ap1Ind72', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind72', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>