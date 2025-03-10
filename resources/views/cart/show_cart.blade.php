<!-- filepath: c:\LaravelCourse\LaravelShoppingCart\resources\views\cart\show_item.blade.php -->
@extends('layout.App')

@section('content')
@if (session('Panier'))
    <div class="alert alert-success">
        {{session('Panier')}}
    </div>

@endif
<div class="container">
    <div class="header text-bg-dark">
        <h1>Cart Items</h1>
        <a href="{{ route('vider_cart') }}">vider le panier</a>
    </div>
    <div class="content">
        <table class="product-table">
            <thead class="text-bg-dark">
                <tr>
                    <th>Designation</th>
                    <th>Price (HT)</th>
                    <th>TVA</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->associatedModel->tva }}</td>
                    <td>{{ $item->quantity}}</td>
                    <td>
                        <a href="{{ route('inc_cart', $item->associatedModel->id) }}" class="btn btn-primary">+</a>
                        <a href="{{ route('dec_cart', $item->associatedModel->id) }}" class="btn btn-primary">-</a>
                        <form action="{{ route('remove_cart', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"><i class="bi bi-trash"></i></button>
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
</style>

@endsection
