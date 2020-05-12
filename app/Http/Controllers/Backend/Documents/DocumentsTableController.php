<?php

namespace App\Http\Controllers\Backend\Documents;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Documents\DocumentRepository;
use App\Http\Requests\Backend\Documents\ManageDocumentRequest;

/**
 * Class DocumentsTableController.
 */
class DocumentsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DocumentRepository
     */
    protected $document;

    /**
     * contructor to initialize repository object
     * @param DocumentRepository $document;
     */
    public function __construct(DocumentRepository $document)
    {
        $this->document = $document;
    }

    /**
     * This method return the data of the model
     * @param ManageDocumentRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDocumentRequest $request)
    {
        return Datatables::of($this->document->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($document) {
                return Carbon::parse($document->created_at)->toDateString();
            })
            ->addColumn('actions', function ($document) {
                return $document->action_buttons;
            })
            ->make(true);
    }
}
