<!-- filepath: c:\LaravelCourse\LaravelShoppingCart\resources\views\article\index.blade.php -->
@extends('layout.App')

@section('content')
<div class="container">
    <div class="header">
        <h1>Product List</h1>
    </div>
    <div class="content">
        <table class="product-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Designation</th>
                    <th>Price (HT)</th>
                    <th>TVA</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td><img src="{{ $article->image }}" alt="{{ $article->designation }}" class="product-image"></td>
                    <td>{{ $article->designation }}</td>
                    <td>{{ $article->prix_ht }}</td>
                    <td>{{ $article->tva }}</td>
                    <td>{{ $article->stock }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .product-table th, .product-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .product-table th {
        background-color: #333;
        color: white;
    }
    .product-image {
        width: 100px;
        height: auto;
    }
    .btn {
        padding: 5px 10px;
        text-decoration: none;
        color: white;
        border-radius: 3px;
    }
    .btn-edit {
        background-color: #4CAF50;
    }
    .btn-delete {
        background-color: #f44336;
        border: none;
        cursor: pointer;
    }
    .btn-delete:hover {
        background-color: #d32f2f;
    }
</style>
@endsection
