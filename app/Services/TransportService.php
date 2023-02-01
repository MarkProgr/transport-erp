<?php

namespace App\Services;

use App\Models\Transport;

class TransportService
{
    public function create(array $data): Transport
    {
        $transport = new Transport($data);
        $transport->save();

        return $transport;
    }

    public function update(Transport $transport, array $data): void
    {
        $transport->fill($data);
        $transport->save();
    }

    public function delete(Transport $transport): void
    {
        $transport->delete();
    }
}
