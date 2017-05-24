<?php

namespace App\Models;

class VRCategoriesTranslations extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_categories_translations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'category_id', 'language_id', 'name', 'slug'];


    public function categoryData()
    {
        return $this->hasOne(VRCategories::class, 'id','category_id');
    }

    public function languageData()
    {
        return $this->hasOne(VRLanguages::class,'id','language_id');
    }

}
