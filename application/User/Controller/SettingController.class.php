<?php
namespace User\Controller;

use Common\Controller\MemberbaseController;

class SettingController extends MemberbaseController{
    function info(){
        $this->display(":info");
    }
    function authentication(){
        $this->display(":authentication");
    }
    function update_pass(){
        $this->display(":update_pass");
    }
    function face(){
        $this->display(":face");
    }
}