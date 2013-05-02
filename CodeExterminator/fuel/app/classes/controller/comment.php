<?php
class Controller_Comment extends Controller_Base 
{

	public function action_index()
	{
		if (!isset($_SESSION['user_id']))
			return Response::redirect('login');
		
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/index', $data);

	}

	public function action_view($id = null)
	{
		if (!isset($_SESSION['user_id']))
			return Response::redirect('login');
		
		is_null($id) and Response::redirect('Comment');

		if ( ! $data['comment'] = Model_Comment::find($id))
		{
			console.log('error', 'Could not find comment #'.$id);
			Response::redirect('Comment');
		}

		$this->template->title = "Comment";
		$this->template->content = View::forge('comment/view', $data);

	}

	public function action_create()
	{
		if (!isset($_SESSION['user_id']))
			return Response::redirect('login');
		
		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');
			
			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'author' => Input::post('author'),
					'content' => Input::post('content'),
					'entry_id' => Input::post('entry_id'),
				));

				if ($comment and $comment->save())
				{
					Response::redirect('entry/view/'.$comment->entry_id);
				}

				else
				{
					console.log('error', 'Could not save comment.');
				}
			}
			else
			{
				console.log('error', $val->error());
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/create');

	}

	public function action_edit($id = null)
	{
		if (!isset($_SESSION['user_id']))
			return Response::redirect('login');
	
		is_null($id) and Response::redirect('Comment');

		if ( ! $comment = Model_Comment::find($id))
		{
			console.log('error', 'Could not find comment #'.$id);
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
				console.log('success', 'Updated comment #' . $id);

				Response::redirect('comment');
			}

			else
			{
				console.log('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->author = $val->validated('author');
				$comment->content = $val->validated('content');
				$comment->entry_id = $val->validated('entry_id');

				console.log('error', $val->error());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/edit');

	}

	public function action_delete($id = null)
	{
		if (!isset($_SESSION['user_id']))
			return Response::redirect('login');
	
		is_null($id) and Response::redirect('Comment');

		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			console.log('success', 'Deleted comment #'.$id);
		}

		else
		{
			console.log('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('comment');

	}


}