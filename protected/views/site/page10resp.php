  <?php
  //echo "El id es:$id";

  $sql = "SELECT descripcion from indicadores where id_ind=$id"; 
  $detalle = Yii::app()->db->createCommand($sql)->queryRow();
  
  ?>
  <div class="mainContainer" role="main">

<div class="customContent">
 <div class="row">       
<div class="col-md-2 apartado">
Produccion
</div>
<div class="col-md-10">
<div>
<?php
$resultado = Menus::model()->findAll((array(
    'condition'=>"parent_id=$id",
    'order'=>'position'
  )));
echo CHtml::tag('ul',array('id'=>'my-list'));
foreach ($resultado as $key => $row) {

                    
                    echo CHtml::tag('li');
                    echo CHtml::link($row->label, array('/site/main/'.$row->id));
                    echo CHtml::closeTag('li');
}
echo CHtml::closeTag('ul');
?>
</div>
</div>
</div>
</div>

        <div class="row">
            <div class="col-md-12 ">
                <div class="customContent">
                    <div class="row">
                        <div class="col-md-8">
	                        <p align="center"><strong>Producción</strong></p>
							<p><?=utf8_encode($detalle['descripcion'])?></p>	
                    	</div>
                    	<div class="col-md-4">
	                        <figure><img src="<?php echo Yii::app()->request->baseUrl;?>/images/SalirCrisis.jpg" width="100%" height="100%" alt="Mostrar Imagen"></figure>	
                    	</div>
               		 </div>
            	</div>
       		 </div>
   		 </div>
  <div>