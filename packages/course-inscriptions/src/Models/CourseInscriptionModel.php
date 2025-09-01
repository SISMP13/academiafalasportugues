<?php

namespace Bittacora\CourseInscriptions\Models;

use Bittacora\Content\Models\ContentModel;
use Bittacora\Courses\Models\CourseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseInscriptionModel extends Model
{
    use HasFactory;

    protected $table = "course_inscriptions";

    protected $guarded = ['save'];

    protected $with = ['content'];

    public function content()
    {
        return $this->morphOne(ContentModel::class, 'model');
    }

    //Relaciones con los cursos
  /*  public function course(): BelongsTo
    {
        return $this->belongsTo(CourseModel::class,'course_id');
    }*/


    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseModel::class, 'course_id', 'id');
    }


}
