<?php
/* @var $this Ap6Ind12Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap6 Ind12s',
);

$this->menu=array(
	array('label'=>'Create Ap6Ind12', 'url'=>array('create')),
	array('label'=>'Manage Ap6Ind12', 'url'=>array('admin')),
);
?>

<h1>Ap6 Ind12s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
