<?php
class Controller_Login extends Controller_Base 
{
	public function action_index()
	{
		
		$data = array();
		
		// user clicked login and POSTed back to this form...
	    if (Input::post())
	    {
	    	// if the user is "fblogin" (aka, a Facebook login)
	    	if (Input::post('username') == 'fblogin') {
	    		// load the Facebook SDK
	    		require('../fbsdk/facebook.php');
				
				// initialize it
				$fb = new Facebook(array(
					'appId' => '184227598396934',
					'secret' => '2bca41f166b2c9541ae04e7d78b64e6c'
				));
				
				// get the user ID of the currently logged in FB user, if there is one
				// if the user signed into FB using the JavaScript SDK, the JS will have attached
				// a cookie to this request, and the PHP SDK will automatically detect that cookie
				// and the user will automatically be logged in on the server as well as the client
				$fbUid = $fb->getUser();
				
				// if there was a user ID
				if ($fbUid) {
					// look up the user with this ID
					$user = Model_User::find('first', array(
						'where' => array(
							'username' => 'fbuser_' . $fbUid
						)
					));
					
					// if there was a result
					if ($user) {
						// store the user's ID in the session
						$_SESSION['user_id'] = $user->id;
						
						// and redirect to the entry page
						Response::redirect('entry');
					
					// otherwise
					} else {
						// create a new user record for the user
						$user = Model_User::forge(array(
							'username' => 'fbuser_' . $fbUid,
							'password' => ''
						));
						
						// if we're able to create the user
						if ($user && $user->save()) {
							// save the new ID in the session
							$_SESSION['user_id'] = $user->id;
							
							// and redirect to the entry page
							Response::redirect('entry');
						
						// otherwise
						} else {
							// show an error
							$data['login_error'] = 'Uh oh! We couldn\'t create a user account for you. Try again!?';
						}
					}
				
				// otherwise, show an error
				} else {
					$data['login_error'] = 'Sorry, we seem to be having some trouble communicating with Facebook.';
				}
			
			// otherwise, if the user didn't provide a password, don't even try to login
			// this is because we're going to store Facebook user accounts in the database
			// without a password, so you don't want someone to be able to enter "fbuser_1238483" as a username
			// with no password, and have it actually log them in
			} else if (!strlen(Input::post('password'))) {
				$data['login_error'] = 'Please enter your password.';
	    	} else {
		    	// look up the user
		        $user = Model_User::find('first', array(
		        	'where' => array(
		        		'username' => Input::post('username')
		        	)
		        ));
		        
		        // if the user was found
		        if ($user) {
			        // make sure the password matches
			        if ($user->password == Input::post('password')) {
			        	// save the user's ID in the session
			        	$_SESSION['user_id'] = $user->id;
			        	
			        	// and redirect to entry
			        	Response::redirect('entry');
			        } else {
			        	// add an error message to the data to be sent back to the view
			        	$data['login_error'] = 'Wrong password!';
			        }
			    } else {
			    	// create a new user record for the user
					$user = Model_User::forge(array(
						'username' => Input::post('username'),
						'password' => Input::post('password')
					));
					
					// if we're able to create the user
					if ($user && $user->save()) {
						// save the new ID in the session
						$_SESSION['user_id'] = $user->id;
						
						// and redirect to the entry page
						Response::redirect('entry');
					
					// otherwise
					} else {
						// show an error
						$data['login_error'] = 'Uh oh! We couldn\'t create a user account for you. Try again!?';
					}
			    }
			}
			
			
	    }
	    
		$this->template->title = "Log in";
		$this->template->content = View::forge('login', $data);
	}
}