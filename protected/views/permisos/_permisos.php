



<div class="row">
 
  <div class="span8">
  
  <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Privilegios del Sistema",
        ));
        
    ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <?php foreach ($menus_principales as $menu_principal) { ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?php echo $menu_principal->id; ?>">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $menu_principal->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $menu_principal->id; ?>">
          <?php echo $menu_principal->label; ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?php echo $menu_principal->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $menu_principal->id; ?>">
      <div class="panel-body">
        <div class="row">
                            <div class="col-md-12"><?php echo $menu_principal->label; ?></div>
                            <div id="permiso<?php echo $menu_principal->id?>">
                                <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_principal->id,'id_perfil'=>$id_perfil), false, false); ?>
                            </div>
                        </div>
                          <?php $menus_nivel1 = Menus::model()->findAll('nivel=1  AND parent_id= ' . $menu_principal->id . '  ORDER BY position'); ?>
                        <?php foreach ($menus_nivel1 as $menu_nivel1) {  //nivel 1?>
                            <div class="row">
                                <div class="col-md-1 "><i class="icon-chevron-right pull-right"></i></div>
                                <div class="col-md-6 "><code><?php echo $menu_nivel1->label; ?></code></div>
                                <div id="permiso<?php echo $menu_nivel1->id; ?>">
                                    <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel1->id, 'id_perfil'=>$id_perfil), false, false); ?>
                                </div>
                            </div>
                        <?php $menus_nivel2 = Menus::model()->findAll('nivel=2  AND parent_id= ' . $menu_nivel1->id . '  ORDER BY position'); ?>
                            <?php foreach ($menus_nivel2 as $menu_nivel2) { //nivel 2?>
                                <div class="row">
                                    <div class="col-md-2"><i class="icon-chevron-right pull-right"></i></div>
                                    <div class="col-md-6"><?php echo $menu_nivel2->label; ?></div>
                                    <div id="permiso<?php echo $menu_nivel2->id . $id_persona; ?>">
                                        <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel2->id, 'id_perfil'=>$id_perfil), false, false); ?>
                                    </div>
                                </div>
                        <?php $menus_nivel3 = Menus::model()->findAll('nivel=3  AND parent_id= ' . $menu_nivel2->id . '  ORDER BY position'); ?>
                            <?php foreach ($menus_nivel3 as $menu_nivel3) { //nivel 3?>
                                <div class="row">
                                    <div class="col-md-3"><i class="icon-chevron-right pull-right"></i></div>
                                    <div class="col-md-6"><?php echo $menu_nivel3->label; ?></div>
                                    <div id="permiso<?php echo $menu_nivel3->id . $id_persona; ?>">
                                        <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel3->id, 'id_perfil'=>$id_perfil), false, false); ?>
                                    </div>
                                </div>
                        <?php $menus_nivel4 = Menus::model()->findAll('nivel=4  AND parent_id= ' . $menu_nivel3->id . '  ORDER BY position'); ?>
                            <?php foreach ($menus_nivel4 as $menu_nivel4) { //nivel 4?>
                                <div class="row">
                                    <div class="col-md-4"><i class="icon-chevron-right pull-right"></i></div>
                                    <div class="col-md-6"><?php echo $menu_nivel4->label; ?></div>
                                    <div id="permiso<?php echo $menu_nivel4->id . $id_persona; ?>">
                                        <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel4->id, 'id_perfil'=>$id_perfil), false, false); ?>
                                    </div>
                                </div>
                         <?php $menus_nivel5 = Menus::model()->findAll('nivel=5  AND parent_id= ' . $menu_nivel4->id . '  ORDER BY position'); ?>
                            <?php foreach ($menus_nivel5 as $menu_nivel5) { //nivel 4?>
                                <div class="row">
                                    <div class="col-md-5"><i class="icon-chevron-right pull-right"></i></div>
                                    <div class="col-md-6"><?php echo $menu_nivel5->label; ?></div>
                                    <div id="permiso<?php echo $menu_nivel5->id . $id_persona; ?>">
                                        <?php echo $this->renderPartial('_status', array('id_menu'=>$menu_nivel5->id, 'id_perfil'=>$id_perfil), false, false); ?>
                                    </div>
                                </div>
                            
                         <?php } ?>
                            
                         <?php } ?>
                            
                         <?php } ?>

                         <?php } ?>
                        <?php } ?>
      </div>
    </div>
  </div>



   <?php } ?>
</div>





































    
    
    
    <?php $this->endWidget();?>
  </div>
</div>


