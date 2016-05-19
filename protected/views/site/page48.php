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

$url = $baseUrl. "/index.php/api/ap1Ind62?anio=$a&trim_inicio=".$config['mes_ini']."&trim_fin=".$config['mes_fin']."&grafico=0&periodo=".$periodo;
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

                        
		        
		        <div class="table-responsive">
               <div class="col-md-12 text-center">
                  <h3><?php echo $titulos['titulo1']; ?></h3>
                  <p><?php echo $titulos['titulo2']; ?></p>
                  <p><?php echo $titulos['titulo3']; ?></p>

               </div>


		        	<table class="table600600 table-bordered table-condensed defaultTable">
			        	<tr class="rEven">
                  <td>Trimestre <?php echo $config['anios_fin']; 

                   if($config['mes_ini']==1 and $config['mes_fin']==3){ echo ".1"; } 
                   if($config['mes_ini']==4 and $config['mes_fin']==6){ echo ".2"; } 
                   if($config['mes_ini']==7 and $config['mes_fin']==9){ echo ".3"; } 
                   if($config['mes_ini']==10 and $config['mes_fin']==12){ echo ".4"; } 

                  ?></td>
               
                  

                  <td>Sector público</td>
                  <td>Sector privado</td>
                  <td>Otras construcciones</td>
                  <td>Petróleo y petroquímica</td>
                  <td>Transporte y urbanización</td>
                  <td>Electricidad y comunicaciones</td>
                  <td>Agua, riego y saneamiento</td>
                  <td>Edificación</td>
			        	</tr>

   
                                        <?php $anio=$config['anios_fin']; ?>
                                        <tr class="rEven">
                                            <td>Absoluto</td>
                                            <?php for($i=1;$i<=8;$i++){ ?>
                                            <td class="data"><?php echo number_format($model['periodos'][$i][$anio]['suma'],0); ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr class="rEven">
                                            <td>
                                                % respecto al total del DF
                                            </td>    
                                            <?php for($i=1;$i<=8;$i++){ ?>
                                            <td class="data"><?php echo number_format(($model['periodos'][$i][$anio]['suma']/$model['periodos'][9][$anio]['suma'])*100,1); ?>%</td>
                                            <?php } ?>

                                        </tr>
		
			        </table>
			         <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind62?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind62?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
			        <div class="table_explanation">
                      <p><?php echo $titulos['nota1']; ?></p>
                      <p><?php echo $titulos['nota2']; ?></p>
                      <p><?php echo $titulos['nota3']; ?></p>
                      <p><?php echo $titulos['fuente']; ?></p>
              </div>
		        </div>

		        <div class="option_1">
		        	<div id="valor_censal">
		        
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