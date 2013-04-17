<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Title', 'title'); ?>

			<div class="input">
				<?php echo Form::input('title', Input::post('title', isset($entry) ? $entry->title : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Content', 'content'); ?>

			<div class="input">
				<?php echo Form::textarea('content', Input::post('content', isset($entry) ? $entry->content : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>