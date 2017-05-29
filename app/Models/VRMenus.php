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
        return $this->belongsToMany(VRMenusTranslations::class, 'pm_pizza_ingredients_conn', 'pizza_id', 'ingredients_id');
    }
}
