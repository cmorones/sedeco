<?php
/* @var $this Ap9Ind1Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap9 Ind1s',
);

$this->menu=array(
	array('label'=>'Create Ap9Ind1', 'url'=>array('create')),
	array('label'=>'Manage Ap9Ind1', 'url'=>array('admin')),
);
?>

<h1>Ap9 Ind1s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
