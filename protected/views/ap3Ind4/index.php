<?php
/* @var $this Ap3Ind4Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind4s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind4', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind4', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind4s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
