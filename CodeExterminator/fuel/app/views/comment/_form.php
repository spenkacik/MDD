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
		<div class="input">
			<?php echo Form::hidden('entry_id', Uri::segment(4), array('class' => 'span4')); ?>

		</div>
		<br>
		<div class="actions">
			<?php echo Form::submit('submit', 'Add comment', array('class' => 'btn btn-success')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>