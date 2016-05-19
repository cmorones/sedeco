<?php
/* @var $this Ap8Ind21aController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap8 Ind21as',
);

$this->menu=array(
	array('label'=>'Create Ap8Ind21a', 'url'=>array('create')),
	array('label'=>'Manage Ap8Ind21a', 'url'=>array('admin')),
);
?>

<h1>Ap8 Ind21as</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
