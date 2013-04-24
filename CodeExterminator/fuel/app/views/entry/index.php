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
	        document.getElementById('inner').innerHTML = 'Logged in as, ' + response.name + '.';
	        document.getElementById('user-div').innerHTML = '<pre>Logged in as, ' + response.name + '.</pre>';
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
<br>
<div class="row-fluid">
	<div class="pull-right" style="margin-right: 18px;">
		<div onclick="document.getElementById('user-nav').style.display = '';" id="mobile-userbtn" class="btn"><i class="icon-user"></i></div>
		<p id="inner" class="pull-right" style="margin-right: -18px;"><?php echo Html::anchor('', 'Log in'); ?></p>
		<p class="pull-right btn-full" style="clear: right; margin-right: -18px;"><?php echo Html::anchor('entry/create', 'Submit a new post', array('class' => 'btn btn-success')); ?></p>
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
<p class="btn-mobile"><?php echo Html::anchor('entry/create', 'Submit a new post', array('class' => 'btn btn-success')); ?></p>
<?php else: ?>
<p>No Entries.</p>

<?php endif; ?>

<div id="user-nav" style="display: none;">
	<div id="user-div">Please log in or sign up!</div>
	<div onclick="document.getElementById('user-nav').style.display = 'none';" class="btn btn-inverse">Cancel</div>
</div>
