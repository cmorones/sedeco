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

print_r($rango);

$url = $baseUrl. "/index.php/api/ap7Ind3?anios=$a&grafico=0&periodo=".$periodo;
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
//print_r($datos);
//echo "</pre>";
?>
    <tr  class="rEven">
        <td rowspan="2">Concepto</td>
        <td rowspan="2">Saldo<sup>3</sup> al 31 de Dic. del año anterior</td>
        <td colspan="2"><?php echo $config['anios_fin']; ?><sup>1</sup></td>
        <td colspan="3"><?php echo $config['anios_fin']; ?><sup>2</sup></td>
        <td rowspan="2">Saldo<sup>3</sup> al corte del periodo</td>
        <td rowspan="2">Endeudamiento neto acumulado en el año</td>
    </tr>
    <tr class="rEven"> 
        
        <td>Colocación</td>
        <td>Amortización<sup>4</sup></td>
        <td>Colocación</td>
        <td>Amortización<sup>4</sup></td>
        <td>Actualizacion<sup>5</sup></td>
        
    </tr>
    <?php foreach ($datos['rubro'] as $rubro=>$dato){ ?>
    <tr class="rEven">
        
        
        <td><?php 
            switch ($rubro){
                case 1:
                    echo "Gobierno del Distrito Federal";
                    break;
                case 2:
                    echo "Sector gobierno";
                    break;
                case 3:
                    echo "Sector paraestatal no financiero";
                    break;
            }
        
        ?></td>
        <td class="data"><?php echo number_format($dato['saldo1'],2); ?></td>
        <td class="data"><?php echo number_format($dato['colocacion1'],2); ?></td>
        <td class="data"><?php echo number_format($dato['amortizacion1'],2); ?></td>
        <td class="data"><?php echo number_format($dato['colocacion2'],2); ?></td>
        <td class="data"><?php echo number_format($dato['amortizacion2'],2); ?></td>
        <td class="data"><?php echo number_format($dato['actualizacion2'],2); ?></td>
        <td class="data"><?php echo number_format($dato['saldo2'],2); ?></td>
        <td class="data"><?php echo number_format($dato['endeudamiento'],2); ?></td>
    </tr>
    <?php } ?>
   
    
        
    
    
    
    
        </table>
     <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap7Ind3?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap7Ind3?periodo='.$periodo.'&tipo=2')); ?>
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