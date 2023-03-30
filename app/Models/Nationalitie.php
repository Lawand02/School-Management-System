<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    use HasFactory;
    use HasTranslations;
    // I used translate in the table name 'Name'.
    public $translatable=['Name'];
    protected $fillable=['Name'];


}
