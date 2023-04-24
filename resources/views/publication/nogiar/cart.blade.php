
 

    <div class="table-responsive" style="border: thin dotted #e1e1e1"> 
        <table class="table table-sm table-striped">
            <thead class="thead-dark">
                <tr>
                    <td style="padding: 3px 10px">#</td>
                    <td style="padding: 3px 10px">Image</td>
                    <td style="padding: 3px 10px">Item</td>
                    <td style="padding: 3px 10px">Qty</td>
                    <td style="padding: 3px 10px">Price</td>
                    <td style="padding: 3px 10px">Subtotal</td>
                    <td style="padding: 3px 10px"></td>
                </tr>
            </thead>
            <tbody> @php $total = 0; @endphp
                @forelse($carts as $cart)
                    <tr id="row_{{$cart->id}}"> 
                        <td style="padding: 3px 10px">{{$cart->id}}</td>
                        <td style="padding: 3px 10px"><img src="{{URL::asset('assets/images/book.png')}}" alt="" height="20" class=""></td>
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

                            {{-- <button type="button" class="btn-sm pull-right remove_item" style="color: red;" tooltip="true" title="Remove Item" id="{{$cart->id}}" onclick="deleteItem(this.id)"> <i class="fa fa-close"></i>    </button> --}}
                        </td>
                    </tr>
                @empty
                    No Item In Cart !
                @endforelse
                    <tr>
                        <td style="padding: 3px 10px; text-align: right" colspan="7">
                            Total : &#8358;{{number_format($total, 2)}}
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>






<script>  
   
    //FOR CART Functionality
    $(function()
    {   
        $("#cartItemForm").on('submit', function(e)
        {    
            var id = $(this).attr('id');
            $('#row_'+id).remove();        
            $.ajax({
                url:'{{url('/remove-item-from-cart')}}/'+id
                data:{
                    id:id,
                    _method:'delete',
                    _token:'{{csrf_token()}}'

                },
                type:'POST',
                success:function(data)
                {  
                    return toastr.success('Item Remove From Cart Successfully.');
                },
                error:function()
                {
                    toastr.error('Error');           
                } 
            });

            return e.preventDefault();
            
        });
    });


    //load items in cart
    function load_items_in_cart()
    {  
        $('#your-cart').load("{{url('publication/nogiar/cart')}}");
        //$('#view-cart').modal('show');
    } 



</script>
