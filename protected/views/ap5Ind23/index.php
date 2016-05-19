<?php
/* @var $this Ap5Ind23Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap5 Ind23s',
);

$this->menu=array(
	array('label'=>'Create Ap5Ind23', 'url'=>array('create')),
	array('label'=>'Manage Ap5Ind23', 'url'=>array('admin')),
);
?>

<h1>Ap5 Ind23s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
