<?php

namespace App\Models;


class VRPages extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_pages';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'resource_id'];


    public function translationsData()
    {
        $languageCode = request()->segment(5);
        return $this->hasOne(VRPagesTranslations::class, 'page_id', 'id')->where('language_id', $languageCode);

    }

    public function translations()
    {
        return $this->belongsToMany(VRPagesTranslations::class, 'vr_pages_translations', 'page_id', 'language_id');

    }

    public function resourcesConnectionData()
    {
        return $this->belongsToMany(VRResources::class, 'vr_pages_resources_conn', 'page_id', 'resource_id');
    }

    public function coverImages()
    {
        return $this->hasOne(VRResources::class, 'id', 'resource_id');
    }

    public function categoryPageData()
    {
        return $this->hasOne(VRCategories::class, 'id', 'category_id');
    }

    public function translationsInfo()
    {
        return $this->hasMany(VRPagesTranslations::class, 'page_id', 'id');
    }
//    public function experienceTranslations()
//    {
//        return $this->belongsToMany(VRlanguages::class, 'vr_pages_translations', 'page_id', 'language_id' )->withPivot('title');
//    }
}

