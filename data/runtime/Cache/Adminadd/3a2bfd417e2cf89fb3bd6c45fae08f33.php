<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/2016Sise/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/2016Sise/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/2016Sise/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/2016Sise/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
                    .table-oflow{max-width:200px; overflow-x: overlay;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/2016Sise/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/2016Sise/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/2016Sise/public/js/jquery.js"></script>
    <script src="/2016Sise/public/js/wind.js"></script>
    <script src="/2016Sise/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
</head>

<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('topic/topic_verify');?>">话题审核</a></li>
			<!--<li><a href="<?php echo U('AdminPage/add');?>"><?php echo L('PORTAL_ADMINPAGE_ADD');?></a></li>-->
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('topic/topic_verify');?>">
			注册时间
			<input type="text" name="start_time" class="js-date" value="<?php echo ($formget["start_time"]); ?>" style="width: 80px;" autocomplete="off">-
			<input autocomplete="off" type="text" class="js-date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;"> 关键字
			<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入话题标题关键字">
			<button class="btn btn-primary">搜索</button>
		</form>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('topic/agree');?>" data-subcheck="true" data-msg="你确定同意吗？">同意</button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('topic/refuse');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>">拒绝</button>

			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="16">ID</th>
						<!-- <th>点击量</th> -->
						<th width="80">用户名</th>
						<th width="120">话题名称</th>
						<th width="120"><span>话题内容</span></th>
						<th width="120">发表时间</th>
						<th width="120">话题操作</th>
						<th width="120">用户操作</th>
					</tr>
				</thead>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
						<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["topic_id"]); ?>"></td>
						<td><a><?php echo ($vo["topic_id"]); ?></a></td>
						<td class="table-oflow"><?php echo ($vo["user_login"]); ?></td>
						<td class="table-oflow"><?php echo ($vo["topic_title"]); ?></td>
						<!--  <td>0</td> -->
						<td class="table-oflow"><a href="<?php echo U('topic_content',array('id'=>$vo['topic_id']));?>">点此处查看话题内容</a></td>
						<td class="table-oflow"><?php echo ($vo["topic_create"]); ?></td>
						<td>
							<a href="<?php echo U('topic/agree',array('id'=>$vo['topic_id']));?>">同意</a>|
							<a href="<?php echo U('topic/refuse',array('id'=>$vo['topic_id']));?>" class="js-ajax-delete">拒绝</a>
						</td>
						<td>
							<a href="<?php echo U('topic/agree',array('id'=>$vo['id']));?>">封号</a>
						</td>
					</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="16">ID</th>
						<!-- <th>点击量</th> -->
						<th width="80">用户名</th>
						<th width="120">话题名称</th>
						<th width="120"><span>话题内容</span></th>
						<th width="120">发表时间</th>
						<th width="120">话题操作</th>
						<th width="120">用户操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('topic/agree');?>" data-subcheck="true" data-msg="你确定同意吗？">同意</button>
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('topic/refuse');?>" data-subcheck="true" data-msg="你确定删除吗？">拒绝</button>
			</div>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
	<script src="/2016Sise/public/js/common.js"></script>
	<script>
		setCookie('refersh_time', 0);

		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location.reload();
			}
		}
		setInterval(function() {
			refersh_window()
		}, 2000);
	</script>
</body>

</html>