<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");
set_time_limit ( 100000 );
error_reporting(0);
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
//meses
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$anio_re=$config['anios_fin']-1;
$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api/ap3Ind31?anios=".$config['anios_fin']."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&entidades=$e,9000&grafico=0&periodo=".$periodo;
// $url = $baseUrl;
$data = file_get_contents($url);
//     {"informe":{"2014":{"5":{"suma":3250831,"promedio":650166.2,"resta":21127},"9":{"suma":14614067,"promedio":2922813.4,"resta":66688},"14":{"suma":7049333,"promedio":1409866.6,"resta":24061},"15":{"suma":6661658,"promedio":1332331.6,"resta":24205},"19":{"suma":6626316,"promedio":1325263.2,"resta":36224},"21":{"suma":2507096,"promedio":501419.2,"resta":9539},"30":{"suma":3760862,"promedio":752172.4,"resta":-6743},"9000":{"suma":83723551,"promedio":16744710.2,"resta":360159}},"2015":{"5":{"suma":3429820,"promedio":685964,"resta":21270},"9":{"suma":15306391,"promedio":3061278.2,"resta":59510},"14":{"suma":7433776,"promedio":1486755.2,"resta":33250},"15":{"suma":6910124,"promedio":1382024.8,"resta":33094},"19":{"suma":6957945,"promedio":1391589,"resta":44711},"21":{"suma":2630406,"promedio":526081.2,"resta":12484},"30":{"suma":3765700,"promedio":753140,"resta":-8672},"9000":{"suma":87469806,"promedio":17493961.2,"resta":356273}}}}

// $data='{"informe":{"2013":{"5":{"suma":7668995,"promedio":639082.916667,"resta":638529},"9":{"suma":34306259,"promedio":2858854.91667,"resta":2893950},"14":{"suma":16589261,"promedio":1382438.41667,"resta":1397248},"15":{"suma":15964871,"promedio":1330405.91667,"resta":1320271},"19":{"suma":15583699,"promedio":1298641.58333,"resta":1302508},"21":{"suma":5928163,"promedio":494013.583333,"resta":495433},"30":{"suma":8907967,"promedio":742330.583333,"resta":750232},"9000":{"suma":196911622,"promedio":16409301.8333,"resta":16525061}},"2014":{"5":{"suma":7952349,"promedio":662695.75,"resta":33051},"9":{"suma":35736939,"promedio":2978078.25,"resta":136267},"14":{"suma":17192678,"promedio":1432723.16667,"resta":66092},"15":{"suma":16212668,"promedio":1351055.66667,"resta":36997},"19":{"suma":16168393,"promedio":1347366.08333,"resta":57864},"21":{"suma":6097595,"promedio":508132.916667,"resta":21781},"30":{"suma":8956523,"promedio":746376.916667,"resta":2876},"9000":{"suma":203888683,"promedio":16990723.5833,"resta":714526}}}}';
$model= CJSON::decode($data);
//echo "<pre>";
//print_r($model); 
//echo "</pre>";	
$id2=86;

if($cadena<1){
  //front
   $data = file_get_contents($url);
  // $data='{"informe":{"2013":{"5":{"suma":7668995,"promedio":639082.916667,"resta":638529},"9":{"suma":34306259,"promedio":2858854.91667,"resta":2893950},"14":{"suma":16589261,"promedio":1382438.41667,"resta":1397248},"15":{"suma":15964871,"promedio":1330405.91667,"resta":1320271},"19":{"suma":15583699,"promedio":1298641.58333,"resta":1302508},"21":{"suma":5928163,"promedio":494013.583333,"resta":495433},"30":{"suma":8907967,"promedio":742330.583333,"resta":750232},"9000":{"suma":196911622,"promedio":16409301.8333,"resta":16525061}},"2014":{"5":{"suma":7952349,"promedio":662695.75,"resta":33051},"9":{"suma":35736939,"promedio":2978078.25,"resta":136267},"14":{"suma":17192678,"promedio":1432723.16667,"resta":66092},"15":{"suma":16212668,"promedio":1351055.66667,"resta":36997},"19":{"suma":16168393,"promedio":1347366.08333,"resta":57864},"21":{"suma":6097595,"promedio":508132.916667,"resta":21781},"30":{"suma":8956523,"promedio":746376.916667,"resta":2876},"9000":{"suma":203888683,"promedio":16990723.5833,"resta":714526}}}}';
  $model= CJSON::decode($data);
}else{
  //back
  //echo $url;
  $data = file_get_contents($url);
  //$data='{"informe":{"2013":{"5":{"suma":7668995,"promedio":639082.916667,"resta":638529},"9":{"suma":34306259,"promedio":2858854.91667,"resta":2893950},"14":{"suma":16589261,"promedio":1382438.41667,"resta":1397248},"15":{"suma":15964871,"promedio":1330405.91667,"resta":1320271},"19":{"suma":15583699,"promedio":1298641.58333,"resta":1302508},"21":{"suma":5928163,"promedio":494013.583333,"resta":495433},"30":{"suma":8907967,"promedio":742330.583333,"resta":750232},"9000":{"suma":196911622,"promedio":16409301.8333,"resta":16525061}},"2014":{"5":{"suma":7952349,"promedio":662695.75,"resta":33051},"9":{"suma":35736939,"promedio":2978078.25,"resta":136267},"14":{"suma":17192678,"promedio":1432723.16667,"resta":66092},"15":{"suma":16212668,"promedio":1351055.66667,"resta":36997},"19":{"suma":16168393,"promedio":1347366.08333,"resta":57864},"21":{"suma":6097595,"promedio":508132.916667,"resta":21781},"30":{"suma":8956523,"promedio":746376.916667,"resta":2876},"9000":{"suma":203888683,"promedio":16990723.5833,"resta":714526}}}}';
  $model= CJSON::decode($data);

}



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
                      <li>
                              <?php
                                echo CHtml::link('Trabajadores asegurados<br> en el IMSS', array('site/main/97'));
                              ?>
                      </li>
                        <li >
        
                          <?php
                                echo CHtml::link('Gráfica Variación <br>porcentual anual', array('site/grafico/98'));
                              ?>
                          
                      </li>


                        <li >
        
                        <?php
                                echo CHtml::link('Gráfica porcentajes de<br> nuevos empleos formales', array('site/grafico/99'));
                              ?>
                      </li>

                      
                        <li >
       
                        <?php
                                echo CHtml::link('Gráfica Generación de<br> empleo formal', array('site/grafico/100'));
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
                    
                                        
                 
                </div>

        
                

<?php 






//aqui paso el arreglo para la primera serie de datos
foreach ($model['informe'] as $indice => $valor) {

    if (is_array($valor)){ 
        
       
            
            
            
                $datos[$indice]= $valor;
            
            
        
        
                  

    }
                

}
;

function meses($mes){
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

                         
//Esta es la funcion para redondear las cifras con criterios especificos
function round_up ($value, $places=0) {
  if ($places < 0) { $places = 0; }
  $mult = pow(10, $places);
  return number_format(ceil($value * $mult) / $mult);
}
//echo "<p style=''diaplay:none>";
//print_r($datos);
//echo "</p>"; 


$anio=$config['anios_fin'];
$anio_ref=$anio-1;



?>  
<table class="table600 table-bordered table-condensed defaultTable">
    <tr class="rEven">
        <td>Entidad</td>
        <td>Trabajadores asegurados en el IMSS</td>
        <td>Variación anual respecto al mismo periodo del <?php echo $anio_ref; ?> (%)</td>
        <td>% de registros respecto al nacional</td>
    </tr>
    <?php foreach($datos[$anio] as $entidad=>$valores){  ?>
    <tr class="rEven">
        
        <?php 

         
        if($entidad==9000){
            echo "<td>Nacional</td>";
        }else{
            
            $sql = "SELECT nombre from entidades where id =".$entidad; 
            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
             echo "<td>".$nombre['nombre']."</td>";
        }
        ?>           
        
        <td class="data"><?php echo number_format($valores['promedio'],0); ?></td>
          <td class="data"><?php echo number_format((($valores['promedio']/$datos[$anio_ref][$entidad]['promedio'])-1)*100,2)?></td>
          <td class="data"><?php echo number_format(($valores['promedio']/$datos[$anio][9000]['promedio'])*100,2); ?></td>
        
        <?php if($cadena<1){
          //front
          ?>
          
        <?php
        }else{
          //back


        }

        ?>
    </tr> 
    
    
    
    <?php } ?>
</table>
    <div class="table_explanation">
       <p><?php echo $titulos['fuente']; ?></p>
    </div>    
  

    <div class="col-md-12 text-center">
      <h3><?php echo $titulos['titulo3']; ?></h3>
     
    </div>


<table class="table600 table-bordered table-condensed defaultTable">
    <tr class="rEven">
        <td>Entidad</td>
        <td>Registro de nuevos empleos</td>
        <td>% de registros respecto al nacional</td>
        
    </tr>
    <?php foreach($datos[$anio] as $entidad=>$valores){  ?>
    <tr class="rEven">
        
        <?php 

         
        if($entidad==9000){
            echo "<td>Nacional</td>";
        }else{
            
            $sql = "SELECT nombre from entidades where id =".$entidad; 
            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
             echo "<td>".$nombre['nombre']."</td>";
        }
        ?>           
        
        
        <td class="data"><?php echo number_format($valores['resta'],0); ?></td>
        <td class="data"><?php echo number_format(($valores['resta']/$datos[$anio][9000]['resta'])*100,1); ?></td>
        
    </tr> 
    
    
    
    <?php } ?>
    </table>   

     <!-- <div align="right">
      <a href="<?php echo Yii::app()->request->baseUrl; ?>/pdf/Indicador-trabajadores-IMSS.pdf" download><img src="/images/pdf.png" alt=""></a>
      <a href="<?php echo Yii::app()->request->baseUrl; ?>/pdf/Indicador-trabajadores-IMSS.xls" download><img src="/images/excel.png" alt=""></a>                       
     </div> -->


     <div align="right">
      <?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap3Ind31?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
      <?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap3Ind31?periodo='.$periodo.'&tipo=2')); ?>
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