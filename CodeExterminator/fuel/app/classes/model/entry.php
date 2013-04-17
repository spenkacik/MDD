<?php
use Orm\Model;

class Model_Entry extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'content',
		'created_at',
		'updated_at',
	);
	
		// in a Model_Post which has many comments
	protected static $_has_many = array(
	    'comments' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Comment',
	        'key_to' => 'entry_id',
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
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('content', 'Content', 'required');

		return $val;
	}

}
