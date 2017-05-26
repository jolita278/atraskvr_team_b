<?php

namespace App\Models;

class VRPagesTranslations extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_pages_translations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'page_id', 'language_id', 'title', 'description_short', 'description_long', 'slug'];

    public function pageData()
    {
        return $this->hasOne(VRPages::class, 'id', 'page_id');
    }

    public function languageData()
    {
        return $this->hasOne(VRLanguages::class, 'id', 'language_id');
    }



}
