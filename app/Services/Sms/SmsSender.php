<?php

namespace Board\Services\Sms;

interface SmsSender
{
    public function send($number, $text): void;
}