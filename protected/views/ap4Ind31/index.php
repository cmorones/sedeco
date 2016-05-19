<?php
/* @var $this Ap4Ind31Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind31s',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind31', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind31', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind31s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
