<h2>Viewing #<?php echo $comment->id; ?></h2>

<p>
	<strong>Author:</strong>
	<?php echo $comment->author; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $comment->content; ?></p>
<p>
	<strong>Entry id:</strong>
	<?php echo $comment->entry_id; ?></p>

<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
<?php echo Html::anchor('comment', 'Back'); ?>