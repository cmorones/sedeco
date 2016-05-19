
              <?php

error_reporting(0);
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
$anio =2014;
$trim=2;

$url = $baseUrl. "/index.php/api2/ap1Ind4bcategories?periodo=$periodo";
$categorias = file_get_contents($url);

$url = $baseUrl. "/index.php/api2/ap1Ind4bsector1?periodo=$periodo";
$primario = file_get_contents($url);

$url = $baseUrl. "/index.php/api2/ap1Ind4bsector2?periodo=$periodo";
$secundario = file_get_contents($url);

$url = $baseUrl. "/index.php/api2/ap1Ind4bsector3?periodo=$periodo";
$terciario = file_get_contents($url);
//$categories = file_get_contents($url);*/
$id2=10;
 ?>
 <div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">PRODUCCIÓN</h2>
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

                        <li >
      <?php
      echo CHtml::link('Gráfica ITAEE por entidad federativa', array('site/grafico/34'));
                
            ?>
                     
                      </li>


                        <li >
       <?php
        echo CHtml::link('ITAEE por Sector', array('site/main/28'));
                  
            ?>
                     
                      </li>

                      
                        <li >
    <?php
echo CHtml::link('Historico ITAEE, Igae y PIB', array('site/main/31'));

                
            ?>
                     
                      </li>
    
                   



             
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                        </div>
                        <?php } ?> 
                                


                              
                            </div>


		        
<script type="text/javascript">
        $(document).ready(function() {

    var options = {
        credits: false,
        chart: {
            renderTo: 'sector_itae',
            type: 'column'
        },
        title: {
            text: 'Variación porcentual anual del ITAEE Distrito Federal por sector de actividad económica, 2012 a 2014'
        },
        
        xAxis: {
            title: {
                text: 'Periodo'
            },
            labels: {
                rotation: -50,
                y: 10
            },
            
            categories:    
                            <?php echo $categorias; ?>
                        
        },
        yAxis: {
            title: '',
            tickInterval: 10,
            gridLineWidth: 1,
            stackLabels: {
                    enabled: false
            }
        },
         tooltip: {
            formatter: function() {
                console.log('Series name: ' + this.series.name + ' stack: ' + this.series.stack + ' type: ' + this.series.type);
                var output = '<b>'+ this.x +'</b><br/>'+
                            this.series.name +': '+ this.y;
                
                if(this.series.type != 'spline') {
                    output += '<br/>'+
                            'Total: '+ this.point.stackTotal;
                }
                    
                return output;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
                       name: 'Terciario',
                       color: '#8A6642',
                       allowPointSelect: true,
                       data: 
                       <?php echo $terciario; ?>
                    },
                    {
                       name: 'Secundario',
                       color: '#C6A664',
                       allowPointSelect: true,
                       data: 
                       <?php echo $secundario; ?>
                    },
                    {
                       name: 'Primario',
                       color: '#FFA420',
                       allowPointSelect: true,
                       data: 
                       <?php echo $primario; ?>
                    }]
                
    }

chart = new Highcharts.Chart(options);
            
           
            });
            /*
            
        chart = new Highcharts.Chart(options);    
            
        }); */  
        </script>


   <div class="option_1">
                    
                    <?php if($image_data==""){ ?>
                      <div id="sector_itae">
                      </div>
                    <?php }else{ ?>
                      
                      <div class="col-md-12 text-center">
                        <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                      </div>
                      
                    <?php } ?>
                   
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
		        	<div class="table_explanation">
		        		<p class="table_exp_title">*Promedio trimestral</p>
				        <p class="table_exp_source"><span>Fuente: </span>INEGI, Banco de Infrmación Economica, cifras preliminares</p>
		        	</div>
		        </div> 