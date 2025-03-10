<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_cart(Article $article)
    {

        $saleCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'tva 20%',
            'type' => 'tax',
            'value' => $article->tva.'%',
        ));

        $rowId = $article->id; // generate a unique() row ID
        $userID = 1; // the user ID to bind the cart contents

        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $article->designation,
            'price' => $article->prix_ht,
            'quantity' => 1,
            'associatedModel' => $article
        ));

        return redirect()->route('articles.index')->with('success', $article->designation.'est ajouté au panier');
    }

    public function vider_cart ()
    {
        $userID = 1; // the user ID to remove the cart contents
        \Cart::session($userID)->clear();
        return redirect()->route('articles.index')->with('panier', 'les panier est vide');
    }

    public function inc_cart(Article $article)
    {
        $rowId = $article->id; // generate a unique() row ID
        $userID = 1; // the user ID to bind the cart contents
        \Cart::session($userID)->update($rowId,[
            'quantity'=> 1
        ]);

        return redirect()->route('show_cart')->with('Panier', 'quantité incrémentée pour '.$article->designation);
    }
    public function dec_cart(Article $article)
    {
        $rowId = $article->id; // generate a unique() row ID
        $userID = 1; // the user ID to bind the cart contents
        \Cart::session($userID)->update($rowId, [
            'quantity'=> -1
        ]);

        return redirect()->route('show_cart')->with('Panier', 'quantité décrémentée pour '.$article->designation);
    }

    public function  show_cart ()
    {
        $userID = 1; // the user ID to fetch the carts contents
        return view('cart.show_cart', ['cartItems' => \Cart::session($userID)->getContent()]);
    }

    public function remove_cart (Article $article)
    {
        $rowID = $article->id;
        $userID = 1;

        //Delete the article to from the cart
        \Cart::session($userID)->remove($rowID);

        return redirect()->route('show_cart')->with('Panier', 'a été supprimé du panier');
    }
}
