<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Blade::directive('translate', function ($expression) {
            return "<?php echo app('App\Http\Controllers\HomeController')->translateText($expression); ?>";
        });
    }
}