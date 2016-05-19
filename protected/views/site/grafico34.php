<?php

error_reporting(0);
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');

//$sql = "SELECT id from historico_periodos WHERE id_ind=$id AND autorizado=1"; 
//$per = Yii::app()->db->createCommand($sql)->queryRow();
//$periodo=$per['id'];

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

  //echo "->".$periodo; 

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
//$var = HistoricoPeriodos::model()->listaSimple($config['config']);

$url = $baseUrl. "/index.php/api2/ap1Ind4gestados?&periodo=$periodo";

        //$url = $baseUrl;
$serie = file_get_contents($url);
      //  $serie= CJSON::decode($data);

$url2 = $baseUrl. "/index.php/api2/ap1Ind4gvalores?&periodo=$periodo";

        //$url = $baseUrl;
$serie2 = file_get_contents($url2); 




$id2=10;

 ?>
 <div class="customContent">
 <div class="col-md-3">
    <h2 class="indicadorTitulo">PRODUCCIÓN</h2>
 </div>
 <div class="row contentRow">
                                
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



                            <div class="col-md-12 text-center">
    <h3><?php echo $titulos['titulo1']; ?></h3>
    <p><?php echo $titulos['titulo2']; ?></p>
    <p><?php echo $titulos['titulo3']; ?></p>
</div> 
<bR>   
 <script type="text/javascript">
        $(document).ready(function() {

    var options = {
        credits: false,

        chart: {
            renderTo: 'variacion_itaee',
            type: 'bar',
            height: 700,
        },

         title: {
            text: ''
        },
        xAxis: {
             title: {
            text: ''
        },
            
            labels: {
                rotation: -10,
                y: 10
            },
            categories: 
            <?php echo $serie  ?>
        },
        yAxis: {
            title: 'Porcentaje',
            tickInterval: 1,
            gridLineWidth: 1,
        },
        scrollbar: {
            height: 15
        },
        
        rangeSelector: {
            selected: 1
        },
        series: [{
                       name: 'Variación % real del ITAEE',
                       color: '#610B0B',
                       allowPointSelect: true,
                       data: 
                       <?php echo $serie2  ?>
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
                      <div id="variacion_itaee"  style="clear:both">
                      </div>
                    <?php }else{ ?>
                      
                      <div class="col-md-12 text-center">
                        <img src="<?php echo $baseUrl; ?>/uploads/<?php echo $image_data;  ?>">
                      </div>
                      
                    <?php } ?>
                   
                </div> 
        
              <div class="table_explanation">
                      <p><?php echo $titulos['nota1']; ?></p>
                      <p><?php echo $titulos['fuente']; ?></p>
              </div>
            </div> 