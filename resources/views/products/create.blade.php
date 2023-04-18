@extends('products.layout')
@section('content')
<div class="card mt-3">
<div style="text-align:right; margin-top:5px; margin-right:5px;">
   <a href="{{url('/product/')}}" class="btn btn-outline-warning btn-sm" title="الرئيسية">
    <i class="las la-undo" style="font-size:22px;">عودة</i>
                    </a>
   </div>

    <div class="card-header text-center" style="color:hotpink; font-weight:bold; text-decoration:underline;">إضافة منتج جديد</div>
    <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
              <strong>انتبه!</strong>مشكلة حدثت اثناء حفظ البيانات<br><br>
                 <ul style="direction:ltr;">
                 @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                 </ul>
          </div>
        @endif
        <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <lable>اسم المنتج</lable><br>
            <input type="text" name="product_name" id="product_name" class="form-control"><br>
            <lable>كود المنتج</lable><br>
            <input type="text" name="product_code" id="product_code" class="form-control"><br>
            <lable>سعر المنتج</lable><br>
            <input type="text" name="product_price" id="product_price" class="form-control"><br>
            <lable>الكمية</lable><br>
            <input type="text" name="store_quantity" id="store_quantity" class="form-control"><br>
            <lable>صورة المنتج</lable><br>
            <input type="file" name="image" id="store_quantity" class="form-control" accept="image/*"><br>
            <input type="submit" value="حفظ المنتج" class="btn btn-success">
        </form>
    </div>
</div>

@stop