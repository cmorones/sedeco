<div class="row">

		<?php error_reporting(0); ?>
		<?php echo $form->labelEx($model,'config'); ?>
		<?php echo $form->textArea($model,'config',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'config'); ?>
	</div>