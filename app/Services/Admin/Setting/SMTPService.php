<?php

namespace App\Services\Admin\Setting;

class SMTPService
{
    public function execute(object $request): bool
    {
        checkSetEnv('MAIL_HOST', $request->host);
        checkSetEnv('MAIL_PORT', $request->port);
        checkSetEnv('MAIL_USERNAME', $request->username);
        checkSetEnv('MAIL_PASSWORD', $request->password);
        checkSetEnv('MAIL_ENCRYPTION', $request->encryption);
        checkSetEnv('MAIL_FROM_NAME', $request->from_name);
        checkSetEnv('MAIL_FROM_ADDRESS', $request->from_address);

        return true;
    }
}
