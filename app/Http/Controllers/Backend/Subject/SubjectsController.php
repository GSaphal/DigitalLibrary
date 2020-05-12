<?php

namespace App\Http\Controllers\Backend\Subject;

use App\Models\Subject\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Subject\CreateResponse;
use App\Http\Responses\Backend\Subject\EditResponse;
use App\Repositories\Backend\Subject\SubjectRepository;
use App\Http\Requests\Backend\Subject\ManageSubjectRequest;
use App\Http\Requests\Backend\Subject\CreateSubjectRequest;
use App\Http\Requests\Backend\Subject\StoreSubjectRequest;
use App\Http\Requests\Backend\Subject\EditSubjectRequest;
use App\Http\Requests\Backend\Subject\UpdateSubjectRequest;
use App\Http\Requests\Backend\Subject\DeleteSubjectRequest;

/**
 * SubjectsController
 */
class SubjectsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubjectRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SubjectRepository $repository;
     */
    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Subject\ManageSubjectRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSubjectRequest $request)
    {
        return new ViewResponse('backend.subjects.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSubjectRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subject\CreateResponse
     */
    public function create(CreateSubjectRequest $request)
    {
        return new CreateResponse('backend.subjects.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubjectRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSubjectRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.subjects.index'), ['flash_success' => trans('alerts.backend.subjects.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Subject\Subject  $subject
     * @param  EditSubjectRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subject\EditResponse
     */
    public function edit(Subject $subject, EditSubjectRequest $request)
    {
        return new EditResponse($subject);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubjectRequestNamespace  $request
     * @param  App\Models\Subject\Subject  $subject
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $subject, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.subjects.index'), ['flash_success' => trans('alerts.backend.subjects.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSubjectRequestNamespace  $request
     * @param  App\Models\Subject\Subject  $subject
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Subject $subject, DeleteSubjectRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($subject);
        //returning with successfull message
        return new RedirectResponse(route('admin.subjects.index'), ['flash_success' => trans('alerts.backend.subjects.deleted')]);
    }
    
}
