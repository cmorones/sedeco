<?php
/* @var $this Ap3Ind31Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind31s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind31', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind31', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind31s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
