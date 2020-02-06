<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function contacts()
    {
        $this->hasMany(Contact::class);
    }
}
