<?php
namespace App\View\Composers;
use Illuminate\View\View;

class MenuComposer{
	public function compose(View $view){
		
        $menus = [
            [
                'id' => 1,
                'title' => 'Trang tổng quan',
                'link'  => '#',
                'icon'  => 'fa fa-dashboard',
                'name'  => 'dashboard',
            ],
            [
                'id' => 2,
                'title' => 'Quản lý danh mục',
                'link' => '/admin/categories',
                'icon' => 'fa fa-th',
                'name'  => 'categories',
            ],
            // [
            //     'id' => 3,
            //     'title' => 'Quản lý sản phẩm',
            //     'link' => '#',
            //     'icon' => 'fa fa-pie-chart',
            //     'name'  => 'products.index',
            // ],
            // [
            //     'id' => 4,
            //     'title' => 'Quản lý thẻ',
            //     'link' => '#',
            //     'icon' => 'fa fa-pie-chart',
            //     'name'  => 'tags.index',
            // ]
        ];

        $view->with('menus', $menus);
    }
}