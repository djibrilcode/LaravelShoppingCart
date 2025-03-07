<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function add_cart(Article $article)
    {
        $rowId = $article->id; // generate a unique() row ID
        $userID = 1; // the user ID to bind the cart contents

        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $article->designation,
            'price' => $article->price,
            'quantity' => 1,
            'associatedModel' => $article
        ));

        return redirect()->route('articles.index')->with('success', $article->designation,'est ajouté au panier');
    }

    public function show_item ()
    {
        $items = \Cart::getContent();
        return view('cart.show_item', compact($items));
    }

    public function delete_item ()
    {
        
    }
}
