<?php
/* @var $this Ap1Ind72Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind72s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind72', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind72', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind72s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
