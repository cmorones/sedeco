<?php
/* @var $this Ap4Ind4Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind4s',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind4', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind4', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind4s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
