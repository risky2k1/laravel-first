<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug'];
    function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
