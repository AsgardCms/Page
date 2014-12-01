<?php namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $fillable = [
        'page_id',
        'title',
        'slug',
        'status',
        'body',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'og_type'
    ];
}