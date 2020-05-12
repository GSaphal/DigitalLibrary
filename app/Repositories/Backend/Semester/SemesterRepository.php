<?php

namespace App\Repositories\Backend\Semester;

use DB;
use Carbon\Carbon;
use App\Models\Semester\Semester;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SemesterRepository.
 */
class SemesterRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Semester::class;

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
                config('module.semesters.table').'.id',
                config('module.semesters.table').'.created_at',
                config('module.semesters.table').'.updated_at',
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
        if (Semester::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.semesters.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Semester $semester
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Semester $semester, array $input)
    {
    	if ($semester->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.semesters.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Semester $semester
     * @throws GeneralException
     * @return bool
     */
    public function delete(Semester $semester)
    {
        if ($semester->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.semesters.delete_error'));
    }
}
