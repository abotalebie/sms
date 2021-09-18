<?php


namespace Abotalebie\Sms\Messages;


class IPPanelPattern
{
    private $code;

    private $values;

    public function __construct($pattern_code, $values = [])
    {
        $this->code = $pattern_code;
        $this->values = $values;
    }

    public function setValue($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getValues()
    {
        return $this->values;
    }
}