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
                object.popover({placement:"top",title:text});
                object.popover('show');
            }
            else{
                object.popover('hide');
            }
        }
        return num;
    }
)