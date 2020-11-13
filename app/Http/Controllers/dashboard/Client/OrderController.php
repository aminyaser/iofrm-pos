<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Category;

class OrderController extends Controller
{




    public function create(Client $client)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        return view('dashboard.clients.orders.create', compact('client', 'categories', 'orders'));
    }


    public function store(Request $request, Client $client)
    {

        $request->validate([
            'products' => 'required|array',
        ]);
        $this->attach_order($request, $client);
        return    redirect()->route('dashboard.orders.index')->with('success', __('site.add_seccessfully'));
    }


    public function edit(Client $client, Order $order)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        return view('dashboard.clients.orders.edit', compact('client', 'order', 'categories', 'orders'));
    } //end of edit

    public function update(Request $request, Client $client, Order $order)
    {

        $request->validate([
            'products' => 'required|array',

        ]);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        if (Auth::user()->type == 1) {

            return    redirect()->route('dashboard.orders.index')->with('success', __('site.edit_seccessfully'));
        } else {

            return redirect('/cart_total/');
        }
    }

    public function destroy(Client $client, Order $order)
    {
        // $category->delete();
        // return back()->with('success', __('site.delete_seccessfully'));
    }

    private function attach_order($request, $client)
    {
        $order = $client->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);
            $total_price += $product->sale_price * $quantity['quantity'];

            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);
        } //end of foreach

        $order->update([
            'total_price' => $total_price
        ]);
    }

    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);
        } //end of for each

        $order->delete();
    } //
}
