<?php
/* @var $this Ap4Ind12Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap4 Ind12s',
);

$this->menu=array(
	array('label'=>'Create Ap4Ind12', 'url'=>array('create')),
	array('label'=>'Manage Ap4Ind12', 'url'=>array('admin')),
);
?>

<h1>Ap4 Ind12s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
