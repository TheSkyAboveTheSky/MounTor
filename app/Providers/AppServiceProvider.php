<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Models\User;
use \App\Models\Salle;
use \App\Models\Seance;
use \App\Models\Abonnement;
use App\Models\DemandeAcces;
use App\Models\DemandeCreneau;
use Illuminate\Support\Facades\Auth;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (Auth::user()->role_id == 0) {
                $event->menu->add([
                    'text' => Auth::user()->name,
                    'url'  => 'user/profile',
                    'icon' => 'fa fa-user',
                ]);
                $event->menu->add([
                    'text' => 'Dashboard',
                    'url'  => '/client/dashboard',
                    'icon' => 'fa fa-chart-bar',
                    'img' => 'red ',
                ]);
                $event->menu->add([
                    'text' => 'Coachs',
                    'url'  => '/client/coachs',
                    'icon' => 'fa fa-list',
                ]);
                $event->menu->add([
                    'text' => 'Planning',
                    'url'  => '/planning',
                    'icon' => 'fa fa-calendar',
                    'icon_color' =>'yellow'
                ]);
                $event->menu->add([
                    'text' => 'Offres',
                    'url'  => '/client/offres',
                    'icon' => 'fa fa-gift',
                    'icon_color' =>'blue'
                ]);
                $event->menu->add('Seances');
                $event->menu->add([
                    'text' => 'Tous Les Seances',
                    'url'  => '/client/seances',
                    'icon' => 'fa fa-list',
                    'icon_color' => 'yellow',
                ]);
                $event->menu->add([
                    'text' => 'Mes Seances',
                    'url'  => '/client/messeances',
                    'icon' => 'fa fa-list',
                    'icon_color' => 'green',
                ]);
                $event->menu->add([
                    'text' => 'Mes Demandes',
                    'url'  => '/client/mesdemandes',
                    'icon' => 'fa fa-list',
                    'icon_color' => 'orange',
                ]);


            }
            if(Auth::user()->role_id == 1){
                $event->menu->add([
                    'text' => Auth::user()->name,
                    'url'  => 'user/profile',
                    'icon' => 'fa fa-user',
                ]);
                $event->menu->add([
                    'text' => 'Dashboard',
                    'url'  => '/coach/dashboard',
                    'icon' => 'fa fa-chart-bar',
                    'img' => 'red ',
                ]);
                $event->menu->add([
                    'text' => 'Planning',
                    'url'  => '/planning',
                    'icon' => 'fa fa-calendar',
                    'icon_color' =>'yellow'
                ]);
                $event->menu->add('Creneaux');
                $event->menu->add([
                    'text' => 'Mes Seances',
                    'url'  => '/coach/messeances',
                    'icon' => 'fa fa-list',
                    'icon_color' => 'green',
                ]);
                $event->menu->add([
                    'text' => 'Mes Demandes',
                    'url'  => '/coach/mesdemandes',
                    'icon' => 'fa fa-list',
                    'icon_color' => 'orange',
                ]);
            }
            if (Auth::user()->role_id === 2){
                $event->menu->add([
                    'text' => Auth::user()->name,
                    'url'  => 'user/profile',
                    'icon' => 'fa fa-user',
                ]);
                $event->menu->add([
                    'text' => 'Dashboard',
                    'url'  => 'admin/dashboard',
                    'icon' => 'fa fa-chart-bar',
                    'img' => 'red ',
                ]);
                $event->menu->add('Users Management');
                $event->menu->add([
                    'text'        => 'Clients',
                    'url'         => 'admin/clients',
                    'icon'        => 'users',
                    'label'       => User::where('role_id',0)->count(),
                    'label_color' => 'success',
                    'submenu' => [
                        [
                            'text' => 'List',
                            'url'  => 'admin/clients',
                            'icon' => 'fa fa-list',
                            'icon_color' => 'blue',
                        ],
                        [
                            'text' => 'Create',
                            'url'  => 'admin/clients/create',
                            'icon' => 'fa fa-plus',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                );
                $event->menu->add([
                    'text'        => 'Coachs',
                    'url'         => 'admin/coachs',
                    'icon'        => 'users',
                    'label'       => User::where('role_id',1)->count(),
                    'label_color' => 'success',
                    'submenu' => [
                        [
                            'text' => 'List',
                            'url'  => 'admin/coachs',
                            'icon' => 'fa fa-list',
                            'icon_color' => 'blue',
                        ],
                        [
                            'text' => 'Create',
                            'url'  => 'admin/coachs/create',
                            'icon' => 'fa fa-plus',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                );
                $event->menu->add([
                    'text'        => 'Salles',
                    'url'         => 'admin/salles',
                    'icon'        => 'users',
                    'label'       => Salle::count(),
                    'label_color' => 'success',
                    'submenu' => [
                        [
                            'text' => 'List',
                            'url'  => 'admin/salles',
                            'icon' => 'fa fa-list',
                            'icon_color' => 'blue',
                        ],
                        [
                            'text' => 'Create',
                            'url'  => 'admin/salles/create',
                            'icon' => 'fa fa-plus',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                );
                $event->menu->add([
                    'text'        => 'Seances',
                    'url'         => 'admin/seances',
                    'icon'        => 'users',
                    'label'       => Seance::count(),
                    'label_color' => 'success',
                    'submenu' => [
                        [
                            'text' => 'List',
                            'url'  => 'admin/seances',
                            'icon' => 'fa fa-list',
                            'icon_color' => 'blue',
                        ],
                        [
                            'text' => 'Create',
                            'url'  => 'admin/seances/create',
                            'icon' => 'fa fa-plus',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                );
                $event->menu->add([
                    'text'        => 'Abonnements',
                    'url'         => 'admin/aboneements',
                    'icon'        => 'users',
                    'label'       => Abonnement::count(),
                    'label_color' => 'success',
                    'submenu' => [
                        [
                            'text' => 'List',
                            'url'  => 'admin/abonnements',
                            'icon' => 'fa fa-list',
                            'icon_color' => 'blue',
                        ],
                        [
                            'text' => 'Create',
                            'url'  => 'admin/abonnements/create',
                            'icon' => 'fa fa-plus',
                            'icon_color' => 'green',
                        ],
                    ],
                ],
                );
                $event->menu->add([
                    'text' => 'Demandes Changement Creneaux',
                    'url'  => 'admin/demandes_creneau',
                    'label'=>DemandeCreneau::where('Etatdemande',1)->count(),
                    'label_color' => 'warning',
                    'icon' =>'fa fa-envelope',
                    'icon_color' => 'orange',
                ]);
                $event->menu->add([
                    'text' => 'Demandes d\'acces au seances',
                    'url'  => 'admin/demandes_acces',
                    'label'=>DemandeAcces::where('Etatdemande',1)->count(),
                    'label_color' => 'warning',
                    'icon' => 'fa fa-envelope',
                    'icon_color' => 'orange',
                ]);
                $event->menu->add([
                    'text' => 'Planning',
                    'url'  => '/planning',
                    'icon' => 'fa fa-calendar',
                    'icon_color' =>'yellow'
                ]);
            }



        }
    );
    }
}
