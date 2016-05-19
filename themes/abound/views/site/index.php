<div class="row-fluid">
  <div class="span6">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
      'title'=>"CJuiAccordion",
    ));
    
  ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
      'panel 1'=>$sample_text,
      'panel 2'=>$sample_text,
      'panel 3'=>$sample_text,
      'panel 4'=>$sample_text,
      // panel 5 contains the content rendered by a partial view
      //'panel 5'=>$this->renderPartial('_partial',null,true),
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
      'animated'=>'bounceslide',
    ),
  ));
  ?>
    <?php $this->endWidget();?>
  </div>
  <div class="span6">
  
  <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
      'title'=>"HTML accordion",
    ));
    
  ?>
    <div class="accordion" id="accordion2">
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            Collapsible Group Item #1
          </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
          <div class="accordion-inner">
            <?php echo $sample_text;?>
          </div>
        </div>
      </div>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
            Collapsible Group Item #2
          </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
          <div class="accordion-inner">
            <?php echo $sample_text;?>
          </div>
        </div>
      </div>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
            Collapsible Group Item #3
          </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse">
          <div class="accordion-inner">
            <?php echo $sample_text;?>
          </div>
        </div>
      </div>
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
            Collapsible Group Item #4
          </a>
        </div>
        <div id="collapseFour" class="accordion-body collapse">
          <div class="accordion-inner">
            <?php echo $sample_text;?>
          </div>
        </div>
      </div>
    </div>
    
    
    <?php $this->endWidget();?>
  </div>
</div>