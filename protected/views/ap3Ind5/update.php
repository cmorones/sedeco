<?php
/* @var $this Ap3Ind5Controller */
/* @var $model Ap3Ind5 */

$this->breadcrumbs=array(
	'Ap3 Ind5s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap3Ind5', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind5', 'url'=>array('create')),
	array('label'=>'View Ap3Ind5', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap3Ind5', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>