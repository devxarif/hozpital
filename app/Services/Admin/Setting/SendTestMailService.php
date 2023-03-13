<?php

namespace App\Services\Admin\Setting;

use App\Mail\Admin\SmtpTestMail;
use Illuminate\Support\Facades\Mail;

class SendTestMailService
{
    public function execute(object $request): bool
    {
        $request->validate(['email' => ['required', 'email']]);
        Mail::to(request()->test_email)->send(new SmtpTestMail);

        return true;
    }
}
