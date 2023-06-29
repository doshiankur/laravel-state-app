<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Config;
//use App\Http\Models\Pages;
use App\Interfaces\EmailServiceInterface;
use App\Services\EmailService;
use DB;
use File;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(EmailServiceInterface::class,function(){
             return new EmailService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    /*public function boot()
    {
        //
    }*/
    public function boot(){

        View::composer('*', function($view)
        {
            $Adminmenus_array = Config::get('constants.menus');
            $view->with('menus_array', $Adminmenus_array);

            /*$Frontmenus_array = Pages::Where('enmDeleted', '0')->Where('enmStatus', '1')->where('id', '!=', '5')->orderBy('id','Asc')->get()->toArray();
            $view->with('FrontMenuArray', $Frontmenus_array);

            $m =new  Media();
            $youtubeURL = $m->getFooterData();
            $view->with('youtubeURL', $youtubeURL);

            $mediaHeaderInfo = Pages::where('id', '7')->first()->toArray();
            $view->with('mediaHeaderInfo', $mediaHeaderInfo);

            $m =new  Media();
            $latestvideodata = $m->getLatestVideoHeaderData();
            $view->with('latestvideodata', $latestvideodata);*/


        });
        //Write the query log into query.log files
        DB::listen(function($query) {
                        File::append(storage_path('/logs/query.log'),
                            '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL . PHP_EOL );
        });
        //End here
    }
}
