@extends('products.layout')
@section('content')

<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="background-color:orange;">
                    <h3 style="color:darkblue; font-weight:bold;"><i class="las la-store-alt"></i>صفحة المنتجات</h3>
                </div>
                <div class="card-body">
                    <a href="{{url('/product/create')}}" class="btn btn-outline-success btn-sm" title="إضافة منتج جديد">
                        إضافة منتج جديد
                    </a>
                    <br>
                    <br>
                    @if($message=Session::get('success'))
                    <div class="alert alert-success">
                      <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">مسلسل</th>
                                    <th scope="col">اسم المنتج</th>
                                    <th scope="col">صورة المنتج</th>
                                    <th scope="col">كود المنتج</th>
                                    <th scope="col">سعر المنتج</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">تفاصيل</th>
                                    <th scope="col">تعديل</th>
                                    <th scope="col">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <th scope="row">{{++$i}}</th>
                                    <td>{{$item->product_name}}</td>
                                    <td><img src="/images/{{$item->image}}" width="35px" height="35px"></td>
                                    <td>{{$item->product_code}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td>{{$item->store_quantity}}</td>
                                    <td>
                                        <a href="{{ url('/product/'.$item->id )}}" title="عرض"><button type="button" class="btn btn-info"><i class="las la-eye"></i>عرض</button></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/product/'.$item->id.'/edit' )}}" title="تعديل"><button type="button" class="btn btn-warning"><i class="las la-edit"></i>تعديل</button></a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/product/' .$item->id) }}" method="post">
                                         
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" onclick="return confirm("confirm delete?")" class="btn btn-danger"><i class="las la-times"></i>حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection