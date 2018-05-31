<?php

namespace Board\Console\Commands\User;

use Board\Entity\Adverts\Advert\Advert;
use Board\UseCases\Adverts\AdvertService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class ExpireCommand extends Command
{
    protected $signature = 'advert:expire';

    private $service;

    public function __construct(AdvertService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): bool
    {
        $success = true;

        foreach (Advert::active()->where('expired_at', '<', Carbon::now())->cursor() as $advert) {
            try {
                $this->service->expire($advert);
            } catch (\DomainException $e) {
                $this->error($e->getMessage());
                $success = false;
            }
        }

        return $success;
    }
}
