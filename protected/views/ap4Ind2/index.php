<?php
/* @var $this Ap4Ind2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind2s',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind2', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind2', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
