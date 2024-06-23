<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MVocabulary extends Model
{
    use HasFactory;

    protected $table = 'vocabularies';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['course', 'japanese', 'vietnamese', 'wr_answer1', 'wr_answer2', 'wr_answer3', 'image'];

    public $rules = [
        'course' => 'integer|required',
        'japanese' => 'required',
        'vietnamese' => 'required',
        'wr_answer1' => 'required',
        'wr_answer2' => 'required',
        'wr_answer3' => 'required'
    ];
}
