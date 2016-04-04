requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min"
    }
    
});

require(['jquery','bootstrap'],function($){
	 //小组类型的选择事件
        $("ul li").click(function () {
            var type=$(this).text();
            $("#group_type").text(type);
            $("#sort").val(type);
        })
        //小组名的判断函数
        $("#group_name").focusout(function () {
            if($(this).val()==""){
                $("#name_error").removeClass("sr-only").addClass("glyphicon glyphicon-remove").html("小组名称不能为空").css("color","red");
            }else if($(this).val().length>15){
                $("#name_error").removeClass("sr-only").addClass("glyphicon glyphicon-remove").html("小组名称的字数不能超过15").css("color","red");
            }else{
                $("#name_error").addClass("sr-only");
            }
        })
        //联系方式
        $("#group_phone").focusout(function () {
            if($(this).val()==""){
                $("#phone_error").removeClass("sr-only").addClass("glyphicon glyphicon-remove").html("请输入联系方式").css("color","red");
            }else if(!$.isNumeric($(this).val())){
                $("#phone_error").removeClass("sr-only").addClass("glyphicon glyphicon-remove").html("输入的联系方式的格式不对").css("color","red");
            }else if($(this).val().length!=11){
                $("#phone_error").removeClass("sr-only").addClass("glyphicon glyphicon-remove").html("输入的电话号码的长度不对").css("color","red");
            }else{
                $("#phone_error").addClass("sr-only")
            }
        });
        
        //tab切换
        function tabTrigger(){
        	$("#edit-msg").removeClass('focus')
        	.siblings().addClass('focus');
        }
        //监听hash锚点
        if(window.location.hash=="#upload_cover"){
        	$("#crt-group-form").css('display','none');
        	$("#upload-cover").css("display",'block');
        }
})
