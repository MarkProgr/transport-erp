<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\Transport;

class DriverService
{
    public function create(array $data)
    {
        $driver = new Driver($data);

        $driver->transport()->associate($data['transport']);
        $driver->save();

        return $driver;
    }

    public function update(Driver $driver, array $data)
    {
        $driver->fill($data);

        $driver->transport()->associate($data['transport']);

        $driver->save();
    }

    public function delete(Driver $driver)
    {
        $driver->delete();
    }
}
