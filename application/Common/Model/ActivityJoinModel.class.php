<?php
// | Create: 2016/4/4 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

namespace Common\Model;


class ActivityJoinModel extends CommonModel
{
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('join_name','require','真实名称不能为空',1),
        array('join_tel','require','手机号码不能为空',1),
        array('join_tel', '/^1[3|4|5|7|8][0-9]\\d{8}$/', '手机号码不合法', 0, 'regex'),
        array('join_address','require','联系地址不能为空',1),
        array('join_qq','require','QQ不能为空',1),
        array('join_qq', '/[1-9][0-9]{4,}/', 'QQ不合法', 0, 'regex'),
        array('join_idcard','require','身份证不能为空',1),
        array('join_idcard', '/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/', '身份证格式错误', 0, 'regex')
    );
    protected $_auto = array(
        array('join_time','time',1,'function'),
        array('user_id','sp_get_current_userid',1,'function')

    );
    protected function getTime(){
        return date("Y-m-d H:i:s");
    }
}