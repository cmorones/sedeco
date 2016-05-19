<?php
/* @var $this Ap3Ind31g3Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind31g3s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind31g3', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind31g3', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind31g3s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
