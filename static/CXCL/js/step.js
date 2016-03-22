/**
 * Created by mj on 2016/3/21.
 */
requirejs.config({
    baseUrl: '../../js/moudle/',
    paths:{
        jquery:"../lib/jquery-2.2.1.min",
        bootstrap:"../lib/bootstrap.min"
    }
});
require(['jquery'], function($) {
    require(['bootstrap'],function(bs){
        //code goes here

    })
});