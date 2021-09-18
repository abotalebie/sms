<?php


namespace Abotalebie\Sms\Providers;


use Abotalebie\Sms\Messages\IPPanelPattern;

class IPPanel
{
    private $api_key;

    private $number;

    public function __construct($api_key, $number)
    {
        $this->api_key = $api_key;
        $this->number = $number;
    }

    public function send($recipients, $body)
    {
        $client = new \IPPanel\Client($this->api_key);

        try {
            if ($body instanceof IPPanelPattern) {
                $bulkID = $client->sendPattern(
                    $body->getCode(),
                    $this->number,
                    $recipients,
                    $body->getValues()
                );
            } elseif (is_string($body)) {
                $bulkID = $client->send(
                    $this->number,
                    $recipients,
                    $body
                );
            }
        } catch (\Exception $exception) {
            throw new \Exception('ارسال پیام با خطا مواجه شد.', $exception->getCode());
        }

        return $bulkID;
    }
}