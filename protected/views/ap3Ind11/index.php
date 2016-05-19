<?php
/* @var $this Ap3Ind11Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind11s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind11', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind11', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind11s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
