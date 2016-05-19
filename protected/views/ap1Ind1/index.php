<?php
/* @var $this Ap1Ind1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind1s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind1', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind1', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
