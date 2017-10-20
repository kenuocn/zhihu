<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\StoreQuestionRequest;
use App\Service\QuestionsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    protected $questionsService;

    /**
     * QuestionsController constructor.
     * @param $questionsService
     */
    public function __construct(QuestionsService $questionsService)
    {
        $this->middleware('auth')->except(['index', 'show']);  //允许不用登录查看

        $this->questionsService = $questionsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreQuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = $this->questionsService->create($request->all());

        if (is_null($question)) return redirect('/');

        return redirect()->route('questions.show', [$question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->questionsService->ByIdWithTopics($id);

        if (is_null($question)) return redirect('/');

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questionsService->ByIdWithTopics($id);

        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreQuestionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, $id)
    {
        $question = $this->questionsService->update($request->all(),$id);

        return redirect()->route('questions.show', [$question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
