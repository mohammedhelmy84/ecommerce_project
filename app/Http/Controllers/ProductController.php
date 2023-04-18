<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        // return view('products.index')->with('products',$products);

        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i',(request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // Product::create($input);
        // return redirect('product')->with('flash_message','تم إضافة المنتج بنجاح');
        $request->validate([
            'product_name'=>'required',
            'product_code'=>'required',
            'product_price'=>'required',
            'store_quantity'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath='images/';
            $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image']="$profileImage";
        }

        Product::create($input);
            //  return redirect()->route('index')->with('success','تمت الإضافة بنجاح');
             return redirect('product')->with('success','تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show')->with('products', $product);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('products', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     
        $product = Product::find($id);
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath='images/';
            $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image']="$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);
        return redirect('product')->with('success', 'تم التعديل بنجاح');
        //flash_message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect('product')->with('success', 'تم الحذف بنجاح');
    }
}
