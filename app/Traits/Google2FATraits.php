<?php

namespace App\Traits;

use PragmaRX\Google2FA\Google2FA;

trait Google2FATraits
{
    public function generateGoogleSecretKey()
    {
        $google2fa = new Google2FA();
        return $google2fa->generateSecretKey(32);
    }
}
