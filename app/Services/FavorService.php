<?php

namespace App\Services;


use App\Events\ChangeStatusEvent;
use App\Events\ChangeStatusOfModifiedEvent;
use App\Models\Favor;
use App\Models\Transport;

class FavorService
{
    public function create(array $data): Favor
    {
        $favor = new Favor($data);
        $favor->transport()->associate($data['transport']);
        $favor->save();

        return $favor;
    }

    public function update(Favor $favor, array $data)
    {
        $favor->fill($data);

        if (!empty($data['transport'])) {
            $favor->transport()->associate($data['transport']);
        }

        $favor->save();
    }

    public function delete(Favor $favor)
    {
        $favor->delete();
    }
}
