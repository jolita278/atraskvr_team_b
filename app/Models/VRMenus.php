<?php

namespace App\Models;


class VRMenus extends CoreModel

{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_menus';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'new_window', 'sequence', 'parent'];

    /**
     * Returns Ingredients data
     * @return mixed
     *
     */
    public function menusTranslationsData()
    {
        return $this->belongsToMany(VRLanguages::class, 'vr_menus_translations', 'menu_id', 'language_id');
    }
    public function translationsData()
    {
        if(request()->segment(5)){
            $languageCode = request()->segment(5);
        }


        //dd($languageCode);
        return $this->hasOne(VRMenusTranslations::class, 'menu_id', 'id')->where('language_id', $languageCode);
    }
}
