<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorySK extends Model
{
    use HasFactory;
    protected $table = 'history_sk';
    protected $guarded = ['id'];
}
