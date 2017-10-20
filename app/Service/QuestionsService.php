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

use Auth;
use App\Repositories\QuestionsRepository;
use Illuminate\Support\Facades\DB;

class QuestionsService
{
    protected $questionsRepository;

    protected $topicsService;

    /**
     * QuestionsService constructor.
     * @param $questionsRepository
     */
    public function __construct(QuestionsRepository $questionsRepository, TopicsService $topicsService)
    {
        $this->questionsRepository = $questionsRepository;

        $this->topicsService = $topicsService;
    }


    /**
     * @param array $param
     * @return mixed
     */
    public function create(array $param)
    {
        $param['user_id'] = Auth::id();

        //话题
        $topics = $param['topics'];
        if (! empty($topics)) {
            $topics = $this->topicsService->normalizeTopic($topics);
        }

        $question = $this->questionsRepository->create($param);

        $question->topics()->attach($topics);

        return $question;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function ByIdWithTopics($id)
    {
        return $this->questionsRepository->ByIdWithTopics($id);
    }


    /**
     * 更新
     * @param $param
     * @param $id
     * @return mixed
     */
    public function update($param, $id)
    {
        $question = $this->questionsRepository->ByIdWithTopics($id);

        //话题
        $topics = $param['topics'];

        DB::transaction(function () use ($question, $topics, $param) {

            if (! empty($topics)) {
                $topics = $this->topicsService->normalizeTopic($topics);
            }

            $question->update($param);

            $question->topics()->sync($topics);
        });

        return $question;
    }
}