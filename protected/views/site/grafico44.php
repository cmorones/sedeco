<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];
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

  //echo "->".$periodo; 

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);


  //se valida si es imagen o datos para el back end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id=$periodo AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

}

 $id2=10;

 $baseUrl = Yii::app()->params['baserecm'];
$texto=$baseUrl."/index.php/api/ap1Ind61?anio=0&trim=0&entidad=0&grafico=1&periodo=".$periodo."&texto=1"; 
//echo $texto;
$text = file_get_contents($texto);
 ?>
 <div class="container mainContainer" role="main">
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
                                echo CHtml::link('Construcción', array('site/main/44'));
                              ?>
                      </li>
                      <li >       
                          <?php
                                echo CHtml::link('Construcción por tipo de obra y sector', array('site/main/48'));
                              ?>
                      </li>
                      



                    
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                        </div>
                        <?php } ?> 
                            </div>
                           
              <div class="row maincontentRow">
              <div class="col-md-2 text-center">
              </div>
                <div class="col-md-8 text-center">
                  <h3>Valor de producción en construcción generado en el Distrito Federal Varición % anual</h3>


                  
              
<script type="text/javascript">
    $(document).ready(function() {

    var options = {
    credits: false,
      chart: {
          renderTo: 'v_d_produccion',
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
           
           title: '',
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
                                    name: '',
                                    color: '#FFC200',
                                    allowPointSelect: true,
                                    data: [],
                                    dataLabels: {
                                        enabled: true,

                                        color: '#000',
                                        align: 'right',

                                        style: {
                                            fontSize: '10px',
                                            fontFamily: 'Verdana, sans-serif',

                                        }
                                    }
                                    
                                }
                        
                     ]
        
  }
 /*chart = new Highcharts.Chart(options);
                        .getJSON("<?=$baseUrl?>/index.php/api/ap3Ind31g1?serie=1&grafico=1", function(json) {
                        options.series[0].data = json;
                                
                        
                        
                        });*/
                        $.getJSON("<?=$baseUrl?>/index.php/api/ap1Ind61?anio=0&trim=0&entidad=0&grafico=1&<?php echo 'periodo='.$periodo; ?>", function(json) {
                                options.series[0].data = json;
                                chart = new Highcharts.Chart(options);


                        });

                       // chart = new Highcharts.Chart(options);
          
            
          });
          /*
          
      chart = new Highcharts.Chart(options);    
          
        }); */  
    </script>



   <div class="option_1">
		        	
                    <?php if($image_data==""){ ?>
                      <div id="v_d_produccion">
                      </div>
                    <?php }else{ ?>
                      
                      <div class="col-md-12 text-center">
                        <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                      </div>
                      
                    <?php } ?>
		        
		        </div> 
                  <p class="table_exp_source">Fuente: Elaboración con datos de INEGI</p>
                            </div>
                              <div class="col-md-2 text-center">
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
                    <!-- </div>
                </div> -->
            </div>