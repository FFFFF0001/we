/**
 * 头像剪切
 */
requirejs.config({
	baseUrl: './public/js/self',
	paths: {
		wind: "../wind",
		frontend: "../frontend",
		jquery: "lib/jquery-2.2.1.min",
		bootstrap: "lib/bootstrap.min",
		cropper: "cropper"
	}
});
require(['jquery'], function($) {
	require(['bootstrap', 'crop_image', 'upload'], function(bs, ci, upload) {
		function avatar_upload() {
			var croppedCanvas;
			var roundedCanvas;
			// Crop
			croppedCanvas = $("#cropper-target").cropper('getCroppedCanvas');
			// Round
			roundedCanvas = ci.g(croppedCanvas);
			
			$.ajax({
				type: "POST",
				url: "./index.php?g=User&m=index&a=prs_upload",
				contentType: "multipart/form-data",
				data: roundedCanvas.toDataURL(), //将canvas保存并上传
				dataType: 'json',
				success: function(result, status, xhr) {
					if (result.result == "true") {
						alert("上传成功");
					} else {
						alert("上传失败");
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("上传失败，请检查网络后重试");
				}
			});
		}
		upload.init("#button", avatar_upload);
	});
});