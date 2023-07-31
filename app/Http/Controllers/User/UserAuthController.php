<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['exam'] = Exam::all();

        return view('user.dashboard')->with(['data', $data]);
    }

    public function loginForm()
    {
        if (Auth::check()) {
            toastr()->success('Bạn đã đăng nhập rồi');
            return redirect()->back();
        }
        return view('user.auth.login');
    }

    public function registerForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'name' => 'required|min:6',
                'phone' => 'required|min:10|max:11',
                'address' => 'required'
            ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
                'name.required' => 'Họ tên là trường bắt buộc',
                'name.min' => 'Họ tên phải chứa ít nhất 6 ký tự',
                'phone.required' => 'Số điện thoại là trường bắt buộc',
                'phone.min' => 'Số điện thoại phải chứa ít nhất 10 ký tự',
                'phone.max' => 'Số điện thoại có tối đa 11 ký tự',
                'address.required' => 'Địa chỉ là trường bắt buộc'
            ]
        );


        // if ($validator->fails()) {
        //     toastr()->error('Đăng nhập thất bại');
        //     return redirect()->back();
        // }

        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'isAdmin' => false,
            'isActive' => true
        ]);
        toastr()->success('Đăng ký thành công');
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            ]
        );

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            toastr()->success('Đăng nhập thành công');
            if (!Auth::user()->isAdmin) {
                toastr()->success('Đăng nhập thành công');
                return redirect(route('dashboard'));
            } else {
                toastr()->error('Bạn không có quyền truy cập');
                return redirect()->back();
            }
        } else {
            toastr()->error('Email hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    public function changePassword(Request $request)
    {
        $email = Auth::user()->email;

        $user = User::where('email', $email)->update([
            'password' => Hash::make($request->get('password'))
        ]);


        toastr()->success('Đổi mật khẩu thành công');

        return redirect()->back();
    }

    public function history()
    {
        if (Auth::check()) {
            $data['exams'] = Auth::user()->examResults;
            return view('user.auth.history')->with(['data' => $data]);
        } else {
            return redirect(route('login'));
        }
    }

    public function profile()
    {
        $data['user'] = Auth::user();

        return view('user.auth.profile')->with(['data' => $data]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'Họ tên là trường bắt buộc',
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
            ]
        );
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        if ($request->get('password')) {
        }
        $password = $request->get('password');
        if (!$password) {
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
            ]);
            toastr()->success('Thay đổi thông tin thành công');
            return back();
        } else {
            if (strlen($password) < 8) {
                toastr()->error('Mật khẩu phải có ít nhất 8 ký tự');
                return back();
            } else {
                $user->update([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                    'phone' => $request->get('phone'),
                    'password' => Hash::make($request->get('password'))
                ]);
                toastr()->success('Thay đổi thông tin thành công');
                return back();
            }
        }
    }
}
