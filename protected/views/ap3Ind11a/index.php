<?php
/* @var $this Ap3Ind11aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind11as',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind11a', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind11a', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind11as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
