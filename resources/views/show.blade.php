@extends('layouts.base')
@section('page.title', 'Product')
@section('content')
    <h3>Product</h3>
        <div>
            <h4>
                {{ $product->name }}
            </h4>
        </div>
        <hr>
@endsection
