<?php
/* @var $this Ap6Ind11Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap6 Ind11s',
);

$this->menu=array(
	array('label'=>'Create Ap6Ind11', 'url'=>array('create')),
	array('label'=>'Manage Ap6Ind11', 'url'=>array('admin')),
);
?>

<h1>Ap6 Ind11s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
