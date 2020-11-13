<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-users'])->only('index');
    }
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $clients = Client::count();
        $orders = Order::count();
        $sales_data = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as sum')
        )->groupBy('month')->get();
        return  view('dashboard.home', compact('products', 'categories','sales_data','clients', 'orders'));
    }
}
