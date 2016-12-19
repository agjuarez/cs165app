<?php

namespace App\Http\Controllers;
use App\Order;
use App\Orderdetail;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      $orders = Order::groupBy(['id','status'])->orderBy('status')->get();
      return view('orders.index',['orders'=>$orders]);
    }
    public function addOrderDetail(Product $product){
      return view('orders.add', ['product' => $product]);

    }
    public function storeOrderDetail(Request $request,Product $product)
    {
      if (isset($request->username)){
        $user = User::where('username',$request->username)->first();
        $id = $user->id;
      }
      else {
        $id =Auth::user()->id;
        $user = Auth::user();
      }
      $order  = Order::where ([['user_id','=', $id],['status','=','0']])->first();
      if(!$order)
      {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order ->status = 0;
        $order ->save();
      }

      $orderdetail = new orderdetail();
      $orderdetail ->order_id = $order ->id;
      $orderdetail->product_id = $product->id;
      $orderdetail ->quantity = $request ->quantity;
      $orderdetail ->total = $product->price * $request ->quantity;
      $orderdetail ->save();
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {
        $total+= $item->total;
      }
      return view('orders.view',['items'=>$items,'total'=>$total,'order'=>$order,'user'=>$user]);



    }

    public function showOrder()
    {
      if (isset($request->username)){
        $user = User::where('username',$request->username)->first();
        $id = $user->id;
      }
      else {
        $id =Auth::user()->id;
      }
      $order  = Order::where ([['user_id','=', $id],['status','=','0']])->first();
      if(!$order && !Auth::user()->role )
      {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order ->status = 0;
        $order ->save();
      }
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {
        $total+= $item->total;
      }
      return view('orders.view',['items'=>$items,'total'=>$total,'order'=>$order]);
    }
    public function removeOrderDetail(Orderdetail $orderdetail){
      $order = $orderdetail->order;
      Orderdetail::destroy($orderdetail->id);
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {
        $total+= $item->total;
      }

      return view('orders.view',['items'=>$items,'total'=>$total,'order'=>$order]);

  }
    public function editOrderDetail(Orderdetail $orderdetail)
    {
      return view('orders.edit',['item'=>$orderdetail]);
    }
    public function updateOrderDetail(Orderdetail $orderdetail, Request $request)
    {
      $orderdetail = Orderdetail::find($orderdetail->id);
      $orderdetail->quantity = $request ->input('quantity');
      $orderdetail->total = $orderdetail->quantity * $orderdetail->product->price;
      $orderdetail->save();
      $order = $orderdetail ->order;
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {
        $total+= $item->total;
      }
      return view('orders.view',['items'=>$items,'total'=>$total,'order'=>$order,'user' => $request->user]);
    }
    public function confirmOrder(Order $order)
    {
      $order ->status = 1;
      $order ->save();
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {
        $total+= $item->total;
      }
      return view('orders.summary',['items'=>$items,'total'=>$total,'order'=>$order]);
    }
    public function deliverOrder(Order $order)
    {
      $total = 0;
      $items = $order ->orderdetail;
      foreach($items as $item)
      {
        $product = Product::find($item->product_id);
        $product->stock = $product->stock - $item->quantity;
        $product->save();
        $total+= $item->total;
      }
      $order ->status = 2;
      $order->save();
      return view('orders.summary',['items'=>$items,'total'=>$total,'order'=>$order]);
    }

    public function viewOrderHistory(){
      $user  = User::find(Auth::user()->id);
      $orders = $user->order->where('status','>','0');
      return view('orders.history',['orders'=>$orders]);
    }
    public function showOrderHistory(Order $order){
      $items = $order ->orderdetail;
      $total = 0;
      $flag = 0;
      foreach($items as $item) {
        if ($item->quantity > $item->product->stock){
          $flag = 1;
        }
        $total+= $item->total;
      }

      return view('orders.summary',['items'=>$items,'total'=>$total,'order'=>$order,'flag'=>$flag]);
    }
    public function viewCustomerOrder(Order $order, User $user){
      $items = $order ->orderdetail;
      $total = 0;
      foreach($items as $item) {

        $total+= $item->total;
      }
      return view('orders.view',['items'=>$items,'total'=>$total,'order'=>$order,'user'=>$user]);
    }


}
