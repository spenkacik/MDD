<?php
class Controller_Entry extends Controller_Template 
{

	public function action_index()
	{
		$data['entries'] = Model_Entry::find('all');
		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Entry');

		if ( ! $data['entry'] = Model_Entry::find($id))
		{
			Session::set_flash('error', 'Could not find entry #'.$id);
			Response::redirect('Entry');
		}
				
		//Grab all gradepoints related to this rubric
		$data['comments'] = Model_Entry::find('all', array('related' => array('comments')));
		
		$this->template->title = "Entry";
		$this->template->content = View::forge('entry/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Entry::validate('create');
			
			if ($val->run())
			{
				$entry = Model_Entry::forge(array(
					'title' => Input::post('title'),
					'content' => Input::post('content'),
				));

				if ($entry and $entry->save())
				{
					Response::redirect('entry');
				}

				else
				{
					Session::set_flash('error', 'Could not save entry.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Entry');

		if ( ! $entry = Model_Entry::find($id))
		{
			Session::set_flash('error', 'Could not find entry #'.$id);
			Response::redirect('Entry');
		}

		$val = Model_Entry::validate('edit');

		if ($val->run())
		{
			$entry->title = Input::post('title');
			$entry->content = Input::post('content');

			if ($entry->save())
			{
				Session::set_flash('success', 'Updated entry #' . $id);

				Response::redirect('entry');
			}

			else
			{
				Session::set_flash('error', 'Could not update entry #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$entry->title = $val->validated('title');
				$entry->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('entry', $entry, false);
		}

		$this->template->title = "Entries";
		$this->template->content = View::forge('entry/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Entry');

		if ($entry = Model_Entry::find($id))
		{
			$entry->delete();

			Session::set_flash('success', 'Deleted entry #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete entry #'.$id);
		}

		Response::redirect('entry');

	}


}