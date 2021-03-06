<?php
/**
 * YICMS
 * ============================================================================
 * 版权所有 2014-2017 北京智享乐通科技有限公司，并保留所有权利。
 * 网站地址: http://www.smart360.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Created by PhpStorm.
 * Author: kenuo
 * Date: 2017/10/12
 * Time: 下午11:53
 */

namespace App\Repositories;




use App\User;

class UsersRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function ById($id)
    {
        return User::find($id);
    }

    /**
     * @param $token
     * @return mixed
     */
    public function ByconfirmationToken($token)
    {
        return User::where('confirmation_token',$token)->first();
    }
}