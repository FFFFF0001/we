/**
 * Created by mj on 2016/4/8.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min"
    }
});
require(['jquery'],function(){
    require(['bootstrap'],function() {
        $(document).ready(function () {

            /*
            小型设备的评论文本域
            */
            //隐藏评论文本域
            $('#cancel').click(function(){
                $('#myModal').modal('hide');
            });
            //初始渲染文本域位置于浏览器底部
            $('#myModal').on('show.bs.modal', function () {
                var w=$(window).height();
                $("#m").css('padding-top',w-104);
            });
            //防止手机输入法遮挡文本域
            $(window).resize(function(){
                var w=$(window).height();
                $("#m").css('padding-top',w-104);
            });

            /*
             填充格式数据
             */
            function formatTemplate(dta, tmpl) {
                var format = {
                    name: function(x) {
                        return x
                    }
                };
                return tmpl.replace(/{(\w+)}/g, function(m1, m2) {
                    if (!m2)
                        return "";
                    return (format && format[m2]) ? format[m2](dta[m2]) : dta[m2];
                });
            }
            /*
            添加评论
             */
            $('.com').click(function(){
                var said;
                $('textarea').each(function(){
                    if($(this).val()!=''){
                        said=$(this).val();
                        $(this).val("");
                    }
                });

                var session=window.sessionStorage;
                var data=new Date();
                var commnet={
                    username:session.getItem('username'),
                    picture:session.getItem('picture'),
                    time:data.getFullYear()+'-'+data.getMonth()+'-'+data.getDate()+' '+data.getHours()+':'+data.getMinutes()+':'+data.getSeconds(),
                    said:said
                };
                var c=[commnet];
                //获取模板
                var html=$('#m1').html();
                //定义一个数组，用来接收格式化合的数据
                var arr = [];
                //对数据进行遍历
                $.each(c, function(i, o) {
                    //这里取到o就是上面rows数组中的值, formatTemplate是最开始定义的方法.
                    arr.push(formatTemplate(o, html));
                });
                $('#myModal').modal('hide');
                $('#comment-list').prepend(arr+'');
            });


        })
    })
});