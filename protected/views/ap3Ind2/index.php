<?php
/* @var $this Ap3Ind2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind2s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind2', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind2', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
