<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

//-------->fer
$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=$id AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id);

  //se valida si es imagen o datos para el front end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id_ind=$id AND autorizado=1 AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

}else{

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);


  //se valida si es imagen o datos para el back end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id=$periodo AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

}
//---------------------->fer
//echo "-->".$periodo;
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


		
$id2=86;
 ?>
<div class="customContent">
<div class="row">       
<div class="col-md-3 apartado">
Produccion
</div>
<?php 
              $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
              

              if($cadena<1){ ?>
<div class="col-md-9">
              <nav class="navbar navbar-default indicadoresNav" role="navigation">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Indicadores</a>
                  </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-2" aria-expanded="false">
                      <ul class="nav navbar-nav">
                          <?php
                                        $resultado = Menus::model()->findAll((array(
                                            'condition'=>"parent_id=$id2",
                                            'order'=>'position'
                                          )));
                                      //  echo CHtml::tag('ul',array('nav'=>'nav nav-pills'));
                                        foreach ($resultado as $key => $row) {

                                                           if($row->id==$id){
                                  echo CHtml::tag('li',array('role'=>'presentation','class'=>'active'));
                                          }else{
                                            echo CHtml::tag('li',array('role'=>'presentation'));
                                            
                                          }  
                                                           
                                                            echo CHtml::link($row->label, array('/site/main/'.$row->id));
                                                            echo CHtml::closeTag('li');
                                        }
                                       // echo CHtml::closeTag('ul');
                                  ?>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                  <nav class="navbar navbar-default subindicadoresNav" role="navigation">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Detalles</a>
                  </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" aria-expanded="false">
                      <ul class="nav navbar-nav">
                        <li>
                                <?php
                                  echo CHtml::link('Trabajadores asegurados<br> en el IMSS', array('site/main/97'));
                                ?>
                        </li>
                        <li >
        
                          <?php
                                echo CHtml::link('Gráfica Variación <br>porcentual anual', array('site/grafico/98'));
                              ?>
                          
                        </li>


                        <li >
        
                        <?php
                                echo CHtml::link('Gráfica porcentajes de<br> nuevos empleos formales', array('site/grafico/99'));
                              ?>
                        </li>

                      
                        <li >
       
                        <?php
                                echo CHtml::link('Gráfica Generación de<br> empleo formal', array('site/grafico/100'));
                              ?>
                        </li>

                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              
                        </div>
                        <?php } ?> 
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
<div class="col-md-12 text-center">
    <h3><?php echo $titulos['titulo1']; ?></h3>
    <p><?php echo $titulos['titulo2']; ?></p>
    <p><?php echo $titulos['titulo3']; ?></p>
</div>

<!-- aqui va el contenido -->
	
  <script type="text/javascript">
		$(document).ready(function() {

		var options = {
		credits: false,
	    chart: {
	        renderTo: 'valor_censal',
	        type: 'bar'
	    },
	    title: {
	    	text: ''
		},
		xAxis: {
			title: {
                text: 'Entidad'
            },
            labels: {
                rotation: -25,
                y: 10
            },
		    categories: [
                        "Veracruz",
                        "Puebla",
                        "Coahuila",
                        "Estado de México",
                        "Nuevo León",
                        "Jalisco",
                        "Distrito Federal"
                    ]
		},
		yAxis: {
            labels: {
                //format: '{value}'
                enabled: false
            },

           title: {
              text: ''
           },
            
            gridLineWidth: 1
        },
        scrollbar: {
	    	height: 15
	    },

      
	    
	    rangeSelector: {
	    	selected: 1
	    },

	    series: [
                {
                name: 'Empleos',
                color: 'orange',
                allowPointSelect: true,
                data: [],
                dataLabels: {
                    enabled: true,
                   // rotation: -180,
                    color: '#000000',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'sans-serif, Verdana',
                       // textShadow: '0 0 3px black'
                    }
                }
                }
                
             ]
				
    }

			$.getJSON("<?=$baseUrl?>/index.php/api/ap3Ind31g3?anios=<?php echo $a; ?>&serie=1&grafico=1&<?php echo 'periodo='.$periodo; ?>", function(json) {
				options.series[0].data = json;
        chart = new Highcharts.Chart(options);

    });
    });
    /*
    
  chart = new Highcharts.Chart(options);    
    
  }); */  
		</script>


   <div class="option_1">
		        	<?php if($image_data==""){ ?>
                <div id="valor_censal" style="clear:both">
                </div>
              <?php }else{ ?>
                
                <div class="col-md-12 text-center">
                  <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                </div>
                
              <?php } ?>
		        	<div class="table_explanation">
                      <p><?php echo $titulos['nota1']; ?></p>
                      <p><?php echo $titulos['nota2']; ?></p>
                      <p><?php echo $titulos['nota3']; ?></p>
                      <p><?php echo $titulos['fuente']; ?></p>
              </div>
		        </div>    
                
<!-- aca termina la tabla -->
     
     
    <div>
     <div align="center"></div>
     <div align="center"></div>
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
</div>