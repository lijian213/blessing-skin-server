<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Texture extends Model
{
    public $primaryKey = 'tid';
    public $timestamps = false;

    public static function checkTextureOccupied($tid)
    {
        $skin_type_map = ["steve", "alex", "cape"];
        for ($i = 0; $i <= 2; $i++) {
            if (Player::where('tid_'.$skin_type_map[$i], $tid)->count() > 0)
                return true;
        }
        return false;
    }

    public function setPrivacy($public)
    {
        $this->public = $public ? "1" : "0";
        return $this->save();
    }

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }
}
