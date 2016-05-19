<?php
/* @var $this Ap8Ind11Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap8 Ind11s',
);

$this->menu=array(
	array('label'=>'Create Ap8Ind11', 'url'=>array('create')),
	array('label'=>'Manage Ap8Ind11', 'url'=>array('admin')),
);
?>

<h1>Ap8 Ind11s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
