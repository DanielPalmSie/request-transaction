<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function saveOrder($id, $status)
    {
        $this->order_id = $id;
        $this->status = $status;
        $this->save();


    }

}
