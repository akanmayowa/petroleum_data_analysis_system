

 

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">

            @if($nogiar)                        
                <div class="card-body" id="editableSummer"> 

                    {{-- coat of arms --}}
                    <center>  <img src="{{URL::asset('assets/images/book.png')}}" class="img-responsive" width="50%" alt="NOGIAR Yearly Publiction"> </center>
                    <br> <br>
          
                     <PRE> {!! $nogiar->content !!} </PRE>
                </div>

            @else
              <h4>No Publiction Content</h4>
            @endif                 
                  
        </div>
    </div> <!-- end col -->      

</div> <!-- end row -->







        









<!-- PUBLICATION REPORT  -->
























































































