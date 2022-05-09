<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'img',
    ];

    public function user(){
        return $this->belongsTo(Page::class);
    }

    public function catgory(){
        return $this->belongsTo(Category::class);
    }
}
