<?php
/* @var $this HomePrincipalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Principals',
);

$this->menu=array(
	array('label'=>'Create HomePrincipal', 'url'=>array('create')),
	array('label'=>'Manage HomePrincipal', 'url'=>array('admin')),
);
?>

<h1>Home Principals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
