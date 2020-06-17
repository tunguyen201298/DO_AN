<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Bill;

 class ReadComposer
 {
     public $is_read = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
        
         $this->is_read = [];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $is_read = Bill::where([['active', 1],['is_read',0]])->count();
        $view->with('is_read', $is_read);
     }
 }