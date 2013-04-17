<?php
use Orm\Model;

class Model_Comment extends Model
{
	protected static $_properties = array(
		'id',
		'author',
		'content',
		'entry_id',
		'created_at',
		'updated_at',
	);
	
		// in a Model_Comment which belong to a post
	protected static $_belongs_to = array(
	    'post' => array(
	        'key_from' => 'entry_id',
	        'model_to' => 'Model_Entry',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('author', 'Author', 'required|max_length[255]');
		$val->add_field('content', 'Content', 'required');
/* 		$val->add_field('entry_id', 'Entry Id', 'required|valid_string[numeric]'); */

		return $val;
	}

}
