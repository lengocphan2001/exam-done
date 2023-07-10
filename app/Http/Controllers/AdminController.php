<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }


    public function profile(){
        return view('admin.auth.profile');
    }

    public function loginForm(){
        if (Auth::guard('admin')->check()){
            toastr()->success('Bạn đã đăng nhập rồi');
            return redirect()->back();
        }
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];

        $validator = FacadesValidator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            toastr()->error('Đăng nhập thất bại');
            return redirect()->back();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');

            if(Auth::guard('admin')->attempt(['email' => $email, 'password' =>$password])) {
                toastr()->success('Đăng nhập thành công');
                return redirect(route('admin.profile'));
            } else {
                toastr()->error('Email hoặc mật khẩu không chính xác');
                return redirect()->back();
            }
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
