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
        echo '{"code":0, "message" : "ok"}';
    }

    public function check()
    {
        $user_info = \I("post");
        $userModel = \M('user');
        $code = $user_info['verfiy_code'];
        $where['username'] = $user_info['username'];
        $where['password'] = md5($user_info['password']);
        $res = $userModel->where($where)->select();
        $Verify = new \Think\Verify();
        $ver_res = $Verify->check($code);
        if (!$ver_res) {
            echo '{"code":1,"message":"验证码错误"}';
            die;
        }
        if (!$res) {
            echo '{"code":1,"message":"账号密码错误"}';
            die;
        }else{
            $_SESSION['userid'] = $res[0]['id'];
            $_SESSION['username'] = $res[0]['username'];
            $_SESSION['name'] = $res[0]['name'];
            $_SESSION['role_id'] = $res[0]['role_id'];
            $arr = array(
                'code' => 0,
                'message' => '登录成功',
                'url' => 'page/index.html',
                'user_id' => $res[0]['id'],
            );
            echo json_encode($arr, true);
        }
    }
}