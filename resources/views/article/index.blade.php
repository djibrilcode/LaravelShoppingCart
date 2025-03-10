<!-- filepath: c:\LaravelCourse\LaravelShoppingCart\resources\views\article\index.blade.php -->
@extends('layout.App')

@section('content')
<div class="container ">
    <div class="header text-bg-dark">
        <h1>Product List</h1>
    </div>
    <div class="content">
        <table class="product-table table table-striped">
            <thead class="text-bg-dark">
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
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"><i class="bi bi-trash"></i></button>
                        </form>
                        <form action="{{ route('add_cart', $article->id) }}" method="get" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="bi bi-cart-plus"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <style>
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

    .product-image {
        width: 100px;
        height: auto;
    }

</style> --}}
@endsection
