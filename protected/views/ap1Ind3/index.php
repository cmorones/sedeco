<?php
/* @var $this Ap1Ind3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind3s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind3', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind3', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
