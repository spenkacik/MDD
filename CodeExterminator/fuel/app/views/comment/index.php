<h2>Comments</h2>
<br>
<?php if ($comments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Author</th>
			<th>Content</th>
			<th>Entry id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $comment): ?>		<tr>

			<td><?php echo $comment->author; ?></td>
			<td><?php echo $comment->content; ?></td>
			<td><?php echo $comment->entry_id; ?></td>
			<td>
				<?php echo Html::anchor('comment/view/'.$comment->id, 'View'); ?> |
				<?php echo Html::anchor('comment/edit/'.$comment->id, 'Edit'); ?> |
				<?php echo Html::anchor('comment/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('comment/create', 'Add new Comment', array('class' => 'btn btn-success')); ?>

</p>
