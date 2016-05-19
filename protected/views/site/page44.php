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
  //echo "->".$periodo;
  $config=HistoricoPeriodos::model()->periodo_back($periodo);

  //aca traigo titulos, notas y fuente
  $titulos=HistoricoPeriodos::model()->datosIndicador_back($periodo);

}

//echo "-->".$modelo;
//años 
$rango= range($config['anios_ini'], $config['anios_fin']);
$a = HistoricoPeriodos::model()->listaSimple($rango);

$rango_meses= range($config['mes_ini'], $config['mes_fin']);
//meses
$m = HistoricoPeriodos::model()->listaSimple($rango_meses);
$e = HistoricoPeriodos::model()->listaSimple($config['config']);

$url = $baseUrl. "/index.php/api/ap1Ind61?anio=$a&trim=$m&entidad=".$e.",0&grafico=0&periodo=".$periodo;
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
                                echo CHtml::link('Construcción', array('site/main/44'));
                              ?>
                      </li>
                      <li >       
                          <?php
                                echo CHtml::link('Construcción por tipo de obra y sector', array('site/main/48'));
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

 
            
            <div class="table-responsive" id="tabla_r">

            <div class="col-md-12 text-center">
              <h3><?php echo $titulos['titulo1']; ?></h3>
              <p><?php echo $titulos['titulo2']; ?></p>
              <p><?php echo $titulos['titulo3']; ?></p>
              
             
           <?php
                  $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
                  if($cadena<1){
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico2',
                        'caption'=>'Ver gráfica',
                        'value'=>'Grafico2',
                        'htmlOptions'=>array('class'=>'btn  btn-default btn-lg vergraficaBtn'),


                        'url' => array('site/grafico/44'),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
           }else{

                                //echo CHtml::link(' Previo ', array('historicoPeriodos/main?id='.$id.'&graf_int=1'),array('class'=>'btn  btn-default btn-lg vergraficaBtn'));


                            }
                        ?>
            </div>

              <table class="table600 table-bordered table-condensed defaultTable">
              



                <tr class="rEven">
                  <td>Entidad</td>
                  <?php 
                    if($config['mes_ini']==1 and $config['mes_fin']==3){$trimestre=".1";}
                    if($config['mes_ini']==4 and $config['mes_fin']==6){$trimestre=".2";}
                    if($config['mes_ini']==7 and $config['mes_fin']==9){$trimestre=".3";}
                    if($config['mes_ini']==10 and $config['mes_fin']==12){$trimestre=".4";}
                    ?>
                                                
                                                
                                                <td><?php echo $config['anios_ini'].$trimestre; ?></td>
                                                <td>%respecto al nacional</td>
                                                <td>% variación respecto al mismo periodo del año anterior</td>
                                                
                </tr>

   
           <?php 

                             
$anio=$config['anios_fin'];
$anio_anterior=$anio-1;



?>
    
                
    <?php 
    
    foreach($model['periodos'] as $entidad=>$anios){ 
        
        if($entidad==9){

        ?>

        <tr class="rEven">
                    <td>
                        <?php
                            $sql = "SELECT nombre from entidades where id=9"; 
                            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
                            echo $nombre['nombre'];               
                        ?>
                    </td>
                    <td class="data">
                        <?php echo number_format($model['periodos'][9][$anio]['suma'],0); ?>
                    </td>
                    <td class="data">
                        <?php echo number_format(($model['periodos'][9][$anio]['suma']/$model['periodos'][0][$anio]['suma'])*100,1); ?>%
                    </td>
                    <td class="data">
                        <?php echo number_format((($model['periodos'][9][$anio]['suma']/$model['periodos'][9][$anio_anterior]['suma'])-1)*100,1); ?>%
                    </td>
                </tr>   


        <?php

      }

    }
    foreach($model['periodos'] as $entidad=>$anios){ 

        if($entidad > 0 and $entidad!=9){    
        
        ?>  
                <tr class="rEven">
                    <td>
                        <?php
                            $sql = "SELECT nombre from entidades where id=".$entidad; 
                            $nombre = Yii::app()->db->createCommand($sql)->queryRow();
                            echo $nombre['nombre'];               
                        ?>
                    </td>
                    <td class="data">
                        <?php echo number_format($model['periodos'][$entidad][$anio]['suma'],0); ?>
                    </td>
                    <td class="data">
                        <?php echo number_format(($model['periodos'][$entidad][$anio]['suma']/$model['periodos'][0][$anio]['suma'])*100,1); ?>%
                    </td>
                    <td class="data">
                        <?php echo number_format((($model['periodos'][$entidad][$anio]['suma']/$model['periodos'][$entidad][$anio_anterior]['suma'])-1)*100,1); ?>%
                    </td>
                </tr>        
    <?php 
        }
    } 

    
    foreach($model['periodos'] as $entidad=>$anios){ 
        
        if($entidad==9){

        ?>

        <tr class="rEven">
                    <td>
                        Nacional
                    </td>
                    <td class="data">
                        <?php echo number_format($model['periodos'][0][$anio]['suma'],0); ?>
                    </td>
                    <td class="data">
                        100%
                    </td>
                    <td class="data">
                        <?php echo number_format((($model['periodos'][0][$anio]['suma']/$model['periodos'][0][$anio_anterior]['suma'])-1)*100,1); ?>%
                    </td>
                </tr>   


        <?php

      }

    }
        
        ?>
                               
    
</table>
<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind61?periodo='.$periodo.'&tipo=1'.'&anio='.$anio.'&trim='.$trim),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind61?periodo='.$periodo.'&tipo=2'.'&anio='.$anio.'&trim='.$trim)); ?>
                       </div>
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
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