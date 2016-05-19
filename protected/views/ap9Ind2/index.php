<?php
/* @var $this Ap9Ind2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap9 Ind2s',
);

$this->menu=array(
	array('label'=>'Create Ap9Ind2', 'url'=>array('create')),
	array('label'=>'Manage Ap9Ind2', 'url'=>array('admin')),
);
?>

<h1>Ap9 Ind2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
