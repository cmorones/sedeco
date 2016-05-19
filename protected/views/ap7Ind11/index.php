<?php
/* @var $this Ap7Ind11Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind11s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind11', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind11', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind11s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
