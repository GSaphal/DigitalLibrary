<?php

namespace App\Http\Controllers\Backend\Semester;

use App\Models\Semester\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Semester\CreateResponse;
use App\Http\Responses\Backend\Semester\EditResponse;
use App\Repositories\Backend\Semester\SemesterRepository;
use App\Http\Requests\Backend\Semester\ManageSemesterRequest;
use App\Http\Requests\Backend\Semester\CreateSemesterRequest;
use App\Http\Requests\Backend\Semester\StoreSemesterRequest;
use App\Http\Requests\Backend\Semester\EditSemesterRequest;
use App\Http\Requests\Backend\Semester\UpdateSemesterRequest;
use App\Http\Requests\Backend\Semester\DeleteSemesterRequest;

/**
 * SemestersController
 */
class SemestersController extends Controller
{
    /**
     * variable to store the repository object
     * @var SemesterRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SemesterRepository $repository;
     */
    public function __construct(SemesterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Semester\ManageSemesterRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSemesterRequest $request)
    {
        return new ViewResponse('backend.semesters.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSemesterRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Semester\CreateResponse
     */
    public function create(CreateSemesterRequest $request)
    {
        return new CreateResponse('backend.semesters.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSemesterRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSemesterRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.semesters.index'), ['flash_success' => trans('alerts.backend.semesters.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Semester\Semester  $semester
     * @param  EditSemesterRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Semester\EditResponse
     */
    public function edit(Semester $semester, EditSemesterRequest $request)
    {
        return new EditResponse($semester);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSemesterRequestNamespace  $request
     * @param  App\Models\Semester\Semester  $semester
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $semester, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.semesters.index'), ['flash_success' => trans('alerts.backend.semesters.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSemesterRequestNamespace  $request
     * @param  App\Models\Semester\Semester  $semester
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Semester $semester, DeleteSemesterRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($semester);
        //returning with successfull message
        return new RedirectResponse(route('admin.semesters.index'), ['flash_success' => trans('alerts.backend.semesters.deleted')]);
    }
    
}
