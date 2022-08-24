@extends('layouts.app')
@section('content')
    <div class="product-detail">
        <a href="{{route('products.index')}}">
            <button class="btn btn-danger" style="margin-right: 100px;">
                <i class="icon-copy fa fa-backward" aria-hidden="true"></i>
                Back 
            </button>
        </a>
        <div class="row mt-3">
            <div class="col-5">
                <img class="product-image"
                    @if ($product->image) {{ $product->image }}
                    src = "/images/product/{{ $product->image }}"
                    @else src = "/images/product/default.png" @endif>
            </div>
            <div class="col-7">
                <h3>{{$product->name}}</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-inline left">Hãng:</div>
                        <div class="d-inline right">{{$product->brand}}</div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-inline left">Loại:</div>
                        <div class="d-inline right">{{$product->type}}</div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-inline left">Giá:</div>
                        <div class="d-inline right">{{$product->price}}</div>
                    </li>
                  </ul>
                  <div class="description">
                    {{$product->description}}
                  </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
<style>
.product-detail {
    margin-top: 30px
}
.product-image {
    width: 100%;
}
</style>
@endsection
