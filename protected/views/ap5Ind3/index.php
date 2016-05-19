<?php
/* @var $this Ap5Ind3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap5 Ind3s',
);

$this->menu=array(
	array('label'=>'Create Ap5Ind3', 'url'=>array('create')),
	array('label'=>'Manage Ap5Ind3', 'url'=>array('admin')),
);
?>

<h1>Ap5 Ind3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
