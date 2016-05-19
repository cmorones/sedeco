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


$url = $baseUrl. "/index.php/api/ap1Ind10?anios=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
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

        <table class="table600 table-bordered table-condensed defaultTable">
                



               

   
<?php 

$anio = $config['anios_fin'];
$anio_ant=$anio-1;


                             
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

//print_r($actividad);

//echo "<pre>";
//print_r($model);
//echo "</pre>";
foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                if (is_array($valor2)){ 
                    foreach ($valor2 as $indice3 => $valor3) {
                        $datos[$indice3]= $valor3;
                      
                    }

                }

            }

    }
                

}



?>
   <tr class="rEven"> 
            <td>Mes</td>
            <td>Doméstico</td>
            <td>Variación porcentual anual</td>
            <td>Doméstico alto consumo</td>
            <td>Variación porcentual anual</td>
            <td>General hasta 25 kw de demanda</td>
            <td>Variación porcentual anual</td>
            <td>General para más de 25 kw de demanda</td>
            <td>Variación porcentual anual</td>
            <td>Media tensión</td>
            <td>Variación porcentual anual</td>
            <td>Total*</td>
            <td>Variación porcentual anual</td>
    </tr>
   
    <tr>
        <?php 
        
        foreach($datos as $mes=>$val ){
            

            switch ($mes) {
              case 1:
                $mesd="Enero";
                break;
              case 2:
                $mesd="Febrero";
                break;
              case 3:
                $mesd="Marzo";
                break;
              case 4:
                $mesd="Abril";
                break;
              case 5:
                $mesd="Mayo";
                break;
              case 6:
                $mesd="Junio";
                break;
              case 7:
                $mesd="Julio";
                break;
              case 8:
                $mesd="Agosto";
                break;
              case 9:
                $mesd="Septiembre";
                break;
              case 10:
                $mesd="Octubre";
                break;
              case 11:
                $mesd="Noviembre";
                break;
              case 12:
                $mesd="Diciembre";
                break;

              
             
            }
            
            //****** $i es el mes que se va a consultar
            echo "<tr class='rEven'><td>".$mesd."</td>";
            //****** al valor de cada columna se le suma 1
           //echo $anio_ant;
            foreach($val[$anio] as $rubro=>$valor){
                                

                echo "<td class='data'>".number_format($datos[$mes][$anio][$rubro]['valor'],0)."</td><td class='data'>".number_format((($datos[$mes][$anio][$rubro]['valor']/$datos[$mes][$anio_ant][$rubro]['valor'])-1)*100, 1) ."%</td>";
            }
            echo "</tr>";
        }
        
        
        
        ?>
   
    </tr>    
        
   
    

                               
</table>
 <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind10?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind10?periodo='.$periodo.'&tipo=2')); ?>
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

		       
</div>