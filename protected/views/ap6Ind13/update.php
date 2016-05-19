<?php
/* @var $this Ap6Ind13Controller */
/* @var $model Ap6Ind13 */

$this->breadcrumbs=array(
	'Ap6 Ind13s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap6Ind13', 'url'=>array('index')),
	array('label'=>'Create Ap6Ind13', 'url'=>array('create')),
	array('label'=>'View Ap6Ind13', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap6Ind13', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Actualiza los valores ID -> <?php echo $model->id; ?></h2>
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>