<h2>Main Board</h2>
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
	<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '184227598396934', // App ID
      channelUrl : '//localhost', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here
    FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // connected
    testAPI();
  } else if (response.status === 'not_authorized') {
    // not_authorized
    login();
  } else {
    // not_logged_in
    login();
  }
 });

  };
  
	  //prompt user to login if not already
  function login() {
    FB.login(function(response) {
	        if (response.authResponse) {
	            // connected
	            window.fbAsyncInit();
	        } else {
	            // cancelled
	            alert('Your Facebook privacy settings are blocking CodeExterminator from logging in.');
	        }
	    });
	}
	
	function testAPI() {
	    console.log('Welcome!  Fetching your information from Facebook.... ');
	    FB.api('/me', function(response) {
	        console.log('Good to see you, ' + response.name + '.');
	        document.getElementById('inner').innerHTML = 'Welcome, ' + response.name + '.';
	    });
	}

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>

<p id="inner"></p>
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
