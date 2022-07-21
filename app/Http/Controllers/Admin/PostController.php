<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    
    public function index(){
        $posts = Post::with('author')->get();
        return view('screen.admin.post-list', compact('posts'));
    }

    public function add(){
        $categories = Category::get();
        return view('screen.admin.post-add', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'slug'          => 'required',
            'content'       => 'required',
            'categories'    => 'required',
            'thumbnail'     => 'required|mimes:jpeg,png,jpg'
        ],[
            'required'      => ':attribute bắt buộc phải có',
            'mimes'         => 'Sai định dạng hình ảnh cho phép',
            'image'         => ':attribute bắt buộc phải là ảnh'
        ],[
            'title'         => 'Tiêu đề',
            'slug'          => 'Đường dẫn',
            'content'       => 'Nội dung',
            'categories'    => 'Danh mục',
            'thumbnail'     => 'Ảnh đại diện'
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator);
        }

        $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
        $fileName = 'post-'.time().'.'.$fileExtension;
        $request->file('thumbnail')->move('images/posts', $fileName);
        $data['thumbnail'] = $fileName;
        $data['publishedAt'] = now();
        $data['author_id'] = Auth::id();
        $post = Post::create($data);
        $post->categories()->attach($request->categories);
        return redirect()
                ->route('post.list')
                ->with('success', 'Thêm bài viết thành công');
    }

    public function edit($id){
        $post = Post::with('categories:id')->where('id', $id)->first();
        $categories = Category::get();
        return view('screen.admin.post-edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id){
        $data = $request->all();

        // dd($request->categories);

        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'slug'          => 'required',
            'content'       => 'required',
            'categories'    => 'required',
            'thumbnail'     => 'mimes:jpeg,png,jpg'
        ],[
            'required'      => ':attribute bắt buộc phải có',
            'mimes'         => 'Sai định dạng hình ảnh cho phép',
            'image'         => ':attribute bắt buộc phải là ảnh'
        ],[
            'title'         => 'Tiêu đề',
            'slug'          => 'Đường dẫn',
            'content'       => 'Nội dung',
            'categories'    => 'Danh mục',
            'thumbnail'     => 'Ảnh đại diện'
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator);
        }

        if($request->hasFile('thumbnail')){
            $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = 'post-'.time().'.'.$fileExtension;
            $request->file('thumbnail')->move('images/posts', $fileName);
            $data['thumbnail'] = $fileName;
        } else {
            unset($data['thumbnail']);
        }
        $data['publishedAt'] = now();
        $data['author_id'] = Auth::id();
        $post = Post::find($id);
        $post->update($data);
        $post->categories()->sync($request->categories);
        return redirect()
                ->route('post.list')
                ->with('success', 'Cập nhật viết thành công');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()
                    ->route('post.list')
                    ->with('success', 'Xóa bài viết thành công');
    }

}
