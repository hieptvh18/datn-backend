<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Loại sản phẩm';
        $products = Product::select('*')->paginate(20);
        return view('pages.products.list',compact('pageTitle','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Thêm sản phẩm';
        $types = ProductType::all();

        return view('pages.products.add',compact('pageTitle','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         try{
            $product = new Product();
            $product->fill($request->all());

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $prefixImg = 'product';

                // upload file
                $product->image = fileUploader($file, $prefixImg, 'uploads/product');
            }

            $product->save();

            return redirect()->back()->with('message','Lưu thành công sản phẩm');
         }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('error','Có lỗi xảy ra, vui lòng thử lại sau!');
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
        $pageTitle = 'Cập nhật sản phẩm';
        if(!empty($id) && Product::find($id)){
            $types = ProductType::all();
            $product = Product::find($id);
            return view('pages.products.edit',compact('product','pageTitle','types'));
        }
        return redirect()->back()->with('erorr','Không tìm thấy sản phẩm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try{
            $product = Product::find($id);
            $product->fill($request->all());

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $prefixImg = 'product';

                // upload file
                $product->image = fileUploader($file, $prefixImg, 'uploads/product');
            }

            $product->save();

            return redirect()->back()->with('message','Cập nhật thành công sản phẩm');
         }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('error','Có lỗi xảy ra, vui lòng thử lại sau!');
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
            Product::destroy($id);
            return redirect()->back()->with('message','Xóa thành công!');
        }catch(Throwable $e){
            report($e->getMessage());
            return redirect()->back()->with('erorr','Có lỗi xảy ra! Vui lòng thử lại!');
        }
    }

    public function deleteMultiple (Request $request){
        Product::whereIn('id', $request->get('data'))->delete();
        return response("Xóa thành công!", 200);
    }
}
