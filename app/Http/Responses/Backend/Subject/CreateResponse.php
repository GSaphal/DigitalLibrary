<?php

namespace App\Http\Responses\Backend\Subject;
use App\Models\Semester\Semester;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {     
        $semester=Semester::pluck('id','name');
        return view('backend.subjects.create',["semester"=>$semester]);
    }
}