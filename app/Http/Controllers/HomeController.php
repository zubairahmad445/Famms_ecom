<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\product;
use App\Models\Cart;
use App\Models\Oder;
use App\Models\comment;
use App\Models\Reply;
use Session;
use Stripe;

class HomeController extends Controller
{
  public function redirect()
  {
    $usertype=Auth::user()->usertype;
    if($usertype=='1')
    {
       $totalpro=product::all()->count();
        $totaloder=oder::all()->count();
         $totaluser=user::all()->count();
         $oder=oder::all();
         $total_revenu=0;
         foreach($oder as $oder)
         {
             $total_revenu= $total_revenu+$oder->price*$oder->qty;
         }
         $oder_delivered=oder::where('delivery_status','=','delivered')->get()->count();
          $oder_process=oder::where('delivery_status','=','processing')->get()->count();
        return view ('admin.home',compact('totalpro','totaloder','totaluser','total_revenu','oder_delivered','oder_process'));
    }
    else{
       $product=product::paginate(6);
       $comment=comment::orderBy('id', 'DESC')->get();
        $reply=reply::all();
        return view ('home.index',compact('product','comment','reply'));
    }

  }
  public function index()
  {
     $product=product::paginate(6);
       $comment=comment::orderBy('id', 'DESC')->get();
      $reply=reply::all();
    return view ('home.index',compact('product','comment','reply'));
  }
  public function product()
  {
     $product=product::paginate(12);
       $comment=comment::orderBy('id', 'DESC')->get();
      $reply=reply::all();
    return view ('home.allproducts',compact('product','comment','reply'));
  }
  public function about()
  {
     return view ('home.about');

  }
   public function contact()
  {
     return view ('home.contact');

  }
   public function blog()
  {
     return view ('home.blog');

  }
   public function testimotional()
  {
     return view ('home.testimotional');

  }
  public function product_details($id)
  {
    $product=product::find($id);
    return view ('home.product_details',compact('product'));
  }
   public function add_cart(Request $request,$id)
  {
    if(Auth::id())
    {
      $user=Auth::user();
       $userid=$user->id;
      $product=product::find($id);

      $product_ext_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
      if($product_ext_id)
      {
        $cart=cart::find( $product_ext_id)->first();
        $quantity=$cart->qty;
        $cart->qty= $quantity + $request->qty;
        $cart->save();
        Alert::success('Product Added To cart Successfully','We have added product to cart');
        return redirect()->back();

      }
      else
      {
         $cart = new cart;
      $cart->name=$user->name;
       $cart->email=$user->email;
        $cart->phone=$user->phone;
         $cart->address=$user->address;
          $cart->user_id=$user->id;
           $cart->product_title=$product->title;
            $cart->product_title=$product->title;
             $cart->qty=$request->qty;
             if($product->dis_price!=null)
             {
               $cart->price=$product->dis_price ;
             }
             else
             {
                $cart->price=$product->price ;
             }
            
              $cart->image=$product->image;
               $cart->product_id=$product->id;
              
              $cart->save();
               Alert::success('Product Added To cart Successfully','We have added product to cart');
              return redirect()->back();

      }

     


    }
    else
    {
      return redirect('login');
    }
  }
  public function show_cart()
  {
    if(Auth::id())
    {
       $id=Auth::user()->id;
    $cart=cart::where('user_id','=',$id)->get();
    return view('home.cart',compact('cart'));
    }
    else
    {
      return redirect('login');
    }
   
  }
   public function show_oder()
  {
    if(Auth::id())
    {
       $user=Auth::user();
       $userid=$user->id;
    $oder=oder::where('user_id','=', $userid)->get();
    
    return view('home.oder',compact('oder'));
    }
    else
    {
      return redirect('login');
    }
   
  }
  public function remove_cart($id)
  {
    $cart=cart::find($id);
    $cart->delete();
    Alert::warning('Product Removed','We had remove product from cart');
    return redirect()->back();
  }
  public function cash_oder()
  {
    $user=Auth::user();
    $user_id=$user->id;
    $data=cart::where('user_id','=', $user_id)->get();
    foreach($data as $data)
    {
      $oder=new oder;
      $oder->name=$data->name;
      $oder->email=$data->email;
      $oder->phone=$data->phone;
      $oder->address=$data->address;
      $oder->user_id=$data->user_id;
       $oder->product_id=$data->product_id;
        $oder->product_title=$data->product_title;
         $oder->qty=$data->qty;
          $oder->price=$data->price;
          $oder->image=$data->image;
          $oder->payment_status='cash on delivery';
          $oder->delivery_status='processing';
          $oder->save();

          $cart_id=$data->id;
          $cart=cart::find($cart_id);
          $cart->delete();



    }
    Alert::success('We Have Received Your Oder.','We Will Connect With You Soon...');
    return redirect()->back();

  }

  public function stripe($total)
  {
    return view('home.stripe',compact('total'));
  }

  public function stripePost(Request $request,$total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
         $user=Auth::user();
    $user_id=$user->id;
    $data=cart::where('user_id','=', $user_id)->get();
    foreach($data as $data)
    {
      $oder=new oder;
      $oder->name=$data->name;
      $oder->email=$data->email;
      $oder->phone=$data->phone;
      $oder->address=$data->address;
      $oder->user_id=$data->user_id;
       $oder->product_id=$data->product_id;
        $oder->product_title=$data->product_title;
         $oder->qty=$data->qty;
          $oder->price=$data->price;
          $oder->image=$data->image;
          $oder->payment_status='Payed';
          $oder->delivery_status='processing';
          $oder->save();

          $cart_id=$data->id;
          $cart=cart::find($cart_id);
          $cart->delete();



    }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
        $total=0;
    }
    public function cancel_oder($id)
    {
       $oder=oder::find($id);
       $oder->delivery_status='You Canceled The Oder';
       $oder->save();
        Alert::warning('Your Oder Cancelled.','You can Oder Again If u want..');

       return redirect()->back();

    }
    public function add_comment(Request $request)
    {
        if(Auth::id())
    {
       $comment= new comment;
       $comment->name=Auth::user()->name;
       $comment->user_id=Auth::user()->id;
       $comment->comment=$request->comment;
       $comment->save();
        Alert::sucess('Comment Added.','');
       return redirect()->back();
    
   
    }
    else
    {
      return redirect('login');
    }

    }
    public function add_reply(Request $request)
    {
      if(Auth::id())
    {
       $reply= new reply;
       $reply->name=Auth::user()->name;
       $reply->user_id=Auth::user()->id;
      $reply->comment_id=$request->commentId;
       $reply->reply=$request->reply;
       $reply->save();
       Alert::sucess('Reply Added.','');
       return redirect()->back();
    
   
    }
    else
    {
      return redirect('login');
    }

    }
    public function pro_search(Request $request)
    {
      $searchtext=$request->search;
     
       $product=product::where('title','LIKE',"%$searchtext%")->orWhere('des','LIKE',"%$searchtext%")
        ->orWhere('price','LIKE',"%$searchtext%")->paginate(6);
         $comment=comment::orderBy('id', 'DESC')->get();
      $reply=reply::all();
         return view('home.index',compact('product','comment','reply'));

    }
    public function search_pro(Request $request)
    {
      $searchtext=$request->search;
     
       $product=product::where('title','LIKE',"%$searchtext%")->orWhere('des','LIKE',"%$searchtext%")
        ->orWhere('price','LIKE',"%$searchtext%")->paginate(6);
         $comment=comment::orderBy('id', 'DESC')->get();
      $reply=reply::all();
         return view('home.allproducts',compact('product','comment','reply'));

    }
}
