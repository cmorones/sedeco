<?php
/* @var $this Ap8Ind12Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap8 Ind12s',
);

$this->menu=array(
	array('label'=>'Create Ap8Ind12', 'url'=>array('create')),
	array('label'=>'Manage Ap8Ind12', 'url'=>array('admin')),
);
?>

<h1>Ap8 Ind12s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
