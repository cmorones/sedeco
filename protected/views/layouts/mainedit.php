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
        error_reporting(0);
		$baseUrl = Yii::app()->request->baseUrl; 
		$cs = Yii::app()->getClientScript();
		//Yii::app()->clientScript->registerCoreScript('jquery');
		$cs->registerCssFile($baseUrl.'/css/bootstrap.css');
        $cs->registerCssFile($baseUrl.'/css/jquery.smartmenus.bootstrap.css');
		$cs->registerCssFile($baseUrl.'/css/estilos-personalizados.css');
        $cs->registerCssFile($baseUrl.'/css/infografias.css');
		
       ?>
        <title>Producción - Reporte Económico de la Ciudad de México.</title>
        <style type="text/css">

        .ui-button-text-only .ui-button-text {
            padding: .4em 1em;
            font-size: 14px;
            padding-top: 10px;
            padding-bottom: 12px;
        }
        
        body {
  background-color: #ffffff;
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 16px;
  color: #494949;
}
        
        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
         
          ga('create', 'UA-49373400-9', 'auto');
          ga('send', 'pageview');
         
        </script> 
        
    </head>
    <body>
 <div class="row headercontentRow">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-left collogosHeader"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logos.png" alt="Secretaría de Desarrollo Económico de la Ciudad de México" /></div>
                        <div class="col-md-3 text-left coltituloHeader"><h1 class="tituloHeader">SECRETARÍA DE <br/><span>DESARROLLO <br/>ECONÓMICO</span></h1></div>
                        <div class="col-md-5 text-center colcdmxHeader"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/logocdmx.png" alt="Ciudad de México" /></div>
                        <div class="col-md-1"></div>
                    </div>
         <!-- Static navbar -->
<div class="navbar navbar-default customNav" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Administración-RECM</a>
  </div>
 
 <?php


                // $recuperar = Yii::app()->cache->get("Menus");
        $perfil = Yii::app()->user->perfil;

                // $recuperar = Yii::app()->cache->get("Menus");
        $baseUrl2 = YiiBase::getPathOfAlias("webroot");

        $menus= $baseUrl2.'/static/menuf'.$perfil.'.json';


        $datos = file_get_contents($menus);
        $recuperar = json_decode($datos, true);
                 
                 


                    $this->widget('application.extensions.menuadmin.BootsMenu', array(
                        'items' => $recuperar,
                    ));

                ?>



   
  </div><!--/.nav-collapse -->
   <div align="right"><h4><small><?php echo $nombre=Usuarios::model()->getPerfil(Yii::app()->user->perfil);?>:<?php echo Yii::app()->user->nombre;?></small></h4></div>
  

</div>
        <div id="content">
           <?php echo $content; ?>	
        </div><!-- content -->
        <div id="footer" role="footer">
            <div class="container footerContainer">
                <div class="footerContent">
                    <div class="row contentRow">
                        <p class="pieGOBDF">
                            Secretaría de Desarrollo Económico.<br/>
                            Av. Cuauhtémoc 899, Col. Narvarte, C.P. 03020, México D.F. <a href="tel:5556822096">Tel. (55) 56 82 20 96</a><br> Consultas, dudas o sugerencias ponerse en contacto al email: <a href="mailto:info.economica@sedecodf.gob.mx">info.economica@sedecodf.gob.mx</a>
                        </p>
                        <!-- <img src="./images/escudo-pie.png" alt="Escudo de la Ciudad de México" /> -->
                    </div>
                </div>
            </div>
        </div><!-- footer -->

     
        	<?php

		//$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.min.js');
        //$cs->registerScriptFile($baseUrl.'/js/jspdf/jquery-1.7.1.min.js');
        $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery.smartmenus.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery.smartmenus.bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/highcharts.js');
		$cs->registerScriptFile($baseUrl.'/js/modules/exporting.js');
      
        

   
   ;
  ?>
        

	?>
    <script>
        
            function pdf() {
                 var pdf = new jsPDF()

                // source can be HTML-formatted string, or a reference
                // to an actual DOM element from which the text will be scraped.
                , source = $('.customContent')[0] 

                // we support special element handlers. Register them with jQuery-style
                // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
                // There is no support for any other type of selectors
                // (class, of compound) at this time.
                , specialElementHandlers = {
                    // element with id of "bypass" - jQuery style selector
                    '#bypassme': function(element, renderer){
                        // true = "handled elsewhere, bypass text extraction"
                        return true
                    }
                }

                margins = {
                    top: 20,
                    bottom: 20,
                    left: 20,
                    width: 400
                  };
                  // all coords and widths are in jsPDF instance's declared units
                  // 'inches' in this case
                pdf.fromHTML(
                    source // HTML string or DOM elem ref.
                    , margins.left // x coord
                    , margins.top // y coord
                    , {
                        'width': margins.width // max width of content on PDF
                        , 'elementHandlers': specialElementHandlers
                    },
                    function (dispose) {
                        pdf.save('Test.pdf');
                      },
                    margins
                  )
            }
       
    </script>
    
    <a href="javascript:pdf()" >PDF</a>
    </body>
</html>


    