<?php
/* @var $this Ap7Ind13Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap7 Ind13s',
);

$this->menu=array(
	array('label'=>'Create Ap7Ind13', 'url'=>array('create')),
	array('label'=>'Manage Ap7Ind13', 'url'=>array('admin')),
);
?>

<h1>Ap7 Ind13s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
