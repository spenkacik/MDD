<?php
class Controller_Logout extends Controller_Base 
{
	public function action_index()
	{
		$_SESSION = array();
		Response::redirect('entry');
	}
}