<?php
$present = QueEs::model()->findbyPk(1);

?>  


<div class="container mainContainer" role="main">
                        <div class="customContent">
                            <div class="row contentRow">
                                <div class="col-md-9">
                                    <h2 class="indicadorTitulo"><?php echo $present->titulo?></h2>

                                   
                                </div>
                               
                                


                          </div>
                            <div class="row maincontentRow">
                              <div class="col-md-10 text-justify">
	

<?php echo $present->detalle?>



</div>
                           </div>
                              <div class="col-md-2"></div>
                            </div>
                        </div>
                    <!-- </div>
                </div> -->
            </div>
<div class="container mainContainer" role="main">
<div class="homeContent">
<div class="row maincontentRow">
<div class="col-md-2 text-justify">
</div>

</div>
</div>
</div>