<?php
/* @var $this Ap8Ind3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap8 Ind3s',
);

$this->menu=array(
	array('label'=>'Create Ap8Ind3', 'url'=>array('create')),
	array('label'=>'Manage Ap8Ind3', 'url'=>array('admin')),
);
?>

<h1>Ap8 Ind3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
