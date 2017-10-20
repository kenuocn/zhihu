<?php
/**
 * YICMS
 * ============================================================================
 * 版权所有 2014-2017 YICMS，并保留所有权利。
 * 网站地址: http://www.yicms.vip
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Created by PhpStorm.
 * Author: kenuo
 * Date: 2017/10/17
 * Time: 下午9:02
 */

namespace App\Service;


use App\Repositories\UsersRepository;

/**
 * Class UserService
 * @package App\Service
 */
class UsersService
{
    /**
     * @var UsersRepository
     */
    protected $usersRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }


    /**
     * @param int $id
     * @return mixed
     */
    public function ById($id)
    {
        return $this->usersRepository->ById($id);
    }

    /**
     * @param $token
     * @return mixed
     */
    public function ByconfirmationToken($token)
    {
        return $this->usersRepository->ByconfirmationToken($token);
    }
}