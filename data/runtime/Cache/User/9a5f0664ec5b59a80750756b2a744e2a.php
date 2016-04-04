<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<title><?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
		<meta name="author" content="CXCL工作室">
		<?php  function _sp_helloworld(){ echo "hello CXCL工作室!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.0.0发布啦！", "slide_pic"=>$tmpl."Public/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
<meta name="author" content="CXCL工作室">
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
<link rel="icon" href="Public/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="Public/images/favicon.ico" type="image/x-icon">
 <!--<link href="/2016Sise/themes/simplebootx/Public/simpleboot/themes/simplebootx/theme.min.css" rel="stylesheet">--> 
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
<link href="/2016Sise/themes/simplebootx/Public/css/footer.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/step.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/forgot_password.css" rel="stylesheet">
	<link href="Public/css/style.css" rel="stylesheet">

<!--<link href="Public/css/reset.css" rel="stylesheet">
-->
<link href="Public/css/normalize.css" rel="stylesheet">
<!--<link href="Public/css/info.css" rel="stylesheet">-->
<!--<link href="Public/css/28902.css" rel="stylesheet">-->
<!--<link href="Public/css/person_info.css" rel="stylesheet">-->
<!---->
<!--<link href="Public/css/update_pwd.css" rel="stylesheet">-->
<!---->
<script src="Public/js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="Public/js/self/lib/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
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
		<link href="Public/css/person_info.css" rel="stylesheet">
	</head>

	<body>
		<?php echo hook('body_start');?>
<div class="">
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
				<?php $effected_id=""; $filetpl="
					<a href='\$href' target='\$target'>\$label</a>"; $ul_class="nav nav-item navbar-left" ; $li_class="" ; $style="nav nav-item navbar-left"; $dropdown='dropdown'; ?>
				<?php echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown);?>
				<!--向右对齐-->
				<ul class="nav nav-pills navbar-right hidden-xs" id="collapse">
					<li><a href="#">切换城市</a></li>
					<li class="dropdown">
						<?php if(sp_is_user_login() == false): ?><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img src="/2016Sise/themes/simplebootx//Public/images/headicon.png" class="headicon" />登录
								<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo leuu('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
								<li><a href="<?php echo leuu('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
							</ul>
							<?php else: ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<?php $avatar = sp_get_current_user()['avatar'] ?>
								<?php if(empty($avatar) == true): ?><img src="/2016Sise/themes/simplebootx//Public/images/headicon.png" class="headicon" />
									<?php else: ?>
									<img width="30" height="30" src="<?php echo sp_get_asset_upload_path('avatar/').$avatar;?>" class="headicon" /><?php endif; ?>

								<?php echo sp_get_current_user()['user_login'] ?>
								<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('User/profile/edit');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
								<li><a href="<?php echo U('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
							</ul><?php endif; ?>
					</li>
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

		<!--主内容开始-->
		<div class="container">
			<div class="row">
				<div class="hidden-lg hidden-md hidden-sm meun_min">
            <div class="collapse" id="cc">
                <div class="menu_content">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <a>活动</a>
                            </td>
                            <td>
                                <a>参加的活动</a>
                                <a>感兴趣的活动</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a>活动小组</a>
                            </td>
                            <td>
                                <a>我创建的</a>
                                <a>我加入的</a>
                                <a>发起的话题</a>
                                <a>回应的话题</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a>设置</a>
                            </td>
                            <td>
                                <a href="<?php echo U('info');?>">个人资料</a>
                                <a href="<?php echo U('face');?>">修改头像</a>
                                <a href="<?php echo U('update_pass');?>">修改密码</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a>消息</a>
                            </td>
                            <td>

                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="dropdown">
                <a href="#cc" data-toggle="collapse">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </a>
            </div>
        </div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 hidden-xs meun_left">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h6 class="list-group-item-heading">
                        消息
                    </h6>
                </a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h6 class="list-group-item-heading">
                        活动
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        参加的活动
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        感兴趣的活动
                    </h6>
                </a>
            </div>
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h6 class="list-group-item-heading">
                        活动小组
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        我创建的
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        我加入的
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        发起的话题
                    </h6>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        回应的话题
                    </h6>
                </a>
            </div>
            <div class="list-group">
                <a href="<?php echo U('User/setting/info');?>" class="list-group-item active">
                    <h6 class="list-group-item-heading">
                        设置
                    </h6>
                </a>
                <a href="<?php echo U('User/profile/edit');?>" class="list-group-item">
                    <h6 class="location list-group-item-heading">
                        个人资料
                    </h6>
                </a>
                <a href="<?php echo U('User/setting/face');?>" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        修改头像
                    </h6>
                </a>
                <a href="<?php echo U('User/profile/password');?>" class="list-group-item">
                    <h6 class="list-group-item-heading">
                        修改密码
                    </h6>
                </a>
            </div>
        </div>
				<!--菜单项内容开始-->
				<div class="col-md-10 col-sm-9 col-xs-12 content_right">
					<!--资料表单-->
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-9">
							<h4>认证信息</h4>
							<h6>目前状态：<span>未认证</span> 通过认证才能获得志愿时数
                    </h6>
						</div>
						<div class="col-md-7 col-sm-8 col-xs-3">
							<a href="<?php echo U('User/setting/authentication');?>">
								<button type="button" class="btn btn-success">马上认证</button>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7 col-sm-8 col-xs-12">
							<div>
								<h4>基本资料</h4>
							</div>
							<form id="edit-form" class="form-horizontal js-ajax-form" id="form" action="<?php echo U('profile/edit_post');?>" method="post">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3 control-label" for="name">昵称</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<input type="text" class="form-control" id="name" data-toggle="popover" placeholder="昵称" name="user_nicename" value="<?php echo ($user_nicename); ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-3 control-label" for="input-sex">性别</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<?php $sexs=array("0"=>"保密","1"=>"程序猿","2"=>"程序媛"); ?>
										<select id="input-sex" name="sex" class="form-control">
                                   						<?php if(is_array($sexs)): foreach($sexs as $key=>$vo): $sexselected=$key==$sex?"selected":""; ?>
                                   							<option value="<?php echo ($key); ?>" <?php echo ($sexselected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                                   					</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-sm-3 col-xs-3 control-label" for="birthday">生日</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<input class="js-date form-control" type="text" id="birthday" placeholder="1996-01-04" name="birthday" value="<?php echo ($birthday); ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="phone" class="col-md-3 col-sm-3 col-xs-3 control-label">联系方式:</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="请填写你的手机号码或固话" value="<?php echo ($mobile); ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="col-md-3 col-sm-3 col-xs-3 control-label" for="input-signature">个性签名</label>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<textarea id="input-signature" class="form-control" placeholder="个性签名" name="signature"><?php echo ($signature); ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<button type="submit" id="edit-save" class="btn btn-lg js-ajax-submit col-xs-offset-3 col-sm-offset-9" disabled="disabled">保存</button>
									</div>
								</div>
							</form>
							
						</div>

					</div>
				</div>
				<!--菜单项内容结束-->

			</div>
		</div>
		<!--主内容结束-->

		
<!-- Footer
      ================================================== -->
      <br>
<!--通用底部开始-->
<div class="footer">
    <div class="footer-part  hidden-xs">
        <div class="row">
            <div class="col-sm-2">
                <div class="footer-text">
                    <ul>
                        <li><h5 style="color:green;">志愿时</h5></li>
                        <li>联系我们</li>
                        <li>关于我们</li>
                        <li>法律支持</li>
                        <li>信息公开</li>
                        <li>试用指南</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="footer-text">
                    <ul>
                        <li><h5 style="color:green;">合作机构</h5></li>
                        <li>广州大学华软软件学院</li>
                        <li>地址：广东省从化区高新经济开发区548号</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="footer-text">
                    <ul>
                        <li><h5 style="color:green;">友情链接</h5></li>
                        <li>华软</li>
                        <li>华软软件系</li>
                        <li>网设</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="footer-QR">
                    <img width="140" src="Public/images/1460122746.png" alt=""/>
                    <img width="140" src="Public/images/1460122746.png" alt=""/>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <span>广州大学华软学院&&CXCL工作室</span>
    </div>

</div>




		<script data-main="./public/js/self/info.js" src="./node_modules/requirejs/require.js"></script>
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