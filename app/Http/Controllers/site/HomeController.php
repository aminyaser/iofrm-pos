<?php

namespace App\Http\Controllers\site;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Product;
use App\Product_Order;
use App\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Coalesce;

class HomeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index');

    }

    public function index()
    {

        $order = Order::where(['client_id' => Auth::id(), 'payment' => NULL])->with('products')->get();

        $products_ids = [];

        foreach ($order as $o) {

            foreach ($o->products as $product) {

                array_push($products_ids, $product->id);
            }
        }
        $products_ids;

        $sliders = Product::latest()->take(3)->get();

        $categories = Category::all();

        $products = Product::all();

        $productsroundms = Product::inRandomOrder()->take(10)->get();

        $lastproduct = Product::latest()->take(1)->first();
        // inRandomOrder
        $sales = Product::where(['type' => 'sale'])->get();

        $mostproducts = Product::leftJoin('product_order', 'products.id', '=', 'product_order.product_id')
            ->selectRaw('products.*,COALESCE(sum(product_order.quantity),0) total')
            ->groupBy('products.id')
            ->orderBy('total')
            ->inRandomOrder()
            ->take(10)
            ->get();

        $prouctoffer =    $mostproducts->first();

        return view('site.index', compact('sliders', 'order', 'products_ids', 'mostproducts', 'sales', 'categories', 'products', 'prouctoffer', 'productsroundms', 'lastproduct'));
    } // end index

    public function product($id, $name)
    {

        $order = Order::where(['client_id' => Auth::id(), 'payment' => NULL])->with('products')->get(); // all product user selectd

        $products_ids = [];

        foreach ($order as $o) {

            foreach ($o->products as $product) {

                array_push($products_ids, $product->id);
            }
        }
        $products_ids; // check if user selcted this product

        $product = Product::find($id); // product page

        $products = Product::where('category_id', $product->category_id)->get(); // products same category

        return view('site.product-info', compact('product', 'products_ids', 'products'));
    } // view one product

    public function MyOredrs()
    {
        $orders = Order::where(['client_id' => Auth::id()])->with('products')->get(); // all Orders Of User
        return view('site.my-order', compact('orders'));
    } // end of user orders

    public function search(Request $request)
    {
        $search = $request->get('term');

        $result = User::where('first_name', 'LIKE', '%' . $search . '%')->get();

        return response()->json($result);
    }

    public  function cart(User $user, Order $order)
    {
        $order = Order::where(['client_id' => Auth::id(), 'status' => 'processing', 'payment' => NULL])->first();
        $categories = Category::with('products')->get();
        $orders = Auth::user()->orders()->with('products')->get();
        $clients =  DB::table('clients')->where('user_id', Auth::id())->get();

        return view('site.cart', compact('user', 'order', 'orders', 'clients'));
    }
    // end of user cart

    public function store(Request $request, User $user)
    {

        $orders = Order::where(['client_id' => Auth::id(), 'payment' => null])->first();
        if ($orders) {

            $order_product = Product_Order::where('order_id', $orders->id)->first();
            $order = new Product_Order;

            $order->product_id = $request->products;
            $order->order_id = $orders->id;
            $order->quantity = $request->quantity;
            $order->save();
        } else {
            $order = $user->orders()->create([]);

            $order->products()->attach($request->products);

            $total_price = 0;

            $product = Product::FindOrFail($request->products);

            $total_price += $product->sale_price * $request->quantity;

            $product->update([
                'stock' => $product->stock - $request->quantity
            ]);


            $order->update([
                'total_price' => $total_price
            ]);
        }
    }
    // add product to card

    public function update(Request $request, User $user, Order $order)
    {
        $request->validate([
            'products' => 'required|array',

        ]);

        $this->detach_order($order);

        $order = $user->orders()->create([]);

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
        return redirect('/cart_total/' . $order->id);
    } // update card of user

    public function cart_step_two(Order $order)
    {
        $order = Order::where(['client_id' => Auth::id(), 'status' => 'processing', 'payment' => NULL])->first();
        $products = $order->products;

        return view('site.cart2', compact('products', 'order'));
    } // total products and dis this

    public function add_detiles(Request $request)
    {
        $request->validate([
            'phone.0' => 'required',
            'name' => 'required',
            'address' => 'required',

        ]);

        Client::Create($request->all());
        return  back();
    }
    // add new addres
    public function payment($id)
    {
        $checkoutId = $id;
        return view('site.cart4', compact('checkoutId'));
    }
    // payment page step tow
    private function attach_order($request, $user)
    {

        $order = $user->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;

        $product = Product::FindOrFail($request->products);

        $total_price += $product->sale_price * $request->quantity;

        $product->update([
            'stock' => $product->stock - $request->quantity
        ]);


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
