<h2>Listing Entries</h2>
<br>
<?php if ($entries): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entries as $entry): ?>		<tr>

			<td><?php echo $entry->title; ?></td>
			<td><?php echo $entry->content; ?></td>
			<td>
				<?php echo Html::anchor('entry/view/'.$entry->id, 'View'); ?> |
				<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit'); ?> |
				<?php echo Html::anchor('entry/delete/'.$entry->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Entries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('entry/create', 'Add new Entry', array('class' => 'btn btn-success')); ?>

</p>
