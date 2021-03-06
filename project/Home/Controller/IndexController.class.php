<?php
namespace Home\Controller;

use Home\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $this->display();
    }



    public function verify()
    {
        $config = array(
            'fontSize' => 14,    // 验证码字体大小
            'length' => 4,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'useCurve' => false,
            'codeSet' => '0123456789'
        );

        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
}