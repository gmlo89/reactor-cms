<?php

namespace Gmlo\CMS\Commands;

use Gmlo\CMS\Modules\Articles\Article;
use Gmlo\CMS\Modules\Categories\Category;
use Gmlo\CMS\Modules\Users\User;
use Gmlo\CMS\Providers\CMSServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
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

        $this->info('Publish files...');

        Artisan::call('vendor:publish');

        if ($this->confirm('You want to create and run the migrations? [y|N]'))
        {
            $this->migrations();
        }

        if ($this->confirm('You want to create a new user? [y|N]'))
        {
            while (!$this->createUser()){}
        }

        if ($this->confirm('You want to create a demo site? [y|N]'))
        {
            $this->makeDemoSite();
        }

        $this->info('CMS Started!');
    }

    protected function makeDemoSite()
    {
        factory(User::class, 'cms_site_demo', 5)->create();
        factory(Category::class, 'cms_site_demo', 5)->create();
        factory(Article::class, 'cms_site_demo', 30)->create();
    }

    protected function migrations()
    {
        $this->info('Creating migration!');
        $files = \File::files($this->laravel['path.database'].'/migrations');
        foreach($files as $file)
        {
            if(ends_with((string)$file, '_cms_core_tables.php'))
            {
                throw new \Exception("You could have a similar migration on {$file}!");
            }
        }

        $path =  $this->laravel['path.database'].'/migrations/' . date('Y_m_d_His') . '_cms_core_tables.php';
        $stub = __DIR__ . '/../stubs/core.stub';

        if ( ! \File::copy($stub, $path))
        {
            throw new \Exception('We could not create the migration!');
        }

        $this->info('Run migration!');
        Artisan::call('migrate');
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
