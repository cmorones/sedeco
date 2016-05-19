<?php
/* @var $this CatPerfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Perfiles',
);

$this->menu=array(
	array('label'=>'Create CatPerfiles', 'url'=>array('create')),
	array('label'=>'Manage CatPerfiles', 'url'=>array('admin')),
);
?>

<h1>Cat Perfiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
