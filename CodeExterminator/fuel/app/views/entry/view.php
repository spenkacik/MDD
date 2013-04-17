<h1>Place branding here</h1>
<h2>Viewing #<?php echo $entry->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $entry->title; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $entry->content; ?></p>
	
	<?php foreach ($entry->comments as $comment) : ?>
		<p><?= $comment['author']; ?> : <?= $comment['content']; ?></p>
	<?php endforeach; ?>
	<p><a href="<?php echo uri::base(); ?>comment/create/entry_id/<?php echo $entry->id; ?>">Add Comment</a></p>

<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit'); ?> |
<?php echo Html::anchor('entry', 'Back'); ?>