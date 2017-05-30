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
        return $this->hasOne(VRMenusTranslations::class, 'id', 'menu_id');
    }

    public function translationsData()
    {
        $languageCode = request()->segment(5);

        return $this->hasOne(VRMenusTranslations::class, 'menu_id', 'id')->where('language_id', $languageCode);
    }
}
