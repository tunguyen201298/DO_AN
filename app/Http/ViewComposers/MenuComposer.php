<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\models\Category;
 use App\Models\Promotion;
 use App\Models\Review;
 use Carbon\Carbon;

 class MenuComposer
 {
     public $menus = [];
     public $promotion = [];
     public $newformat = [];
     public $products = [];
     public $sum_start = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
        
         $this->menus = [];
         $this->promotion = [];
         $this->newformat = [];
         $this->products = [];
         $this->sum_start = [];
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
        $id = Promotion::max('id');
        if ($id != null) {
           $promotion = Promotion::find($id);
            $end_time = $promotion->end_date;
            $mytime = Carbon::now('Asia/Ho_Chi_Minh');
            $time = strtotime($end_time);
            $newformat = date('Y/M/d',$time);
            $view->with('promotion', $promotion);
            $view->with('newformat', $newformat);
        }
        else{
          $view->with('promotion', null);
            $view->with('newformat', null);
        }
        $sum_start = new Review();

         $view->with('menus', $categories);
         
         $view->with('sum_start', $sum_start);
     }
 }