<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/27
 * Time: 10:32
 */
namespace Home\Controller;

use Home\Controller;

class UserInfoController extends BaseController
{
    protected $allowMethod = array('get', 'post', 'put', 'delete');
    public $infoModel;

    public function index()
    {
        $this->display();
    }

    //public function getUserInfo()
    //{
    //    $infoModel = M('info');
    //    if (IS_GET) {
    //        $userInfo = $infoModel->select();
    //        $this->ajaxReturn($userInfo, 'json');
    //    } else {
    //        $data = $infoModel->create();
    //        if ($data['id'] > 0) {
    //            $this->data($data)->add();
    //        } else {
    //            $this->data($data)->save();
    //        }
    //    }
    //}

    public function read()
    {
        $infoModel = M('info');
        $data = $infoModel->select();
        $this->response($data,'json');
    }

    public function update()
    {
        $data = $infoModel->create();
        $infoModel->data($data)->save();
    }

    public function save()
    {
        $data = $infoModel->create();
        $infoModel->data($data)->add();
    }
}