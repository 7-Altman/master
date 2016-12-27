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

    public function getUserInfo()
    {
        $infoModel = M('info');
        if (IS_GET) {
            $userInfo = $infoModel->select();
            $this->ajaxReturn($userInfo, 'json');
        } else {
            $data = $infoModel->create();
            if ($data['id'] > 0) {
                $this->data($data)->add();
            } else {
                $this->data($data)->save();
            }
        }
    }

    public function addInfo()
    {
        $arr = [];
        for ($i = 401;$i <= 600; $i++ ) {
            if($i<10){
                $i = 0 . $i;
            }
            $arr[] = array(
                'name' => '王小虎' . $i,
                'age' => 22,
                'gander' => 1,
                'province' => '北京',
                'city' => '北京',
                'area' => '通州',
                'address' => '永顺',
                'remark' => '。。。',
            );
        }
        //$infoModel = M('info');
        //$res = $infoModel->addAll($arr);
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