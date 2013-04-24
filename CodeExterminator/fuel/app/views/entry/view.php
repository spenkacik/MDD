<br>
<div class="row-fluid">
	<h1 class="pull-left"><?php echo $entry->title; ?></h1>
	<div class="btn-box pull-right"></div>
</div>
<br>
<p><?php echo $entry->content; ?></p>
<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit this post', array('class' => 'btn btn-success')); ?>
<hr>
<h2>Comments</h2>	
<table class="table table-striped">
	<?php foreach ($entry->comments as $comment) : ?>
		<tr>
			<td><strong class="comment-username"><?= $comment['author']; ?></strong><br><?= $comment['content']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo Html::anchor('comment/create/entry_id/'.$entry->id, 'Add a new comment', array('class' => 'btn btn-success')); ?>
