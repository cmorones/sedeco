<?php
error_reporting(0);
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
  //echo "<pre>";
  //print_r($config);
  //  echo "</pre>";
  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}


//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);
$trim=$config['config'][0];
$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind11?anios=".$config['anios_ini']."&trimestre=$trim&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=86;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">EMPLEO</h2>
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
                                echo CHtml::link('Población Económicamente Activa y Población Ocupada en el Distrito Federal', array('site/main/87'));
                              ?>
                        </li>
                        <li >
                              <?php
                                echo CHtml::link('Población ocupada por posición en la ocupación', array('site/main/88'));
                              ?>
                        </li>

          
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



               

    
<?php 
$anio=$config['anios_ini'];
$anio_ref=$anio-1;
//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
        foreach ($valor as $indice2 => $valor2) {
            
                $datos[$indice2]= $valor2;
            
        }
                  

    }
                

}

//echo "<pre>";
//print_r($datos);
//echo "</pre>";


                         
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}
//echo "<pre>";
//print_r($datos);
//echo "</pre>";

//es la sumatoria de todos los rubros para el periodo actual



    



?>    
<table class="table600 table-bordered table-condensed defaultTable">
    <tr class="rEven">
        <td rowspan="3">Delegación</td>
        
        <?php foreach($datos[2] as $trimestre=>$valor){ ?>
        <td colspan="3">Trimestre <?php echo $trimestre; ?></td>
        <?php } ?>
    </tr>
    <tr class="rEven">
        
        
        <?php foreach($datos[2] as $trimestre=>$valor){ ?>
        <td >PEA</td>
        <td colspan="2">Población Ocupada</td>
        <?php } ?>
    </tr>
    <tr class="rEven">
        
        
        <?php foreach($datos[2] as $trimestre=>$valor){ ?>
        <td>Absoluto</td>
        <td>Absoluto</td>
        <td>% Respecto a la PEA delegacional</td>
        <?php } ?>
    </tr>
    
    <?php foreach($datos as $delegacion=>$valores){ ?>
    
    <tr class="rEven">
        <td><?php 
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        if($delegacion==9000){
            echo "Total Distrito Federal";
        }else{
            echo $nombre['nombre'];
        }
        ?></td>
        
        <?php foreach($valores as $trimestre=>$valor){ ?>
        <td class="data"><?php echo number_format($valor['pea'],0); ?></td>
        <td class="data"><?php echo number_format($valor['po'],0); ?></td>
        
        <td class="data">
            <?php echo number_format(($valor['po']/$valor['pea'])*100,1);?>%
        </td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
<p><br></p>    
<table class="table600 table-bordered table-condensed defaultTable">
    
    <tr class="rEven">
        <td rowspan="2"></td>
        <td colspan="2">Población económica activa</td>
        <td colspan="2">Población ocupada</td>
    </tr>
    <tr class="rEven">
        
        <td>Trimestre<?php echo $anio.".".$trim; ?></td>
        <td>Var. % respecto al mismo periodo de <?php echo $anio_ref; ?></td>
        
        <td>Trimestre<?php echo $anio; ?>.<?php echo $trim;?></td>
        <td>Var. % respecto al mismo periodo de <?php echo $anio_ref; ?></td>
        
    </tr>
    <?php 
    $trimestre = $trim;
    //checar si siempre son semestres********
    
    
    //*****nacionales
    //
    //pea año actual
    $pea_act_n=$model['informe2'][1][$anio][$trimestre]['pea'];
    //pea año anterior
    $pea_ant_n=$model['informe2'][1][$anio_ref][$trimestre]['pea'];
    
    //po año actual
    $po_act_n=$model['informe2'][1][$anio][$trimestre]['po'];
    //po año anterior
    $po_ant_n=$model['informe2'][1][$anio_ref][$trimestre]['po'];
    
    
    
    //*****df
    //
    //pea año actual
    $pea_act_df=$model['informe2'][2][$anio][$trimestre]['pea'];
    //pea año anterior
    $pea_ant_df=$model['informe2'][2][$anio_ref][$trimestre]['pea'];
    
    //po año actual
    $po_act_df=$model['informe2'][2][$anio][$trimestre]['po'];
    //pea año anterior
    $po_ant_df=$model['informe2'][2][$anio_ref][$trimestre]['po'];
    
    
    
    
    
    ?>
    <tr class="rEven">
        <td>Distrito Federal</td>
        <td class="data"><?php echo number_format($pea_act_df,0); ?></td>
        <td class="data"><?php echo number_format((($pea_act_df/$pea_ant_df)-1)*100,2); ?></td>
        <td class="data"><?php echo number_format($po_act_df,0); ?></td>
        <td class="data"><?php echo number_format((($po_act_df/$po_ant_df)-1)*100,2); ?></td>
    </tr>
    <tr class="rEven">
        <td>Nacional</td>
        <td class="data"><?php echo number_format($pea_act_n,0); ?></td>
        <td class="data"><?php echo number_format((($pea_act_n/$pea_ant_n)-1)*100,2); ?></td>
        <td class="data"><?php echo number_format($po_act_n,0); ?></td>
        <td class="data"><?php echo number_format((($po_act_n/$po_ant_n)-1)*100,2); ?></td>
    </tr>
    
</table>
 <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap3Ind11?periodo='.$periodo.'&tipo=1'.'&trim='. $trim),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap3Ind11?periodo='.$periodo.'&tipo=2'.'&trim='. $trim)); ?>
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