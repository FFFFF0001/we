/**
 * Created by mj on 2016/3/23.
 */
/*
 * 判断昵称字符个数并提示
 * */
define(['jquery','bootstrap'],function(){
        function num(object,min,max){    //object jq对象
            if(object.val().length<min || object.val().length>max) {
                var text="请输入"+min+"-"+max+"个字符串";
                object.parent().addClass("has-error");
                object.popover({placement:"top",content: '<div id="content" style="color:#a94442">'+text+'</div>',trigger:"manual",html: true});
                object.popover('show');
                return false;
            }
            else{
                object.parent().removeClass("has-error");
                object.popover('hide');
                return true;
            }
        }
        return num;
    }
)