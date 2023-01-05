<?php

namespace App\Http\Traits;

trait HasResponseNotification
{
    public function flashSuccess($message = 'Succeeded')
    {
        session()->flash('success', $message);
    }

    public function flashError($message = 'Failed')
    {
        session()->flash('error', $message);
    }
}
