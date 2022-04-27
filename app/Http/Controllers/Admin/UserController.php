<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $sortables = ['id', 'name'];

        $sort = $request->sort;
        #   $request->sort  = id  которое мы присвоили в методе  buildQueryString  в классе D:\OpenServer\OpenServer\domains\blog\app\Directives\SortableLink.php
        $valid = false; // ??? Что это
        if ($sort && in_array($sort, $sortables)) {  # in_array -проверяет присутствует ли значение в массиве
            if (in_array($request->direction, ['desc', 'asc'])) {
                $valid = true;
            }
        }
        $roles = Role::all();
        //Получаем пользователя с его ролями с помощью метода with , который запрашивает отношение roles //
        $users = User::with('roles')
            ->select('id', 'name', 'email', 'created_at')
            ->filter(new \App\Filters\UserFilter($request))//Вызываем метод из User.php -> scopeFilter. scope означает что  метод созданный в ручную.
            ->sort($request)
            ->paginate(10);
        // Возвращает json.
        //return response()->json([
        //'users'=>$users
//        ]);
        return view('admin.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function create()
    {
        $roles = \App\Models\Role::all();
        return view('admin.users.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'roles' => ['required', 'array'],
        ]);
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //шифровка пароля
        ]);

        $user->roles()->sync($request->roles); //Синхронизирует роли для пользователя

        return redirect()->route('users.index')->with([
            'status' => 'Пользователь создан успешно!',
            'alert' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit(User $user)
    {
//        $this->authorize('update', $user);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id, // $user->id не проверять текущего пользователя
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],  // nullable данные могут быть не введены
//            'roles' => ['required', 'array'],
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $roles = $request->roles ?? [];
        $user->roles()->sync($roles);

        return redirect()->back()->with([           // redirect()->back()->with      **back() -возвзращает откуда пришли
            'status' => 'Профиль обновлен успешно',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id): Response
    {
        //
    }
}
