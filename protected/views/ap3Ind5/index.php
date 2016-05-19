<?php
/* @var $this Ap3Ind5Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap3 Ind5s',
);

$this->menu=array(
	array('label'=>'Create Ap3Ind5', 'url'=>array('create')),
	array('label'=>'Manage Ap3Ind5', 'url'=>array('admin')),
);
?>

<h1>Ap3 Ind5s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
