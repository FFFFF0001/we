
requirejs.config({
	baseUrl:"./public/js/self",
	paths:{
		jquery:'lib/jquery-2.2.1.min'
	}
});

require(['jquery'], function ($) {
	/*加入小组ajax*/
			$(".btn-join").on("click", function() {
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
	 * 退出小组
	 */
			$(".btn-exit").on("click", function() {
				var ts = $(this),
					uri = ts.data("action");
					
				var is = confirm("确定退出小组吗？");
				if(is==true){
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
				}
			});
	/**
	 * 右栏显示
	 */
	$(".team_recommend li.recommend-l").hover(function () {
		$("p.group-msg-show").hide();
		$("li.recommend-l").removeClass("bgrecommend");
		$(this).find("p.group-msg-show").show();
		$(this).addClass('bgrecommend');
	})
})
