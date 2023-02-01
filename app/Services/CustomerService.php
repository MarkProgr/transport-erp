<?php

namespace App\Services;

use App\Events\ChangeStatusEvent;
use App\Events\ChangeStatusOfModifiedEvent;
use App\Models\Customer;
use App\Models\Favor;

class CustomerService
{
    public function create(array $data): Customer
    {
        $customer = new Customer($data);

        $customer->save();

        $customer->favors()->attach($data['favors']);

        foreach ($data['favors'] as $favorId) {
            $favor = Favor::query()->findOrFail($favorId);
            ChangeStatusEvent::dispatch($favor);
        }

        return $customer;
    }

    public function update(Customer $customer, array $data)
    {
        $customer->fill($data);

        if ($data['status_of_deal'] === 'Done') {
            foreach ($customer->favors as $favor) {
                ChangeStatusOfModifiedEvent::dispatch($favor);
            }
        } else {
            foreach ($data['favors'] as $favorId) {
                $customersFavor = $customer->favors->find($favorId);

                if (!$customersFavor) {
                    $favor = Favor::query()->findOrFail($favorId);

                    ChangeStatusEvent::dispatch($favor);
                }
            }

            foreach ($customer->favors as $oldFavor) {
                if (!in_array($oldFavor->id, $data['favors'])) {
                    ChangeStatusOfModifiedEvent::dispatch($oldFavor);
                }
            }
        }

        $customer->favors()->sync($data['favors']);
        $customer->save();
    }

    public function delete(Customer $customer)
    {
        foreach ($customer->favors as $favor) {
            ChangeStatusOfModifiedEvent::dispatch($favor);
        }

        $customer->delete();
    }
}
