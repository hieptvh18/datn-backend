<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Throwable;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = 'Loại sản phẩm';
        $productTypes = ProductType::select('*')->with('products')->paginate(20);
        return view('pages.product-type.list',compact('pageTitle','productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageTitle = 'Thêm loại sản phẩm';

        return view('pages.product-type.add',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name'=>'required|unique:product_types|max:255|min:3',
                'image'=>'image|mimes:jpg,png,jpeg|max:2040'];
        $messages = [
            'name.required'=> 'Bắt buộc nhập tên',
            'name.min'=>'Tên ít nhất :min kí tự',
            'name.max'=>'Tên tối đa :max kí tự',
            'name.unique'=>'Tên này đã tồn tại',
            'image.mimes'=>'Ảnh chỉ được là jpg, png, jpeg',
            'image.max'=>'Ảnh kích thước tối đa là 2mb'
        ];
        $request->validate($rules,$messages);
        try{
            $type = new ProductType();
            $type->fill($request->all());

            // save upload 
            if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $prefixImg = 'type-product';

                    // upload file
                    $type->image = fileUploader($file, $prefixImg, 'uploads/type-product');
            }
            $type->save();

            return redirect()->back()->with('message','Thêm thành công loại sản phẩm!');
        }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('exception','Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Cập nhật loại sản phẩm';
        if(!empty($id) && ProductType::find($id)){
            $type = ProductType::find($id);
            return view('pages.product-type.edit',compact('pageTitle','type'));
        }
        return redirect()->back()->with('erorr','Không tìm thấy loại sản phẩm');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nameRule = 'unique:product_types';
        if($request->method() == 'PUT'){
            $nameRule = '';
        }
        $rules = ['name'=>'required|'.$nameRule.'|max:255|min:3',
                'image'=>'image|mimes:jpg,png,jpeg|max:2040'];
        $messages = [
            'name.required'=> 'Bắt buộc nhập tên',
            'name.min'=>'Tên ít nhất :min kí tự',
            'name.max'=>'Tên tối đa :max kí tự',
            'name.unique'=>'Tên này đã tồn tại',
            'image.mimes'=>'Ảnh chỉ được là jpg, png, jpeg',
            'image.max'=>'Ảnh kích thước tối đa là 2mb'
        ];
        $request->validate($rules,$messages);
        try{
            $type = ProductType::find($id);
            $type->fill($request->all());

            // save upload 
            if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $prefixImg = 'type-product';

                    // upload file
                    $type->image = fileUploader($file, $prefixImg, 'uploads/type-product');
            }
            $type->save();

            return redirect()->back()->with('message','Cập nhật thành công loại sản phẩm!');
        }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('exception','Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            ProductType::destroy($id);
            return redirect()->back()->with('message','Xóa thành công!');
        }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('erorr','Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }
}
