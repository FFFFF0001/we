requirejs.config({
	baseUrl: './public/js/self',
	paths: {
		jquery: "lib/jquery-2.2.1.min",
		bootstrap: "lib/bootstrap.min",
		common: "./_common"
	}
});
require(['jquery', 'common'], function($, comm) {
	/**
	 *让搜索关键字改变颜色
	 */
	var paraKw = comm.getQueryString("keywords"),
		paraArea = comm.getQueryString("area"),
		kwVal = $("#keywords").val(),
		AreaVal = $("[name=area]").val();
	if (paraKw != null) {
		$(".activity-title").each(function(ind, ele) {
			var ths = $(ele).html();
			var reg = new RegExp(kwVal, 'g');
			var goal = ths.replace(reg, "<span style='color:red;'>" + kwVal + "</span>");
			$(ele).html(goal);
		});
	}
	/**
	 * 让搜索地域关键字变红
	 *
     */
	if (paraArea != null) {
		$(".activity-area").each(function(ind, ele) {
			var ths = $(ele).html();
			var reg = new RegExp(AreaVal, 'g');
			var goal = ths.replace(reg, "<span style='color:red;'>" + AreaVal + "</span>");
			$(ele).html(goal);
		});
	}
	var cid = ""; //解决无法缩回问题
	$(".sele-cond").click(function() {
		var inx = $(this).index(),
			ism = isMobile(),
			xh = checkOtherSel(ism, ".sele-opt"),
			opt = $(this).find(".sele-opt");

		if (typeof(xh) == "number" && cid != inx)
			$(ism).find(".sele-opt").eq(xh).css("display", "none");

		if (opt.css("display") == "none")
			opt.css("display", "block");
		else
			opt.css("display", "none");
		cid = inx;
	});

	//根据url参数改变选项卡颜色
	var selectPro = $("#property-dl").find("dd a"),
		selectSor = $("#sort-dl").find("dd a"),
		first_select = $(".sele-opt").eq(0).find("li"),
		second_select = $(".sele-opt").eq(1).find("li");
	var p_val = $("#property").val(),
		tp_val = $("#types").val(),
		s_val = $("#status").val(),
		times_val = $("#times").val();

	optionEachColor(selectPro, p_val, 'current-stat');

	optionEachColor(selectSor, tp_val, 'current-stat');

	/**
	 *自制select框根据url参数改变文字
	 */
	if (s_val != null || s_val != "") {
		var getSatus = first_select.eq(s_val).html();
		$(".acti-status span").html(getSatus);
	}

	if (times_val != null || times_val != "") {
		var getSatus = second_select.eq(times_val).html();
		$(".acti-time span").html(getSatus);
	}
	/**
	 *下面是当参数不存在时 默认加的样式
	 */
	if (p_val == null || p_val == "") {
		$(".select-top").eq(0).find("dd").eq(0).find("a").addClass('current-stat');
	}
	if (tp_val == null || tp_val == "") {
		$(".select-top").eq(1).find("dd").eq(0).find("a").addClass('current-stat');
	}

})

/**
 * 筛选框根据url加颜色
 * @param {Object} obj 需要遍历的筛选框
 * @param {Object} compareVal 需要比较的值
 * @param {Object} className addClass
 */
function optionEachColor(obj, compareVal, className) {
	$.each(obj, function(idx, elem) {
		if (compareVal == $(elem).html()) {
			$(elem).addClass(className);
			return false;
		}
	});
}
/**
 *	判断哪个select框没关闭
 * @param {Object} sel 外围的选择器
 * @param {Object} child 需要找的select框id
 * @return 返回index
 */
function checkOtherSel(sel, child) {
	var obj = $(sel).find(child);
	for (var i = 0, leng = obj.length; i < leng; i++) {
		var status = obj[i].style.display;
		if (status == "block") {
			return i;
		} else if (i == 3)
			return false;
	}
}
/**
 *	判断是否是手机屏幕的尺寸
 * @return 返回外层的选择器名
 */
function isMobile() {
	if ($(window).width() < 768)
		return ".visible-xs";
	else
		return ".hidden-xs";
}