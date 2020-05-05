<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\models\Category;

 class MenuComposer
 {
     public $menus = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
        
         $this->menus = [];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $categories = Category::with('childrens')->select('*')
            ->whereParentId(0)
            ->get();
         $view->with('menus', $categories);
     }
 }