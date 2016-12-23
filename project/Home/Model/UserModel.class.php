<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/23
 * Time: 17:24
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $insertFields = array('account','password','nickname','email');
    protected $updateFields = array('nickname','email');
}