<?php

namespace App\Http\Responses\Backend\Subject;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Subject\Subject
     */
    protected $subjects;

    /**
     * @param App\Models\Subject\Subject $subjects
     */
    public function __construct($subjects)
    {
        $this->subjects = $subjects;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.subjects.edit')->with([
            'subjects' => $this->subjects
        ]);
    }
}