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

    public function index()
    {
        $this->display();
    }

    public function userInfo()
    {
        $infoModel = M('info');
        if (IS_GET) {
            $userInfo = $infoModel->select();
            $this->ajaxReturn($userInfo, 'json');
        } else {
            $data = $infoModel->create();
            if ($data['id'] == 0) {
                $this->data($data)->add();
            } else {
                $this->data($data)->save();
            }
        }
    }

    public function gaode()
    {
        $location = \I('get.location');
        $url = 'http://restapi.amap.com/v3/geocode/regeo?key=2d4760859d8d5d5142028805a912cade&location=' . $location;
        $res = $this->getUrlMsg($url);
        echo json_encode($res, true);
    }

    public function getlat()
    {
        $this->display();
    }

    public function edit()
    {
        $this->display();
    }

    public function test()
    {
        $this->display();
    }

    public function testInfo()
    {
        $testModel = \M('test');
        if (IS_GET) {
            //$testInfo = $testModel->field('name1, group_concat(name2) name2')->group("name1")->select();
            $testInfo = $testModel->select();
            $res = [];
            foreach ($testInfo as $k => $v) {
                $res[$k]['name1'] = $v['name1'];
                $res[$k]['name2'] = explode(',' , $v['name2']);
                $res[$k]['count'] = count(explode(',' , $v['name2']));
            }
            $this->ajaxReturn($testInfo, 'json');
        }
    }
}