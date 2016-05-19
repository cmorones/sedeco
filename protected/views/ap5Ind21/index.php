<?php
/* @var $this Ap5Ind21Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap5 Ind21s',
);

$this->menu=array(
	array('label'=>'Create Ap5Ind21', 'url'=>array('create')),
	array('label'=>'Manage Ap5Ind21', 'url'=>array('admin')),
);
?>

<h1>Ap5 Ind21s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
