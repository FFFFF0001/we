<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html lang="en">
	<head>
		<title>CXCL工作室-跳转提示</title>
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
		<style type="text/css">
		*{ padding: 0; margin: 0; }
		body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
		.system-message{ padding: 24px 48px;text-align: center; }
		.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; text-align: center;}
		.system-message .jump{ padding-top: 10px}
		.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
		.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
		</style>
	</head>
<body class="body-white">
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
								<li><a href="<?php echo U('User/setting/info');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
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
	<div class="system-message">
	<?php if(isset($message)): ?><h1>^_^</h1>
	<p class="success"><?php echo($message); ?></p>
	<?php else: ?>
	<h1>&gt;_&lt;</h1>
	<p class="error"><?php echo($error); ?></p><?php endif; ?>
	<p class="detail"></p>
	<p class="jump">
	CXCL工作室：页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
	</p>
	</div>
	<script type="text/javascript">
	(function(){
	var wait = document.getElementById('wait'),href = document.getElementById('href').href;
	var interval = setInterval(function(){
		var time = --wait.innerHTML;
		if(time <= 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
	})();
	</script>

</body>
</html>