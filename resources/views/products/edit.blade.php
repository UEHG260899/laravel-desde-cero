@extends('layouts.master')
@section('content')
    <h1>Edit a product</h1>

    <form action="{{ route("products.update", ['product' => $product->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required value="{{ $product->title }}">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" required class="form-control" value="{{ $product->description }}">
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" min="1.00" step="0.01" name="price" required class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" step="1" name="stock" required class="form-control" value="{{ $product->stock }}">
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select name="status" id="status" class="custom-select">
                <option {{ $product->status ==  'available' ? 'selected' : ''}} value="available">Available</option>
                <option {{ $product->status == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
        </div>
    </form>
@endsection