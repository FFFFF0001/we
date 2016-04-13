/**
 * Created by mj on 2016/4/8.
 */
requirejs.config({
    baseUrl: '../js',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min"
    }
});
require(['jquery'],function(){
    require(['bootstrap'],function() {
        $(document).ready(function () {
            //请求话题内容
            $.get('', function () {

            });
            //请求评论
            $.get('', function () {

            });

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

        })
    })
});