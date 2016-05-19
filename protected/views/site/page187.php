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
//meses
$m = HistoricoPeriodos::model()->listaSimple($config['config']);


$url = $baseUrl. "/index.php/api/ap8Ind11?anios=$a&meses=$m&grafico=0&periodo=".$periodo;
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);
		
$id2=185;
 ?>
<div class="customContent">
 <div class="row contentRow">
                                <div class="col-md-3">
                                    <h2 class="indicadorTitulo">COMERCIO</h2>
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
                    <a class="navbar-brand" href="#">Detalles</a>
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
                                      echo CHtml::link('Indicadores de comercio', array('site/main/187'));
                                    ?>
                      </li>
                        <li >
         
                          <?php
                                      echo CHtml::link('Histórico Indicadores de Comercio', array('site/main/188'));
                                    ?>
                     
                      </li>

                        <li >
             
                            <?php
                                      echo CHtml::link('Gráfica Comercio al por Mayor', array('site/grafico/189'));
                                    ?>
                     
                      </li>

                       <li >
             
                             <?php
                                      echo CHtml::link('Gráfica Comercio al por menor', array('site/grafico/190'));
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




 
//echo "<pre>";
//print_r($model['informe']);
//echo "</pre>";
?>
            
    <?php 
    $anio=$config['anios_fin'];
    $anio_ref=$anio-1; ?>
    <tr class="rEven"> 
        
        <td></td>
        <td colspan="10">Comercio al por mayor</td>
        
        
    </tr>
    <tr class="rEven"> 
        
        <td></td>
        <td colspan="2">Personal ocupado</td>
        <td colspan="2">Remuneraciones totales</td>
        <td colspan="2">Remuneraciones por persona</td>
        <td colspan="2">Ingreso por suministro de bienes y servicios</td>
        <td colspan="2">Comercio total</td>
        
    </tr>
    <tr class="rEven"> 
        
        <td></td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        
    </tr>
    
    
    <tr class="rEven"> 
        <td>DF</td>
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['p_ocupadas_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['p_ocupadas_df_ma']['total']/$datos['pormayor'][$anio_ref]['p_ocupadas_df_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['remuneraciones_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['remuneraciones_df_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_df_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['remuneraciones_pp_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['remuneraciones_pp_df_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_pp_df_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['ingreso_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['ingreso_df_ma']['total']/$datos['pormayor'][$anio_ref]['ingreso_df_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['compras_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['compras_df_ma']['total']/$datos['pormayor'][$anio_ref]['compras_df_ma']['total'])-1)*100,1); ?></td>
        <?php if($rubro=='pormayor'){$sufx="ma";}else{$sufx="me";}?>
    </tr>
    
    <tr class="rEven"> 
        
        <td>Nacional</td>
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['p_ocupadas_n_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['p_ocupadas_n_ma']['total']/$datos['pormayor'][$anio_ref]['p_ocupadas_n_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['remuneraciones_n_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['remuneraciones_n_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_n_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['remuneraciones_pp_n_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['remuneraciones_pp_n_ma']['total']/$datos['pormayor'][$anio_ref]['remuneraciones_pp_n_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['ingreso_df_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['ingreso_n_ma']['total']/$datos['pormayor'][$anio_ref]['ingreso_n_ma']['total'])-1)*100,1); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormayor'][$anio]['compras_n_ma']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormayor'][$anio]['compras_n_ma']['total']/$datos['pormayor'][$anio_ref]['compras_n_ma']['total'])-1)*100,1); ?></td>
        
    </tr>
    
    
    
    
    
    
    <tr class="rEven"> 
        
        <td></td>
        <td colspan="10">Comercio al por menor</td>
        
        
    </tr>
    <tr class="rEven"> 
        
        <td></td>
        <td colspan="2">Personal ocupado</td>
        <td colspan="2">Remuneraciones totales</td>
        <td colspan="2">Remuneraciones por persona</td>
        <td colspan="2">Ingreso por suministro de bienes y servicios</td>
        <td colspan="2">Comercio total</td>
        
    </tr>
    <tr class="rEven"> 
        
        <td></td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        <td>&Iacute;ndice</td>
        <td>Variación % anual</td>
        
    </tr>
    
    
    <tr class="rEven"> 
        <td>DF</td>
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['p_ocupadas_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['p_ocupadas_df_me']['total']/$datos['pormenor'][$anio_ref]['p_ocupadas_df_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['remuneraciones_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['remuneraciones_df_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_df_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['remuneraciones_pp_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['remuneraciones_pp_df_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_pp_df_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['ingreso_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['ingreso_df_me']['total']/$datos['pormenor'][$anio_ref]['ingreso_df_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['compras_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['compras_df_me']['total']/$datos['pormenor'][$anio_ref]['compras_df_me']['total'])-1)*100,2); ?></td>
        <?php if($rubro=='pormayor'){$sufx="ma";}else{$sufx="me";}?>
    </tr>
    
    <tr class="rEven"> 
        
        <td>Nacional</td>
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['p_ocupadas_n_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['p_ocupadas_n_me']['total']/$datos['pormenor'][$anio_ref]['p_ocupadas_n_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['remuneraciones_n_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['remuneraciones_n_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_n_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['remuneraciones_pp_n_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['remuneraciones_pp_n_me']['total']/$datos['pormenor'][$anio_ref]['remuneraciones_pp_n_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['ingreso_df_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['ingreso_n_me']['total']/$datos['pormenor'][$anio_ref]['ingreso_n_me']['total'])-1)*100,2); ?></td>
        
        <td class="data"><?php echo number_format($datos['pormenor'][$anio]['compras_n_me']['total']/3,1); ?></td>
        <td class="data"><?php echo round((($datos['pormenor'][$anio]['compras_n_me']['total']/$datos['pormenor'][$anio_ref]['compras_n_me']['total'])-1)*100,2); ?></td>
        
    </tr>
    
    
    
        
    
    
    
    
        </table>
    <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap8Ind11?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap8Ind11?periodo='.$periodo.'&tipo=2')); ?>
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