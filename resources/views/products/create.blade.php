@extends('layouts.app')
@section('content')
    <h1>Create a product</h1>
    
    <form action="{{ route("products.store") }}" method="post">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" required value="{{ old('description') }}" class="form-control">
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" min="1.00" step="0.01" name="price" required value="{{ old('price') }}" class="form-control">
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" step="1" name="stock" required value="{{ old('stock') }}" class="form-control">
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select name="status" id="status" class="custom-select">
                <option value="">Select...</option>
                <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>
                <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </form>
@endsection
    
