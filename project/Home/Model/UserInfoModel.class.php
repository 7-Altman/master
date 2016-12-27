<?php
/**
 * Created by PhpStorm.
 * User: 13507
 * Date: 2016/12/27
 * Time: 11:06
 */
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $insertFields = array('name', 'age', 'gender', 'province', 'city', 'area', 'address', 'remark');
    protected $updateFields = array('name', 'age', 'gender', 'province', 'city', 'area', 'address', 'remark');
}