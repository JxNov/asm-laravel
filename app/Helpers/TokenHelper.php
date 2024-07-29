<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class TokenHelper
{
    /**
     * Mã hóa token và email thành một chuỗi.
     *
     * @param  string  $token
     * @param  string  $email
     * @return string
     */
    public static function encrypt($token, $email)
    {
        $data = [
            'token' => $token,
            'email' => $email,
        ];

        return Crypt::encryptString(json_encode($data));
    }

    /**
     * Giải mã chuỗi để lấy token và email.
     *
     * @param  string  $encryptedData
     * @return array|null
     */
    public static function decrypt($encryptedData)
    {
        try {
            $data = json_decode(Crypt::decryptString($encryptedData), true);
            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }
}
