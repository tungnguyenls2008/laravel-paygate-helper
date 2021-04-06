<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Test
 * @package App\Models
 * @version April 6, 2021, 9:32 am UTC
 *
 * @property string $string
 * @property integer $number
 * @property boolean $boolean
 */
class Test extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tests';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'string',
        'number',
        'boolean'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'string' => 'string',
        'number' => 'integer',
        'boolean' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'string' => 'max:64'
    ];

    
}
