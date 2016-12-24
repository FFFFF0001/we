<?php
// | Create: 2016/4/23 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

namespace Common\Model;


class ActivityModel extends CommonModel
{
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('activity_name', 'require', '活动名称不能为空', 0),

        array('start_time', 'require', '开始时间不能为空', 0),
        array('start_time','checkStime','开始时间不能比当前时间前', 0, 'callback',1),

        array('end_time', 'require', '结束时间不能为空', 0),
        array('end_time','checkStime','结束时间不能比当前时间前', 0, 'callback',1),
        array('area', 'require', '活动地点不能为空', 0),
        array('type', 'require', '活动类型不能为空', 0),

        array('charge', 'require', '具体费用不能为空', 0),

        array('introduction', 'require', '活动介绍不能为空', 0),

        array('detail', 'require', '活动详情不能为空', 0),
        array('name', '3,20', '请输入3~20字节的活动名称', 0, 'length'),
        array('area','2,50','请输入2~50字节的活动地点',0,'length'),
        array('introduction','3,150','请输入3~150字节的活动介绍',0,'length'),
        array('detail', '3,30000', '请缩短话题内容的长度', 0 , 'length'),
    );

    protected $_auto = array(
        //array(完成字段1,完成规则,[完成条件,附加规则]),
        array('start_time', 'strtotime', 1, 'function'),
        array('end_time', 'strtotime', 1, 'function'),
        array('detail','html_entity_decode',1,'function'),
        array('create_time',"time",1,'function'),
        array('user_id','getuserid',3,'callback')
    );
    protected function compareStartTime($start_time,$end_time)
    {
        if (strtotime($end_time) < strtotime($start_time)) {
            return false;
        }else{
            return true;
        }
    }
    protected function checkStime($start_time){

        if (strtotime($start_time) < time()) {
            return false;
        }else{
            return true;
        }
    }
    function getuserid(){
        return sp_get_current_userid();
    }
    function getTimer(){
        return date('Y-m-d H:i:s');
    }
}