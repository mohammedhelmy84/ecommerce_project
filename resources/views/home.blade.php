@extends('layouts.app')

@section('content')
<div class="container">
<button style="float:right;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="las la-tools">اعدادات</i></button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">التحكم في المنتجات</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body text-center">
   <div class="row">
   <a href="{{url('/product/')}}" class="btn btn-outline-warning" title="منتجات">دخول للصفحة</a>
   </div>
  </div>
</div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('التحكم في المنتجات') }}</div>
                <div class="card-header">
                   
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
