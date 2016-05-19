<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");



///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=84 AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id);

  $test=0;

}else{


  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

  $test=1;

}
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);
  
$id2=70;
$baseUrl = Yii::app()->params['baserecm'];
$texto=$baseUrl."/index.php/api/ap2Ind5_textos?anios=".$a.",2013&serie=1&grafico=1&periodo=".$periodo; 
$text = file_get_contents($texto);
 ?>
<div class="customContent">
<div class="row">       
<div class="col-md-3">
    <h2 class="indicadorTitulo">PRECIOS</h2>
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

                        <li >        
                            <?php
                                echo CHtml::link('Gráfico Inflación mensual Área Metropolitana', array('site/main/84'));
                              ?>
                        </li>

                        <li >        
                            <?php
                                echo CHtml::link('Inflación Histórico', array('site/main/78'));
                              ?>
                        </li>
                        <li >        
                            <?php
                                echo CHtml::link('Inflación mensual Área Metropolitana', array('site/main/77'));
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
          type: 'spline'
      },
      title: {
        text: ''
    },
    xAxis: {
      title: {
                text: ''
            },
            labels: {
                rotation: -25,
                y: 10
            },
        categories: <?php echo $text; ?>
    },
    yAxis: {
            title: 'Porcentaje',
            tickInterval: .5,
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
                        name: 'Ciudad de México',
                        color: '#ffc000',
                        allowPointSelect: true,
                        data: []
                        },
                        {
                        name: 'Nacional',
                        color: '#7A211D',
                        allowPointSelect: true,
                        data: []
                        }
                        
                     ]
        
  }
                        <?php $baseUrl = Yii::app()->params['baserecm']; ?>
                          
                       $.getJSON("<?php echo $baseUrl?>/index.php/api/ap2Ind5?anios=<?php echo $a; ?>,2013&serie=1&grafico=1&periodo=<?php echo $periodo; ?>&test=<?php echo $test; ?>", function(json) {
                        options.series[0].data = json;
                                            chart = new Highcharts.Chart(options);
                                    
                        
                        });

                        $.getJSON("<?php echo $baseUrl?>/index.php/api/ap2Ind5?anios=<?php echo $a; ?>,2013&serie=2&grafico=1&periodo=<?php echo $periodo; ?>&test=<?php echo $test; ?>", function(json2) {
                                options.series[1].data = json2;
                                chart = new Highcharts.Chart(options);


                        });
          
            
          });
          /*
          
      chart = new Highcharts.Chart(options);    
          
        }); */  
    </script>


   <div class="option_1"><br>
              <div id="valor_censal" style="clear:both">
            
              </div>
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