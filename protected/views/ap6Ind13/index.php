<?php
/* @var $this Ap6Ind13Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap6 Ind13s',
);

$this->menu=array(
	array('label'=>'Create Ap6Ind13', 'url'=>array('create')),
	array('label'=>'Manage Ap6Ind13', 'url'=>array('admin')),
);
?>

<h1>Ap6 Ind13s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
