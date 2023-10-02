<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'mobile',
        'code_number_id',
        'instagram',
        'website',
        'country',
        'city',
        'other_number',
        'description',
        'user_id',
    ];

    public function countries()
    {
        return $this->belongsTo(Countries::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
