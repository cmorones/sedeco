<?php
/* @var $this Ap5Ind22Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap5 Ind22s',
);

$this->menu=array(
	array('label'=>'Create Ap5Ind22', 'url'=>array('create')),
	array('label'=>'Manage Ap5Ind22', 'url'=>array('admin')),
);
?>

<h1>Ap5 Ind22s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
