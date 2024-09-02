<?php

namespace Modules\Fuel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Utils\ModuleUtil;
use Nwidart\Menus\Menu;

class DataController extends Controller
{

    public function user_permissions(){
        return [
            [ 'value' => 'sales.create', 'label' => 'Create Reading', 'default' => false ]
        ];
    }

    public function modifyAdminMenu()
    {
        $module_util = new ModuleUtil();

//        $business_id = session()->get('user.business_id');
        Menu::modify('admin-sidebar-menu', function ($menu) { 
            $menu->dropdown('Fuel Management', function ($sub) {
                $sub->url( action('AnyController@index'), "Label", ['icon' => 'fa fa-list', 'active' => request()->segment(1) == 'fuel'] );
            } );
        });

    }
}