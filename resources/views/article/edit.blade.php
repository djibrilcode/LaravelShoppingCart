<!-- filepath: c:\LaravelCourse\LaravelShoppingCart\resources\views\article\edit.blade.php -->
@extends('layout.App')

@section('content')
<div class="container">
    <div class="header">
        <h1>Edit Product</h1>
    </div>
    <div class="content">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" class="form-control" value="{{ $article->designation }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
                <img src="{{ $article->image }}" alt="{{ $article->designation }}" class="product-image">
            </div>
            <div class="form-group">
                <label for="prix_ht">Price (HT):</label>
                <input type="number" id="prix_ht" name="prix_ht" class="form-control" value="{{ $article->prix_ht }}" required>
            </div>
            <div class="form-group">
                <label for="tva">TVA:</label>
                <input type="number" id="tva" name="tva" class="form-control" value="{{ $article->tva }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ $article->stock }}" required>
            </div>
            <button type="submit" class="btn btn-submit">Update Product</button>
        </form>
    </div>
</div>

<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    .product-image {
        width: 100px;
        height: auto;
        margin-top: 10px;
    }
    .btn-submit {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #45a049;
    }
</style>
@endsection
