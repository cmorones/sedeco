<?php
/* @var $this Ap8Ind21Controller */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ap8 Ind21s',
);

$this->menu=array(
	array('label'=>'Create Ap8Ind21', 'url'=>array('create')),
	array('label'=>'Manage Ap8Ind21', 'url'=>array('admin')),
);
?>

<h1>Ap8 Ind21s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
