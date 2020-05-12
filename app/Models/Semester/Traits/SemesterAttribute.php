<?php

namespace App\Models\Semester\Traits;

/**
 * Class SemesterAttribute.
 */
trait SemesterAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
        $this->getEditButtonAttribute('edit-blog', 'admin.semesters.edit').
        $this->getDeleteButtonAttribute('delete-blog', 'admin.semesters.destroy').
        '</div>';
      
    }
}
