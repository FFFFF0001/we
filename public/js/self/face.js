/**
 * 头像剪切
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min",
        cropper:"cropper"
    }
});
require(['jquery','cropper'], function($) {
        require(['bootstrap','crop_image'],function(bs,ci) {
            //获取图片
            var i=1;
            $('#image_input').change(function(){
                var file=this.files[0];
                var t=$("#cropper-target");
                if(!/image\/\w+/.test(file.type)){      //判断是否为图片
                    alert("请上传图片文件");
                    return false;
                }
                else if(file.size>1048576){
                    alert("文件不得超过1M");
                    return false;
                }
                else {
                    var reader = new FileReader();
                    reader.onload = function () {
                        // 通过 reader.result 来访问生成的 DataURL
                        var url = reader.result;
                        t.attr("src", url);
                        ci.c(t);
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#button').click(function(){
                    if($('#image_input').val()!=""){  //判断文件是否为空
                        var croppedCanvas;
                        var roundedCanvas;


                        // Crop
                        croppedCanvas = $("#cropper-target").cropper('getCroppedCanvas');

                        // Round
                        roundedCanvas = ci.g(croppedCanvas);

                        // send
                        $.ajax({
                            type: "POST",
                            url: "../../image_upload.php",
                            contentType: "multipart/form-data",
                            data: roundedCanvas.toDataURL(),    //将canvas保存并上传
                            dataType: 'json',
                            success: function (result, status, xhr) {
                                if (result.result == "true") {
                                    alert("上传成功");
                                }
                                else {
                                    alert("上传失败");
                                }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("上传失败，请检查网络后重试");
                            }
                        });
                    }
                    else {
                        alert("图片为空！请选择图片");
                    }
            });
        })
});