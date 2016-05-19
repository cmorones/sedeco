<?php
/* @var $this Ap3Ind12Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind12s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind12', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind12', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind12s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
