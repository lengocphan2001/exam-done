<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Thành viên';
        $data['users'] = \App\Services\Admin\UserService::getInstance()->getListUsers();
        return view('admin.users.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Thành viên';

        return view('admin.users.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Services\Admin\UserService::getInstance()->create($request);

        toastr()->success('Thêm thành công');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['title'] = 'Thành viên';
        $data['user'] = $user;
        return view('admin.users.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        \App\Services\Admin\UserService::getInstance()->update($user, $request);

        toastr()->success('Cập nhật thành công');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toastr()->success('Xóa thành công');
        return redirect()->route('admin.users.index');
    }
}
