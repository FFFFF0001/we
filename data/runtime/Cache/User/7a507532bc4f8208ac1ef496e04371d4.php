<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<title><?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
		<meta name="author" content="ThinkCMF">
		<?php  function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
<meta name="author" content="ThinkCMF">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">

<!-- No Baidu Siteapp-->
<meta http-equiv="Cache-Control" content="no-siteapp" />

<!-- HTML5 shim for IE8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
<link rel="icon" href="/2016Sise/themes/simplebootx/Public/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/2016Sise/themes/simplebootx/Public/images/favicon.ico" type="image/x-icon">
<!-- <link href="/2016Sise/themes/simplebootx/Public/simpleboot/themes/simplebootx/theme.min.css" rel="stylesheet"> -->
<!-- <link href="/2016Sise/themes/simplebootx/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
<link href="/2016Sise/themes/simplebootx/Public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="Public/simpleboot/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
	<link rel="stylesheet" href="/2016Sise/themes/simplebootx/Public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<!-- <link href="/2016Sise/themes/simplebootx/Public/css/style.css" rel="stylesheet"> -->
<link href="/2016Sise/themes/simplebootx/Public/css/common.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/login.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/header.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/register.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/step.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/forgot_password.css" rel="stylesheet">
<style>
	/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
	
	#backtotop {
		position: fixed;
		bottom: 50px;
		right: 20px;
		display: none;
		cursor: pointer;
		font-size: 50px;
		z-index: 9999;
	}
	
	#backtotop:hover {
		color: #333
	}
	
	#main-menu-user li.user {
		display: none
	}
	
	* {
		margin: 0;
		padding: 0;
		font-family: "微软雅黑";
	}
</style>
	</head>

	<body class="body-white">
		<?php echo hook('body_start');?>
<div class="">
	<!--<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="/2016Sise/"><img src="/2016Sise/themes/simplebootx/Public/images/logo.png" /></a>
			<div class="nav-collapse collapse" id="main-menu">
				<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>

					<ul class="nav pull-right" id="main-menu-user">
			<li class="dropdown user login">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	            <img src="/2016Sise/themes/simplebootx//Public/images/headicon.png" class="headicon"/>
	            <span class="user-nicename"></span><b class="caret"></b></a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo U('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
	            </ul>
          	</li>
          	<li class="dropdown user offline">
	            <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
	           		<img src="/2016Sise/themes/simplebootx//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu pull-right">
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
	               <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
	               <li><a href="<?php echo U('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
	               <li class="divider"></li>
	               <li><a href="<?php echo U('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
	            </ul>
          	</li>
		</ul>
		<div class="pull-right">
        	<form method="post" class="form-inline" action="<?php echo U('portal/search/index');?>" style="margin:18px 0;">
				 <input type="text" class="" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
				 <input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
			</form>
		</div>
					
			</div>
		</div>
	</div>-->
	<!--通用头部开始-->
					<div id="header" class="header">
						<div class="header-box center-block">
							<!--上部为logo和搜索-->
							<div class="header-up">
								<a href="#" class="header-logo"></a>
								<div class="header-search">
									<form class="navbar-form  hidden-xs" role="search">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search">
										</div>
										<button type="submit" class="btn btn-default">搜索</button>
									</form>
									<!--隐藏的用户链接，搜索链接-->
									<a data-toggle="collapse" href="#cl">
										<span class="glyphicon glyphicon-user hidden-lg hidden-md hidden-sm"></span>
									</a>
									<a data-toggle="collapse" href="#cl1" id="search">
										<span class="glyphicon glyphicon-search hidden-lg hidden-md hidden-sm"></span>
									</a>
								</div>
							</div>
							<!--下部为导航栏-->
							<nav class="navbar navbar-static-top nav-tabs" role="navigation">
								<!--向左对齐-->
								<ul class="nav nav-item navbar-left">
									<li class="active"><a href="#">首页</a></li>
									<li><a href="#">活动</a></li>
									<li><a href="#">小组</a></li>
									<li><a href="#">开讲</a></li>
									<li><a class="dropdown dropdown-toggle" data-toggle="dropdown">志交会<span class="caret"></span></a>
										<!--下拉菜单-->
										<ul class="dropdown-menu" style="overflow: auto !important;">
											<li><a href="#">Swing</a></li>
											<li><a href="#">jMeter</a></li>
											<li><a href="#">EJB</a></li>
											<li class="divider"></li>
											<li><a href="#">分离的链接</a></li>
										</ul>
									</li>
								</ul>
								<!--向右对齐-->
								<ul class="nav nav-pills navbar-right hidden-xs" id="collapse">
									<li><a href="#">切换城市</a></li>
									<li><a href="#">登陆注册</a></li>
									<li><a href="#">微博</a></li>
									<li><a href="#">QQ</a></li>
									<li><a href="#">你</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!--通用头部结束-->
					<!--折叠个人资料菜单-->
					<div class="collapse _hide " id="cl">
						<a class="head"></a>
						<label>laoergege</label>
						<label class="pull-right" style="color: #888888;font-size: small">常居地：广州</label>
						<span class="glyphicon glyphicon-chevron-right link"></span>
					</div>
					<div class="collapse" id="cl1">
						<div id="demo">
							<div class="list-group">
								<a href="#" class="list-group-item active">Item 1</a>
								<a href="#" class="list-group-item">Item 1</a>
								<a href="#" class="list-group-item">Item 3</a>
								<a href="#" class="list-group-item">Item 4</a>
								<a href="#" class="list-group-item">Item 5</a> ...
							</div>
						</div>
					</div>
					<!--折叠菜单结束-->
</div>
		<!--主体内容开始-->
<div class="container">
    <div class="row">
        <div class="register_progress">
            <div class="col-md-4 col-sm-4 col-xs-4 register_progress_1">完善资料
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">验证邮箱
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">注册成功
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-6 col-sm-7 col-xs-12 col-sm-offset-3">
            <!--注册表单开始-->
            <form class="form-horizontal" id="organFm" role="form">
                <div class="form-group">
                    <label for="name" class="col-md-3 col-sm-3 col-xs-4 control-label">组织名称:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="text" class="form-control" id="name"
                               placeholder="请输入2-9个字符" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 col-sm-3 col-xs-4 control-label">管理员邮箱:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="email" class="form-control" id="email"
                               placeholder="请输入常用邮箱" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 col-sm-3 col-xs-4 control-label">登陆密码:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="password" class="form-control" id="password"
                               placeholder="请输入6-32为字符的密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="again_pwd" class="col-md-3 col-sm-3 col-xs-4 control-label">确认密码:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="password" class="form-control" id="again_pwd"
                               placeholder="请再输入一次密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="admin_na" class="col-md-3 col-sm-3 col-xs-4 control-label">管理员姓名:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="password" class="form-control" id="admin_na"
                               placeholder="请再输入一次密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="admin_ph" class="col-md-3 col-sm-3 col-xs-4 control-label">管理员手机:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <input type="tel" class="form-control" id="admin_ph"
                               placeholder="请输入11位号码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-md-3 col-sm-3 col-xs-4 control-label">组织分类:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl">
                        <select name="cars" class="form-control" id="select">
                            <option value="">请选择</option>
                            <option value="生态环保">生态环保</option>
                            <option value="文化/艺术">文化/艺术</option>
                            <option value="动物保护">动物保护</option>
                            <option value="儿童关怀">儿童关怀</option>
                             <option value="支教助学">支教助学</option>
                              <option value="扶老助残">扶老助残</option>
                               <option value="综合/其他">综合/其他</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="check" class="col-md-3 col-sm-3 col-xs-4 control-label">验证码:</label>
                    <div class="col-md-9 col-sm-9 col-xs-8 clear-pl" >
                        <input type="text" class="form-control" id="check"
                               placeholder="请输入右边的验证码" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-11">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required>我已阅读并同意《志愿者用户协议》
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-11">
                        <button type="submit" class="btn btn-success btn-block">提交</button>
                    </div>
                </div>
            </form>
            <!--注册表单结束-->
        </div>
    </div>
</div>
<!--主体内容结束-->
		
		<script data-main="/2016Sise/themes/simplebootx/Public/js/code/step.js" src="./node_modules/requirejs/require.js"></script>
		<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "",
    JS_ROOT: "/2016Sise/public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/2016Sise/public/js/jquery.js"></script>
    <script src="/2016Sise/public/js/wind.js"></script>
    <script src="/2016Sise/themes/simplebootx/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script src="/2016Sise/public/js/frontend.js"></script>
	<script>
	$(function(){
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		
		$("#main-menu li.dropdown").hover(function(){
			$(this).addClass("open");
		},function(){
			$(this).removeClass("open");
		});
		
		$.post("<?php echo U('user/index/is_login');?>",{},function(data){
			if(data.status==1){
				if(data.user.avatar){
					$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"/2016Sise/data/upload/avatar/"+data.user.avatar);
				}
				
				$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
				$("#main-menu-user li.user.login").show();
				
			}
			if(data.status==0){
				$("#main-menu-user li.user.offline").show();
			}
			
		});	
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd=$(window).scrollTop();
							if(sd>100){
								$this.fadeIn();
							}else{
								$this.fadeOut();
							}
						}
					});
					
					$this.click(function(){
						scrolling=true;
						$('html, body').animate({
							scrollTop : 0
						}, 500,function(){
							scrolling=false;
							$this.fadeOut();
						});
					});
				});
			};
		})(jQuery); 
		
		$("#backtotop").totop();
		
		
	});
	</script>


	</body>

</html>