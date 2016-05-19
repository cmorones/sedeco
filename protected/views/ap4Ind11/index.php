<?php
/* @var $this Ap4Ind11Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind11s',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind11', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind11', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind11s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
