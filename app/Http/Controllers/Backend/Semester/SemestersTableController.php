<?php

namespace App\Http\Controllers\Backend\Semester;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Semester\SemesterRepository;
use App\Http\Requests\Backend\Semester\ManageSemesterRequest;

/**
 * Class SemestersTableController.
 */
class SemestersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SemesterRepository
     */
    protected $semester;

    /**
     * contructor to initialize repository object
     * @param SemesterRepository $semester;
     */
    public function __construct(SemesterRepository $semester)
    {
        $this->semester = $semester;
    }

    /**
     * This method return the data of the model
     * @param ManageSemesterRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSemesterRequest $request)
    {
        return Datatables::of($this->subject->getForDataTable())
        ->escapeColumns(['id'])
        ->addColumn('created_at', function ($subject) {
            return Carbon::parse($subject->created_at)->toDateString();
        })
        ->addColumn('actions', function ($subject) {
            return $subject->action_buttons;
        })
        ->make(true);
    }
}
