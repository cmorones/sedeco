<h3>Nivel 2</h3>
<ul class="nav nav-pills nav-stacked">
<?php $i = 0 ?>
<?php foreach ($menus_nivel2 as $menu_nivel2) { ?>
    <li><?php echo CHtml::ajaxLink($menu_nivel2->label, CController::createUrl("/menus/editarMenu", array("nivel" => 2, "id" => $menu_nivel2->id, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_2'), array("id" => "E2" . time() . $i)); ?></li>
    <?php $i++;
} ?>
<li><?php echo CHtml::ajaxLink('Agregar Nuevo', CController::createUrl('/menus/nuevoMenu', array("nivel" => 2, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_2'), array("id" => "N2" . time() . $i)); ?></li>
</ul>