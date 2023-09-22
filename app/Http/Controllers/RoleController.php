<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct() //Configuramos los permisos de los métodos
    {
        $this->middleware('permission:see-role | create-role | edit-role | delete-role', ['only' => ['index']]);
        //Solo el método index, se puede ver && crear && editar && borrar un rol.
        $this->middleware('permission: create-role', ['only' => ['create, store']]);
        //create nos va a devolver la plantilla, y store almacena en db.
        $this->middleware('permission: edit-role', ['only' => ['edit, update']]);
        $this->middleware('permission: delete-role', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5); //en vez de hacer all(), paginamos
        return view('roles.index', compact('roles')); //Devuelve la vista blade, pasándole la data recibida de roles
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get(); //Trae todos los permisos de la base de datos (igual no entiendo, ver después)
        return view('roles.crear', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'permissions' => 'required']);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions')); //attach del permiso
        return redirect()->route('roles.index'); //carpeta roles, index.blade
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //Esta función está relacionada a la vista del formulario para editar. Preselecciona los permisos disponibles para ese rol pero aún no los actualiza
    {
        {
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermission = DB::table('role_has_permissions')->where('role_id', $id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all(); //consulta la db para obtener los permisos asociados al rol según el id dado
            return view('roles.editar', compact('role', 'permission', 'rolePermission'));
        }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));  
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
