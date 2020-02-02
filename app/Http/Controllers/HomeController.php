<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;
use App\Order;
use App\Pizza;
use App\Topping;

class HomeController extends Controller
{

    public function index(){


        $order = Order::latest()->first();

        
        $latestOrders = Order::latest()->paginate(10);

        


        return view('welcome', compact('order','latestOrders'));
    }
    public function add(Request $request){


        $this->validate(request(),
        [
  
                  'files' => 'required',
        ]);


        // if($file = request()->file('cover')){
        // $cover =   $file->storeAs('/text/' , "cover.jpg");

        // Storage::disk('public_uploads')->put($path, $file_content)

        // $cover = '/images/'.Auth::user()->id."/cover.jpg";
        // }


        // if($file = request()->file('files')){
        // $ext = $file->guessClientExtension();
        // $path =   $file->storeAs('db/news/image/' . time(), "newsimage.jpg");
        // }

    
    
      

        $xmlfile = file_get_contents(request()->file('files'));
        $xmlfile = str_replace("{","<","$xmlfile");
        $xmlfile = str_replace("}",">","$xmlfile");
        $xmlfile = str_replace(array("\n", "\r", "\t"), '', $xmlfile);
        $xmlfile = trim(str_replace('"', "'", $xmlfile));
            
        


        

     $ob= simplexml_load_string($xmlfile, "SimpleXMLElement", LIBXML_NOCDATA);
     $json  = json_encode($ob);
        $configData = json_decode($json, true);
         
        $i = 0;
            foreach ($configData as $key => $value) {
                

                if (  $key == "@attributes" )
                    {
                        $order = new Order;
                        $order->order_number = $value['number'];
                        $order->save();
                    
                   
                    }
                    else
                    {
                      

                        foreach ($value as $secondKey => $secondValue) {

                   
                         

                                 $pizza = new Pizza;
                                $pizza->order_id = $order->id;
                                  $pizza->size = $secondValue['size'];
                                $pizza->crust = $secondValue['crust'];
                                $pizza->type = $secondValue['type'];


                            foreach ($secondValue as $thirdKey => $thirdValue) {
                            
                             if($thirdKey == "@attributes"){
                                $pizza->pizza_number = $thirdValue['number'];
                                    $pizza->save();
                             }

                             if($thirdKey == "toppings"){
                           
                                foreach ($thirdValue as $fourthKey => $fourthValue) {
                                  

                           
                                    foreach ($fourthValue as $fifthKey => $fifthValue) {
                            

                                        if($fifthKey == "@attributes"){
                                            $invokeArea = $fifthValue['area'];
                                         }else{
                                            if(is_array($fifthValue)){
                                                foreach($fifthValue as $sixthKey => $sixthValue) {
                                             
                                             $topping = new Topping;
                                         $topping->area_id = $invokeArea;
                                     $topping->pizza_id = $pizza->id;
                                     $topping->topping =  $sixthValue;

                                       $topping->save();

                                             }


                                            }else{
                                         
                                             $topping = new Topping;
                                         $topping->area_id = $invokeArea;
                                     $topping->pizza_id = $pizza->id;
                                     $topping->topping =  $fifthValue;

                                       $topping->save();
                                            }

                                         



                                       
                                         }
                                    }
                                    



                                }
                             }
                            }

                          



                             
                        }
                    }

                    $i++;

            }


  

    
     


        return back()->with('status', 'Added Successfully');
    }
}