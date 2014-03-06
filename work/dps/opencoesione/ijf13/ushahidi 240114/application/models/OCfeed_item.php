<?php defined('SYSPATH') or die('No direct script access.');

/**
* OCFeed Items Table Model
*/

class OCFeed_Item_Model extends ORM
{
	protected $belongs_to = array('feed','location');
	
	// Database table name
	protected $table_name = 'OCfeed_item';
}
