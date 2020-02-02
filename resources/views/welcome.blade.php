@extends('layouts.master')

@section('content')


    <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
              <div class="row">
                <div class="col-xl-9 mx-auto">
                
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                  <form>
                    <div class="form-row">
                    
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </header>


          <div class="container py-3">
              <div class="card">
                  <div class="card-header">
                        Last Order
                  </div>
                  <div class="card-body">
                   <h5><b>Order Number: </b>  {{$order->order_number}}</h5> 
                   <br>
                    @foreach ($order->pizza as $item)

                    <div class="card">
                      <div class="card-body">

                          <div class="col-12">

                            <div class="row">
                                <div class="col-md-3">
                                    <p><b>Pizza Number:</b>{{$item->pizza_number}}</p> 
                                </div>
    
                                <div class="col-md-3">
                                    <p><b>Size: </b>{{$item->size}}</p> 
                                  </div>
    
    
                                  <div class="col-md-3">
                                      <p><b>Crust: </b>{{$item->crust}}</p> 
                                    </div>
    
                                    <div class="col-md-3">
                                        <p><b>type: </b>{{$item->type}}</p> 
                                      </div>
                                
                            </div>
                           

                          </div>
                          <br>
                            <div class="col-6">
                          @foreach ($item->topping as $data)
                          <div class="row">
                            <div class="col-md-6">
                              <b>Area: </b> {{$data->area->area}}
                            </div>

                            <div class="col-md-6">
                                <b>Toppings: </b>   {{$data->topping}}
                              </div>
                          </div>
                              
                          @endforeach
                        </div>

                      </div>
                    </div>
                    <br>
                 
                    
                    @endforeach
                  </div>
              </div>
          </div>


          <div class="container py-3">
            

            <div class="card">
                <div class="card-header">
                    Pizza Mark-up Language(Upload)
                </div>

                <div class="card-body">

                    @if (count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                
                           
                            <li> {{ $error }}</li>
                
                            @endforeach
                        </div>
                    </div>
                
                @endif


                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif



                        <form method="post" enctype="multipart/form-data" action="/Order/Add">

                          {{ csrf_field() }}


                            <div class="form-group">
                              <label><strong>Upload Files</strong></label>
                              <div class="custom-file">
                                <input type="file" name="files" multiple class="custom-file-input" id="customFile" accept=".txt" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" name="upload" value="upload" id="upload" class="btn btn-block btn-dark"><i class="fa fa-fw fa-upload"></i> Upload</button>
                            </div>

                          </form>

                </div>
            </div>

          </div>





          <div class="container py-3">
                <div class="card">
                    <div class="card-header">
                          History
                    </div>
                    <div class="card-body">

                      @foreach ($latestOrders as $order)


                      <h5><b>Order Number: </b>  {{$order->order_number}}</h5> 
                      <br>
                       @foreach ($order->pizza as $item)
   
                       <div class="card">
                         <div class="card-body">
   
                             <div class="col-12">
   
                               <div class="row">
                                   <div class="col-md-3">
                                       <p><b>Pizza Number:</b>{{$item->pizza_number}}</p> 
                                   </div>
       
                                   <div class="col-md-3">
                                       <p><b>Size: </b>{{$item->size}}</p> 
                                     </div>
       
       
                                     <div class="col-md-3">
                                         <p><b>Crust: </b>{{$item->crust}}</p> 
                                       </div>
       
                                       <div class="col-md-3">
                                           <p><b>type: </b>{{$item->type}}</p> 
                                         </div>
                                   
                               </div>
                              
   
                             </div>
                             <br>
                               <div class="col-6">
                             @foreach ($item->topping as $data)
                             <div class="row">
                               <div class="col-md-6">
                                 <b>Area: </b> {{$data->area->area}}
                               </div>
   
                               <div class="col-md-6">
                                   <b>Toppings: </b>   {{$data->topping}}
                                 </div>
                             </div>
                                 
                             @endforeach
                           </div>
   
                         </div>
                       </div>
                       <br>
                    
                       
                       @endforeach
                          
                      @endforeach
                      
                    </div>
                    <div class="card-footer">
                        <div class="justify-content-center">
                                {{ $latestOrders->links() }}
                        </div>
                </div>
                </div>
            </div>
  



@endsection



@section('script')
<script>

$(document).ready(function() {
  $('input[type="file"]').on("change", function() {
    let filenames = [];
    let files = document.getElementById("customFile").files;
    if (files.length > 1) {
      filenames.push("Total Files (" + files.length + ")");
    } else {
      for (let i in files) {
        if (files.hasOwnProperty(i)) {
          filenames.push(files[i].name);
        }
      }
    }
    $(this)
      .next(".custom-file-label")
      .html(filenames.join(","));
  });
});


</script>
    
@endsection