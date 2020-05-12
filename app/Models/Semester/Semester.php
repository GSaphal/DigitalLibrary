<?php

namespace App\Models\Semester;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semester\Traits\SemesterAttribute;
use App\Models\Semester\Traits\SemesterRelationship;

class Semester extends Model
{
    use ModelTrait,
        SemesterAttribute,
    	SemesterRelationship {
            // SemesterAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'semesters';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name'

    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
