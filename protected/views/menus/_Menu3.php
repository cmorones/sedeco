<h3>Nivel 3</h3>
<ul class="nav nav-pills nav-stacked">
<?php $i = 0 ?>
<?php foreach ($menus_nivel3 as $menu_nivel3) { ?>
    <li><?php echo CHtml::ajaxLink($menu_nivel3->label, CController::createUrl("/menus/editarMenu", array("nivel" => 3, "id" => $menu_nivel3->id, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_3'), array("id" => "E3" . time() . $i)); ?></li>
    <?php $i++;
} ?>
<li><?php echo CHtml::ajaxLink('Agregar Nuevo', CController::createUrl('/menus/nuevoMenu', array("nivel" => 3, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_3'), array("id" => "N3" . time() . $i)); ?></li>
</ul>