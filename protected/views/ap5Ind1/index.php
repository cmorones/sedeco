<?php
/* @var $this Ap5Ind1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap5 Ind1s',
);

$this->menu=array(
	array('label'=>'Create Ap5Ind1', 'url'=>array('create')),
	array('label'=>'Manage Ap5Ind1', 'url'=>array('admin')),
);
?>

<h1>Ap5 Ind1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
