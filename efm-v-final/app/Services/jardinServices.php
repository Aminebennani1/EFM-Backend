<?php

namespace App\Services;

use App\Models\jardin;
use App\Models\jardinier;

class jardinServices
{

    public function createjardin(array $data)
    {
        return  jardin::create($data);
    }

    public function updatejardin(array $data, $jardin)
    {
        $exactjardin = jardin::findOrFail($jardin);
        return $exactjardin->update($data);
    }

    public function deletejardin($jardin)
    {
        $exactjardin = jardin::findOrFail($jardin);
        return $exactjardin->delete();
    }

    public function getExactjardin($jardin)
    {
        return jardin::findOrFail($jardin);
    }

    public function getPagination($query, $number){
        return $query->paginate($number);
    }

    public function getlatest()
    {
        return jardin::latest();
    }

    // public function serching($query,$searchTeam){
    //     return $query->where('name', 'like', '%' . $ser)
    // }

    public function filterById($query){
        return $query->where('jardinier_id' , '1');
    }

    public function getAlljardiniers()
    {
        return jardinier::all();
    }
}
