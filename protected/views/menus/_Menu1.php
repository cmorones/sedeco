<h3>Nivel 1</h3>
<ul class="nav nav-pills nav-stacked">

<?php $i = 0 ?>
<?php foreach ($menus_nivel1 as $menu_nivel1) { ?>
    <li><?php echo CHtml::ajaxLink($menu_nivel1->label, CController::createUrl("/menus/editarMenu", array("nivel" => 1, "id" => $menu_nivel1->id, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_1'), array("id" => "E1" . time() . $i)); ?></li>
    <?php $i++;
} ?>
<li><?php echo CHtml::ajaxLink('Agregar Nuevo', CController::createUrl('/menus/nuevoMenu', array("nivel" => 1, 'parent_id'=>$parent_id)), array('update' => '#contenido_menus_1'), array("id" => "N1" . time() . $i)); ?></li>
</ul>