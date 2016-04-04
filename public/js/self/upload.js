/**
 * 头像剪切
 */
/*requirejs.config({
    baseUrl: './public/js/self',
    paths:{
    	wind:"../wind",
    	frontend:"../frontend",
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min",
        cropper:"cropper"
    }
});*/
define(['jquery', 'cropper','bootstrap', 'crop_image'], function($,cr,bs,ci) {

		function checkfile() {
			var t = $("#cropper-target");
			ci.c(t);
			//获取图片
			var i = 1;
			$('#image_input').change(function() {
				var file = this.files[0];
				var t = $("#cropper-target");
				if (!/image\/\w+/.test(file.type)) { //判断是否为图片
					alert("请上传图片文件");
					return false;
				} else if (file.size > 1048576) {
					alert("文件不得超过1M");
					return false;
				} else {
					var reader = new FileReader();
					reader.onload = function() {
						// 通过 reader.result 来访问生成的 DataURL
						var url = reader.result;
						t.attr("src", url);
						ci.c(t);
					};
					reader.readAsDataURL(file);
				}
			});
		}

		function clickHandler(selector, ajaxfunc) {
			$(selector).click(function() {
				if ($('#image_input').val() != "") { //判断文件是否为空
					var croppedCanvas;
					var roundedCanvas;

					// Crop
					croppedCanvas = $("#cropper-target").cropper('getCroppedCanvas');

					// Round
					roundedCanvas = ci.g(croppedCanvas);

					// send
					ajaxfunc();
				} else {
					alert("图片为空！请选择图片");
				}
			});
		}
		
		function init (selector, ajaxfunc) {
			checkfile();
			clickHandler(selector, ajaxfunc);
		}
		return {init:init};
	
});