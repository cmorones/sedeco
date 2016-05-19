<?php
/* @var $this Ap1Ind82Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind82s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind82', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind82', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind82s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
