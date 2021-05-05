<?php


namespace Abotalebie\Sms;




class Sms
{
    public static function send($recipients, $text)
    {
        $provider = config('sms.default');
        $class = "\Abotalebie\Sms\Providers\\" . $provider['provider'];
        $helper = new $class($provider['username'], $provider['password'], $provider['number']);
        $helper->send($recipients, $text);
    }
}