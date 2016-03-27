<?php

/**
 * 会员注册登录
 */
namespace User\Controller;
use Common\Controller\HomebaseController;
class IndexController extends HomebaseController {
    //登录
	public function index() {
		$id=I("get.id");//获取url的id参数
		
		$users_model=M("Users");//实例化Users表
		
                    //在User表中查找id字段==id参数的记录 find是一条 文档搜find
		$user=$users_model->where(array("id"=>$id))->find();
		
		if(empty($user)){
			$this->error("查无此人！");//输出错误信息 跳到error的模板中
		}
		$this->assign($user);//输出到模板中
		$this->display(":index");

    }
    
    function is_login(){
    	if(sp_is_user_login()){ //公有函数 查thinkcmf文档
    		$this->ajaxReturn(array("status"=>1,"user"=>sp_get_current_user()));
                    //ajax返回 查thinkphp文档
    	}else{
    		$this->ajaxReturn(array("status"=>0,"info"=>"此用户未登录！"));
    	}
    }

    //退出
    public function logout(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
    	session("user",null);//只有前台用户退出
    	redirect(__ROOT__."/");
    }
	
	public function logout2(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
		if(isset($_SESSION["user"])){
		$referer=$_SERVER["HTTP_REFERER"];
			session("user",null);//只有前台用户退出
			$_SESSION['login_http_referer']=$referer;
			$this->success("退出成功！",__ROOT__."/");
		}else{
			redirect(__ROOT__."/");
		}
    }

}
