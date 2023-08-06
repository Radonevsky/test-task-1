@extends('layouts.base')
@section('page.title', 'Products')
@section('content')
    <h2>Products List</h2>
    @foreach($products as $item)
        <div>
            <h4>
                {{ $item->name }}
            </h4>
            <p>
                {{ $item->description }}
            </p>
        </div>
        <hr>
    @endforeach
@endsection
