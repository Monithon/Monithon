<?php defined('SYSPATH') or die('No direct script access.');

class reports_block {

	public function __construct()
	{
		$block = array(
			"classname" => "reports_block",
			"name" => "Reports",
			"description" => "List the 10 latest reports in the system"
		);

		blocks::register($block);
	}

	public function block()
	{
		$content = new View('blocks/main_reports');

		// Get Reports
		$content->incidents = ORM::factory('incident')
			->with('location')
			->where('incident_active', '1')
			->limit('15')
			->orderby('incident_date', 'desc')
			->find_all();

		echo $content;
	}
}

new reports_block;


class news_block {

	public function __construct()
	{
		$block = array(
			"classname" => "news_block",
			"name" => "Main Stream News",
			"description" => "List the 10 latest news items from available news feeds"
		);

		blocks::register($block);
	}

	public function block()
	{
		$content = new View('blocks/main_news');
		// Get RSS News Feeds
		$content->feeds = ORM::factory('feed_item')
			->with('feed')
			->limit('20')
			->orderby('item_date', 'desc')
			->find_all();

		echo $content;
	}
}

new news_block;