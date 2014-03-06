<?php defined('SYSPATH') or die('No direct script access.');


class blogblock {

	public function __construct()
	{
		$block = array(
			"classname" => "blogblock",
			"name" => "Blog",
			"description" => "BLOOOG"
		);

		blocks::register($block);
	}

	public function block()
	{
		$content = new View('blocks/blog');
		$content->feeds = ORM::factory('feed_item')
			->with('feed')
			->limit('20')
			->orderby('item_date', 'desc')
			->find_all();

		echo $content;
	
	}
}

new blogblock;
