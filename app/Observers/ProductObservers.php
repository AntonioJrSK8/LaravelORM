<?php
namespace App\Observers;

class ProductObservers
{
    public function created()
    {
        \Log::info('Observers created');

    }

    public function saving()
    {

        \Log::info('Observers saving');

    }
}
