<div id="fb-root"></div>
<script>
  // handle Facebook JS framework init
  window.fbAsyncInit = function() {
    // tell the Facebook API to init with your ap ID, etc
    FB.init({
      appId      : '184227598396934', // App ID
      channelUrl : '//sams-macbook-air.local', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

  };
  
	// when the user clicks the login button…
	function login() {
		// see if they're already logged in
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				// if so, continue onto the next step…
				handleLoggedInWithFacebook();
			} else if (response.status === 'not_authorized') {
				// if "not authorizedd", I believe your app has been "denied" access
				alert('Your Facebook privacy settings may be blocking CodeExterminator from logging in.');
			} else {
				// otherwise, show the login dialog
				FB.login(function(response) {
			        if (response.authResponse) {
			        	// if the user completed logging in, continue onto the next step...
			            handleLoggedInWithFacebook();
			        } else {
			            // the user cancelled…
			            
			        }
			    });
			}
		});
	}
	
	function handleLoggedInWithFacebook() {
		document.getElementById('form_username').value = 'fblogin';
		HTMLFormElement.prototype.submit.apply(document.forms[0]);
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
<div class="span6">
	<h2>Sign Up or Log In</h2>
	
	<? if (isset($login_error)): ?>
		<div class="alert alert-error"><?= $login_error ?></div>
	<? endif; ?>
	<?php echo Form::open(); ?>
	<fieldset><br>
		<div class="clearfix">
			<?php echo Form::label('Username', 'username'); ?>

			<div class="input">
				<?php echo Form::input('username', Input::post('username'), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Password', 'password'); ?>

			<div class="password">
				<?php echo Form::password('password', '', array('class' => 'span4')); ?>

			</div>
		</div>
		<br>
		<div class="actions">
			<?php echo Form::submit ('submit', 'Log in', array('class' => 'btn btn-success')); ?>

		</div>
	</fieldset>
	<?php echo Form::close(); ?>
	<h3>or</h3><br>
	<div onclick="login();" class="btn btn-primary" style="margin-top: 10px;">Log in with Facebook</div>
</div>