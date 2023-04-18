@extends('products.layout')
@section('content')
<div class="card">
    <div class="card-header  text-center">
    <div style="text-align:right; margin-top:1px; margin-right:1px;">
   <a href="{{url('/product/')}}" class="btn btn-outline-warning btn-sm" title="الرئيسية">
    <i class="las la-undo" style="font-size:22px;">عودة</i>
                    </a>
   </div>

     <h3>تفاصيل المنتج</h3>
     <div style="text-align:left;">
     <a class="btn btn-light" href="#" title="طباعة" onclick="printSelection(document.getElementById('myPrint'));return false" style="text-decoration:none;"><i class="las la-print" style="font-size:32px"></i>طباعة</a>
     </div>
    </div>
    <div class="card-body mx-auto" id="myPrint">
        <table class="table">
            <tbody  align="center">
               <tr>  
               <td><strong>اسم المنتج: </strong>{{$products->product_name}}</td> 
               </tr>
               <tr>  
               <td><strong>الكود:  </strong>{{$products->product_code}}</td> 
               </tr>
               <tr>  
               <td><img src="/images/{{$products->image}}" width="300px;" height="200px;"></td> 
               </tr>
               <tr>  
               <td><strong>السعر:  </strong>{{$products->product_price}} ج م</td> 
               </tr>
               <tr>  
               <td><strong>وقت الإضافة:  </strong>{{$products->created_at}}</td> 
               </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection