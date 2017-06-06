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
     * Returns menus translations data
     * @return mixed
     *
     */
    public function menusTranslationsData()
    {
        return $this->belongsToMany(VRLanguages::class, 'vr_menus_translations', 'menu_id', 'language_id')->withPivot('name');
    }

    /**
     * Returns menu translations data
     * where language_id is the same as
     * 5th segment of url
     * @return mixed
     */
    public function translationsData()
    {
        $languageCode = request()->segment(5);
        return $this->hasOne(VRMenusTranslations::class, 'menu_id', 'id')->where('language_id', $languageCode);
    }

    /**
     * Returns menu translations data
     * where language_id is the same as
     * locale language
     * @return mixed
     */
    public function translationsLang()
    {
        return $this->hasOne(VRMenusTranslations::class, 'menu_id', 'id')->where('language_id', app()->getLocale());
    }

    /**
     * Returns menu data where
     * menus have a parent menu
     * with translation data
     * @return mixed
     */
    public function children() {
        return $this->hasMany(VRMenus::class, 'parent', 'id')->with('translationsLang');
    }

    /**
     * Returns many translations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     */
    public function translations()
    {
        return $this->hasMany(VRMenusTranslations::class, 'menu_id', 'id');
    }
}
