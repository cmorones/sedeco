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

 $url = $baseUrl. "/index.php/api2/ap1Ind4c?periodo=$periodo&anioini=$config[anios_ini]&aniofin=$config[anios_fin]";
$data2 = file_get_contents($url);
$model= CJSON::decode($data2);
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

       echo CHtml::link('Gráfica ITAEE por entidad federativa', array('site/main/34'));

            ?>
                     
                      </li>


                        <li >
       <?php

         echo CHtml::link('ITAEE por Sector', array('site/main/28'));

             
            ?>
                     
                      </li>

                      
                        <li >
    <?php

     echo CHtml::link('Historico ITAEE, IGAE y PIB', array('site/main/31'));

               ?>
                     
                      </li>
    
                   



             
          
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
          
                        </div>
                        <?php } ?>  
                                


                              
                            </div>


</p>
		        

            
          
             <div class="table-responsive">
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


                                    'url' => array('site/grafico/'.$id.''),
                                    //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                              ));

                            }else{

                             //   echo CHtml::link(' Previo ', array('historicoPeriodos/main?id='.$id.'&graf_int=1'),array('class'=>'btn  btn-default btn-lg vergraficaBtn'));


                            }
                        ?>
     </div>        
<table class="table table-bordered table-condensed table400">
                <tr class="cell_label"> 
               <td colspan="5">Periodo</td>
               <td>PIB</td> 
               <td>IGAE<sup>1</sup></td> 
               <td>ITTAEE D.F.<sup>2</sup></td> 
            </tr>
            


<?php

if(is_array($model)){
  foreach ($model as $indice => $valor) {
  //echo ("El indice1 $indice tiene el valor: $valor<br>");
    if(is_array($valor)){
      foreach ($valor as $indice2 => $valor2) {
      //echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
        if(is_array($valor2)){
          foreach ($valor2 as $indice3 => $valor3) {
          //echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

          echo "<tr class=\"rEven\">";
          echo "<td colspan=\"4\" rowspan=\"4\">$indice3</td>";
        
        
            if(is_array($valor3)){
              foreach ($valor3 as $indice4 => $valor4) {
              //echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
                  if(is_array($valor4)){
                    $contador=0;
                    foreach ($valor4 as $indice5 => $valor5) {
                    //echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

                    
                    switch ($indice5) {
                      case '1':
                        echo "<td colspan=\"1\">I</td>";
                      break;
                    
                      case '2':
                        echo "<tr class=\"rEven\"><td>II</td>";
                      break;
                    
                      case '3':
                        echo "<tr class=\"rEven\"><td>III</td>";
                      break;
                    
                      case '4':
                        echo "<tr class=\"rEven\"><td>IV</td>";

                      break;
                    }
                    
                    
                    



                        if(is_array($valor5)){
                          
                            foreach ($valor5 as $indice6 => $valor6) {

                              //echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
                                switch ($indice5) {
                                      case '1':
                                          echo "<td class=\"data\">".number_format($valor6,2)."</td>";
                                      break;
                                    
                                      case '2':
                                        echo "<td class=\"data\">".number_format($valor6,2)."</td>";
                                      break;
                                    
                                      case '3':
                                        echo "<td class=\"data\">".number_format($valor6,2)."</td>";
                                      break;
                                    
                                      case '4':
                                        echo "<td class=\"data\">".number_format($valor6,2)."</td>";

                                      break;
                                    }
                                            
                          //echo " <td class=\"data\">$valor6</td>";
                            }
                        }
  
                    $contador++;
                    }
                  }
              }
            }
            echo " </tr>";

          }
        }

      }
    }
  }
}




?>

</table>
   <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind4c?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind4c?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
              
           <div class="table_explanation">
            <p><?php echo $titulos['nota1']; ?></p>
            <p><?php echo $titulos['fuente']; ?></p>  
              </div>
            </div>

          

		    
</div>