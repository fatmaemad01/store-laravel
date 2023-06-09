@extends('layout.dashboard')

@section ('title','Trashed Categories')


@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
<li class="breadcrumb-item active">Trash</li>
@endSection

@section('content')
<div class="table-toolbar mb-3">
    <a href="{{route('dashboard.categories.index')}}" class="btn btn-sm btn-outline-primary">Back</a>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                    @if ($category->image)

                    <img src="{{ Storage::disk('public')->url($category->image) }}" alt="x" height="60">
                    @else
                    <img src="{{ asset('/images/product.jpg')}}" alt="nn" height="60">
                    @endif
                </td>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->deleted_at}}</td>
                <td>
                    <form action="{{route('dashboard.categories.restore',$category->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-sm btn-outline-success">Restore</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post">
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