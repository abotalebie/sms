<?php


namespace Abotalebie\Sms\Providers;


class MaxSms
{
    private $username;

    private $password;

    private $number;

    private $url = "https://ippanel.com/services.jspd";

    public function __construct($username, $password, $number)
    {
        $this->username = $username;
        $this->password = $password;
        $this->number = $number;
    }

    public function send($recipients, $body)
    {
        $param = [
            'uname' => $this->username,
            'pass' => $this->password,
            'from' => $this->number,
            'message' => $body,
            'to' => json_encode(is_array($recipients) ? $recipients : [$recipients]),
            'op' => 'send'
        ];

        $handler = curl_init($this->url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);

        if ($response2[0]) {
            throw new \Exception('ارسال پیامک با خطا مواجه شد. کد خطا ' . $response2[0]);
        }

        return $response2[1];
    }
}