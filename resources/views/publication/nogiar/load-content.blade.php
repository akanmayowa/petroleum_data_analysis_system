@forelse($nogiars as $nogiar)
  <li class="scene" style="margin: 2% 1.1%!important">
      <div class="movie" onclick="return true">
          <div class="poster" id="{{$nogiar->nogiar_id}}">
              
              {{-- <img style="width: 75px;position: relative;left: 60px;top: 60px;" src="{{ URL::asset('assets/images/coa.png') }}" /> --}}

              <div data-tool id="prev{{$nogiar->nogiar_id}}" class="tool" 
                  style="position: absolute; top: 35%; left: 35%; display: none">
                  {{-- <a href="#" id="{{$nogiar->id}}" class="btn btn-sm pub_id" style="background: #008B8B; color: #fff" title="Preview {{$nogiar->year}} Publication" data-toggle="modal" data-target="#preview-publication">
                      Preview
                  </a>  --}} 

                  @if($nogiar->price > 0)  
                      <div class="price_">                                         
                          <button type="button" class="btn btn-danger btn-sm pull-left" 
                          style="width: 100%; margin-left: -60%;"> &#8358; {{$nogiar->price}} </button> 

                          <a href="{{ route('add-to-cart-view', $nogiar->id) }}" id="{{$nogiar->id}}" 
                              class="btn btn-warning btn-sm pub_id pull-right" style="color: #fff; margin-right: 0%" title="Add {{$nogiar->year}} Publication To Cart" target="_blank">
                              Buy
                          </a>
                      </div>
                  @else

                      <div class="price_"> 
                          <button type="button" class="btn btn-danger btn-sm pull-left" 
                          style="width: 100%; margin-left: -60%;"> Free </button>

                          <a href="{{ route('add-to-cart-view', $nogiar->id) }}" id="{{$nogiar->id}}" 
                              class="btn btn-warning btn-sm pub_id pull-right" style="color: #fff; margin-right: 0%" title="Add {{$nogiar->year}} Publication To Cart" target="_blank">
                              Buy
                          </a>
                      </div>
                  @endif

                  <button type="button" class="btn btn-sm pull-left name_" 
                      style="width: 100%; margin: 10% auto 1% -41% !important; color: #E52B50"> {{$nogiar->nogiar_id}} 
                  </button>      
              </div> 
              {{-- <div class="name_">
                 {{$nogiar->nogiar_id}}
              </div>  --}}


          </div>
          {{-- <div class="info">
              <p class="book book-leaf" style="background-image: url({{URL::asset('assets/images/leaves.jpg')}});background-size: cover; height: 100%;">
                  <img src="?9090" alt="user-img" class="img-fluid" />
                  
                  {!!  $nogiar->nogiar_id !!}
              </p>
          </div> --}}

      </div>
  </li>
@empty
    No Publication In Shelve Yet !
@endforelse

{{$nogiars->render() }}



 
    {{-- <div class="col-md-12">
        <div class="col-md-2 pull-left shelve"> 
            <div class="book tool-container"> {!! $nogiar->content !!}
                  
                <span>
                    <div data-tool id="tool" style="position: absolute; top: 46%; left: 35%; display: none;">
                        <a href="#" id="{{$nogiar->id}}" class="btn btn-sm pub_id" style="background: #008B8B; color: #fff" title="Use Template" data-toggle="modal" data-target="#preview-publication">
                            <i class="fa fa-pencil"> Preview </i>
                        </a>        
                    </div>                                          
                </span>

             </div>
        </div>
    </div>
 --}}


<!-- The Modal -->
<div class="modal" id="preview-publication">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Publication</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        

        <div id="pub-content">  </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default">Add To Cart</button>
      </div>

    </div>
  </div>
</div>




        









<!-- PUBLICATION REPORT  -->
























































































