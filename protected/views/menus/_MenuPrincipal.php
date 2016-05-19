<h3>Menú Principal</h3>
            <?php $i=0;
                    foreach ($menus_principales as $menu_principal) { $i++ ?>
                <li><?php echo CHtml::ajaxLink($menu_principal->label, CController::createUrl("/menus/editarMenu", array("id"=>$menu_principal->id)), array("update" => "#contenido_menus"), array("id"=> "E" . time() . $i)); ?></li>
            <?php } ?>
            <li><?php echo CHtml::ajaxLink('Agregar Nuevo', CController::createUrl('/menus/nuevoMenu'), array("update" => '#contenido_menus'), array("id"=> "N" . time() . $i)); ?></li>