<?php

namespace Bittacora\CourseInscriptions\Models;

use Bittacora\Courses\Models\CourseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseInscriptionModel extends Model
{
    use HasFactory;

    protected $table = "course_inscriptions";

    protected $guarded = ['save'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }
}
