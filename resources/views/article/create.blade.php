<!-- filepath: c:\LaravelCourse\LaravelShoppingCart\resources\views\article\create.blade.php -->
@extends('layout.App')

@section('content')
<div class="container">
    <div class="header text-bg-dark">
        <h1>Create New Product</h1>
    </div>
    <div class="content">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prix_ht">Price (HT):</label>
                <input type="number" id="prix_ht" name="prix_ht" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tva">TVA:</label>
                <input type="number" id="tva" name="tva" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-submit">Create Product</button>
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
