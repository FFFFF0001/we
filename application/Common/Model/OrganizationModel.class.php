<?php
// | Create: 2016/3/29 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

namespace Common\Model;

use Common\Model\CommonModel;

class OrganizationModel extends CommonModel
{
    //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $_validate =array(
        array('admin_name','require','管理人姓名不能为空',0),
        array('admin_name','1,4','管理人姓名长度在1~4之间',0,'length'),
        array('manager_name','require','组织名称不能为空',0),
        array('manager_name','1,10','组织名称长度不能超过10',0,'length'),
        array('manager_name','','组织名称已存在！',0,'unique'),
        array('org_type','require','组织分类不能为空',0),
        array('apply_reason','require','申请原因不能为空',0),
        array('apply_reason','1,100','申请原因长度不能超过100字',0,'length'),
    );
}