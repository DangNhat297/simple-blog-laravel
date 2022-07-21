<?php

// namespace App\Http\Helpers;

if(!function_exists('listcategory')){
    function showCategories($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item){
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {
                echo '<tr class="datatable-row">
                                <td class="datatable-cell" style="flex-grow:1"><span class="text-dark-75 font-weight-bolder d-block font-size-lg">'.$char.$item->name.'</span></td>
                                <td class="datatable-cell" style="width: 20%"><span><span class="label font-weight-bold label-lg label-rounded '.(($item->published == 1) ? 'label-success' : 'label-warning').' label-inline">'.(($item->published == 1) ? 'Published' : 'Unpublished').'</span></span></td>
                                <td class="datatable-cell text-right" style="width: 20%">
                                    <a href="'.route('category.edit', $item->id).'" class="btn btn-icon btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <a href="'.route('category.delete', $item->id).'" class="btn btn-icon btn-danger btn-sm mr-2"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>';
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $item->id, $char.'|---');
            }
        }
    }
}

if(!function_exists('selectCategories')){
    function selectCategories($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {
                echo '<option value="'.$item->id.'">';
                    echo $char . $item->name;
                echo '</option>';
                
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                selectCategories($categories, $item->id, $char.'|---');
            }
        }
    }
}

if(!function_exists('checkboxCategories')){
    function checkboxCategories($categories, $parent_id = 0, $char = ''){
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {
                echo '<label class="checkbox">
                            <input type="checkbox" value="'.$item->id.'" name="categories[]" '.(is_array(old('categories')) && in_array($item->id, old('categories')) ? 'checked' : '').'>
                            <span></span>'.$char.' '.$item->name.'
                        </label>';
                
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                checkboxCategories($categories, $item->id, $char.'--');
            }
        }
    }
}