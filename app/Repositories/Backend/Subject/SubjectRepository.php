<?php

namespace App\Repositories\Backend\Subject;

use DB;
use Carbon\Carbon;
use App\Models\Subject\Subject;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubjectRepository.
 */
class SubjectRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Subject::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.subjects.table').'.id',
                config('module.subjects.table').'.created_at',
                config('module.subjects.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Subject::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.subjects.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Subject $subject
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Subject $subject, array $input)
    {
    	if ($subject->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.subjects.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Subject $subject
     * @throws GeneralException
     * @return bool
     */
    public function delete(Subject $subject)
    {
        if ($subject->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.subjects.delete_error'));
    }
}
