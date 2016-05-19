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

$url = $baseUrl. "/index.php/api2/ap1Ind3?periodo=$periodo&tipo=1";
//$url = $baseUrl; ap1Ind4c?id=23&anioini=2010&aniofin=2014&trim=1,2
//echo $url;
//die();


$data = file_get_contents($url);
$model= CJSON::decode($data);


$url2 = $baseUrl. "/index.php/api2/ap1Ind3?periodo=$periodo&tipo=2";
//$url = $baseUrl; ap1Ind4c?id=23&anioini=2010&aniofin=2014&trim=1,2
//echo $url;
//die();


$data2 = file_get_contents($url2);
$model2= CJSON::decode($data2);
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
              
         
            </div>
<table class="table600 table-bordered table-condensed defaultTable">
          <tr class="cell_label">
			        		<td></td>
			        		<td>PIB a precios constantes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar <?php //echo $config['anios_fin']; ?> Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población <?php //echo $config['anios_fin']; ?> CONAPO</td>	
			        		<td>PIB per cápita a precios constantes (pesos)</td>	
			        		<td>PIB per cápita a precios constantes (dólares)</td>
			        	</tr>


		<?php

if(is_array($model)){
	foreach ($model as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

			echo "	<tr class=\"rEven\">
			        		<td>$indice2</td>
			        	
			        	";

				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					$fin =number_format($valor3,1);
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					echo "<td class=\"data\">$fin</td>";

					}
				}
				echo "</tr>";
			}
		}
	}
}

	?>		        	
			        
			      
			        	
			        	<tr class="cell_label">
			        		<td></td>
			        		<td>PIB a precios corrientes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar <?php //echo $config['anios_fin']; ?> Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población <?php //echo $config['anios_fin']; ?> CONAPO</td>	
			        		<td>PIB per cápita a precios corrientes (pesos)</td>	
			        		<td>PIB per cápita a precios corrientes (dólares)</td>
			        	</tr>
			        		
			      		<?php

if(is_array($model2)){
	foreach ($model2 as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

			echo "	<tr class=\"rEven\">
			        		<td>$indice2</td>
			        	
			        	";

				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					$fin =number_format($valor3,1);
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
					echo "<td class=\"data\">$fin</td>";

					}
				}
				echo "</tr>";
			}
		}
	}
}

	?>		        	

			        	




</table>
<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind3?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind3?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
<div class="table_explanation">
        <p><?php echo $titulos['nota1']; ?></p>
        <p><?php echo $titulos['nota2']; ?></p>
        <p><?php echo $titulos['nota3']; ?></p>
        <p><?php echo $titulos['fuente']; ?></p>
</div>           
              
            
            
     
       

	
</div>