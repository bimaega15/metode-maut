<?php

namespace App\Helper;

use App\Models\Konfigurasi;
use App\Models\ManagementMenu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Check
{
    public static function getKonfigurasi()
    {
        $konfigurasi = Konfigurasi::first();
        return $konfigurasi;
    }
    public static function getMenu($currentUrl = null)
    {
        $getUserProfile = Check::getUserProfile();
        $menu = ManagementMenu::leftJoin('management_menu_roles', 'management_menu.id', '=', 'management_menu_roles.management_menu_id')
            ->where('management_menu_roles.roles_id', $getUserProfile->roles[0]->id);
        if ($currentUrl != null) {
            $menu->where('management_menu.link_management_menu', $currentUrl);
        }
        $menu->orderByRaw('CAST(management_menu.no_management_menu as UNSIGNED)', 'asc')
            ->select('management_menu.*', 'management_menu_roles.is_create', 'management_menu_roles.is_update', 'management_menu_roles.is_delete');
        $menu = $menu->get();
        return $menu;
    }
    public static function getMenuInId($arr_id = [])
    {
        $menu =  ManagementMenu::whereIn('id', $arr_id)->get();
        return $menu;
    }
    public static function getUserProfile()
    {
        $myProfile = User::with('profile', 'roles')->where('users.id', Auth::id())->first();
        return $myProfile;
    }
    public static function getCurrentUrl()
    {
        $urlCurrent = url()->current();
        $explodeCurrent = explode('/', $urlCurrent);
        unset($explodeCurrent[0]);
        unset($explodeCurrent[1]);
        unset($explodeCurrent[2]);
        unset($explodeCurrent[3]);
        $currentUrl = '/' . implode('/', $explodeCurrent);
        return $currentUrl;
    }
}
