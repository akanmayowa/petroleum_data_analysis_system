@extends('external.layouts.app')

@section('content')

<style>
    .pay
    {
        background-color: #396;
        color: #fff;
    }
    .pay:hover
    {
        background-color: #006B3C;
        color: #fff;
    }
</style>




<div class="row">
       <div class="col-lg-12">     
        <div class="card m-b-20">
            <div class="card-body" style=""> 
                
                <div class="col-lg-7 pull-left" style="padding-bottom: 25px; border: thin dotted #ccc">
                    <div class="col-md-12" id="shelve">
                        <div class="table-responsive" style="border: thin dotted #e1e1e1"> 
                            <table class="table table-sm table-bordered table-striped">
                                <tbody class="thead-dark">
                                    <tr>
                                        <td style="padding: 3px 10px">#</td>
                                        <td style="padding: 3px 10px">Image</td>
                                        <td style="padding: 3px 10px">Item</td>
                                        <td style="padding: 3px 10px">Qty</td>
                                        <td style="padding: 3px 10px">Price</td>
                                        <td style="padding: 3px 10px">Subtotal</td>
                                        <td style="padding: 3px 10px"></td>
                                    </tr>
                                </tbody>
                                <tbody> 
                                    @php $total = 0; $carts = \App\Cart::where('user_id', \Auth::guard('external')->user()->id)->get(); @endphp
                                    @forelse($carts as $cart)
                                        <tr id="row_{{$cart->id}}"> 
                                            <td style="padding: 3px 10px">{{$cart->id}}</td>
                                            <td style="padding: 3px 10px"><img src="{{URL::asset('assets/images/nogiar-3D.jpg')}}" alt="" height="20" class=""></td>
                                            <td style="padding: 3px 10px">{{$cart->product->nogiar_id}}</td>
                                            <td style="padding: 3px 10px">{{$cart->quantity}}</td>
                                            <td style="padding: 3px 10px">&#8358;{{number_format($cart->price, 2)}}</td>
                                            <td style="padding: 3px 10px">&#8358;{{number_format($cart->subtotal, 2)}}</td>
                                            <td style="padding: 3px 10px">  @php $total += ($cart->price * $cart->quantity); @endphp
                                               <form method="post" action="{{ route('remove-item', $cart->id)}}">
                                                   @method('delete')
                                                   @csrf
                                                   <button type="submit" class="" style="background-color: #C04000; color: #fff" onclick="return confirm('Are you sure you want to remove item from cart?')"> <i class="fa fa-close"></i> </button>
                                               </form>
                                            </td>
                                        </tr>
                                    @empty
                                        No Item In Cart !
                                    @endforelse
                                        {{-- <tr>
                                            <td style="padding: 3px 10px; text-align: right" colspan="7">
                                                Total : &#8358;{{number_format($total, 2)}}
                                            </td>
                                        </tr> --}}
                                </tbody>
                            </table>


                            {{-- payment start --}}

                                <form>
                                    <script src="http://www.remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
                                    @if($price > 0)
                                        <button type="button" class="btn btn-sm pull-right pay" style="" onclick="makePayment(140700251)">
                                            <i class="fa fa-money"></i> Make Payment 
                                        </button>
                                    @else
                                        <a href="#" class="btn btn-sm pull-right pay" style="">
                                            <i class="fa fa-eye"></i> View Publication 
                                        </a>
                                    @endif
                                </form>

                                <script>
                                    function makePayment(customerId) 
                                    {
                                      var paymentEngine = RmPaymentEngine.init(
                                      {
                                         key: 'a2VsdmluQHNuYXBuZXQuY29tLm5nfDQyNDUxNjE0fDQzNzM2NTA4NzFmNGIxMWU2MGM3YjhhNzI2MjllMGIwM2ZmOTYxZDNkMjUwZDY0N2Q1MjRjZmEyMDM1OGNmMjRjNTUxNTYyZjlmNzc3ZGU4YzlkNmRlNTdhZDgxMGQwNjAyMzExMjRjYTNiOWZkMjcxODZhNjBkZTAxNzY5ZjY0',
                                          customerId: customerId, //"140700251",
                                          firstName: "Lisa",
                                          lastName: "Spark",
                                          email: "demo@remita.net",
                                          narration: "Payment Description",
                                          amount: 199,
                                          onSuccess: function (response) 
                                          {
                                            console.log('callback Successful Response', response);
                                          },
                                          onError: function (response) 
                                          {
                                            console.log('callback Error Response', response);
                                          },
                                          onClose: function () 
                                          {
                                            console.log("closed");
                                          }
                                          });
                                          paymentEngine.showPaymentWidget();
                                        }
                                </script>
                               
                            {{-- payment stop --}}

                        </div>
                    </div>
                </div> 

                <div class="col-lg-5 pull-left" style="padding-bottom: 25px;">
                    <div class="col-md-12" id="shelve">                           


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

  








@endsection

@section('script')

<!-- AJAX TO POPULATE CONTENT-->
<script>

    (function($)
    {
        $(function()
        {
            
        });
    })(jQuery);  
        
</script>

    @if(Session::has('info'))
        <script">
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