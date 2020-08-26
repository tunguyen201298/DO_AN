<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\models\Category;
 use App\Models\Promotion;
 use App\Models\Review;
 use App\Models\Blog;
 use Carbon\Carbon;

 class MenuComposer
 {
     public $menus = [];
     public $promotion = [];
     public $newformat = [];
     public $products = [];
     public $sum_start = [];
     public $blog_menu = [];
     public $now = [];
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
         $this->blog_menu = [];
         $this->now = [];
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
        $blog_menu = Blog::orderBy('id', 'desc')
               ->take(10)
               ->get();
               Carbon::setLocale('vi');
        $now = Carbon::now();
         $view->with('menus', $categories);
         $view->with('blog_menu', $blog_menu);
         $view->with('sum_start', $sum_start);
         $view->with('now', $now);
     }
 }