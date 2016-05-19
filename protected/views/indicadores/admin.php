
<div class="page-header">
  <h2>Resumenes de Indicadores</h2>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'indicadores-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
	//	'id',
		array(
            'name'=>'id_ind',
            'value'=>'HistoricoPeriodos::model()->getApartado($data->id_ind)',
            'htmlOptions'=>array('style'=>'width:120px;  text-align:center;'),
                    ),
		//'id_ind',
		'descripcion',
		'img',
		//'fecha_reg',
		//'fecha_mod',
		/*
		'user_reg',
		'user_mod',
		*/
		array
(
    'class'=>'CButtonColumn',
    'template'=>'{update}',
),
	),
)); ?>
