<?php
/* @var $this HomeApartadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Apartadoses',
);

$this->menu=array(
	array('label'=>'Create HomeApartados', 'url'=>array('create')),
	array('label'=>'Manage HomeApartados', 'url'=>array('admin')),
);
?>

<h1>Home Apartadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
