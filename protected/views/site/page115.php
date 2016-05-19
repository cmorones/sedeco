<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

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

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap4Ind12?anios=".$config['anios_ini']."&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=113;
 ?>
<div class="customContent">
<div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">SALARIOS E INGRESOS</h2>
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

                        
                      <!--<li >
        
                          <?php
                                echo CHtml::link('Ingreso promedio por hora trabajada de la PO', array('site/main/114'));
                              ?>
                          
                      </li>-->

                      <li >
        
                          <?php
                                echo CHtml::link('Ingreso promedio por hora trabajada de la población ocupada', array('site/main/115'));
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

<!-- aqui va el contenido -->

<?php  $anio=$config['anios_ini']; ?>


<div class="table-responsive">
        <div class="col-md-12 text-center">
            <h3><?php echo $titulos['titulo1']; ?></h3>
            <p><?php echo $titulos['titulo2']; ?></p>
            <p><?php echo $titulos['titulo3']; ?></p>
         
        </div>
        


               

   
<?php 

//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos[$indice]= $valor;
                  

    }
                

}

//aqui paso el arreglo para la segunda serie de datos
foreach ($model['informe2'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos2[$indice]= $valor;
                  

    }
                

}

//aqui paso el arreglo para la segunda serie de datos
foreach ($model['informe3'] as $indice => $valor) {

    if (is_array($valor)){ 
            
        $datos3[$indice]= $valor;
                  

    }
                

}


                         
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}
//echo "<pre>";
//print_r($datos3);
//echo "</pre>";

//es la sumatoria de todos los rubros para el periodo actual

$anio=$config['anios_ini'];
$anio_ref=$anio-1;
$tim_actual=$config['config'][0];
    

foreach ($model['informe'] as $trimestre=>$d){
    
if( $trimestre ==$tim_actual){ 
    
?>  <table class="table600 table-bordered table-condensed defaultTable">
    <tr class="rEven">
        <td rowspan="3">Promedio según posición en la ocupación Trimestre <?php echo $trimestre; ?></td>
        <td colspan="3">Distrito Federal</td>
        <td rowspan="3">% de variacion del total respecto al Trimestre <?php echo $trimestre. " de ".$anio_ref; ?></td>
        <td colspan="6">Nacional</td>
        <td colspan="2" rowspan="2">% de variacion del total respecto al Trimestre <?php echo $trimestre. " de ".$anio_ref; ?></td>
    </tr>   
    <tr class="rEven">
        <td rowspan="2">Total</td>
        <td rowspan="2">Hombres</td>
        <td rowspan="2">Mujeres</td>
        
        <td rowspan="2">Total</td>
        <td rowspan="2">Áreas más urbanizadas</td>
        
        <td colspan="2">Hombres</td>
        <td colspan="2">Mujeres</td>
    </tr>
    <tr class="rEven">
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
        
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
        
        <td>Total</td>
        <td>Áreas más urbanizadas</td>
    </tr>
    <?php 
    
    foreach ($datos[$trimestre][$anio]['rubro'] as $rubro=>$dato){ 
        
    ?>
    <tr class="rEven">
        
        <td><?php 
        
        //esta info sale del primer arreglo del json, y trae los rubros para desplegar, y los tres valores para df
        $sql = "SELECT titulo from relaciones where indicador = 'ap4Ind12' and columna =".$rubro; 
        $rubro1 = Yii::app()->db->createCommand($sql)->queryRow();
            
        echo utf8_encode($rubro1['titulo']); ?></td>
        
        
        <td class="data"><?php echo number_format($dato['columna'][1]['valor'],2); ?></td>
        <td class="data"><?php echo number_format($dato['columna'][2]['valor'],2); ?></td>
        <td class="data"><?php echo number_format($dato['columna'][3]['valor'],2); ?></td>
       
        
        <td class="data"><?php echo number_format((($dato['suma']/$datos[$tim_actual][$anio_ref]['rubro'][$rubro]['suma'])-1)*100,2); ?></td>
        
        <?php 




        //este es el segundo arreglo del json y contiene en orden los datos para nacionales, se dividen en apartados para nacional, hombre y mujeres
        ?>
        
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2); ?></td>
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2); ?></td>
        
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2); ?></td>
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2); ?></td>
        
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'],2); ?></td>
        <td class="data"><?php echo number_format($datos2[$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'],2); ?></td>
        
        <?php
        
        //operacion final pata la columan totales
        $trimestref=$config['config'][0];
        $sumatoria_totales[$trimestre] = $datos3[1][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[2][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[3][$trimestre][$anio]['rubro'][$rubro]['columna'][1]['valor'];
        $sumatoria_totales_pasado[$trimestre] = $datos3[1][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[2][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'] + $datos3[3][$trimestre][$anio_ref]['rubro'][$rubro]['columna'][1]['valor'];
        
        $total_n[$trimestre]=(($sumatoria_totales[$trimestre]/$sumatoria_totales_pasado[$trimestre])-1)*100;
        
        
        //operacion final para la columna urbanizadas
        
        $sumatoria_ur[$trimestre] = $datos3[1][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[2][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[3][$trimestre][$anio]['rubro'][$rubro]['columna'][2]['valor'];
        $sumatoria_ur_pasado[$trimestre] = $datos3[1][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[2][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'] + $datos3[3][$trimestref][$anio_ref]['rubro'][$rubro]['columna'][2]['valor'];
        
        
        $urbanizadas_n[$trimestre]=(($sumatoria_ur[$trimestre]/$sumatoria_ur_pasado[$trimestre])-1)*100;
        
        ?>
        <td class="data"><?php echo number_format($total_n[$trimestre],2); ?></td>
        <td class="data"><?php echo number_format($urbanizadas_n[$trimestre],2); ?></td>
        
        
        
        
    </tr>
    <?php } ?>
   
</table>
    
		
<?php }
}
 
?>     
     <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap4Ind12?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap4Ind12?periodo='.$periodo.'&tipo=2')); ?>
                       </div>      
    <div class="table_explanation">
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