<?php

namespace App\Http\Controllers\Backend\Documents;

use App\Models\Documents\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Documents\CreateResponse;
use App\Http\Responses\Backend\Documents\EditResponse;
use App\Repositories\Backend\Documents\DocumentRepository;
use App\Http\Requests\Backend\Documents\ManageDocumentRequest;
use App\Http\Requests\Backend\Documents\CreateDocumentRequest;
use App\Http\Requests\Backend\Documents\StoreDocumentRequest;
use App\Http\Requests\Backend\Documents\EditDocumentRequest;
use App\Http\Requests\Backend\Documents\UpdateDocumentRequest;
use App\Http\Requests\Backend\Documents\DeleteDocumentRequest;

/**
 * DocumentsController
 */
class DocumentsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DocumentRepository $repository;
     */
    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Documents\ManageDocumentRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDocumentRequest $request)
    {
        return new ViewResponse('backend.documents.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDocumentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Documents\CreateResponse
     */
    public function create(CreateDocumentRequest $request)
    {
        return new CreateResponse('backend.documents.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDocumentRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDocumentRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Documents\Document  $document
     * @param  EditDocumentRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Documents\EditResponse
     */
    public function edit(Document $document, EditDocumentRequest $request)
    {
        return new EditResponse($document);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDocumentRequestNamespace  $request
     * @param  App\Models\Documents\Document  $document
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $document, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDocumentRequestNamespace  $request
     * @param  App\Models\Documents\Document  $document
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Document $document, DeleteDocumentRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($document);
        //returning with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.deleted')]);
    }
    
}
