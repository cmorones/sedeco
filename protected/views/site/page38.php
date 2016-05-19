<?php

//error_reporting(0);
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
$url = $baseUrl. "/index.php/api2/ap1Ind5b?id=$periodo&anio=$config[anios_ini]&trim=$e";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
   $id2=10;

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
                                </div>
                                <?php } ?>  
                            </div>
                           
                                   <div class="table-responsive" id="tabla_r">

            <div class="col-md-12 text-center">
              <h3><?php echo $titulos['titulo1']; ?></h3>
              <p><?php echo $titulos['titulo2']; ?></p>
              <p><?php echo $titulos['titulo3']; ?></p>

									
								
                            		<div class="table-responsive">
									  <!-- <table class="table600"> -->
						              <table class="table600 table-bordered table-condensed defaultTable">
              <tr class="cell_label"> 
                  <td colspan="5">&Iacute;ndice de actividad Industrial en el Distrito Fderal por subsector de actividad económica Distrito Federal</td>
                
               
            </tr>
            
                <tr class="cell_label"> 
               <td>Promedio trimestral</td>
               <td>Minería</td> 
               <td>Generación, transmisión y distribución de energía eléctrica, suministro de agua y de gas por ductos al consumidor final</td>
               <td>Construcción</td> 
               <td>Industrias Manufactureras</td>   
               
            </tr>
     
  


                    
  
             
<?php

foreach ($model as $indice => $valor) {
echo "<tr class=\"rEven\">
<td>Trimestre $config[anios_ini].$indice</td>
";
  if (is_array($valor)){ 
      foreach ($valor as $indice2 => $valor2) {
       // echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
         echo "
             
              <td class=\"data\">$valor2</td>
              ";
            
          
        }
    }
     echo "</tr>";
}

 ?>


            
            
                
           



                    
     </table> 
      <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind5b?periodo='.$periodo.'&tipo=1')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind5b?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
									</div>
									    		</div>
                        		<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>
                        		
                            </div>
                        </div>
                    <!-- </div>
                </div> -->


            </div>