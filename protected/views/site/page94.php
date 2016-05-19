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

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}

//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);


$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind2?anios=".$config['anios_ini']."&trimestres=$m&grafico=0&periodo=".$periodo;
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


//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
        foreach ($valor as $indice2 => $valor2) {
            
            
            
                $datos[$indice2]= $valor2;
            
            
        
        }
                  

    }
                

}



//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe2'] as $indice => $valor) {

    if (is_array($valor)){ 
        
       
            
            
            
                $datos2[$indice]= $valor;
            
            
        
        
                  

    }
                

}




                         
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}
//echo "<pre>";
//print_r($datos2);
//echo "</pre>";


$anio=$config['anios_ini'];
$anio_ref=$anio-1;



?>  
<table class="table600 table-bordered table-condensed defaultTable">
    
    
    <tr class="rEven">
        
        <td rowspan="2">Delegacion</td>
        <?php foreach($datos[2] as $trimestre=>$valor){ 
              
        ?>
        
            <?php foreach($valor as $rubro=>$valores){ ?>
                <td colspan="2">Trimestre <?php echo $anio.".".$trimestre; ?></td>
            <?php } ?>    
        
        <?php } ?>
    </tr>
    <tr class="rEven">
        
        
        <?php foreach($datos[2] as $trimestre=>$valor){ 
              
        ?>
        
            <?php foreach($valor as $rubro=>$valores){ ?>
                <td>Total de desocupados</td>
                <td>Tasa de desempleo</td>
            <?php } ?>    
        
        <?php } ?>
    </tr>
    
    
    <?php foreach($datos as $delegacion=>$valores){ 
    //esto es para hacer el promedio de promedios    
    $num_delegaciones = count($datos); 
    if($delegacion!=9000){
    ?>
    
    <tr class="rEven">
        <td><?php 
        $sql = "SELECT nombre from delegaciones where id =".$delegacion; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
            
        echo $nombre['nombre'];
           
       
        ?></td>
        
        <?php foreach($valores as $trimestre=>$valor){ ?>
        
            <?php 
            
            foreach($valor as $rubro=>$valores){ ?>
        
                <td class="data"><?php 
                
                
                echo number_format($valores['valor'],0); ?></td>
                <td class="data"><?php 
                
                
                $sql1 = "SELECT pea from ap3Ind11 where anio =".$anio." and trimestre = ".$trimestre. " and delegacion = ".$delegacion; 
                $pea = Yii::app()->db->createCommand($sql1)->queryRow();
                
                
                echo number_format(($valores['valor']/$pea['pea'])*100,1); ?>%</td>
            <?php } ?>    
        
        <?php } ?>
    </tr>
    <?php } } ?>
    <!-- esta solo es para poner eun espacio en blanco -->
    <tr class="rEven">
        <td class="invisible"></td>
      <?php foreach($datos[2] as $trimestre=>$valor){ ?>

        <?php foreach($valor as $rubro=>$valores){ ?>
            <td class="invisible"></td>
            <td class="invisible"></td>

        <?php } ?>    

    <?php } ?>  
    </tr>
    
    <!-- aca van los totales -->
    <tr class="rEven">
        <td>Total Distrito Federal</td>
        <?php foreach($datos[9000] as $trimestre=>$valor){ ?>

        <?php foreach($valor as $rubro=>$valores){ ?>
            <td><?php echo number_format($valores['valor'],0); ?></td>
            <td><?php 
                
                
                $sql1 = "SELECT pea from ap3Ind11 where anio =".$anio." and trimestre = ".$trimestre. " and delegacion = 9000"; 
                $pea = Yii::app()->db->createCommand($sql1)->queryRow();
                
                
                echo number_format(($valores['valor']/$pea['pea'])*100,2); ?>%</td>

        <?php } ?>    

    <?php } ?>  
    </tr>
    
   
    
    
    
    </table>
    
    <p><br></p>
    <!-- aca esta la segunda tabla -->
    <table class="table600 table-bordered table-condensed defaultTable">
        
        <tr class="rEven">
            <td rowspan="2">Total de desempleo</td>
       
            <td colspan=""><?php echo $anio; ?></td>
          
        </tr> 
        
        <tr class="rEven">
            
        <?php foreach($anios[$anio] as $trimestre=>$valores){ ?>
        
                <td >Trimestre <?php echo $trimestre; ?></td>
            
           
        <?php } ?>
        </tr>     
    <?php 
    
    //echo "<pre>";
    //print_r($datos2);
    //echo "</pre>";
    foreach($datos2 as $rubro => $anios){ ?>
    
        
        
        
        
        <tr class="rEven">
            <td><?php 
            switch ($rubro){
                case 3:
                    echo "Total Distrito Federal";
                    break;
                case 1:
                    echo "Nacional";
                    break;
                case 2:
                    echo "Nacional(Áreas más urbanizadas)";
                    break;
            }
            ?></td>
        <?php foreach($anios[$anio] as $valores){ ?>
        
            
            
        
                <td class="data"><?php echo number_format(($valores['pdes']/$valores['pea'])*100,1); ?>%</td>
            
           
           
        <?php } ?>
        </tr> 
    
    
    
    <?php } ?>
    </table>
 <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap3Ind2?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap3Ind2?periodo='.$periodo.'&tipo=2')); ?>
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