<?php


namespace Abotalebie\Sms\Messages;


class IPPanelPattern
{
    private $code;

    private $values;

    public function __construct($pattern_code, $values = [])
    {
        $this->code = $pattern_code;
        $this->values = [];

        if (count($values)) {
            foreach ($values as $key => $value) {
                $this->setValue($key, $value);
            }
        }
    }

    public function setValue($key, $value)
    {
        $this->values[$key] = (string) $value;
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