<?php
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


$url = $baseUrl. "/index.php/api/ap1Ind72?anio=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);
		
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
                                echo CHtml::link('Industria manufacturera', array('site/main/51'));
                              ?>
                      </li>
                      <li>
                         <?php
                                echo CHtml::link('Industria manufacturera por actividad económica', array('site/main/55'));
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

		        
		        
		        
		        <div class="table-responsive">
                            
                            <div class="col-md-12 text-center">
                                    <h3><?php echo $titulos['titulo1']; ?></h3>
                                    <p><?php echo $titulos['titulo2']; ?></p>
                                    <p><?php echo $titulos['titulo3']; ?></p>
                             </div>
                            
    
		        	<table class="table600 table-bordered table-condensed defaultTable">
                                    

   
			     <?php 

                             
$anio=$config['anios_ini'];
$anio_anterior=$config['anios_ini'];
$trim_inicio=$config['mes_ini'];
$trim_fin=$config['mes_fin']+1;


function meses($mes){
  switch ($mes) {
    case 1:
      $m="Enero";
      break;
    case 2:
      $m="Febrero";
      break;
    case 3:
      $m="Marzo";
      break;
    case 4:
      $m="Abril";
      break;
    case 5:
      $m="Mayo";
      break;
    case 6:
      $m="Junio";
      break;
    case 7:
      $m="Julio";
      break;
    case 8:
      $m="Agosto";
      break;
    case 9:
      $m="Septiembre";
      break;
    case 10:
      $m="Octubre";
      break;
    case 11:
      $m="Noviembre";
      break;
    case 12:
      $m="Diciembre";
      break;
 
  }

  return $m;
}

?>
<tr class="rEven">
        <td rowspan="2" >Subsector</td>
        <td colspan="2" class="span_time">Total de <?php 
        $mini=meses($config['mes_ini']);
        $mfin=meses($config['mes_fin']);
        echo $mini." a ".$mfin." de ".$config['anios_fin']; ?></td>
</tr>
<tr class="rEven">
                                                           
        <td>absolutos<?php //echo $mini."-".$mfin." ".$config['anios_fin']; ?></td>
        <td>%</td>
          
</tr>

<?php

 // $sql = "SELECT * from relaciones where indicador='ap1Ind72' ORDER BY orden ASC"; 
	// $actividad = Yii::app()->db->createCommand($sql)->queryAll();
        //print_r($actividad);
// print_r($model);
        
foreach($model as $mod){
        
        //aca calculo el total del df con la sumatoria de la primera columna y los agrego a una variable
        for($t=$trim_inicio;$t<=$trim_fin;$t++){
               
                $total_df += $mod[1][$anio][$t]['valor'];
                $total_df_pasado += $mod[1][$anio_anterior][$t]['valor'];
                
        }
         
        $x=0; 
       
        //arranco el arreglo de las sumas
        $sumas=array(); 
      
        foreach($mod as $key=>$value){
            
            $x++;   

            //aqui le hago un push a cada sumatoria para luego poder ordenarla   
            for($i=$trim_inicio;$i<=$trim_fin;$i++){
                $s_actual[$x]+= $value[$anio][$i]['valor'];
            }
            array_push($sumas, $s_actual[$x]);
        }


        //aqui creo un arreglo ordenado en base a los valores
        // $orden = array();
        // foreach ($sumas as $key => $row)
        //     {
        //         $orden[$key] = $row;
        //     } 
        // //aca ordeno el arreglo sumatorias y lo regreso acomodado   
        // array_multisort($orden, SORT_DESC, $sumas);
        // //echo "<pre>";
        // print_r($sumas);
        //echo "</pre>";

        //aca despliego el arreglo para la tabla y le agrego el rubo o el estado    
        foreach($sumas as $key => $row){
            if($key>0){
            $sql = "SELECT titulo from relaciones where indicador='ap1Ind72' and columna=$key+1"; 
            $actividad = Yii::app()->db->createCommand($sql)->queryAll();
            //print_r($actividad);
            echo "<tr class='rEven'><td >".$actividad[0]['titulo']."</td><td class='data'>".round_up($row,1)."</td>";

            //operacion de totales
            $operacion1[$o] = ($row/$total_df)*100;

            echo "<td class='data'>".round($operacion1[$o], 1)."%</td><tr>";

        }



   }

           
           
       echo "<tr class='rEven'><td >Total industria manufacturera</td><td  class='data'>".round_up($total_df,2)."</td><td class='data'>".round((($total_df/$total_df))*100 , 2)."</td></tr>";
           
}

//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}


?>
                               
		
			        </table>
<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind72?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind72?periodo='.$periodo.'&tipo=2')); ?>
                       </div>   			        
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
