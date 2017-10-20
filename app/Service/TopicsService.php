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
 * Date: 2017/10/19
 * Time: 上午8:32
 */

namespace App\Service;


use App\Repositories\TopicsRepository;

class TopicsService
{
    protected $topicsRepository;

    /**
     * TopicsService constructor.
     * @param $topicsRepository
     */
    public function __construct(TopicsRepository $topicsRepository)
    {
        $this->topicsRepository = $topicsRepository;
    }

    /**
     * @param $param
     * @return mixed
     */
    public function topics($param)
    {
        return $this->topicsRepository->topics($param);
    }


    /**
     * 返回id格式数组
     * @param $topics
     * @return array
     */
    public function normalizeTopic($topics)
    {
        return collect($topics)->map(function ($topic) {

            if (is_numeric($topic)) {

                $topics = $this->topicsRepository->ById($topic);

                $topics->increment('questions_count');

                return (int) $topic;
            }

            $topics = $this->topicsRepository->ByName($topic);

            if(is_null($topics))
            {
                $newTopic = $this->topicsRepository->create([
                    'name'            => $topic,
                    'questions_count' => 1,
                ]);

                return $newTopic->id;
            }

            $topics->increment('questions_count');

            return $topics->id;

        })->toArray();
    }

}