<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Casts\TextTitleCast;

class Issue extends Model
{
    protected $table = 'issues';

    protected $fillable = [
        'first_name', 'lastName', 'age', 'is_male', 'options',
    ];

    // cast sẽ thực hiện convert data lấy từ db sang model.
    // accessor thì convert dữ liệu khi field đó được gọi.
    // cast hoạt động cả với seeder
    protected $casts = [
        'first_name' => TextTitleCast::class,
        'lastName' => TextTitleCast::class,
        'is_male' => 'boolean',
        'age' => 'integer',
        'options' => 'array',
    ];

    // accessor cho 1 field snake_case
    public function getFirstNameAttribute($value){        
        return strtoupper($value);
    }

    // accessor cho 1 field titleCase
    public function getLastNameAttribute($value){        
        return Str::title($value);
    }
}
