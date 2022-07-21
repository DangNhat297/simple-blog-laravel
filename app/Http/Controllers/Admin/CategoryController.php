<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    public function index(){
        $categories = Category::get();
        return view('screen.admin.category-list', [
            'categories' => $categories
        ]);
    }

    public function add(){
        $categories = Category::get();
        return view('screen.admin.category-add', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'name'      => 'required|unique:categories,name',
            'slug'      => 'required|unique:categories,slug',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg'
        ],[
            'required'  => 'Vui lòng nhập :attribute',
            'unique'    => ':attribute đã tồn tại trên hệ thống',
            'image'     => 'Vui lòng chọn đúng định dạng ảnh'
        ],[
            'name'      => 'tên danh mục',
            'slug'      => 'đường dẫn',
            'image'     => 'Ảnh đại diện'
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator);
        }

        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileName = 'category-'.time().'.'.$fileExtension;
            $request->file('image')->move('images', $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = 'default.jpg';
        }

        Category::create($data);

        return redirect()->route('category.list')->with('success', 'Thêm danh mục thành công !');
    }

    public function edit($id){
        $cat = Category::find($id);
        $categories = Category::get();
        return view('screen.admin.category-edit', [
            'cat' => $cat,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id){
        $cat = Category::find($id);
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'name'      => 'required|unique:categories,name,' . $cat->id,
            'slug'      => 'required|unique:categories,slug,' . $cat->id,
            'image'     => 'nullable|image|mimes:jpeg,png,jpg'
        ],[
            'required'  => 'Vui lòng nhập :attribute',
            'unique'    => ':attribute đã tồn tại trên hệ thống',
            'image'     => 'Vui lòng chọn đúng định dạng ảnh'
        ],[
            'name'      => 'tên danh mục',
            'slug'      => 'đường dẫn',
            'image'     => 'Ảnh đại diện'
        ]);

        if($validator->fails()){
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator);
        }

        if($request->hasFile('image')){
            $fileExtension = $request->file('image')->getClientOriginalExtension();
            $fileName = 'category-'.time().'.'.$fileExtension;
            $request->file('image')->move('images', $fileName);
            $data['image'] = $fileName;
        }

        $cat->update($data);

        return redirect()->route('category.list')->with('success', 'Cập nhật danh mục thành công !');
    }

    public function destroy($id){
        $cat = Category::find($id);
        $cat->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công !');
    }

}
