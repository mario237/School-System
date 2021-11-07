<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * @property array|mixed $Name_Class
 * @property mixed $Grade_id
 * @method static create(array $array)
 * @method static findOrFail($id)
 * @method static where(string $string, $id)
 * @method static whereIn(string $string, false|string[] $delete_all_id)
 * @method static select(string $string)
 */
class Classroom extends Model
{

    use HasTranslations;
    public $translatable = ['Name_Class'];

    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $fillable = ['Name_Class' , 'Grade_Id'];

    public function Grades(): BelongsTo
    {
        return $this->belongsTo(Grade::class , 'Grade_id');
    }

}
