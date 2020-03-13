<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertice extends Model
{
    public $timestamps = false;

    public $label = [];

    protected $appends = ['label'];

    public function getLabelAttribute(){
        return $this->label;
    }

}
