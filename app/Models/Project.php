<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    public $table = 'projects';


    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'short_description',
        'phase',
        'uid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
