<?php

namespace App\Http\Responses\Backend\Documents;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Documents\Document
     */
    protected $documents;

    /**
     * @param App\Models\Documents\Document $documents
     */
    public function __construct($documents)
    {
        $this->documents = $documents;
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
        return view('backend.documents.edit')->with([
            'documents' => $this->documents
        ]);
    }
}