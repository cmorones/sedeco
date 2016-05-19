<?php
/* @var $this Ap2Ind1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap2 Ind1s',
);

$this->menu=array(
	array('label'=>'Create Ap2Ind1', 'url'=>array('create')),
	array('label'=>'Manage Ap2Ind1', 'url'=>array('admin')),
);
?>

<h1>Ap2 Ind1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
