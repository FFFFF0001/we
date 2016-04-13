/**
 * Created by mj on 2016/4/3.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min",
        cityselect:"jquery.cityselect",
        jqform:'jquery.form'
    }
});
require(['jquery'],function($){
    require(['bootstrap','cityselect','jqform'],function(b,c){
        /*
         * 上传的文件
         * */
        $("#image_input").change(function(){
            $("#show").hide();
            var file=this.files[0];
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
                    var i=$("#image_preview");
                    i.attr("src", url);
                    i.removeClass('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        /*
         * 地区三级浮动
         * */
        $("#place").citySelect({
            nodata:"none",
            prov:'广东',
            url:'./public/js/self/city.min.js',
            required:false
        });
        /*
        * 点击提交,表单验证
        *异步提交
        * */
        $('#upload').click(function(){
            if(
                $.trim($('#true_name').val())==''
                    || $.trim($('#phone').val())==''
                    || $.trim($('#id').val())==''
                    || $.trim($('#image_input').val())==''
                    || $.trim($('#prov').val())=='请选择'
                    || $.trim($('#city').val())=='请选择'
                    || $.trim($('#dist').val())=='请选择'
                    || $.trim($('#phone').val()).length!=11
            ){
                $(this).attr('data-target','#warning');
            }
            else {
                $(this).attr('data-target','');
                $('#form').ajaxSubmit({
                    dataType:'json',
                    success:function(data){
                        if(data.result){
                            $('#upload').attr('data-target','#success');
                            $('#success').modal('show');
                        }
                        else{
                            $('#upload').attr('data-target','#warning');
                            $('#warning').modal('show');
                        }
                    }
                });
            }
        });

    })
});