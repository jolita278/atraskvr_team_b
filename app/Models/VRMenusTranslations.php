<?php

namespace App\Models;


class VRMenusTranslations extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_menus_translations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'menu_id', 'language_id', 'name', 'slug'];


    public function translation()
    {
        return $this->hasOne(VRLanguages::class, 'id', 'language_id');
    }

    public function pageData()
    {
        return $this->hasOne(VRMenus::class, 'id', 'menu_id');
    }
}

