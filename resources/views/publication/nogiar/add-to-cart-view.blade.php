@extends('external.layouts.app')

@section('content')

  

    <div class="row">
       <div class="col-lg-12">     
        <div class="card m-b-20">
            <div class="card-body" style=""> 
                
                <div class="col-lg-7 pull-left" style="padding-bottom: 25px; border: thin dotted #ccc">
                    <div class="col-md-12" id="shelve">
                        <div class="book tool-container"> 
                            {{-- coat of arms --}}
                            <center>  
                                <img src="{{URL::asset('assets/images/book.png')}}" alt="" style="height: 60%; width: 45%">
                            </center>

                            {{-- <h5> {{$publication->nogiar_id}} </h5> --}}
                            {{-- {!!  $publication->content !!} --}}

                        </div>
                    </div>
                </div> 

                <div class="col-lg-5 pull-left" style="padding-bottom: 25px;">
                    <div class="col-md-12" id="shelve">
                        <div class="book tool-container"> 

                            <h3> 
                                {{$publication->nogiar_id}} 
                                @if($in_cart)
                                    <a data-toggle="modal" data-target="#view-cart" class="btn btn-warning pull-right" id="vcart" onclick="load_items_in_cart()"> <i class="fa fa-shopping-basket"></i> Item Already In Cart</a>
                                @else
                                    <a data-toggle="modal" data-target="#view-cart" class="btn btn-dark pull-right" onclick="load_items_in_cart()" style="color: #fff" id="v_cart"> <i class="fa fa-shopping-basket"></i> View Cart</a>
                                @endif  
                            </h3>
                            <hr>
                            

                        <form id="cartForm" method="post" action="{{ url('/publication/add-to-cart') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="border: thin dotted #e1e1e1"> 
                            <table class="table table-sm table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td style="">BOOK NAME</td>
                                        <td style="">{{$publication->nogiar_id}}</td>
                                    </tr>
                                    <tr>
                                        <td style="">YEAR</td>
                                        <td style="">{{$publication->year}}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">PRICE 
                                            @if($publication->price > 0) 
                                                <span style="color: #DE5D83; font-size: 20px"> &nbsp;&nbsp;&nbsp; &#8358; {{$publication->price}} </span> 
                                            @else 
                                                <span style="color: #DE5D83; font-size: 20px"> &nbsp;&nbsp;&nbsp; &#8358; {{$publication->price}} </span> 
                                            @endif
                                        </td>
                                        <td style="padding: 5px 10px">                                            
                                            <input type="hidden" name="product_id" id="product_id" value="{{$publication->id}}">
                                            <input type="hidden" name="price" id="price" value="{{$publication->price}}">

                                            <a href="{{ route('make-payment') }}" class="btn btn-warning pull-right"> <i class="fa fa-money"></i> Pay</a>
                                            <button type="submit" class="btn btn-danger pull-right" @if($in_cart) disabled="true"@endif 
                                            style="margin-right: 2%" id="cartBtn"> <i class="fa fa-shopping-basket"></i> Add </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </form>


                        <div class="row" style="border: thin dotted #e1e1e1"> 
                            <table class="table table-sm table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td style="padding: 5px 10px">ISBN/EAN</td>
                                        <td style="padding: 5px 10px">N/A</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">PUBLISHER</td>
                                        <td style="padding: 5px 10px">Department Of Petroleum Resources - DPR</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">PUBLICATION DATE</td>
                                        <td style="padding: 5px 10px">{{date('d M, Y', strtotime($publication->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">QUANTITY</td>
                                        <td style="padding: 5px 10px">
                                            <select name="quantity" id="quantity" style="width: 10%">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td style="padding: 5px 10px">NO. OF PAGES</td>
                                        <td style="padding: 5px 10px">N/A</td>
                                    </tr> --}}
                                    <tr>
                                        <td style="padding: 5px 10px">BOOK TYPE</td>
                                        <td style="padding: 5px 10px">E-BOOK</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 10px">AVAILABILITY</td>
                                        <td style="padding: 5px 10px"><span>In Stock</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>







            <div class="row">
                <div class="col-lg-7 pull-left" style="padding-bottom: 25px;">
                    <h3 class="text-info"> Description </h3>
                    <table class="table table-sm table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="padding: 5px 10px">Publication Description Here ... </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-5 pull-left" style="padding-bottom: 25px;">
                    <h3 class="text-info"> Reviews </h3>
                    <table class="table table-sm table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="padding: 5px 10px">Publication Reviews Here ... </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col --> 
        </div>         
    </div> <!-- end row -->







    <!-- The Modal -->
    <div class="modal" id="view-cart">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="pub-title">Your Cart <span class="badge badge-pill badge-warning" style="margin-top: -5px"> {{count($carts)}} </span> </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

                <!-- Modal body -->
                <div class="modal-body">
                

                    <div class="" id="your-cart">  </div>


                </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning btn-sm pull-right"> <i class="fa fa-money"></i> Pay</button>
          </div>

        </div>
      </div>
    </div>




    <!-- Edit Section  modal -->
    <div id="edit_section" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header header_bg">
                <h4 class="modal-title"> Edit Sections </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body">
              
                <div id="editsection"> </div>

              </div>
            </div>
        </div>  
    </div>






   



@endsection

@section('script')

<!-- AJAX TO POPULATE CONTENT-->
<script>
    $(function()
    {
        
    }); 





    function showmodal(modalid)
    {
        $('#'+modalid).modal('show');
    }

    function getId(id)
    {
        $('#ID').val(id);   
    }
        
</script>

<script>  


    //FOR CART Functionality
    $(function()
    {   
        $("#cartForm").on('submit', function(e)
        {     
            var price = $('#price').val();         
            $.ajax({
                url:'{{url('/publication/add-to-cart')}}',
                data:{
                    user_id:'{{\Auth::guard('external')->user()->id}}',
                    product_id:$('#product_id').val(),
                    price:price,
                    quantity:1,
                    date:'{{date('Y-m-d')}}',
                    time:'{{date('h:s:i')}}',
                    subtotal:(price * 1),
                    _token:'{{csrf_token()}}'
                },
                type:'POST',
                success:function(data)
                {  
                    $("#icart").html(data.cart+' Item(s)');  
                    $("#v_cart").css({ 'background-color': '#FFDB58', 'border-color': '#FFDB58' });     
                    $("#v_cart").html('Item Already In Cart');  
                    $("#cartBtn").attr("disabled", "disabled"); 

                    return toastr.success('Item Added To Cart Successfully.');
                },
                error:function()
                {
                    toastr.error('Error');           
                } 
            });

            return e.preventDefault();

        });

        $("#vcart").on('mouseover', function(e)
        {
            $("#vcart").html('View Your Cart Item');
        });

        $("#vcart").on('mouseout', function(e)
        {
            $("#vcart").html('Item Already In Cart');
        });
    });






    //load items in cart
    function load_items_in_cart()
    {  
        $('#your-cart').load("{{url('publication/nogiar/cart')}}");
        //$('#view-cart').modal('show');
    } 



</script>








    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif

@endsection