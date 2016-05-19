<?php

error_reporting(0);
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
$baseUrl = Yii::app()->params['baserecm'];

///AQUI AGREGO LA CONFIGURACION SEGÚN SEA EL CASO

$cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
if($cadena<1){
  $sql = "SELECT id from historico_periodos WHERE id_ind=$id AND autorizado=1"; 
  $per = Yii::app()->db->createCommand($sql)->queryRow();
  $periodo=$per['id'];

  $config=HistoricoPeriodos::model()->periodo($id);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador($id); 

}else{
  //echo "->".$periodo;
  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}

//echo "-->".$modelo;
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$rango_meses= range($config['mes_ini'], $config['mes_fin']);
//meses
$m = HistoricoPeriodos::model()->listaSimple($rango_meses);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api2/ap1Ind5a?id=$periodo&anio=$config[anios_ini]&trim=$e";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
$id2=10;

$trim=array();


foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
                    if (is_array($valor4)){ 
                      foreach ($valor4 as $indice5 => $valor5) {
                        //echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
                        //$promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

                        //$var .= "<td class=\"data\">$promedio</td>";
                      }
                    } 
                  
                  $trim[]=$indice4;
                  
                }
              }
            }
          }
          //echo "$indice4";
        }
    }
}

$trimestres = array_unique($trim);
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
                                echo CHtml::link('Actividad Industrial por Sector', array('site/main/38'));
                              ?>
                      </li>


                    
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
                        </div>
                        <?php } ?>  
                                


                              
                            </div>
                           
                             <div class="table-responsive" id="tabla_r">

            <div class="col-md-12 text-center">
              <h3><?php echo $titulos['titulo1']; ?></h3>
              <p><?php echo $titulos['titulo2']; ?></p>
              <p><?php echo $titulos['titulo3']; ?></p>
									  <!-- <table class="table600"> -->
					<table class="table400 table-bordered table-condensed">

                   <tr class="cell_label"> 
                     <td colspan="5">Índice de actividad Industrial, <?php echo $config['mes_fin']; ?><br> promedio trimestral</td>
                      
                     
                  </tr>
                <tr class="cell_label"> 
               <td></td>

      <?php

      foreach ($trimestres as $indice => $valor) {
        echo "<td>$config[anios_ini].$valor</td> ";
}

?>        


            
                
               
            </tr>
<?php
$var ='';
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
        //echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
        echo "<tr class=\"rEven\">";
        echo "<td >$indice2</td>";
          if (is_array($valor2)){ 
            foreach ($valor2 as $indice3 => $valor3) {
              //echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
              if (is_array($valor3)){ 
                foreach ($valor3 as $indice4 => $valor4) {
                  //echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
                    if (is_array($valor4)){ 
                      foreach ($valor4 as $indice5 => $valor5) {
                        //echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
                        $promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

                        //$var .= "<td class=\"data\">$promedio</td>";
                      }
                    } 
                  //$trim[]=$indice4;
                    echo '<td class="data">'.number_format($promedio,2).'</td>';
                  
                }
              }
            }
          }


        
      

    
        echo"</tr>";
        }
    }
}

 ?>


            
            
                
           



                    
    
              </table>
                 <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind5a?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind5a?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
									</div>
									   <div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['nota2']; ?></p>
        <p><?php echo $titulos['nota3']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->


            </div>