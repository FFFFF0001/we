<?php
// +----------------------------------------------------------------------
// | CXCL工作室 [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.CXCL工作室.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
    //首页
	public function index() {
		$optionsModel = M('options');

		//活动状态
		$status = $optionsModel->where(array('option_name' => 'activity_status'))->find();
		//活动类型
		$types = $optionsModel->where(array('option_name' => 'activity_type'))->find();
		$this->assign('status', json_decode($status['option_value']));
		$this->assign('types',  json_decode($types['option_value']));

		$this->_activityshow();
		$this->_topicshow();
		$this->member_want();

		$this->display(":index");
    }

	/**
	 * 部分活动展示
	 */
	protected function _activityshow()
	{
		$activityModel = M('activity');
		$join = C('DB_PREFIX')."organization as b ON a.user_id=b.users_id";
		$activitys = $activityModel
			->alias("a")
			->join($join)
			->order("id desc")
			->limit("12")
			->select();

		$afters = NullActivityCover($activitys);
		$this->assign('activitys', $afters);
	}

	protected function _topicshow()
	{
		$topicModel = M('topic');
		$topics = $topicModel->order("topic_id")->limit("8")->select();
		$topics = NullTopicCover($topics);
		$topics = substring($topics,'topic_content',222);

		$this->assign('topics', $topics);
	}
	/**
	 * 组员们想去的小组
	 */
	protected function member_want(){
		$groupModel = M('group');
		$wants = $groupModel->limit(30)->field('group_cover,group_name,chat_count,zan_count')->select();
		shuffle($wants);
		$slice = array_slice($wants, 0, 5);
		$slices = NullGroupCover($slice);
		$this->assign('wants', $slices);

	}

}


