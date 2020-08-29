<?php

namespace API\Platform\Models;

use Eloquent as Model;

class Table extends Model
{

    public $table = 'tables';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'language' => 'nullable|string|min:2|max:2',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
