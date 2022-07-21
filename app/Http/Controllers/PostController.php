<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    
    public function show($slug, $id){
        $post = Post::find($id);
        return view('screen.single-post', compact('post'));
    }

    public function comment(Request $request, $slug, $id){
        try{
            Comment::create([
                'name'      => $request->get('name'),
                'email'     => $request->get('email'),
                'content'   => $request->get('content'),
                'post_id'   => $id
            ]);
            return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi đi thành công');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại !');
        }
    }

}
