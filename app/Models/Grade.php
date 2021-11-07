<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @property array|mixed $Name
 * @property mixed $Notes
 * @method static findOrFail(mixed $id)
 */
class Grade extends Model
{

    use HasTranslations;
    public $translatable = ['Name'];


    protected $table = 'Grades';
    public $timestamps = true;
    protected $fillable = ['Name', 'Notes'];


    public function Classrooms(): HasMany
    {

        return $this->hasMany(Classroom::class);
    }

}
