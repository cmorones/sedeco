<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];  

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=188 AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id);

  //se valida si es imagen o datos para el front end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id_ind=$id AND autorizado=1 AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];

  $baseUrl = Yii::app()->params['baserecm'];
  $texto=$baseUrl."/index.php/api/ap8Ind14_textos?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=1&grafico=1&periodo=".$periodo; 

  $serie1=$baseUrl."/index.php/api/ap8Ind14?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=1&grafico=1&periodo=".$periodo;
  $serie2=$baseUrl."/index.php/api/ap8Ind14?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=2&grafico=1&periodo=".$periodo; 

  $text = file_get_contents($texto);

}else{
  $x=$periodo;
  $sql = "SELECT config from historico_periodos WHERE id=$x"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  
  $p=$per['config'];

  //$c=str_replace('"', '\\"', $p);

  $sql2 = "SELECT config, id, id_ind from historico_periodos WHERE id_ind=188"; 
  $per2 = Yii::app()->db->createCommand($sql2)->queryAll();
  
  //print_r($per2);

  //echo $cc=array_search($p, $per2);

  //print_r($cc);

  function searchForId($id, $array) {
     foreach ($array as $key => $val) {
         if ($val['config'] === $id) {
             return $key;
         }
     }
     return null;
  }

  $idx = searchForId($p, $per2);

  $periodox=$per2[$idx]['id'];

  //error
  if($periodox==""){
    $errorx= "La configuración debe ser igual a la del indicador de Historico de comercio";
    throw new CHttpException($errorx);

  }

  $config=HistoricoPeriodos::model()->periodo_back($periodox);

  //print_r($config);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodox);

  //se valida si es imagen o datos para el back end
  $sql_imagen = "SELECT filename from historico_periodos WHERE id=$periodox AND imagen = 1"; 
  $imagen = Yii::app()->db->createCommand($sql_imagen)->queryRow();
  $image_data=$imagen['filename'];


  $baseUrl = Yii::app()->params['baserecm'];
  $texto=$baseUrl."/index.php/api/ap8Ind14_textos?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=1&grafico=1&periodo=".$periodox; 
  $text = file_get_contents($texto);

  $serie1=$baseUrl."/index.php/api/ap8Ind14?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=1&grafico=1&periodo=".$periodox;
  $serie2=$baseUrl."/index.php/api/ap8Ind14?anios_ini=".$config['anios_ini']."&anios_fin=".$config['anios_fin']."&serie=2&grafico=1&periodo=".$periodox; 
}

//años
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$id2=185;
 ?>
<div class="customContent">
<div class="row">       
<div class="col-md-2 apartado">
<h2 class="indicadorTitulo">COMERCIO</h2>
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
                    <a class="navbar-brand" href="#">Detalles</a>
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
                                      echo CHtml::link('Indicadores de comercio', array('site/main/187'));
                                    ?>
                      </li>
                        <li >
         
                          <?php
                                      echo CHtml::link('Histórico Indicadores de Comercio', array('site/main/188'));
                                    ?>
                     
                      </li>

                        <li >
             
                            <?php
                                      echo CHtml::link('Gráfica Comercio al por Mayor', array('site/grafico/189'));
                                    ?>
                     
                      </li>

                       <li >
             
                             <?php
                                      echo CHtml::link('Gráfica Comercio al por menor', array('site/grafico/190'));
                                    ?>

                     
                      </li>


             
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              
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
<div class="col-md-12 text-center">
    <h3>Indicador mensual de comercio al por menor</h3>
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
                text: 'Año'
            },
            labels: {
                rotation: -25,
                y: 10
            },
        categories: <?php echo $text; ?>,
                    overflow: 'justify'
    },
    yAxis: {
            title: 'Porcentaje',
            tickInterval: 10,
            gridLineWidth: 1
        },
        scrollbar: {
        height: 1
      },
      
      rangeSelector: {
        selected: 1
      },

      series: [
                        {
                        name: 'Distrito Federal',
                        color: '#ffc000',
                        allowPointSelect: true,
                        data: []
                        },
                        {
                        name: 'Nacional',
                        color: '#787878',
                        allowPointSelect: true,
                        data: []
                        }
                        
                     ]
        
  }

                        $.getJSON("<?php echo $serie1; ?>", function(json) {
                                options.series[0].data = json;
                                chart = new Highcharts.Chart(options);
                        
                        
                        });

                        $.getJSON("<?php echo $serie2; ?>", function(json2) {
                                options.series[1].data = json2;
                                chart = new Highcharts.Chart(options);


                        });
          
          
            
          });
          /*
          
      chart = new Highcharts.Chart(options);    
          
        }); */  
    </script>


   <div class="option_1">
              <?php if($image_data==""){ ?>
                <style>
                    .highcharts-container{
                        overflow: visible !important;
                    }
                </style>
                <div id="valor_censal">
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