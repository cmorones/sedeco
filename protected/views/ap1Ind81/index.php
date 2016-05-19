<?php
/* @var $this Ap1Ind81Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap1 Ind81s',
);

$this->menu=array(
	array('label'=>'Create Ap1Ind81', 'url'=>array('create')),
	array('label'=>'Manage Ap1Ind81', 'url'=>array('admin')),
);
?>

<h1>Ap1 Ind81s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
