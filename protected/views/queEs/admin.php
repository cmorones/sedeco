

<h3>Actualizar sección que es?</h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'que-es-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'titulo',
		//'detalle',
			array
(
    'class'=>'CButtonColumn',
    'template'=>'{update}',
),
	),
)); ?>
