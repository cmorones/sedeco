<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="view">

    <div class="imgWrap">
        <?php
            echo CHtml::link(
                    CHtml::image($data->getThumb(),
                            CHtml::encode($data->alt),array()),
                    $data->getUrl(),
                    array('rel'=>'colorBox','title'=>CHtml::encode($data->alt))
                    );
    	?>
    
    
    </div>
    <div class="caption">
        <?php echo CHtml::encode($data->nombre); ?>
    </div>
    <div class="imgIcons">
            <?php 
             //   echo "<span class='textIcon'>{$data->commentCount}</span>";
            ?>
    </div>

</div>