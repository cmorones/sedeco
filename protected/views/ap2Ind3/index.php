<?php
/* @var $this Ap2Ind3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap2 Ind3s',
);

$this->menu=array(
	array('label'=>'Create Ap2Ind3', 'url'=>array('create')),
	array('label'=>'Manage Ap2Ind3', 'url'=>array('admin')),
);
?>

<h1>Ap2 Ind3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
