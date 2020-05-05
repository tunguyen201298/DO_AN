<?php

namespace App\Libs;

use App\Models\PermisionRole;
use App\Repositories\PermisionRoleRepository;
use Illuminate\Support\Facades\Auth;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Constants
 *
 * @author kinhdoanh-tt
 */
class Constants {

    //put your code here
    public static $list_numpaging = [
        '10' => 10,
        '15' => 15,
        '20' => 20,
        '30' => 30,
        '50' => 50,
        '100' => 100,
        '200' => 200
    ];
    
//    public static function checkPermission($per) {
//
//        if (!in_array(Auth::user()->roles->slug, ["admin", 'manager'])) {
//            $permission_role = new PermisionRoleRepository(new PermisionRole());
//            if (!$permission_role->checkPermission($per)) {
//                return false;
//            }
//        }
//        return true;
//    }
//
//    public static function checkPermissionMultiAction($name_module, $route = null, $isAjax = false) {
//        $result = array();
//
//        if (self::checkPermission($name_module)) {
//            return true;
//        }
//
//        return false;
//    }

    
}
