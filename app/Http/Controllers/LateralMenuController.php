<?php

namespace App\Http\Controllers;
use App\Models\LateralMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LateralMenuController extends Controller
{
    public function get_menulateral(){
        $menu= LateralMenu::select()
        ->join('rolesmodules', 'lateralmenus.idModule', '=', 'rolesmodules.idModule')
        ->where('idUsertype',Auth::user()->idUserType)
        ->get();

        return $menu;
    }
}
