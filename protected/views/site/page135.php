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
$url = $baseUrl. "/index.php/api/ap5Ind1?anios=$a&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
        
$id2=134;
 ?>
<div class="customContent">
<div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">EMPRESAS</h2>
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
                    
                foreach ($valor2 as $indice3 => $valor3) {
                    
                    foreach ($valor3 as $indice4 => $valor4) {

                        $datos[$indice4]= $valor4;
                    }

                }

               

            }

    }
                

}
//echo "<pre>";
//print_r($datos[10]);
//echo "</pre>";






function mes($mes){
    switch ($mes){
                    
                    case 1:
                       $mesd='Enero';
                       break;
                   case 2:
                       $mesd='Febrero';
                       break;
                   case 3:
                       $mesd='Marzo';
                       break;
                   case 4:
                       $mesd='Abril';
                       break;
                   case 5:
                       $mesd='Mayo';
                       break;
                   case 6:
                       $mesd='Junio';
                       break;
                   case 7:
                       $mesd='Julio';
                       break;
                   case 8:
                       $mesd='Agosto';
                       break;
                   case 9:
                       $mesd='Septiembre';
                       break;
                   case 10:
                       $mesd='Octubre';
                       break;
                   case 11:
                       $mesd='Noviembre';
                       break;
                   case 12:
                       $mesd='Diciembre';
                       break;
                } 
                echo $mesd;
}
 

?>
           
    <?php 
    $i=0;
    foreach ($datos as $entidad=>$rubros){
    $i++;    
    
    if($i==1){

     $cuent=count($datos[$entidad]['rubro'][1]['mes']); 
    ?>   
    <tr class="rEven">
        <td rowspan="2">Delegación</td>
        <?php foreach($datos[$entidad]['rubro'] as $rubro=>$d){ ?>
        
            <td colspan="<?php echo $cuent; ?>"><?php 
            
            if($rubro==2){ echo "Registros de solicitudes de permisos de impacto vecinal autorizados (numero)"; }
            if($rubro==1){ echo "Registros de establecimientos mercantiles de bajo impacto"; }
            ?></td>
            
        <?php } ?>
    </tr> 
    <tr class="rEven">
        
        <?php foreach ($datos[$entidad]['rubro'][1]['mes'] as $mes=>$d){ ?>
        
            <td ><?php mes($mes); ?></td>
            
        <?php } ?>
        <?php foreach ($datos[$entidad]['rubro'][2]['mes'] as $mes=>$d){ ?>
        
            <td ><?php mes($mes); ?></td>
            
        <?php } ?>
    </tr>  
    <?php } ?>
    <tr class="rEven">
        <td><?php 
        $sql1 = "SELECT nombre from delegaciones where id =".$entidad; 
        $ent = Yii::app()->db->createCommand($sql1)->queryRow();
            
        
        if($entidad!=9000){
            echo $ent['nombre'];
        }else{
            echo "Total Distrito Federal";
        }
        
        ?></td>
        <?php foreach($rubros['rubro'] as $rubro=>$meses){ ?>
        
            <?php foreach ($meses['mes'] as $mes=>$dato){ ?>
                <td class="data"><?php echo $dato['valor']; ?></td>
            <?php } ?>
                
        <?php } ?>
    </tr>
    <?php } ?>
    
    
        
   
    

                               
		
</table>
<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap5Ind1?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap5Ind1?periodo='.$periodo.'&tipo=2')); ?>
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