<?php
class Controller_Comment extends Controller_Template 
{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Comment');

		if ( ! $data['comment'] = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('Comment');
		}

		$this->template->title = "Comment";
		$this->template->content = View::forge('comment/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');
			
			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'author' => Input::post('author'),
					'content' => Input::post('content'),
					'entry_id' => Uri::segment(4),
				));

				if ($comment and $comment->save())
				{
					Session::set_flash('success', 'Added comment #'.$comment->id.'.');

					Response::redirect('entry/view/'.$comment->entry_id);
				}

				else
				{
					Session::set_flash('error', 'Could not save comment.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Comment');

		if ( ! $comment = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('Comment');
		}

		$val = Model_Comment::validate('edit');

		if ($val->run())
		{
			$comment->author = Input::post('author');
			$comment->content = Input::post('content');
			$comment->entry_id = Input::post('entry_id');

			if ($comment->save())
			{
				Session::set_flash('success', 'Updated comment #' . $id);

				Response::redirect('comment');
			}

			else
			{
				Session::set_flash('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->author = $val->validated('author');
				$comment->content = $val->validated('content');
				$comment->entry_id = $val->validated('entry_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Comment');

		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', 'Deleted comment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('comment');

	}


}