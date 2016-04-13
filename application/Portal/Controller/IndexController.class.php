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
    	$this->display(":index");
    }

}


