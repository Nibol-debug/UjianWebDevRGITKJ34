<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seles extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'total',
    ];

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }
}
