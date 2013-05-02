<br>
<div class="row-fluid">
	<div class="pull-right" style="margin-right: 18px;">
		<div onclick="document.getElementById('user-nav').style.display = '';" id="mobile-userbtn" class="btn"><i class="icon-user"></i></div>
		<? if (isset($_SESSION['user_id'])): ?>
			<p id="inner" class="pull-right" style="margin-right: -18px;"><?php echo Html::anchor('logout', 'Log out', array('class' => 'btn btn-inverse')); ?></p>
			<p class="pull-right btn-full" style="clear: right; margin-right: -18px;"><?php echo Html::anchor('entry/create', 'Submit a new post', array('class' => 'btn btn-success')); ?></p>
		<? else: ?>
			<p id="inner" class="pull-right" style="margin-right: -18px;"><?php echo Html::anchor('login', 'Log in', array('class' => 'btn btn-inverse')); ?></p>
		<? endif; ?>
	</div>	
	<h1 style="margin-top: 10px;">Main Board</h1>
	<p>Click on any post to view comments or edit.</p>
</div>
<?php if ($entries): ?>
<table class="table table-striped hover">
	<thead>
		<tr>
			<th>Title</th>
			<th class="entry-content">Content</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($entries as $entry): ?>
		<tr onclick="document.location = 'entry/view/<?php echo $entry->id ?>';">
			<td class="span2"><?php echo $entry->title; ?></td>
			<td class="entry-content"><?php echo $entry->content; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<? if (isset($_SESSION['user_id'])): ?>
	<p class="btn-mobile"><?php echo Html::anchor('entry/create', 'Submit a new post', array('class' => 'btn btn-success')); ?></p>
<? endif; ?>
<?php else: ?>
<p>No Entries.</p>

<?php endif; ?>

<div id="user-nav" style="display: none;">
	<? if (isset($_SESSION['user_id'])): ?>
		<p id="user-div"><?php echo Html::anchor('logout', 'Log out', array('class' => 'btn btn-inverse', 'style' => 'margin-left: 0;')); ?></p>
	<? else: ?>
		<p id="user-div"><?php echo Html::anchor('login', 'Log in', array('class' => 'btn btn-inverse', 'style' => 'margin-left: 0;')); ?></p>
	<? endif; ?>
	<div onclick="document.getElementById('user-nav').style.display = 'none';" class="btn btn-success" style="margin-left: 5.25%;">Cancel</div>
</div>
