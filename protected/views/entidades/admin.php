

<h1>Administrar Entidades</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entidades-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'orden',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
