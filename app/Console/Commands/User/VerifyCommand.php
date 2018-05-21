<?php

namespace Board\Console\Commands\User;

use Board\UseCases\Auth\RegisterService;
use Board\Entity\User;
use Illuminate\Console\Command;

class VerifyCommand extends Command
{
    protected $signature = 'user:verify {email}';

    protected $description = 'Verify existing user.';

    private $service;

    public function __construct(RegisterService $s)
    {
        parent::__construct();
        $this->service = $s;
    }

    public function handle(): bool
    {
        $email = $this->argument('email');

        if (!$user = User::where('email', $email)->first()) {
            $this->error('Undefined user with email ' . $email);
            return false;
        }

        try {
            $this->service->verify($user->id);
        } catch (\DomainException $e) {
            $this->error($e->getMessage());
            return false;
        }

        $this->info('User is successfully verified');
        return true;
    }
}
