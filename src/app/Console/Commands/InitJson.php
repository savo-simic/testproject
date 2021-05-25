<?php

namespace App\Console\Commands;

use App\Models\Pole;
use App\Models\Route;
use App\Models\Transmission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class InitJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:init-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init data from json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $transmissions = [];
        $routes = [];
        $poles = [];

        // Read File
        $jsonString = file_get_contents(base_path('storage/data.json'));

        $data = json_decode($jsonString, true);
        $routeIndex = 0;
        $poleIndex = 0;
        foreach ($data as $key => $value) {
            $transmissions[$key]['id'] = $value['id'];
            $transmissions[$key]['name'] = $value['name'];

            if ($value['dionice']) {
                foreach ($routesData = $value['dionice'] as $routeValue) {
                    $routes[$routeIndex]['id'] = $routeValue['id'];
                    $routes[$routeIndex]['name'] = $routeValue['name'];
                    $routes[$routeIndex]['transmission_id'] = $routeValue['dalekovod_id'];
                    $routes[$routeIndex]['parent_id'] = $routeValue['parent'];

                    if ($routeValue['stubovi']) {
                        foreach ($routesData = $routeValue['stubovi'] as $poleValue) {
                            $poles[$poleIndex]['route_id'] = $routeValue['id'];
                            $poles[$poleIndex]['id'] = $poleValue['id'];
                            $poles[$poleIndex]['type_id'] = $poleValue['tip_id'];
                            $poles[$poleIndex]['lat'] = $poleValue['lat'];
                            $poles[$poleIndex]['lon'] = $poleValue['lon'];
                            $poles[$poleIndex]['nv'] = $poleValue['nv'];
                            $poles[$poleIndex]['zspr'] = $poleValue['zspr'];
                            $poles[$poleIndex]['console'] = $poleValue['konzola'];
                            $poles[$poleIndex]['isolation'] = $poleValue['izolator'];
                            $poles[$poleIndex]['grounded'] = $poleValue['uzemljen'];
                            $poles[$poleIndex]['disconnector'] = $poleValue['rastavljac'];
                            $poles[$poleIndex]['rev'] = $poleValue['revZapisi'];
                            $poleIndex++;
                        }
                    }
                    $routeIndex++;
                }
            }
        }

        foreach ($transmissions as $transmission) {
            $transmissionObject = new Transmission();
            $transmissionObject->name = $transmission['name'];
            $transmissionObject->save();
        }

        foreach ($routes as $route) {
            $routeObject = new Route();
            $routeObject->id = $route['id'];
            $routeObject->name = $route['name'];
            $routeObject->transmission_id = $route['transmission_id'];
            $routeObject->parent_id = $route['parent_id'];
            $routeObject->save();
        }

        foreach ($poles as $pole) {
            $poleObject = new Pole();
            $poleObject->type_id = $pole['type_id'];
            $poleObject->lon = $pole['lon'];
            $poleObject->lat = $pole['lat'];
            $poleObject->nv = $pole['nv'];
            $poleObject->zspr = $pole['zspr'];
            $poleObject->console = $pole['console'];
            $poleObject->isolation = $pole['isolation'];
            $poleObject->grounded = $pole['grounded'];
            $poleObject->disconnector = $pole['disconnector'];
            $poleObject->rev = json_encode($pole['rev']);
            $poleObject->save();
        }

//        Log::info('Trans:');
//        Log::info( $transmissions);
//        Log::info('Routes:');
//        Log::info($routes);
//        Log::info('Poles:');
//        Log::info($poles);
    }
}
