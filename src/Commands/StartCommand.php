<?php

namespace Gmlo\CMS\Commands;

use Gmlo\CMS\Modules\Users\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class StartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start CMS.';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('*********************************');
        $this->info('Thanks for install Simple CMS.');
        $this->info('Created by @gmlo_89');
        $this->info('*********************************');

        while(!$this->createUser())
        {
        }

        $this->info('CMS Started!');
    }

    protected function createUser()
    {
        $data = [];
        $data['name'] = $this->ask('Whats your name?');
        $data['email'] = $this->ask('Whats your e-mail?');
        $data['password'] = $this->secret('Set password');
        $data['password_confirmation'] = $this->secret('Set password again');

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:cms_users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails())
        {
            foreach($validator->errors()->all() as $error)
            {
                $this->error('Error: ' . $error);
            }
            $this->info('--------------------------------------');
            return false;
        }
        $data['type'] = 'suadmin';
        $data['password'] = \Hash::make($data['password']);

        User::create($data);

        return true;
    }
}
