<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/23
 * Time: 17:21
 */

namespace Home\Controller;

use Home\Controll;

class UserController extends BaseController
{
    public function login()
    {
        $this->display();
    }

    public function logout()
    {
        $_SESSION['username'] = '';
        $_SESSION['userid'] = '';
        $_SESSION['name'] = '';
        $_SESSION['role_id'] = '';
        $this->success('退出成功','/Home/User/login',1);
    }

    public function check()
    {
        $username = \I("post.username");
        $password = \I("post.password");
        $userModel = \M('user');
        $code = \I('post.verfiy_code');
        $where['username'] = $username;
        $where['password'] = md5($password);
        $res = $userModel->where($where)->select();
        $Verify = new \Think\Verify();
        $ver_res = $Verify->check($code);
        if (!$ver_res) {
            $this->error('验证码错误','/Home/User/login',2);
        }
        if (!$res) {
            $this->error('账号密码错误','/Home/User/login',2);
        }else{
            $_SESSION['userid'] = $res[0]['id'];
            $_SESSION['username'] = $res[0]['username'];
            $_SESSION['name'] = $res[0]['name'];
            $_SESSION['role_id'] = $res[0]['role_id'];
            $this->success('登录成功','/Home/Index/index',1);
        }
    }
}