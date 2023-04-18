@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header  text-center">
    <div style="text-align:right; margin-top:1px; margin-right:1px;">
   <a href="{{url('/product/')}}" class="btn btn-outline-warning btn-sm" title="الرئيسية">
    <i class="las la-undo" style="font-size:22px;">عودة</i>
                    </a>
   </div>

     <h3>تعديل منتج</h3>
  
    </div>
    <div class="card-body mx-auto">
    <form action="{{url('product/'. $products->id)}}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
       @method("PATCH")
       <lable>تعديل اسم المنتج</lable><br>
            <input type="text" name="product_name" id="product_name" value="{{$products->product_name}}" class="form-control"><br>
            <lable>تعديل كود المنتج</lable><br>
            <input type="text" name="product_code" id="product_code" value="{{$products->product_code}}" class="form-control"><br>
            <lable>تعديل سعر المنتج</lable><br>
            <input type="text" name="product_price" id="product_price" value="{{$products->product_price}}" class="form-control"><br>
            <lable>تعديل الكمية</lable><br>
            <input type="text" name="store_quantity" id="store_quantity" value="{{$products->store_quantity}}" class="form-control"><br>
            <lable>تعديل الصورة<img src="/images/{{$products->image}}" width="35px" height="35px"> </lable><br>
            <input type="file" name="image" id="store_quantity"  class="form-control" accept="image/*">
            <br>
            <input type="submit" value="تعديل المنتج" class="btn btn-success">
            </form>
    </div>
</div>

@endsection