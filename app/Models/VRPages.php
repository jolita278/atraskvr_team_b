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
        return $this->hasMany(VRPagesTranslations::class, 'page_id', 'id')->with('languageData');
    }

    public function resourcesConnectionData()
    {
        return $this->belongsToMany(VRResources::class, 'vr_pages_resources_conn', 'page_id', 'resource_id');
    }

    public function categoryPageData()
    {
        return $this->hasOne(VRCategories::class, 'id', 'category_id');
    }
}

