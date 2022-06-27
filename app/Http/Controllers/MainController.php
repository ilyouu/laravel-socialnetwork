<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        if (session()->has('DangNhap')){
            $user = User::where('id',session('DangNhap'))->first();
            $users = User::all();
            $posts = DB::table('posts')->orderBy('updated_at', 'desc')->get();

            return view('index')->with('route', 'trang-chu')
            ->with('user', $user)
            ->with('users', $users)
            ->with('posts', $posts)
            ;
        }
        return view('login');
    }

    //
    public function storeReg(Request $request){
        $request->validate([
            'ten_nguoi_dung' => 'required',
            'email' => 'required | email | unique:users',
            'sdt' => 'required | min:10',
            'password' => 'required | min:8 | confirmed',
        ],[
            'email.unique' => '* Email đã tồn tại.',
            'sdt.min' => '* Số điện thoại không đúng định dạng.',
            'password.min' => '* Mật khẩu phải chứa ít nhất 8 kí tự.',
            'password.confirmed' => '* Bạn nhập lại không đúng với mật khẩu đã nhập trước đó.',
        ]);

        User::create([
            'ten_nguoi_dung' => $request->input('ten_nguoi_dung'),
            'email' => $request->input('email'),
            'sdt' => $request->input('sdt'),
            'password' => Hash::make($request->input('password')),
        ]);

        toastr()->success('Đăng ký tài khoản thành công!' , 'Oke');
        return redirect()->route('login');
    }

    //
    public function checkLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required | min:8',
        ],[
            'password.min' => '* Mật khẩu phải chứa ít nhất 8 kí tự.',
        ]);

        $userinfo = User::where('email', $request->email)->orWhere('sdt', $request->email)->first();

        if (!$userinfo){
            return back()->with('thatbai','* Email hoặc Số điện thoại không tồn tại!');
        } else {
            if (Hash::check($request->password, $userinfo->password)){
                $request->session()->put('DangNhap', $userinfo->id);

                $user = User::where('id', session('DangNhap'))->first();
                $users = User::all();
                $posts = DB::table('posts')->orderBy('updated_at', 'desc')->get();

                if ($userinfo->email == 'admin@gmail.com'){
                    return view('admin.trangchu.trangchu')
                    ->with('data', $data);
                } else {
                    return view('index')->with('route', 'trang-chu')
                    ->with('user', $user)
                    ->with('users', $users)
                    ->with('posts', $posts)
                    ;
                }
            } else {
                return back()->with('thatbai','* Mật khẩu không đúng, vui lòng nhập lại');
            }
        }
    }

    //
    function logout(){
        if (session()->has('DangNhap')){
            session()->pull('DangNhap');
            return redirect('/');
        }
        return redirect('/');
    }

}
