<?php


namespace Abotalebie\Sms;




class Sms
{
    public static function send($recipients, $text)
    {
        $provider = config('sms.default');
        $config = config('sms.providers')[$provider];
        $class = "\Abotalebie\Sms\Providers\\" . $config['provider'];

        $helper = $config['provider'] === 'ippanel'
            ? new $class($config['api_key'], $config['number'])
            : new $class($config['username'], $config['password'], $config['number']);

        $helper->send($recipients, $text);
    }
}