<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Author', 'author'); ?>

			<div class="input">
				<?php echo Form::input('author', Input::post('author', isset($comment) ? $comment->author : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Content', 'content'); ?>

			<div class="input">
				<?php echo Form::textarea('content', Input::post('content', isset($comment) ? $comment->content : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<!--
<div class="clearfix">
			<?php echo Form::label('Entry id', 'entry_id'); ?>

			<div class="input">
				<?php echo Form::input('entry_id', Input::post('entry_id', isset($comment) ? $comment->entry_id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
-->
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>