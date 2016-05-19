<?php
/* @var $this Ap1Ind62Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind62s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind62', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind62', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind62s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
