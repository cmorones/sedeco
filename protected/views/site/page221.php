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

  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);


$url = $baseUrl. "/index.php/api/ap1Ind82?anios=$a&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);
		
$id2=10;
 ?>
 <div class="customContent">
 <div class="row">       
<div class="col-md-3 apartado">
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
                                echo CHtml::link('Gráfica', array('site/grafico/219'));
                              ?>
                      </li>

                         <li >    
                            <?php
                                echo CHtml::link('Exportaciones de la industria manufacturera del Distrito Federal', array('site/main/221'));
                              ?>
                      </li>

                         <li >    
                          <?php
                                echo CHtml::link('Exportaciones manufactureras del DF', array('site/main/62'));
                              ?>
                      </li>


                    
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
</div>
<?php } ?>  
</div>


<!-- aqui va el contenido -->
	



<div class="table-responsive">

        <div class="col-md-12 text-center">
          <h3><?php echo $titulos['titulo1']; ?></h3>
          <p><?php echo $titulos['titulo2']; ?></p>
          <p><?php echo $titulos['titulo3']; ?></p>
        </div>
        <table class="table600600 table-bordered table-condensed defaultTable">
               



                <tr class="rEven">
                        <td>Subsector de Actividad Económica</td>


                       <td>Miles de dolares</td>
                        <td>Porcentaje respecto al total en el D.F.</td>


                </tr>

   
			     <?php 

//print_r($actividad);

//echo "<pre>";
//print_r($model);
//echo "</pre>";
foreach ($model as $indice => $valor) {
$gran_total=$valor['gran_total'];
    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        
                        $divisor=count($valor2[2]);
                        $divisor=$divisor-2;
                           // echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
                        
                        $suma_promedios+=($valor3['total']);
                        
                        
                        if($indice3>1){
                            $sql = "SELECT titulo from relaciones where indicador='ap1Ind82' and columna = $indice3 "; 
                            $rubro = Yii::app()->db->createCommand($sql)->queryRow();
                            echo"<tr class='rEven'><td class=''>".  ($rubro['titulo'])."</td><td class='data'>".number_format(($valor3['total']/$divisor),0)."</td><td  class='data'>".round(((($valor3['total']/$divisor)/$gran_total)*100),1)."%</td></tr>";
                        }

                    }

                }

            }

    }
                

}
                
echo "<tr class='rEven'><td ><b>Total<b></td><td  class='data'>".round_up($gran_total,2)."</td><td class='data'>100%</td></tr>";


?><?php 

                             
//$anio=2014;
//$anio_anterior=$anio-1;


                             
                             

        
        
foreach($model as $mod){
        
        
         
        $x=0; 
       
        //arranco el arreglo de las sumas
        $sumas=array(); 
      
        foreach($mod as $value){
        
       
        
        
            $x++;   

            //aqui le hago un push a cada sumatoria para luego poder ordenarla   
            foreach($value as $val){
                $s_actual[$x]+= $val['valor'];
            }
            array_push($sumas, $s_actual[$x]);
        }
        
        
        //aqui creo un arreglo ordenado en base a los valores
        $orden = array();
        foreach ($sumas as $key => $row)
            {
                $orden[$key] = $row;
            } 
        //aca ordeno el arreglo sumatorias y lo regreso acomodado   
        array_multisort($orden, SORT_DESC, $sumas);
       

}

//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}


?>
                               
		
			        </table>
     <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind82?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind82?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
  <div class="table_explanation">
          <p><?php echo $titulos['nota1']; ?></p>
          <p><?php echo $titulos['fuente']; ?></p>
  </div>		                
<!-- aca termina la tabla -->
     
     
    <div>
     <div align="center"></div>
     <div align="center"></div>
    </div>
</div>


</div>