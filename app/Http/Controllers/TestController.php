<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $permissions = Permission::with(['module:id,module_name,module_slug'])
        ->select(['id', 'module_id', 'permission_name', 'permission_slug', 'updated_at'])
        ->latest()
        ->paginate();
        // return $permissions;
        return view('admin.pages.permission.index', compact('permissions'));
    }

    public function indexx()
    {
        // $permissions = Permission::with(['Module:id,module_name,module_slug'])
        // ->select(['id', 'module_id', 'permission_name', 'permission_slug', 'updated_at'])
        // ->latest()
        // ->paginate();
        // return $permissions;
        //return view('test', compact('permissions'));

        $roles = Role::with(['permissions:id,permission_name,permission_slug'])->select(['id', 'role_name', 'is_deleteable', 'updated_at'])->get();

        return $roles;

        //return view('test', compact('roles'));
    }
}
