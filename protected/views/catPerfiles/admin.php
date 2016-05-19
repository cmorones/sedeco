<div class="page-header">
  <h2>Administrar Perfiles</h2>
</div>
<a href="<?php echo CController::createUrl('catPerfiles/create'); ?>" class="btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> Agregar</a>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cat-perfiles-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
