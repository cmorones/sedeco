<?php 
//variable de sesion y periodo activo
$id = Yii::app()->request->getQuery('id');

$this->menu=array(
	//array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create?id='.$id)),
);
?>

<div class="page-header">
  <h2>Administrar Datos de este periodo</h2>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ap1-ind5a-grid',
	'dataProvider'=>$model->search($id),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		
		'entidad',
		'anio',
		'id_mes',
		'valor',
		/*
		'valor_nacional',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{borrar}',
		    'buttons'=>array
		    (
		        'borrar' => array
		        (
		            'label'=>'',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/incorrecto.png',
		            'url'=>'Yii::app()->createUrl("ap1Ind5a/borrar", array("id"=>$data->id))',
		            'options' => array(
		            'confirm'=>'Estas seguro de eliminar?',
		            ),
		        ),
		),
	),
),
)); ?>
<div id="sidebar">
    <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
    ?>
</div>