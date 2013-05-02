<br>
<div class="row-fluid">
	<h1 class="pull-left"><?php echo $entry->title; ?></h1>
	<div class="btn-box pull-right"></div>
</div>
<br>
<p><?php echo $entry->content; ?></p>
<? if (isset($_SESSION['user_id'])): ?>
	<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit this post', array('class' => 'btn btn-inverse')); ?>
	<?php echo Html::anchor('entry/delete/'.$entry->id, 'Delete', array('onclick' => "return confirm('Are you sure?')", 'class' => 'btn btn-success')); ?>
<? endif; ?>
<hr>
<h2>Comments</h2>	
<table class="table table-striped">
	<?php foreach ($entry->comments as $comment) : ?>
		<tr>
			<td><strong class="comment-username"><?= $comment['author']; ?></strong><br><?= $comment['content']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
<? if (isset($_SESSION['user_id'])): ?>
	<?php echo Html::anchor('comment/create/entry_id/'.$entry->id, 'Add a new comment', array('class' => 'btn btn-success')); ?>
<? endif; ?>
