<?php

namespace App\Models;


class VROrdersReservations extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_orders_reservations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['order_id', 'page_experience_id'];
}
