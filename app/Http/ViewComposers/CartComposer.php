<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\models\Category;
 use Cart;

 class CartComposer
 {
     public $count = '';
     public $total = '';
     public $cart = '';
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
        
         $this->total = '';
         $this->count = '';
         $this->cart = '';
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $carts = Cart::content();
        $count = Cart::count();
        $total = 0;
        foreach ($carts as $cart) {
          $total += $cart->price * $cart->qty;
        }
        $view->with('count',$count);
        $view->with('total',$total);
        $view->with('carts',$carts);

     }
 }