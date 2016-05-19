<?php
/* @var $this Ap4Ind12aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind12as',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind12a', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind12a', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind12as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
