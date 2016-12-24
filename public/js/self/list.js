/**
 * Created by mj on 2016/4/6.
 */
requirejs.config({
	baseUrl: './public/js/self',
	paths: {
		jquery: "../jquery",
		bootstrap: "lib/bootstrap.min",
		iscroll: "iscroll",
		pullToRefresh: "pullToRefresh"
	}
});
require(['jquery'], function() {
	require(['iscroll', 'pullToRefresh', 'bootstrap'], function(i, p, b) {
		var recommend = $("#h-p-content");


		function asyncExchange() {
			var load = $("#loading-bef");
			recommend.empty();
			$.ajax({
					url:'./index.php?g=Portal&m=group&a=member_want_ajax',
					dataType:'json',
					beforeSend:function () {
						load.show();
					},
					complete:function () {
						load.hide();
					},
					success:function (data) {
						$.each(data,function (key,value) {
							var isJoin;
							if(value['isjoin']==true) {
								isJoin ="<a href='"+value['href']+"' class='btn btn-success btn-xs pull-right a-btn'>进入小组</a>";
							}else{
								isJoin = "<button class='btn btn-success btn-xs pull-right btn-join js-ajax-submit' type='submit' data-action='"+value['href']+"'>加入</button>";
							}
							recommend.append(
								"<div class='iteam'>" +
								"<div class='iteam-head'>" +
								"<div class='info'>" +
								"<div>" +
								"<strong>" +
								"<a href=index.php?g=&m=Group&a=group_detail&group_id="+value['group_id']+">"+value['group_name']+"</a>" +isJoin+
								"</strong>" +
								"<p>" +
								"<span aria-hidden='true' class='icon_group'></span> "+value['group_total']+"" +
								"</p>" +
								"</div>" +
								" </div>" +
								"</div>" +
								"<p style='display: none'>" +
								""+value['group_introduce']+"" +
								"</p>" +
								"</div>"
							);
						});
					}
				});
		}
		asyncExchange();

		$("#async-change").on("click", asyncExchange);


		$(document).ready(function() {

			$('#recommend >.iteam').hover(function() {
				$(this).children('p').css('display', 'block');
			}, function() {
				$(this).children('p').css('display', 'none');
			});

			$('#new_group >.iteam').hover(function() {
				$(this).children('p').css('display', 'block');
			}, function() {
				$(this).children('p').css('display', 'none');
			});
			$('#re').click(function() {
				$(this).addClass('ac');
				$(this).siblings().removeClass('ac');
				$('#wrapper').addClass('hidden-xs');
				$('#right').removeClass('hidden-xs');
			});
			$('#join').click(function() {
				$(this).addClass('ac');
				$(this).siblings().removeClass('ac');
				$('#right').addClass('hidden-xs');
				$('#wrapper').removeClass('hidden-xs');
			});

			var h = $('#header').height() + $('.container.center-block').height();
			var w = $(window).height();
			$('#wrapper').css('height', w - h);

			if ($(window).width() < 765) {
				refresher.init({
					id: "wrapper", //<------------------------------------------------------------------------------------┐
					pullUpAction: Load
				});

				function Load() {
					setTimeout(function() { // <-- Simulate network congestion, remove setTimeout from production!
						var i = $('.col-md-6.col-sm-6.col-xs-12');
						var n = i.length;
						$.ajax({
							url: '/CXCL/list.php?s=12&e=15',
							type: "get",
							cache: true,
							dataType: "text",
							success: function(data) {
								i.eq(n - 1).after(data);
								wrapper.refresh();
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								alert(errorThrown);
							}
						});
					}, 2000);
				}
			} else {
				$(window).scroll(function() {
					//下面这句主要是获取网页的总高度，主要是考虑兼容性所以把Ie支持的documentElement也写了，这个方法至少支持IE8
					var htmlHeight = document.body.scrollHeight || document.documentElement.scrollHeight;
					//clientHeight是网页在浏览器中的可视高度，
					var clientHeight = document.body.clientHeight || document.documentElement.clientHeight;
					//scrollTop是浏览器滚动条的top位置，
					var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
					//通过判断滚动条的top位置与可视网页之和与整个网页的高度是否相等来决定是否加载内容；
					if (scrollTop + clientHeight == htmlHeight) {
						$('.loader').removeClass('hidden');

						var i = $('.col-md-6.col-sm-6.col-xs-12');
						var n = i.length;
						/*$.ajax({
							url: '/CXCL/list.php?s=12&e=15',
							type: "get",
							cache: true,
							dataType: "text",
							success: function(data) {
								setTimeout(function() {
									$('.loader').addClass('hidden');
									i.eq(n - 1).after(data);
								}, 2000);
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								alert(errorThrown);
							}
						});*/
					}
				})
			}

			/*加入小组ajax*/
			$(document).on("click",".btn-join",function () {
				var ts = $(this),
					uri = ts.data("action");
				$.post(uri, function(data) {
					if (data.status == 0) {
						alert(data.info);
					} else {
						alert(data.info);
						setTimeout(function() {
							window.location.href = data.referer;
						}, 2000);
					}
				})
			});
			/**
			 * hover
			 */
			$(".iteam").hover(function () {
				$(this).find(".btn-join").show();
			},function () {
				$(this).find(".btn-join").hide();
			})
		});
	});
});