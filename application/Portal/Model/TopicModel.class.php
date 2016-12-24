<?php
// | Create: 2016/4/6 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

namespace Portal\Model;


use Common\Model\CommonModel;

class TopicModel extends CommonModel
{
    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('group_id', 'require', '参数错误，非法操作', 0),
        array('user_id', 'require', '参数错误，非法操作', 0),
        array('topic_title', 'require', '话题标题不能为空', 0),
        array('topic_title','','话题名称已存在',0,'unique',1),
        array('topic_content', 'require', '话题内容不能为空', 0),
        array('topic_title', '3,40', '请输入3~40字节的标题', 0, 'length'),
        array('topic_content', '3,40000', '请输入3~40000字节的内容,请缩短话题内容的长度', 0 , 'length'),
    );

    protected $_auto = array(
        //array(完成字段1,完成规则,[完成条件,附加规则]),
        array('topic_content','html_entity_decode',3,'function'),
        array('topic_create',"getTimer",3,'callback'),
    );

    function getTimer(){
        return date('Y-m-d H:i:s');
    }
}