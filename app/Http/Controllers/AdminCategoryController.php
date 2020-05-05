<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function insert()
    {
    	DB::table('categories')->insert([
		    ['name' => 'Đá quý', 'parent_id' => 0],
		    ['name' => 'Đá Phong Thủy', 'parent_id' => 0],
		    ['name' => 'Vật Phẩm', 'parent_id' => 0],
		    ['name' => 'Mỹ Nghệ', 'parent_id' => 0],
		    ['name' => 'Ruby', 'parent_id' => 1],
		    ['name' => 'Sapphire', 'parent_id' => 1],
		    ['name' => 'Ngọc Trai', 'parent_id' => 1],
		    ['name' => 'Cẩm Thạch', 'parent_id' => 1],
		    ['name' => 'Ngọc Bích', 'parent_id' => 1],
		    ['name' => 'Thạch Anh Vàng', 'parent_id' => 2],
		    ['name' => 'Thạch Anh Xanh', 'parent_id' => 2],
		    ['name' => 'Thạch Anh Hồng', 'parent_id' => 2],
		    ['name' => 'Thạch Anh Ưu Linh', 'parent_id' => 2],
		    ['name' => 'Đĩa Thất Tinh', 'parent_id' => 3],
		    ['name' => 'Phật Quan Âm', 'parent_id' => 3],
		    ['name' => 'Tùy Hưu', 'parent_id' => 3],
		    ['name' => 'Trụ', 'parent_id' => 3],
		    ['name' => 'Gỗ Xưa', 'parent_id' => 4],
		    ['name' => 'Trầm Hương', 'parent_id' => 4],
		    ['name' => 'Sừng', 'parent_id' => 4],
		    ['name' => 'Gỗ Long Huyết', 'parent_id' => 4]
		]);
		DB::table('suppliers')->insert(
		    ['name' => 'CÔNG TY TRANG SỨC & PHỤ KIỆN SÀI GÒN (SAJA)', 'street_1' => '54 & 50 Nhiêu Tâm, P.5, Q.5', 'street_2' => '102 Hàng Bạc, P. Hàng Bạc, Q. Hoàn Kiếm', 'phone' => '0939 100 586', 'email' => 'sales@saja.vn']
		);
    }
    public function insertProduct()
    {
    	DB::table('products')->insert(
		    [
		    	'category_id' => 1, 
			    'supplier_id' => 1, 
			    'name' => 'Bán lô Tỳ Hưu Sapphire cao cấp Saja', 
			    'price' => 3000000,
			    'detail' => 'Điểm nổi bật
							SAJA chuyên kinh doanh Đá Sapphire đẹp, chất lượng cao.
							- Chất liệu: Đá Sapphire tự nhiên.

							- Tiêu chuẩn chất lượng: hàng cao cấp 

							- Phong cách: Quý phái, thanh lịch, sang trọng, tín ngưỡng.

							 - Sử dụng: mặt nhẫn , mặt dây chuyền , mặt vòng...v.v.

							- Bảo hành: vĩnh viễn về màu sắc.', 
			    'discount' => 2000000, 
			    'img_link' => 'saja237232434.png', 
			    'quantity' => 1000
			]
		);
    }
    
}
