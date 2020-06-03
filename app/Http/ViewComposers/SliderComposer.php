<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Slide;

 class SliderComposer
 {
     public $sliders = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
        
         $this->sliders = [];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
        $sliders = Slide::all();
        $view->with('sliders', $sliders);
     }
 }