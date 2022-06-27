<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $hinh = "";

        $names = [];

        if($request->file('image')) {
            foreach($request->file('image') as $image) {
                $filename = $image->getClientOriginalName();
                $image->move(public_path('imagesUser'), $filename);
                array_push($names, $filename);   
            }
        }

        $hinh = json_encode($names);
       
        if ($request->input('message') || $request->file('image')) {
            $post = Post::create([
                'id_user' => $request->input('id_user'),
                'message' => $request->input('message'),
                'image' => $hinh,
            ]);
        } else {
            toastr()->error('Bạn cần nhập viết nội dung hoặc ảnh để đăng bài viết mới', 'Lỗi!');
        }
        
        return Redirect('/');
    }

}
