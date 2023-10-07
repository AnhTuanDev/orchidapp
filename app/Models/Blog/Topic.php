<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Topic extends Model
{
    use HasFactory, Filterable, AsSource, Attachable;

    protected $table    = 'topics';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'thumbnail',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    protected $casts = [

        'thumbnail' => 'array',

    ];

    protected $allowedSorts = [

        'id',
        'name',
        'slug'

    ];

    protected $allowedFilters = [
        'name',
        'slug'
    ];

}
