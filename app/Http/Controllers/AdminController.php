<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\product;
use App\Models\Oder;
use PDF;
use Notification;
use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function view_category()
    {
      if(Auth::id())
      {
        $categorydata=category::all();
         return view('admin.category',compact('categorydata'));
      }
      else
      {
        return redirect('login');
      }
    }
    public function all_product()
    {
       if(Auth::id())
      {
        $productdata=product::all();
         return view('admin.allproducts',compact('productdata'));
       }
        else
      {
        return redirect('login');
      }

    }
     public function view_product()
    {

       if(Auth::id())
      {
        $category=category::all();
         return view('admin.product',compact('category'));
          }
        else
      {
        return redirect('login');
      }
    }
    public function add_category(Request $request)
    {

       if(Auth::id())
      {
          category::create($request->all());
          return redirect()->back()->with('message','Category Added Successfully');
       }
        else
      {
        return redirect('login');
      }
    }
     public function add_product(Request $request)
    {
       if(Auth::id())
      {
         $data=product::create($request->all());
        if($data && $request->hasfile('image')){
        $file = $request->file('image');
       $filename=rand(11111,99999).'.'.$file->getClientOriginalExtension();
            $request->file('image')->move('admin/productimage', $filename);
            $data->image = $filename;
             $data->save();
       }

       

    
      

       return redirect()->back()->with('message','Product Created Successfully...!');
        }
        else
      {
        return redirect('login');
      }
       
    }

     public function editcategories(request $request,$id)
    {
       if(Auth::id())
      {

          $editdata = category::find($id);
        return view('admin.editcategory',compact('editdata'));
        return redirect()->back()->with('message','Product Created Successfully...!');
        }
        else
      {
        return redirect('login');
      }
    
    }
     public function editproducts(request $request,$id)
    {
       if(Auth::id())
      {
           $category=category::all();
          $editdata = product::find($id);
        return view('admin.editproduct',compact('editdata','category'));
         }
        else
      {
        return redirect('login');
      }
    
    }
    public function updatecategories(Request $request,$id)
    {
       if(Auth::id())
      {
        $data=category::find($id);
        $data->update($request->all());
       return redirect()->back()->with('message','Category Updated Successfully...!');
        }
        else
      {
        return redirect('login');
      }
    }
    public function updateproducts(Request $request,$id)
    {
        if(Auth::id())
      {
       $data=product::find($id);
           $data->update($request->all());
        if($data && $request->hasfile('image')){
        $file = $request->file('image');
       $filename=rand(11111,99999).'.'.$file->getClientOriginalExtension();
            $request->file('image')->move('admin/productimage', $filename);
            $data->image = $filename;
             $data->Update();
       }

       

    
      

       return redirect()->back()->with('message','Product Updated Successfully...!');
        }
        else
      {
        return redirect('login');
      }
    }
     public function categorydelete($id)
    {

        if(Auth::id())
      {
        category::find($id)->delete();
        return redirect()->back()->with('message','Category Deleted Successfully...!');
         }
        else
      {
        return redirect('login');
      }
    }
    public function productdelete($id)
    {

        if(Auth::id())
      {
        product::find($id)->delete();
        return redirect()->back()->with('message','Product Deleted Successfully...!');
         }
        else
      {
        return redirect('login');
      }
    }
    public function view_oder()
    {

        if(Auth::id())
      {
        $oder=Oder::paginate(6);;
        return view('admin.viewoder',compact('oder'));
      }
        else
      {
        return redirect('login');
      }
    }
    public function delivered($id)
    {

        if(Auth::id())
      {
        $oder=oder::find($id);
        $oder->delivery_status="delivered";
        $oder->payment_status='Payed';
        $oder->save();
        return redirect()->back();
          return view('admin.viewoder',compact('oder'));
      }
        else
      {
        return redirect('login');
      }
    }
    public function print_pdf($id)
    {

        if(Auth::id())
      {
        $oder=Oder::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('oder'));
        return $pdf->download('oder_details.pdf');
        }
        else
      {
        return redirect('login');
      }
    }
    public function send_email($id)
    {

        if(Auth::id())
      {
         $oder=oder::find($id);
        return view('admin.email_info',compact('oder'));
        }
        else
      {
        return redirect('login');
      }
    }
    public function send_user_email(Request $request, $id)
    {
      if(Auth::id())
      {
        $oder=oder::find($id);
        //dd($oder);
        $details=[
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];

        Notification::send($oder,new MyFirstNotification($details));
        return redirect()->back();
        }
        else
      {
        return redirect('login');
      }
    }
    public function search(Request $request)
    {
      if(Auth::id())
      {
       
        $searchtext=$request->search;
        $oder=oder::where('name','LIKE',"%$searchtext%")->orWhere('phone','LIKE',"%$searchtext%")
        ->orWhere('product_title','LIKE',"%$searchtext%")->get();
        return view('admin.viewoder',compact('oder'));
         }
        else
      {
        return redirect('login');
      }

    }

}
