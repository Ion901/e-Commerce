<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emit('cart-icon.component','refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emit('cart-icon.component','refreshComponent');
    }

    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emit('cart-icon.component','refreshComponent');
        session()->flash("succes_message","item has been removed!");

    }

    public function removeAll()
    {
        Cart::instance('cart')->destroy();
        $this->emit('cart-icon.component','refreshComponent');

    }
    public function render()
    {
        return view('livewire.cart-component');
    }
}
