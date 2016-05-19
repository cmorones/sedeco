<?php
/* @var $this Ap2Ind5Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap2 Ind5s',
);

$this->menu=array(
	array('label'=>'Create Ap2Ind5', 'url'=>array('create')),
	array('label'=>'Manage Ap2Ind5', 'url'=>array('admin')),
);
?>

<h1>Ap2 Ind5s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
