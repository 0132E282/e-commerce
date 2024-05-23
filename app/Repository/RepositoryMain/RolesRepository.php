<?php

namespace App\Repository\RepositoryMain;

use App\Models\Permissions;
use App\Models\Roles;
use App\Repository\RepositoryMain\BaseRepository;

class RolesRepository extends BaseRepository
{
    protected $modal;
    protected $modelPermissions;
    function __construct()
    {
        $this->modal = new Roles();
        $this->modelPermissions = new Permissions();
    }
    function create($value, $options = [])
    {
        $roles =  $this->modal->create([
            'name' => $value->name,
            'display_name' => $value->display,
            'description' => $value->description
        ]);
        $roles->permissions()->attach($value->permissions);
        return $roles;
    }
    function update($id, $value, $options = [])
    {
        $roles =  $this->modal->find($id);
        $roles->update([
            'name' => $value->name,
            'display_name' => $value->display,
            'description' => $value->description
        ]);
        $roles->permissions()->sync($value->permissions);
        return $roles;
    }
    function delete($id, $options = [])
    {
        $roles =  $this->modal->find($id);
        $roles->delete();
        return $roles;
    }
    function all($options = null)
    {
        return  $this->modal->latest()->paginate(25);;
    }
    function details($id, $option = null)
    {
        return  $this->modal->find($id);
    }
    function restore($id)
    {
        $roles =  $this->modal->onlyTrashed()->find($id);
        $roles->restore();
        return $roles;
    }
    function destroy($id, $options = null)
    {
        $role =  $this->modal->onlyTrashed()->find($id);
        $role->permissions()->sync([]);
        $role->forceDelete();
        return $role;
    }
    function createPermissions($permission)
    {
        $permissionIdCheck = [];
        foreach ($permission as $key => $permission) {
            if (!empty($permission['children'])) {
                $permissionParentData = [
                    'display_name' => $permission['parent'],
                    'name' => strtoupper($key),
                ];
                $permissionParent =  $this->modelPermissions->updateOrCreate(['name' => $permissionParentData['name']], $permissionParentData);
                $permissionIdCheck[] = $permissionParent->id;
                foreach ($permission['children'] as $key => $child) {
                    $keyCode[] = ['code' => trim($child['key_code']), 'name' => $key];
                    $permissionData = [
                        'display_name' => trim($child['display_name']) ?? '',
                        'name' =>  $key,
                        'key_code' =>  trim($child['key_code']) ?? '',
                    ];
                    $permissionChill =  $permissionParent->children()->updateOrCreate(['name' => $permissionData['name'], 'key_code' =>  $permissionData['key_code']], $permissionData);
                    $permissionIdCheck[] = $permissionChill->id;
                }
            }
        }
        $this->modelPermissions->whereNotIn('id', $permissionIdCheck)->delete();
        return $permissionIdCheck;
    }
}
