
<!DOCTYPE html>
<html lang="es">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Reporte Económico de la Ciudad de México" />
        <meta name="author" content="SEDECO DF" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic' rel='stylesheet' type='text/css' />

	<?php
		$baseUrl = Yii::app()->request->baseUrl; 
		$cs = Yii::app()->getClientScript();
		//Yii::app()->clientScript->registerCoreScript('jquery');
		$cs->registerCssFile($baseUrl.'/css/bootstrap.css');
		$cs->registerCssFile($baseUrl.'/css/estilos-personalizados.css');
		
       ?>
    
    <title>Producción - Reporte Económico de la Ciudad de México.</title>
</head>


<body>
	
	 <div id="header" role="header">
            <div class="container headerContainer">
                <div class="headerContent">
                    <div class="row headercontentRow">
                        <div class="col-md-1"></div>
                        <div class="col-md-3 text-center"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logos.png" alt="Secretaría de Desarrollo Económico de la Ciudad de México"></div>
                        <div class="col-md-3 text-left coltituloHeader"><h1 class="tituloHeader">SECRETARÍA DE <br/><span>DESARROLLO <br/>ECONÓMICO</span></h1></div>
                        <div class="col-md-3 text-center"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logocdmx.png" alt="Ciudad de México"></div>
                    </div>
			<div class="navbar navbar-default customNav" role="navigation">
				<div class="container">
					<div class="navbar-header">
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					    <span class="sr-only">Menu</span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					    <span class="icon-bar"></span>
					  </button>
					  <!-- <a class="navbar-brand" href="index.html">Menu</a> -->
					</div>
				<?php

				$baseUrl2 = YiiBase::getPathOfAlias("webroot");

				$menus= $baseUrl2.'/static/menus.json';


				$datos = file_get_contents($menus);
				$recuperar = json_decode($datos, true);

					$this->widget('application.extensions.bootstrapmenu.BootsMenu', array(
					    'items' => $recuperar,
					));

				?>

				</div><!--/.container navbar-->
			</div><!-- navbar -->
		</div>
            </div>
        </div><!-- header -->
    <div id="content">
    
    <?php echo $content; ?>	

    </div><!-- content -->
	  <div id="footer" role="footer">
            <div class="container footerContainer">
                <div class="footerContent">
                    <div class="row contentRow">
                        <p class="pieGOBDF">
                            Secretaría de Desarrollo Económico.<br/>
                            Av. Cuauhtémoc 899, Col. Narvarte, C.P. 03020, México D.F. <a href="tel:5556822096">Tel. (55) 56 82 20 96</a><br> Consultas, dudas o sugerencias ponerse en contacto al email <a href="mailto:reporteeconomico@sedecodf.gob.mx">reporteeconomico@sedecodf.gob.mx</a>
                        </p>
                        <!-- <img src="./images/escudo-pie.png" alt="Escudo de la Ciudad de México" /> -->
                    </div>
                </div>
            </div>
        </div><!-- footer -->

	<?

		$cs->registerScriptFile($baseUrl.'/js/jquery-1.11.1.js');
		$cs->registerScriptFile($baseUrl.'/js/bootstrap.js');
		$cs->registerScriptFile($baseUrl.'/js/highcharts.js');
		$cs->registerScriptFile($baseUrl.'/js/highcharts.js');
        $cs->registerScriptFile($baseUrl.'/js/modules/exporting.js');

	?>
</body>
</html>

<!--<body>
	<div class="container headerContainer">
		<div class="header" role="banner">
			<div class="row headerTitle">
				<div class="col-md-3 text-center" ><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logos.png" alt="Secretaría de Desarrollo Económico de la Ciudad de México"></div>
				<div class="col-md-3 text-left" ><h1 class="colorTitulo">Secretaria de <strong>Desarrollo Económico</strong></h1></div>
				<div class="col-md-6 text-left" ><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logocdmx.png" alt="Ciudad de México"></div>
			</div>
		  <!-- <ul class="nav navbar-nav customNav">
		    <li><a href="#">Planteamiento oficial</a></li>
		    <li><a href="#">Información relevante</a></li>
		    <li><a href="#">Bibliografía comentada</a></li>
		    <li><a href="#">Síntesis del Debate</a></li>
		  </ul> 

	
			<div class="navbar navbar-default customNav" role="navigation"> -->
				
				<?php

				/*$baseUrl2 = YiiBase::getPathOfAlias("webroot");

				$menus= $baseUrl2.'/static/menus.json';

//echo $menus;
				$datos = file_get_contents($menus);
				$recuperar = json_decode($datos, true);

					$this->widget('application.extensions.bootstrapmenu.BootsMenu', array(
					    'items' => $recuperar,
					));*/

				?>
				
			<!--</div><!-- navbar -->
	<!--</div>	</div>
	</div>

	-->
<?php //echo $content; ?>
	<!--</div><footer role="footer">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 text-center">
	                <p class="pieGOBDF"><b>Secretaría de Desarrollo Económico. Av. Cuauhtémoc 899, Col. Narvarte, C.P. 03020, México D.F. <a href="tel:5556822096">Tel. (55) 56 82 20 96</a><br> Consultas, dudas o sugerencias ponerse en contacto al email <a href="mailto:salarioscdmx@sedecodf.gob.mx">salarioscdmx@sedecodf.gob.mx</a><br>Todos los derechos reservados © ® </b><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/escudo-pie.png" alt="Escudo de la Ciudad de México"/></p>
	            </div>
	            <!-- <div class="col-md-1"></div> -->
	    <!--</div>    </div>
	    </div>
	</footer>

	
</body>
</html>