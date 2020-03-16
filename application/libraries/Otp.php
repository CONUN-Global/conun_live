<?php
require_once __DIR__ . '/GoogleOTP/PHPGangsta_GoogleAuthenticator.php';

class Otp extends PHPGangsta_GoogleAuthenticator {
    // --------------------------------------------------------------------

    /**
     * @return array
     */
    public function ci_generator($email,$site_name)
    {
        /**@type REVV_Controller $_CI */
        $_CI = get_instance();
        try {
            $secret_key = $this->createSecret();
        }
        catch (Exception $exception) {
            return ['error' => $exception->getMessage()];
        }
        $cookie_name = md5('OTP-SECRET-KEY');
        $_CI->cache ? $_CI->cache->save('OTP-SECRET-KEY', $secret_key, 300) : setcookie($cookie_name, $secret_key, time() + 300, '/');
        $returnValue = [
            'verifyURL' => "{$_CI->vars['BASE_URL']}account/validate/otp/{$email}/"
            , 'secretKey' => $secret_key
            , 'qrCode' => $this->getQRCodeGoogleUrl($email, $secret_key, $site_name)
        ];

        return $returnValue;
    }

    // --------------------------------------------------------------------

    /**
     * @return bool|mixed
     */
    public function ci_verify($secret_key,$codeValue)
    {
        /**@type REVV_Controller $_CI */
        $_CI = get_instance();

        $cookie_name = md5('OTP-SECRET-KEY');
         

        if (empty($secret_key) === TRUE) {
            return FALSE;
        }
        for ($i = 0; $i < 3; $i++) {
            if ($this->verifyCode($secret_key, $codeValue) !== FALSE) return $secret_key;
            usleep(100);
        }

        return FALSE;
    }

}
