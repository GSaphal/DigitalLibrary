<?php

namespace App\Http\Responses\Backend\Semester;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Semester\Semester
     */
    protected $semesters;

    /**
     * @param App\Models\Semester\Semester $semesters
     */
    public function __construct($semesters)
    {
        $this->semesters = $semesters;
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
        return view('backend.semesters.edit')->with([
            'semesters' => $this->semesters
        ]);
    }
}