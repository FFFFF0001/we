requirejs.config({
	baseUrl: './public/js/self',
	paths: {
		jquery: '../jquery',

	}
});

require(['jquery'], function($) {
	$(document).ready(function() {


		/**
		 * 读取数字的每一位数字
		 * @param num 要输出的数字
		 * @returns {*} 返回目标数组
         * @constructor
         */
		function OutputEachNum(num) {
			var arr = [];
			while(num>=1){
				arr.push(num%10);
				num = parseInt(num / 10);
			}
			arr.reverse();
			return arr;
		}

		/**
		 * 数字移动效果
		 * @param arrNum 存有数字的数组
         * @param ele 要操作的父元素对象
         */
		function animateNum(arrNum,ele) {
			for(var i=0,length = arrNum.length;i<length;i++) {
				var current = arrNum[i],
					sE = document.createElement('span');
				sE.style.backgroundPosition = "0px 0px";
				ele.append(sE);
				current = current==0?10:current;
				ele.find('span').eq(i)
					.animate({backgroundPositionY: current * -37 + 'px'}, 2000);
			}

		}
		var peopleE = $(".people-count"),
			actiE = $(".acti-count"),
			peopleC = peopleE.data("count"),
			actiC = actiE.data('count');

		var peopleArr = OutputEachNum(peopleC),
			actiArr = OutputEachNum(actiC);
		/*总人数*/
		animateNum(peopleArr, peopleE);
		/*活动人数*/
		animateNum(actiArr, actiE);

		/**
		 * 轮播图
		 * @type {*|jQuery}
         */
		var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
		var len = $("#focus ul li").length; //获取焦点图个数
		var index = 0;
		var picTimer;

		//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
		var btn = "<div class='btnBg'></div><div class='btn'>";
		for (var i = 0; i < len; i++) {
			btn += "<span></span>";
		}
		btn += "</div><div class='preNext pre glyphicon glyphicon-chevron-left'></div><div class='preNext next glyphicon glyphicon-chevron-right'></div>";
		$("#focus").append(btn);
		$("#focus .btnBg").css("opacity", 0.5);

		//为小按钮添加鼠标滑入事件，以显示相应的内容
		$("#focus .btn span").css("opacity", 0.4).mouseenter(function() {
			index = $("#focus .btn span").index(this);
			showPics(index);
		}).eq(0).trigger("mouseenter");

		//上一页、下一页按钮透明度处理
		$("#focus .preNext").css("opacity", 0.2).hover(function() {
			$(this).stop(true, false).animate({
				"opacity": "0.5"
			}, 300);
		}, function() {
			$(this).stop(true, false).animate({
				"opacity": "0.2"
			}, 300);
		});

		//上一页按钮
		$("#focus .pre").click(function() {
			index -= 1;
			if (index == -1) {
				index = len - 1;
			}
			showPics(index);
		});

		//下一页按钮
		$("#focus .next").click(function() {
			index += 1;
			if (index == len) {
				index = 0;
			}
			showPics(index);
		});

		//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
		$("#focus ul").css("width", sWidth * (len));

		//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
		$("#focus").hover(function() {
			clearInterval(picTimer);
		}, function() {
			picTimer = setInterval(function() {
				showPics(index);
				index++;
				if (index == len) {
					index = 0;
				}
			}, 4000); //此4000代表自动播放的间隔，单位：毫秒
		}).trigger("mouseleave");

		//显示图片函数，根据接收的index值显示相应的内容
		function showPics(index) { //普通切换
			var nowLeft = -index * sWidth; //根据index值计算ul元素的left值
			$("#focus ul").stop(true, false).animate({
				"left": nowLeft
			}, 300); //通过animate()调整ul元素滚动到计算出的position
			//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
			$("#focus .btn span").stop(true, false).animate({
				"opacity": "0.4"
			}, 300).eq(index).stop(true, false).animate({
				"opacity": "1"
			}, 300); //为当前的按钮切换到选中的效果
		}

		$(".add-more-list li").hover(function() //从这个元素开始寻找一直找到类为hidden_li的孩子div
			{
				$(this).find("div.hidden_li").css('display', 'block');
			},
			function() {
				$(this).find("div.hidden_li").css('display', 'none');
			}
		);

	});
})