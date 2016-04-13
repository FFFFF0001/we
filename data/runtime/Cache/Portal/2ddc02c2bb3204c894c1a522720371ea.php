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
<link href="/2016Sise/themes/simplebootx/Public/css/footer.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/register.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/step.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/User/forgot_password.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/Portal/group-detail.css" rel="stylesheet">
<link href="/2016Sise/themes/simplebootx/Public/css/Portal/topicadd.css" rel="stylesheet">
<link href="Public/css/topic.css" rel="stylesheet">
<link href="Public/css/group.css" rel="stylesheet">
<link href="Public/css/reset.css" rel="stylesheet">
<link href="Public/css/pullToRefresh.css" rel="stylesheet">
<link href="Public/css/style.css" rel="stylesheet">
<link href="Public/css/info.css" rel="stylesheet">
<link href="Public/css/28902.css" rel="stylesheet">
	<link href="Public/css/person_info.css" rel="stylesheet">
		<link href="Public/css/authentication.css" rel="stylesheet">
<link href="Public/css/update_pwd.css" rel="stylesheet">
	<link href="Public/css/face.css" rel="stylesheet">
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
								<?php $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $ul_class="nav nav-item navbar-left" ; $li_class="" ; $style="nav nav-item navbar-left"; $dropdown='dropdown'; ?>
<?php echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown);?>
								<!--向右对齐-->
								<ul class="nav nav-pills navbar-right hidden-xs" id="collapse">
									<li><a href="#">切换城市</a></li>
									<li><a href="<?php echo U('User/login/index');?>">登陆注册</a></li>
									<li><a href="<?php echo U('User/setting/info');?>">个人中心</a></li>
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

		<!---内容开始-->
		<div class="container">
			<div class="row">	
				<div class="clear-pd col-md-12 col-xs-12 ">
					<div class="content">
						<div class="row">
							<div class="col-sm-8 col-xs-12">
								<div class="group-left">
									<div class="group-tab">
										<a href="#">话题精选</a>
										<a href="#">加入小组</a>
									</div>

									<div class="group-list">
										<ul>
											<li>
												<div class="item-praise hidden-xs">
													<a href="#">赞</a>
												</div>
												<div class="item-content">
													<p class="item-title">
														<a href="#">网络行动能改变世界吗？</a>
													</p>
													<p class="item-trod">
														<span class="left"><img src="./public/images/static/item1.jpeg" alt=""/></span>
														<span class="right col-sm-8 col-xs-5 hidden-xs">
															编者按：互联网时代，“行动”的门槛变得前所未有的低。点个赞，签个
															名，转发一项倡议，参与一项讨论，只要在网络上对某个公共话题付出些微
															的努力，都可以说是“行动”的一种。正因为它包罗万象，这一现象也出现了
															众...
															</span>
														<span class="visible-xs">
															编者按：互联网时代，“行动”的门槛变得前所未有的低。点个赞，签个
															名，转发一项倡议，参与一项讨论，只要在网络上对某个公共话题付出些微
															的努力，都可以说是“行动”的一种。正因为它包罗万象，这一现象也出现了
															众...
															</span>
													</p>
													<p class="item-time">
														<em>来自: </em>
														<a href="#">公益案例</a>
														<div class="star visible-xs">
															<button type="button" class="btn btn-default btn-sm">
																	<span class="glyphicon glyphicon-star-empty"></span> 赞
																	</button>
														</div>
													</p>
												</div>
											</li>

											<li>
												<div class="item-praise hidden-xs">
													<a href="#">赞</a>
												</div>
												<div class="item-content">
													<p class="item-title">
														<a href="#">网络行动能改变世界吗？</a>
													</p>
													<p class="item-trod">
														<span class="left"><img src="./public/images/static/item1.jpeg" alt=""/></span>
														<span class="right col-sm-8 col-xs-5 hidden-xs">
															编者按：互联网时代，“行动”的门槛变得前所未有的低。点个赞，签个
															名，转发一项倡议，参与一项讨论，只要在网络上对某个公共话题付出些微
															的努力，都可以说是“行动”的一种。正因为它包罗万象，这一现象也出现了
															众...
															</span>
														<span class="visible-xs">
															编者按：互联网时代，“行动”的门槛变得前所未有的低。点个赞，签个
															名，转发一项倡议，参与一项讨论，只要在网络上对某个公共话题付出些微
															的努力，都可以说是“行动”的一种。正因为它包罗万象，这一现象也出现了
															众...
															</span>
													</p>
													<p class="item-time">
														<em>来自: </em>
														<a href="#">公益案例</a>
														<div class="star  visible-xs">
															<button type="button" class="btn btn-default btn-sm">
																	<span class="glyphicon glyphicon-star-empty"></span> 赞
																	</button>
														</div>
													</p>
												</div>
											</li>

										</ul>
									</div>

									<div class="group-page">
										<ul class="pagination">
											<li>
												<a href="#" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li>
												<a href="#" aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-sm-3 col-sm-offset-1 col-xs-12 ">
								<div class="group-right">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="小组、话题" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="basic-addon2">搜索</span>
									</div>
									<p><button class="button" type="button">创建新小组</button></p>
									<div class="new-group">
										<div class="new-group-title">
											<h5>新创建的小组</h5>
										</div>
										<ul>
											<li>
												<a href="#">
													<div class="item-left">
														<img src="./public/images/static/education.jpeg" alt="" />
													</div>
													<div class="item-right">
														<h5>大学生义教</h5>
														<p>1个组员</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<div class="item-left">
														<img src="./public/images/static/education.jpeg" alt="" />
													</div>
													<div class="item-right">
														<h5>大学生义教</h5>
														<p>1个组员</p>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--内容结束-->
		
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