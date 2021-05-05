<?php


namespace Abotalebie\Sms;




class Sms
{
    public static function send($recipients, $text)
    {
        $provider = config('sms.default');
        $class = $provider['provider'];
        $helper = new \Abotalebie\Sms\Providers\MaxSms($provider['username'], $provider['password'], $provider['number']);
        $helper->send($recipients, $text);
    }
}