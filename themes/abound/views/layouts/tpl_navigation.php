<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">SEDECO<small> -Reportes Económicos</small></a>
          
          <div class="nav-collapse">
		<?php 

 if (!Yii::app()->user->isGuest) {


$recuperar = Yii::app()->cache->get("Menus");

//$baseUrl2 = YiiBase::getPathOfAlias("webroot");

//$menus= $baseUrl2.'/menus/menus.json';

//echo $menus;
//$datos = file_get_contents($menus);
//recuperar = json_decode($datos, true);

//echo json_encode($recuperar);
//die();*/




 $this->widget('ext.widgets.ddmenu.XDropDownMenu', array(
    'items'=>$recuperar,
));

/*} */

}else {
  $this->redirect(Yii::app()->homeUrl);
}
                ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	
         
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->