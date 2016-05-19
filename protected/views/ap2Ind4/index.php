<?php
/* @var $this Ap2Ind4Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap2 Ind4s',
);

$this->menu=array(
	array('label'=>'Create Ap2Ind4', 'url'=>array('create')),
	array('label'=>'Manage Ap2Ind4', 'url'=>array('admin')),
);
?>

<h1>Ap2 Ind4s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
