<?php

namespace App\Http\Controllers\Backend\Subject;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Subject\SubjectRepository;
use App\Http\Requests\Backend\Subject\ManageSubjectRequest;

/**
 * Class SubjectsTableController.
 */
class SubjectsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubjectRepository
     */
    protected $subject;

    /**
     * contructor to initialize repository object
     * @param SubjectRepository $subject;
     */
    public function __construct(SubjectRepository $subject)
    {
        $this->subject = $subject;
    }

    /**
     * This method return the data of the model
     * @param ManageSubjectRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSubjectRequest $request)
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
