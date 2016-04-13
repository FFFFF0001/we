/**
 * Created by mj on 2016/4/2.
 */
requirejs.config({
    baseUrl: './public/js/self',
    paths:{
        jquery:"lib/jquery-2.2.1.min",
        bootstrap:"lib/bootstrap.min",
        cityselect:"jquery.cityselect"
    }
});
require(['jquery'],function(){
        require(['cityselect'],function(s){
            $(function(){
                $("#birthplace").citySelect({
                    nodata:"none",
                    prov:'广东',
                    url:'./public/js/self/city.min.js',
                    required:false
            });
        });
    })

});
