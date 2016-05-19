<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

$menus= $baseUrl2.'/static/grafico_ap1ind1.json';

//echo $menus;
				$datos = file_get_contents($menus);
				//$model = json_decode($datos, true);
		/*$url = "http://localhost/recm/index.php/api2/ap1Ind1";
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);*/
 $id2=10;
 ?>
 <div class="customContent">
 <div class="row">       
<div class="col-md-2 apartado">
Produccion
</div>
<div class="col-md-10">
<div>
<?php
                                        $resultado = Menus::model()->findAll((array(
                                            'condition'=>"parent_id=$id2",
                                            'order'=>'position'
                                          )));
                                      //  echo CHtml::tag('ul',array('nav'=>'nav nav-pills'));
                                        foreach ($resultado as $key => $row) {

                                                           if($row->id==14){
																	echo CHtml::tag('li',array('role'=>'presentation','class'=>'active'));
											                    }else{
											                    	echo CHtml::tag('li',array('role'=>'presentation'));
											                    	
											                    }  
                                                           
                                                            echo CHtml::link($row->label, array('/site/main/'.$row->id));
                                                            echo CHtml::closeTag('li');
                                        }
                                       // echo CHtml::closeTag('ul');
                                  //ho CHtml::closeTag('ul');
?>
</div>
</div>
</div>
<div class="row">       
<div class="col-md-4">
<div align="center">
	
</div>
</div>
<div class="col-md-4">
<div align="center">

</div>
</div>
<div class="col-md-4">
<div align="center">
	 
</div>
</div>
</div>
<div class="row">       
<div class="col-md-4">
<div align="center">
	
</div>
</div>
<div class="col-md-4">
<div align="center">
	 <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico'.$registro['periodo'].'',
                        'caption'=>'Regresar al indicador',
                        'value'=>'Grafico',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/main/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
</div>
</div>
<div class="col-md-4">
<div align="center">
	 
</div>
</div>
</div
<p class="table_title default">
Estructura productiva del Distrito Federal, 2013
</p>
		        

<script type="text/javascript">
		$(document).ready(function() {
var options = {
		credits: false,
	    chart: {
	        renderTo: 'national_pib_pct_entities',
	        type: 'pie'
	    },
	    title: {
	    	text: ''
		},
		series: [{
                type: 'pie',
                name: '%',
                data: [
                    ['Sector primario ', 0.1],
                    ['Sector secundario',11.7],
                    ['Sector terciario',88.2]
                ]
         }]
				
	}
	chart = new Highcharts.Chart(options);   
	        
	       
	        });
		</script>


   <div class="option_1">
		        	<div id="national_pib_pct_entities">
		        
		        	</div>
		        	<div class="table_explanation">
		        		<p class="table_exp_title">Nota: Milpa Alta aparece con un valor de 429,646.</p>
				        <p class="table_exp_source"><span>Fuente: </span>Elaboración con base en datos de INEGI, Censo Económico 2009</p>
		        	</div>
		        </div> 