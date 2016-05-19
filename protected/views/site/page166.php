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


$url = $baseUrl. "/index.php/api/ap7Ind11?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=165;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">FINANZAS</h2>
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
                                      echo CHtml::link('Ingresos Totales del Gobierno<br> del Distrito Federal', array('site/main/166'));
                                    ?>
                      </li>  
                      <li >

                            <?php
                                      echo CHtml::link('Gráfica <br>Ingresos Locales', array('site/grafico/169'));
                                    ?>
                      </li>

                      <li >
            
                            <?php
                                      echo CHtml::link('Gráfica <br>Ingresos Tributarios', array('site/grafico/172'));
                                    ?>
                     
                      </li>

                         <li >
           
                            <?php
                                      echo CHtml::link('Gráfica Ingresos por Impuestos<br> por Servicios de Hospedaje', array('site/grafico/175'));
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

$anio = $config['anios_fin'];
$anio_ant=$anio-1;
$trim_inicio=1;
$trim_fin=5;

                             
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}

//print_r($actividad);

foreach ($model as $indice => $valor) {

    if (is_array($valor)){ 
            foreach ($valor as $indice2 => $valor2) {
                    

                
                        $datos[$indice2]= $valor2;
                      
                   

               

            }

    }
                

}




$anio=$config['anios_fin'];
$anio_ref=$anio-1;
$maximo = count($anio);
 
//echo "<pre>";
//print_r($datos[$anio]['rubro']);
//echo "</pre>";
?>
   
    <tr class="rEven"> 
        <td>Concepto</td>
        <td>Estimado</td>
        <td>Registrado</td>
    </tr>
    
        <?php foreach($datos[$anio]['rubro'] as $rubro=>$datos){ ?>
        <tr class="rEven"> 
            <?php  
                $sql1 = "SELECT titulo from relaciones where indicador = 'ap7Ind11' and columna=".$rubro; 
                $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
                
                echo "<td>".$nombre['titulo']."</td>"; 
                echo "<td class='data'>".number_format($datos['estimado'],2)."</td><td class='data'>".number_format($datos['registrado'],2)."</td>";
                   
            ?>
            
            
        </tr>
        <?php } ?>
        
        
        
    
        </table>
    <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap7Ind11?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap7Ind11?periodo='.$periodo.'&tipo=2')); ?>
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
