<?php
// | Create: 2016/4/9 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

namespace Portal\Model;


use Common\Model\CommonModel;

class GroupModel extends CommonModel
{
    protected $_validate = array(
        array('group_name','require','小组名称不能为空',0),
        array('group_name','1,15','小组名称不能超过15字节',0,'length'),
        array('group_type','require','小组类型不能为空',0),
        array('group_introduce','require','小组介绍不能为空',0),
        array('group_introduce','1,240','小组介绍不能超过240字节',0,'length'),
        array('group_notice','require','小组公告不能为空',0),
        array('group_notice','1,240','小组公告不能超过240字节',0,'length'),
        array('group_tel','require','小组联系电话不能为空',0),
    );
    protected $_auto = array(
        array('group_create','getTime',3, 'callback'),
        array('user_id', 'getUserId', 3, 'callback'),
    );
    function getUserId(){
        return sp_get_current_userid();
    }
    function getTime(){
        return date("Y-m-d H:i:s");
    }
}