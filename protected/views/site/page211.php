	<?php
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
        
        
        //años 
        $rango= range($config['anios_ini'], $config['anios_fin']);
        $a = HistoricoPeriodos::model()->listaSimple($rango);
        //meses
        $m = HistoricoPeriodos::model()->listaSimple($config['config']);

		$anio=$config['anios_fin'];
		$baseUrl = Yii::app()->params['baserecm'];
		$url = $baseUrl. "/index.php/api/ap9Ind2?anios=$a&meses=$m,13&grafico=0&periodo=".$periodo;
		//$url = $baseUrl;
		$data = file_get_contents($url);
		$model= CJSON::decode($data);
			
		$id2=186;
	?>
	<div class="container mainContainer" role="main">
	    <div class="customContent">
	        <div class="row contentRow">
	            <div class="col-md-3">
	                <h2 class="indicadorTitulo">TURISMO</h2>
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
	        <div class="row maincontentRow">
	        	<div class="col-md-12 text-center">
					<h3><?php echo $titulos['titulo1']; ?></h3>
					<p><?php echo $titulos['titulo2']; ?></p>
                    <p><?php echo $titulos['titulo3']; ?></p>


					<?php
	                    $cadena=stripos($_SERVER['REQUEST_URI'], 'historicoPeriodos');
	                    if($cadena<1){

							$this->widget('zii.widgets.jui.CJuiButton', array(
							'buttonType'=>'link',
							'name'=>'Grafico1',
							'caption'=>'Ver gráfica',
							'value'=>'Grafico1',
							'htmlOptions'=>array('class'=>'btn small btn-default btn-lg vergraficaBtn','style'=>'padding: 0px;'),


							'url' => array('site/grafico/211'),
							//'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
							));

						}else{

                                //echo CHtml::link(' Previo ', array('historicoPeriodos/main?id='.$id.'&graf_int=1'),array('class'=>'btn  btn-default btn-lg vergraficaBtn'));


                        }
                        ?>

	        		<div class="table-responsive">
						<?php
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
							//print_r($datos[1]);
							//echo "</pre>";
						?>
						<table class="table table-bordered table-condensed defaultTable table400">
						<tr class="rEven">
						<td rowspan="2">Mes</td>
						  <?php foreach($datos[1]['anio'] as $anio=>$dat){  ?>
						      <td colspan="2"><?php echo $anio;?></td>
						  <?php } ?>  
						</tr>
						<tr class="rEven">
						<?php foreach($datos[1]['anio'] as $anio=>$dat){  ?>
						    <td>Nacionales</td>
						    <td>Internacionales</td>

						<?php } ?>
						</tr>
						<?php foreach($datos as $mes=>$dato){ ?>
						<tr class="rEven"> 
						  <?php if($mes!=13){ ?>
						    <td>
						      <?php
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
						           case 13:
						               $mesd='Total';
						               break;
						        } 
						        echo $mesd;
						        ?>
						      </td>
						      <?php
						      foreach($dato['anio'] as $anio=>$dat){
						        $sumadf[$anio]+=$dat['rubro'][1]['valor'];
						        $sumanal[$anio]+=$dat['rubro'][2]['valor'];
						      ?>
						        <td class="data"><?php echo number_format($dat['rubro'][1]['valor'],0); ?></td>
						        <td class="data"><?php echo number_format($dat['rubro'][2]['valor'],0); ?></td>
						      <?php } ?>
						  </tr>
						  <?php } 
						  }?>
						  <tr class="rEven">
						    <td rowspan="2">Total</td>
						      <?php foreach($datos[1]['anio'] as $anio=>$dat){ 
						          ?>
						          <td><?php echo number_format($sumadf[$anio],0); ?></td>
						          <td><?php echo number_format($sumanal[$anio],0); ?></td>
						      <?php } ?>
						  </tr>
						  <tr class="rEven">
						    <?php foreach($datos[1]['anio'] as $anio=>$dat) { ?>
						        <td colspan="2"><?php echo number_format($sumadf[$anio]+$sumanal[$anio],0); ?></td>
						    <?php } ?>
						  </tr>
						</table>
						<div align="right"><?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png'),array('apipdf/ap9Ind2?periodo='.$periodo.'&tipo=1'),array('target'=>'_blank')); ?>
<?   echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/excel.png'),array('apipdf/ap9Ind2?periodo='.$periodo.'&tipo=2')); ?>
                       </div> 
						<div class="table_explanation">
							<p><?php echo $titulos['nota1']; ?></p>
                                                        <p><?php echo $titulos['nota2']; ?></p>
                                                        <p><?php echo $titulos['nota3']; ?></p>
							<p><?php echo $titulos['fuente']; ?></p>
						</div>
					</div>
	    		</div>
	        </div>
	    </div>
	</div>