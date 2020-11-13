<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('dashboard.orders.index', compact('orders'));
    }
    public function products(Order $order)
    {
        $products = $order->products;
        return view('dashboard.orders._products', compact('order', 'products'));

    }//end of products

    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        return back()->with('success', __('site.delete_seccessfully'));

    }//end of order

        public function update_status($id){

        $order = Order::find($id);

        $order->status = 'finished';

        $order->save();

    }
}
