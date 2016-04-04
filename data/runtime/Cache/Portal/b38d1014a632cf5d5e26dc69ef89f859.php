<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<title><?php echo ($site_seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($site_seo_description); ?>">
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
		<link href="Public/css/index.css" rel="stylesheet">
		<link href="/2016Sise/themes/simplebootx/Public/css/slippry/slippry.css" rel="stylesheet">
		<style>
			.caption-wraper {
				position: absolute;
				left: 50%;
				bottom: 2em;
			}
			
			.caption-wraper .caption {
				position: relative;
				left: -50%;
				background-color: rgba(0, 0, 0, 0.54);
				padding: 0.4em 1em;
				color: #fff;
				-webkit-border-radius: 1.2em;
				-moz-border-radius: 1.2em;
				-ms-border-radius: 1.2em;
				-o-border-radius: 1.2em;
				border-radius: 1.2em;
			}
			
			@media (max-width: 767px) {
				.sy-box {
					margin: 12px -20px 0 -20px;
				}
				.caption-wraper {
					left: 0;
					bottom: 0.4em;
				}
				.caption-wraper .caption {
					left: 0;
					padding: 0.2em 0.4em;
					font-size: 0.92em;
					-webkit-border-radius: 0;
					-moz-border-radius: 0;
					-ms-border-radius: 0;
					-o-border-radius: 0;
					border-radius: 0;
				}
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

		<?php $home_slides=sp_getslide("portal_index"); $home_slides=empty($home_slides)?$default_home_slides:$home_slides; ?>
		<!--幻灯片开始-->

		<div class="wrapper">
			<div id="focus">
				<ul>
					<?php $slides=sp_getslide('primary_tag',4); ?>
					<?php if(is_array($slides)): foreach($slides as $key=>$vo): ?><li>
							<a href="#" target="_blank"><img src="<?php echo ($vo["slide_pic"]); ?>" alt="" /></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>

		<!--幻灯片结束-->
		<!--内容开始-->
		<div class="content">
			<!--活动开始-->
			<div class="part-box">
				<!--活动标题开始-->
				<div class="part-box-title">
					<span class="glyphicon glyphicon-bullhorn"></span>
					<a href="#" class="title-font">活动</a>
					<p class="classify">
						<?php if(is_array($status)): foreach($status as $key=>$vo): ?><a href="<?php echo U('portal/activity/index',array('status'=>array_search($vo,$status)));?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
						<?php if(is_array($types)): foreach($types as $key=>$vo): ?><a href="<?php echo U('portal/activity/index',array('types'=>$vo));?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
					</p>
					<div class="more-activity">
						<em class="glyphicon glyphicon-arrow-right"></em>
						<a href="<?php echo U('portal/activity/index');?>"><em>更多</em></a>
					</div>
				</div>
				<!--活动标题开始-->
				<?php if(is_array($activitys)): foreach($activitys as $key=>$vo): ?><div class="activity">
						<div class="project_items">
							<a href="#"><img src="<?php echo sp_get_asset_upload_path('activity_cover/').$vo['cover'];?>"></a>
							<div class="activity-introduce">
								<h4 class="items_text jieduan">
									<a href="#"><?php echo ($vo["activity_name"]); ?></a>
								</h4>
								<p class="items_text jieduan">
									<a href="#">活动地点：<?php echo ($vo["area"]); ?></a>
								</p>
								<p class="items_text jieduan">
									<a href="#">活动发起者：<?php echo ($vo["manager_name"]); ?></a>
								</p>
								<div class="items_time">
									<span>报名剩余：</span>
									<p class="progress">
										<i class="progressing" style="width:30px;"></i>
									</p>
									<span>23天</span>
								</div>
								<p class="items_count">
									<a href="class"><i class="glyphicon glyphicon-user"></i><em><?php echo ($vo["act_zan_count"]); ?></em></a>
									<a href="class"><i class="glyphicon glyphicon-eye-open"></i><em><?php echo ($vo["act_look_count"]); ?></em></a>
								</p>
							</div>
						</div>
					</div><?php endforeach; endif; ?>

			</div>
			<!--活动结束-->

			<!--小组开始-->
			<div class="part-box">
				<div class="part-box-title">
					<span class="glyphicon glyphicon-user"></span>
					<a href="#" class="title-font">小组</a>
					<img src="Public/images/ico_forum.png" alt="ico_forum">
				</div>
				<div class="index-group">
					<div class="group-items">
						<!--第一条开始-->
						<?php if(is_array($topics)): foreach($topics as $key=>$vo): if($key == 0): ?><a href="<?php echo U('topic/topic_detail',array('topic_id'=>$vo['topic_id']));?>">
									<div class="group-items-top">
										<span><img src="<?php echo sp_get_asset_upload_path('topic/').$vo['topic_cover'];?>" width="138px" height="138px"></span>
										<i>
									<h4><a href="#"><?php echo ($vo["topic_title"]); ?></a></h4>
									<p>
										<?php echo ($vo["topic_content"]); ?>
									</p>
									<span class="g-icon-heart glyphicon glyphicon-heart-empty"><?php echo ($vo["zan_count"]); ?></span>
								</i>
									</div>
								</a><?php endif; endforeach; endif; ?>
						<!--第一条结束-->
						<div class="group-items-bottom">
							<ul>
								<!--后三条开始-->
								<?php if(is_array($topics)): foreach($topics as $key=>$vo): if($key != 0 and $key < 4): ?><li>
											<a href="<?php echo U('topic/topic_detail',array('topic_id'=>$vo['topic_id']));?>">
												<em class="jieduan"><?php echo ($vo["topic_title"]); ?></em>
												<span class="glyphicon glyphicon-heart-empty"><?php echo ($vo["zan_count"]); ?></span>
											</a>
										</li><?php endif; endforeach; endif; ?>
								<!--后三条结束-->
							</ul>
						</div>
					</div>
					<!--后四条开始-->
					<div class="group-items">
						<!--第一条开始-->
						<?php if(is_array($topics)): foreach($topics as $key=>$vo): if($key == 4): ?><div class="group-items-top">
									<a href="<?php echo U('topic/topic_detail',array('topic_id'=>$vo['topic_id']));?>">

										<span><img src="<?php echo sp_get_asset_upload_path('topic/').$vo['topic_cover'];?>" width="138px" height="138px"></span>
										<i>
									<h4><?php echo ($vo["topic_title"]); ?></h4>
									<p>
										<?php echo ($vo["topic_content"]); ?>
									</p>
									<span class="g-icon-heart glyphicon glyphicon-heart-empty"><?php echo ($vo["zan_count"]); ?></span>
								</i></a>
								</div><?php endif; endforeach; endif; ?>
						<!--第一条结束-->
						<div class="group-items-bottom">
							<ul>
								<!--后三条开始-->
								<?php if(is_array($topics)): foreach($topics as $key=>$vo): if($key > 4): ?><li>
											<a href="<?php echo U('topic/topic_detail',array('topic_id'=>$vo['topic_id']));?>">
												<em class="jieduan"><?php echo ($vo["topic_title"]); ?></em>
												<span class="glyphicon glyphicon-heart-empty"><?php echo ($vo["zan_count"]); ?></span>
											</a>
										</li><?php endif; endforeach; endif; ?>
								<!--后三条结束-->
							</ul>
						</div>
					</div>
					<!--后四条结束-->
					<div class="add-more">
						<div class="add-more-title">
							<em>值得加入的小组</em>
						</div>
						<div class="add-more-list">
							<ul>
								<?php if(is_array($wants)): foreach($wants as $key=>$vo): ?><li>
										<a href="#">
											<img src="<?php echo sp_get_asset_upload_path('group_avatar/').$vo['group_cover'];?>">
											<em class="zhide-join jieduan"><?php echo ($vo["group_name"]); ?></em>
											<div class="hidden_li">
												<span class="glyphicon glyphicon-user"><?php echo ($vo["zan_count"]); ?></span>
												<span class="glyphicon glyphicon-heart-empty"><?php echo ($vo["chat_count"]); ?></span>
											</div>
										</a>
									</li><?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="part-box">
				<a href="<?php echo U('portal/topic/topic');?>">
					<div class="topic-1">
						<img src="Public/images/icon_but01.png">
						<em>志愿组织专题</em>
					</div>
				</a>
				<a href="<?php echo U('portal/activity/index');?>">
					<div class="topic-2">
						<img src="Public/images/icon_but02.png">
						<em>志愿活动专题</em>
					</div>
				</a>
			</div>

		</div>
		<!--内容结束----->
		
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



		</div>
		<script data-main="./public/js/self/index.js" src="./node_modules/requirejs/require.js"></script>
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


		<script src="/2016Sise/themes/simplebootx/Public/js/slippry.min.js"></script>
		<script>
			$(function() {
				var demo1 = $("#homeslider").slippry({
					transition: 'fade',
					useCSS: true,
					captions: false,
					speed: 1000,
					pause: 3000,
					auto: true,
					preload: 'visible'
				});
			});
		</script>
		<?php echo hook('footer_end');?>
	</body>

</html>