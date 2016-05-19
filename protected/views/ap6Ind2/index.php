<?php
/* @var $this Ap6Ind2Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap6 Ind2s',
);

$this->menu=array(
	array('label'=>'Create Ap6Ind2', 'url'=>array('create')),
	array('label'=>'Manage Ap6Ind2', 'url'=>array('admin')),
);
?>

<h1>Ap6 Ind2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
