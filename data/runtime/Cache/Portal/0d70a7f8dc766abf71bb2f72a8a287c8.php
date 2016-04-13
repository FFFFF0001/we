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
<div class="container group-container center-block">
    <div class="row">
        <!--左边-->

        <div class="col-lg-9 col-md-9 col-sm-9" id="left">
            <div class="team-tabs">
                <h4>
                    <a>话题精选</a>
                    <a href="#" id="join" class="ac">加入小组</a>
                    <a class="hidden-* visible-xs" id="re">推荐小组</a>
                </h4>
            </div>

            <div class="classification">
                    <strong>分类：</strong>

                        <a class="ac">全部</a>
                        <a>生态环保</a>
                        <a>文化/艺术</a>
                        <a>动物保护</a>
                        <a>儿童关怀</a>
                        <a>支教助学</a>
                        <a>扶老助残</a>
                        <a>综合/其他</a>
                </div>
            <div id="wrapper">
                <ul>
                	<?php if(is_array($group)): foreach($group as $key=>$vo): ?><li class="col-md-6 col-sm-6 col-xs-12">
	                        <div class="iteam">
	                            <div class="iteam-head">
	                                <div class="info">
	                                    <div>
	                                        <strong>
	                                            <a href="<?php echo U('group_detail',array('group_id'=>$vo[group_id]));?>"><?php echo ($vo["group_name"]); ?></a>
	                                            <button class="btn btn-success btn-xs pull-right">加入</button>
	                                        </strong>
	                                        <p>
	                                            <span aria-hidden="true" class="icon_group"></span> <?php echo ($vo["group_total"]); ?>
	                                            <span aria-hidden="true" class="icon_chat"></span> <?php echo ($vo["chat_count"]); ?>
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <p>
	                                <?php echo ($vo["group_introduce"]); ?>
	                            </p>
	                        </div>
	                    </li><?php endforeach; endif; ?>
                    
                </ul>
            </div>
            <!--加载提示-->
            <div class="loader col-sm-12 hidden">
                <div class="loader-inner ball-pulse">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!--加载提示结束-->
        </div>
        <!--右部分-->
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs visible-* " id="right">
            <form class="form-inline" role="search" id="searchGroTip">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="小组、话题  ">
                        <div class="input-group-addon">
                            <span class="icon_search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <a href="<?php echo U('group_add');?>">
            	<button class="btn btn-default btn-block">
                创建新小组
            </button></a>
            
            <div id="recommend">
                <p>
                    <span>
                        <strong>值得加入的小组</strong>
                    </span>
                    <span class="pull-right">
                        <small>
                            <span class="glyphicon glyphicon-repeat"></span>换一批
                        </small>
                    </span>
                </p>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>

                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
            </div>
            <div id="new_group">
                <p>
                    <span>
                        <strong>新创建的小组</strong>
                    </span>
                </p>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
                <div class="iteam">
                    <div class="iteam-head">
                        <div class="info">
                            <div>
                                <strong>
                                    <a>趣公益</a>
                                    <button class="btn btn-success btn-xs pull-right">加入</button>
                                </strong>
                                <p>
                                    <span aria-hidden="true" class="icon_group"></span> 5932
                                </p>
                            </div>
                        </div>
                    </div>
                    <p style="display: none">
                        学生志愿者服务中心隶属华南理工大学广州学院，为活跃校园文化，涂抹大学生青春洋溢色彩，倡议及鼓励大学生...
                    </p>
                </div>
            </div>
        </div>
        <!--加载进度条开始-->

        <!--加载进度条结束-->
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
<script data-main="./public/js/self/list.js" src="./node_modules/requirejs/require.js"></script>
</html>