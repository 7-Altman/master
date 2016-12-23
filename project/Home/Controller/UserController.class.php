<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/23
 * Time: 17:21
 */

namespace Home\Controller;

use Home\Controll;

class UserController extends BaseControll
{
    public function login()
    {
        if(IS_POST){
            $user = M('t_admin');
        }else{
            $this->display();
        }
    }
}