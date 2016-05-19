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

//echo "-->".$periodo;
//años 


$url = $baseUrl. "/index.php/api2/ap1Ind1?&periodo=".$periodo;
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data); 
$id2=10;

 ?>
 <div class="container mainContainer" role="main">
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
              <!--<nav class="navbar navbar-default subindicadoresNav" role="navigation">
                <div class="container-fluid">
                  
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Subindicadores</a>
                  </div>
                    
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-3" aria-expanded="false">
                      <ul class="nav navbar-nav">

                        <li ><?php
						                  $this->widget('zii.widgets.jui.CJuiButton', array(
						                        'buttonType'=>'link',
						                        'name'=>'Grafico2',
						                        'caption'=>'Ver gráfica',
						                        'value'=>'Grafico2',
						                        'htmlOptions'=>array('class'=>'btn  btn-default btn-lg vergraficaBtn','style'=>'padding: 0px;'),


						                        'url' => array('site/grafico/'.$id.''),
						                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
						                  ));
						            ?></li>
          
                      </ul>
                    </div>
                  </div>
                </nav>-->
                        </div>
                         <?php } ?>  
                                


                              
                            </div>
   <div id="dvData">
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

                           //     echo CHtml::link(' Previo ', array('historicoPeriodos/main?id='.$id.'&graf_int=1'),array('class'=>'btn  btn-default btn-lg vergraficaBtn'));


                            }
                        ?>

      </div>

									
								
									  <!-- <table class="table600"> -->
										<table class="table600 table-bordered table-condensed defaultTable">
			        	<tr>
			        		<td class="invisible"></td>
			        		<td colspan="19" class="span_time">Valor agregado censal bruto</td>
			        	</tr>



			        	<tr class="cell_label">
			        		<td>Subsector de actividad económica</td>
			        		<td>Distrito Federal</td>
			        		<td>Azcapotzalco</td>
			        		<td>Coyoacán</td>
							<td>Cuajimalpa de Morelos</td>
							<td>Gustavo A. Madero</td>
							<td>Iztacalco</td>
							<td>Iztapalapa</td>
							<td>Magdalena Contreras</td>
							<td>Milpa Alta</td>
							<td>Álvaro Obregón</td>
							<td>Tláhuac</td>
							<td>Tlalpan</td>
							<td>Xochimilco</td>
							<td>Benito Juárez</td>
							<td>Cuauhtémoc</td>
							<td>Miguel Hidalgo</td>
							<td>Venustiano Carranza</td>
			        	</tr>


			     <?php 
                                

$totaldf =0;
$df=number_format(HistoricoPeriodos::model()->suma_valorcensal2(9,$periodo));
$azcapotzalco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(2,$periodo));
$coyoacan=number_format(HistoricoPeriodos::model()->suma_valorcensal1(3,$periodo));
$cuajimalpa=number_format(HistoricoPeriodos::model()->suma_valorcensal1(4,$periodo));
$gustavo=number_format(HistoricoPeriodos::model()->suma_valorcensal1(5,$periodo));
$iztacalco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(6,$periodo));
$iztapalapa=number_format(HistoricoPeriodos::model()->suma_valorcensal1(7,$periodo));
$magdalena=number_format(HistoricoPeriodos::model()->suma_valorcensal1(8,$periodo));
$milpaalta=number_format(HistoricoPeriodos::model()->suma_valorcensal1(9,$periodo));
$alvaro=number_format(HistoricoPeriodos::model()->suma_valorcensal1(10,$periodo));
$tlahuac=number_format(HistoricoPeriodos::model()->suma_valorcensal1(11,$periodo));
$tlalpan=number_format(HistoricoPeriodos::model()->suma_valorcensal1(12,$periodo));
$xochimilco=number_format(HistoricoPeriodos::model()->suma_valorcensal1(13,$periodo));
$benito=number_format(HistoricoPeriodos::model()->suma_valorcensal1(14,$periodo));
$cuau=number_format(HistoricoPeriodos::model()->suma_valorcensal1(15,$periodo));
$miguel=number_format(HistoricoPeriodos::model()->suma_valorcensal1(16,$periodo));
$venustiano=number_format(HistoricoPeriodos::model()->suma_valorcensal1(17,$periodo));
//$df=HistoricoPeriodos::model()->suma_valorcensal1($id,$periodo);

echo "<tr class=\"rEven\">			        		
			        		<td>Total</td>
			        		<td class=\"data\">$df</td>
			        		<td class=\"data\">$azcapotzalco</td>
			        		<td class=\"data\">$coyoacan</td>
			        		<td class=\"data\">$cuajimalpa</td>
			        		<td class=\"data\">$gustavo</td>
			        		<td class=\"data\">$iztacalco</td>
			        		<td class=\"data\">$iztapalapa</td>
			        		<td class=\"data\">$magdalena</td>
			        		<td class=\"data\">$milpaalta</td>
			        		<td class=\"data\">$alvaro</td>
			        		<td class=\"data\">$tlahuac</td>
			        		<td class=\"data\">$tlalpan</td>
			        		<td class=\"data\">$xochimilco</td>
			        		<td class=\"data\">$benito</td>
			        		<td class=\"data\">$cuau</td>
			        		<td class=\"data\">$miguel</td>
			        		<td class=\"data\">$venustiano</td>
			        	</tr>";


/*echo "<tr class=\"rEven\">                  
                  <td>Total</td>
                  <td class=\"data\">".$gran_totaldf."</td>
                  <td class=\"data\">".$gran_azcapotzalco."</td>
                  <td class=\"data\">".$gran_coyoacan."</td>
                  <td class=\"data\">".$gran_cuajimalpa."</td>
                  <td class=\"data\">".$gran_gam."</td>
                  <td class=\"data\">".$gran_iztacalco."</td>
                  <td class=\"data\">".$gran_iztapalapa."</td>
                  <td class=\"data\">".$gran_contreras."</td>
                  <td class=\"data\">".$gran_milpaalta."</td>
                  <td class=\"data\">".$gran_obregon."</td>
                  <td class=\"data\">".$gran_tlahuac."</td>
                  <td class=\"data\">".$gran_tlalpan."</td>
                  <td class=\"data\">".$gran_xochimilco."</td>
                  <td class=\"data\">".$gran_benito."</td>
                  <td class=\"data\">".$gran_cuautemoc."</td>
                  <td class=\"data\">".$gran_hidalgo."</td>
                  <td class=\"data\">".$gran_venustiano."</td>
                </tr>";*/
                // print_r($model);
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");


	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
	   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

	   				if (is_array($valor2)){ 
				   		foreach ($valor2 as $indice3 => $valor3) {
				   			//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
				   			if (is_array($valor3)){ 
						   		foreach ($valor3 as $indice4 => $valor4) {
						   			//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
						   		}
				   			}
				   		}
				   	}



		    $azcapotzalco =number_format($model[$indice][$indice2]['2'][$indice4],0);
		    $coyoacan =number_format($model[$indice][$indice2]['3'][$indice4],0);
		    $cuajimalpa =number_format($model[$indice][$indice2]['4'][$indice4],0);
		    $gam =number_format($model[$indice][$indice2]['5'][$indice4],0);
		    $iztacalco =number_format($model[$indice][$indice2]['6'][$indice4],0);
		    $iztapalapa =number_format($model[$indice][$indice2]['7'][$indice4],0);
		    $contreras =number_format($model[$indice][$indice2]['8'][$indice4],0);
		    $milpaalta =number_format($model[$indice][$indice2]['9'][$indice4],0);
		    $obregon =number_format($model[$indice][$indice2]['10'][$indice4],0);
		    $tlahuac =number_format($model[$indice][$indice2]['11'][$indice4],0);
		    $tlalpan =number_format($model[$indice][$indice2]['12'][$indice4],0);
		    $xochimilco =number_format($model[$indice][$indice2]['13'][$indice4],0);
		    $benito =number_format($model[$indice][$indice2]['14'][$indice4],0);
		    $cuautemoc =number_format($model[$indice][$indice2]['15'][$indice4],0);
		    $hidalgo =number_format($model[$indice][$indice2]['16'][$indice4],0);
		    $venustiano =number_format($model[$indice][$indice2]['17'][$indice4],0);

		    // $total = $azcapotzalco + $coyoacan + $cuajimalpa + $gam + $iztacalco + $iztapalapa + $contreras + $milpaalta + $obregon + $tlahuac + $tlalpan + $xochimilco + $benito + $cuautemoc + $hidalgo + $venustiano;
		    
		    // $totaldf = $totaldf + $total;
		    // $totaldf =number_format($total,0); 


	    





			$sql = "SELECT nombre from actividades_economicas where id=$indice2"; 
			$actividad = Yii::app()->db->createCommand($sql)->queryRow();

			$sql = "SELECT sum(valor) as suma from ap1Ind1 where actividad=$indice2 AND periodo_id=$periodo"; 
			$suma = Yii::app()->db->createCommand($sql)->queryRow();

			$totaldf =number_format($suma['suma'],0); 

			echo "<tr class=\"rEven\">			        		
				        		<td>".$actividad['nombre']."</td>
				        		<td class=\"data\">".$totaldf."</td>
				        		<td class=\"data\">".$azcapotzalco."</td>
				        		<td class=\"data\">".$coyoacan."</td>
				        		<td class=\"data\">".$cuajimalpa."</td>
				        		<td class=\"data\">".$gam."</td>
				        		<td class=\"data\">".$iztacalco."</td>
				        		<td class=\"data\">".$iztapalapa."</td>
				        		<td class=\"data\">".$contreras."</td>
				        		<td class=\"data\">".$milpaalta."</td>
				        		<td class=\"data\">".$obregon."</td>
				        		<td class=\"data\">".$tlahuac."</td>
				        		<td class=\"data\">".$tlalpan."</td>
				        		<td class=\"data\">".$xochimilco."</td>
				        		<td class=\"data\">".$benito."</td>
				        		<td class=\"data\">".$cuautemoc."</td>
				        		<td class=\"data\">".$hidalgo."</td>
				        		<td class=\"data\">".$venustiano."</td>
				        	</tr>";
		}
	}

}



?>
		
			       </table>
   </div>



  <div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap1Ind1?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap1Ind1?periodo='.$periodo.'&tipo=2')); ?>
                       </div>
   
<div class="col-md-12 text-center">
 <div class="table_explanation">
            <p><?php echo $titulos['nota1']; ?></p>
            <p><?php echo $titulos['fuente']; ?></p>
    </div>
    </div>
</div>

  
</div>
    <script>
    $(document).ready(function() {
    $("#btnExport").click(function(e) {
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('dvData');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'ap1Ind1_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
    });
});
    </script>