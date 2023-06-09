@extends('layout.dashboard')

@section ('title','Products')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Products</li>
@endSection

@section('content')

<x-flash-message />

<div class="table-toolbar mb-3 d-flex justify-content-between">
    <div class="table-toolbar mb-3">
        <a href="{{route('dashboard.products.create')}}" class="btn btn-sm btn-outline-primary">Create</a>
        <a href="{{route('dashboard.products.trash')}}" class="btn btn-sm btn-outline-danger">Trash</a>
    </div>
    <div>
        <form action="{{route('dashboard.products.index')}}" class="d-flex">
            <input type="text" name="search" value="{{request('search')}}" class="form-control">
            <button type="submit" class="btn btn-dark ml-2">Search</button>
        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SKU</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if ($product->image)

                    <img src="{{ Storage::disk('public')->url($product->image) }}" alt="x" height="60">
                    @else
                    <img src="{{ asset('/images/product.jpg')}}" alt="nn" height="60">
                    @endif
                </td>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->price}}
                    @if ($product->compare_price)
                    | <del>{{$product->compare_price}}</del>
                    @endif
                </td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->sku}}</td>
                <td>{{$product->status}}</td>
                <td>{{$product->created_at}}</td>
                <td>
                    <a href="{{route('dashboard.products.edit', $product->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endSection

