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
//entidades
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

//echo $a;
$url = $baseUrl. "/index.php/api/ap1Ind71?anio=".$a."&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&entidad=0,$e&grafico=0&periodo=".$periodo;
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

 
		        
		        <div class="table-responsive">

             <div class="col-md-12 text-center">
                  <h3><?php echo $titulos['titulo1']; ?></h3>
                  <p><?php echo $titulos['titulo2']; ?></p>
                  <p><?php echo $titulos['titulo3']; ?></p>
             </div>

		        
<?php 
if($config['mes_ini']==1 and $config['mes_fin']==3){$trimestre=1;}
if($config['mes_ini']==4 and $config['mes_fin']==6){$trimestre=2;}
if($config['mes_ini']==7 and $config['mes_fin']==9){$trimestre=3;}
if($config['mes_ini']==10 and $config['mes_fin']==12){$trimestre=4;}
?>
<table class="table600 table-bordered table-condensed table400">   

<tr class="rEven">
      <td>Entidad</td>
      <td><?php echo  $config['anios_fin'].".".$trimestre; ?></td>
      <td>%respecto al nacional</td>
      <td>% variación respecto al mismo periodo del año anterior</td>
      
</tr>           
<?php

foreach ($model as $indice => $valor) {

            foreach ($valor as $indice2 => $valor2) {
                    
              $datos[$indice2]= $valor2;

            }
                

}

//echo "<pre>";
//print_r($datos);
//echo "</pre>";

?>
<?php
// print_r($datos);
foreach ($datos as $entidad => $anios) {

  if($entidad==9){
  $sql1 = "SELECT nombre from entidades where id = $entidad"; 
  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
  ?>
    <tr class="rEven">
        <td><?php echo $nombre['nombre']; ?></td>
        <td class="data"><?php echo number_format($anios[$config['anios_fin']]['total'],0); ?></td>
        <td class="data"><?php echo number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1); ?>%</td>
        <td class="data"><?php echo number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1); ?>%</td>
    </tr> 
<?php
     } 
  }

foreach ($datos as $entidad => $anios) {

  if($entidad!=0 and $entidad!=9){
  $sql1 = "SELECT nombre from entidades where id = $entidad"; 
  $nombre = Yii::app()->db->createCommand($sql1)->queryRow();
  ?>
    <tr class="rEven">
        <td><?php echo $nombre['nombre']; ?></td>
        <td class="data"><?php echo number_format($anios[$config['anios_fin']]['total'],0); ?></td>
        <td class="data"><?php echo number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1); ?>%</td>
        <td class="data"><?php echo number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1); ?>%</td>
    </tr> 
<?php
     } 
  }

foreach ($datos as $entidad => $anios) {

  if($entidad==0 ){
  //$sql1 = "SELECT nombre from entidades where id = $entidad"; 
  //$nombre = Yii::app()->db->createCommand($sql1)->queryRow();
  ?>
    <tr class="rEven">
        <td>Nacional</td>
        <td class="data"><?php echo number_format($anios[$config['anios_fin']]['total'],0); ?></td>
        <td class="data"><?php echo number_format(($anios[$config['anios_fin']]['total']/$datos[0][$config['anios_fin']][total]*100),1); ?>%</td>
        <td class="data"><?php echo number_format(((($anios[$config['anios_fin']]['total']/$datos[$entidad][$config['anios_ini']][total])-1)*100),1); ?>%</td>
    </tr> 
<?php
     } 
  }
?>




</table>
 <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind71?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind71?periodo='.$periodo.'&tipo=2')); ?>
                       </div>                              
		
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['nota2']; ?></p>
        <p><?php echo $titulos['nota3']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
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