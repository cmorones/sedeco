<div id="main_content">

  <?php

   $this->renderPartial('_btnvista', array('id'=>$id, 'ind'=>$ind));     

?>
	<?php
		$baseUrl2 = YiiBase::getPathOfAlias("webroot");

		//variable
		$anio=2014;
		$baseUrl = Yii::app()->params['baserecm'];
		$url = $baseUrl. "/index.php/api/ap9Ind1?anios=2014,2013,2012,2011&grafico=0";
		//$url = $baseUrl;
		$data = file_get_contents($url);
		$model= CJSON::decode($data);
				
		$id2=186;
	?>

	     
		    <?php

			    $anio = 2014;
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
			    //print_r($datos);
			    //echo "</pre>";
		    ?>
	        <div class="row maincontentRow">
	        	<div class="col-md-12 text-center">
					<h3>Oferta de cuartos y establecimientos de hospedaje en el Distrito Federal enero a septiembre de 2011 a 2014</h3>
	        		<div class="table-responsive">
						<table class="table600 table-bordered table-condensed defaultTable table400">
				          <tr class="rEven"> 
				              <td></td>
				              <?php $rows= count($datos);?>
				              <td colspan="<?php echo $rows; ?>">Años</td>
				          </tr>
				          <tr class="rEven">
				              <td></td>
				          <?php foreach($datos as $anio=>$valor){ ?>
				          
				              <td><?php echo $anio; ?></td>
				              
				          
				          <?php } ?>
				          </tr>
				          <tr class="rEven">
				              <td>Habitaciones</td>
				          <?php foreach($datos as $anio=>$valor){ ?>
				          
				              <td class="data"><?php echo number_format($valor['habitaciones'],2); ?></td>
				              
				          
				          <?php } ?>
				          </tr>
				          <tr class="rEven">
				              <td>Porcentaje de ocupación</td>
				          <?php foreach($datos as $anio=>$valor){ ?>
				          
				              <td class="data"><?php echo number_format($valor['ocupacion'],2); ?></td>
				              
				          
				          <?php } ?>
				          </tr>
						</table>
					</div>
					<div class="table_explanation">
						<p>
						Fuente: Secretaría de Turismo del Distrito Federal
						</p>
					</div>
	    		</div>
	        </div>
	    </div>

        	
