<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function profile(){
        return view('admin.auth.profile');
    }

    public function loginForm(){
        if (Auth::check()){
            toastr()->success('Bạn đã đăng nhập rồi');
            return redirect()->back();
        }
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            toastr()->error('Đăng nhập thất bại');
            return redirect()->back();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');

            if(Auth::attempt(['email' => $email, 'password' =>$password])) {
                toastr()->success('Đăng nhập thành công');
                if (Auth::user()->isAdmin)
                    return redirect(route('admin.profile'));
                else{

                }
            } else {
                toastr()->error('Email hoặc mật khẩu không chính xác');
                return redirect()->back();
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function changePassword(Request $request){
        $email = Auth::user()->email;

        $user = User::where('email', $email)->update([
            'password' => Hash::make($request->get('password'))
        ]);


        toastr()->success('Đổi mật khẩu thành công');

        return redirect()->back();
    }
}
