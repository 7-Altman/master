<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/23
 * Time: 14:23
 */
namespace Home\Controller;
use Think\Controller\RestController;
class BaseController extends RestController
{
    /**
     * BaseController constructor.
     * 校验登录权限，
     */
    function __construct()
    {
        parent::__construct();
        $action = ACTION_NAME;
        $controller = CONTROLLER_NAME;
        $allow_list = array(
            'User_login',
            'User_logout',
            'User_check',
            'Index_verify',
        );
        $userid = $_SESSION['userid'];
        $c_a_name = $controller . '_' . $action;
        // if ($userid == '' && !in_array($c_a_name, $allow_list)) {
        //     $this->error('未登录','/Home/User/login',3);
        // }
    }


    /**
     * @description get请求
     * @author regan
     * @param url
     * @return json
     */
    public function getUrlMsg($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output, true);
    }

    /**
     * @description post请求
     * @author regan
     * @param url
     * @param data
     * @return json
     */
    public function postUrlMsg($url, $data)
    {
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
        curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']); // 读取上面所储存的Cookie信息
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo '	Errno' . curl_error($curl);
        }
        curl_close($curl); // 关键CURL会话
        return json_decode($tmpInfo, true); // 返回数据
    }
}