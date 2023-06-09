
<style type="text/css">
    #cate_name
    {
        margin: 1px 20px; font-size: 16px; color: #666;
    }

    /* Customize the label (the container) */
    .container 
    {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 1px;
      cursor: pointer;
      font-size: 14px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;

      font-weight: lighter;
    }

    /* Hide the browser's default radio button */
    .container input 
    {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom radio button */
    .checkmark 
    {
      position: absolute;
      top: 0;
      left: 0;
      height: 20px;
      width: 20px;
      background-color: #E5E4E2;
      border-radius: 15%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark 
    {
      background-color: #008B8B;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark 
    {
      background-color: #008B8B;   /*2196F3*/
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after 
    {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after 
    {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after 
    {
      top: 7px;
      left: 7px;
      width: 7px;
      height: 7px;
      border-radius:15%;
      background: white;
    }
</style>


<div class="" style="width: 100%">   
    {{-- <h5 style="color: #aaa"> All Users Login Logs </h5>         --}}

        <div class="row" style="">
            <div class="col-md-3" style="border: thin dotted #eee; padding: 0px">
                @if($audit_users)
                    @foreach($audit_users as $user)
                        <p class="cate-class" style="font-size: 11px" id="{{$user->id}}" onclick="setTab({{$user->id}})"> {{$user->name}} </p>                                    
                    @endforeach
                @endif
                {!! $audit_users->appends(Request::capture()->except('page'))->render() !!}
            </div>
            <div class="col-md-9 row" style="border: thin dotted #eee">
                {{-- <div class="col-md-4" style="border: thin dotted #eee">
                    <img src="{{URL::asset('assets/images/user.png')}}" alt="" height="200" class="logo-large center">

                </div> --}}



                <div class="col-md-5 table-responsive" style="border: thin dotted #eee; max-height: 400px; overflow: auto;">
                    <h5 style="color: #aaa"> Users Login Logs </h5>
                    <div id="login_logs">  </div>

                </div>



                <div class="col-md-7 table-responsive" style="border: thin dotted #eee; max-height: 400px; overflow: auto;">
                    <h5 style="color: #aaa"> User Action Logs </h5> 
                    <div id="action_logs">  </div>
                    
                </div>
            </div>         
        </div> <!-- end row -->

</div>



<script type="text/javascript">
    $(function()
    {
        $('.cate-class').click(function(e)
        { 
            var user_id = $(this).attr('id');
            $('#login_logs').load("{{url('getAuditLoginByUser')}}?user_id="+user_id); 
            $('#action_logs').load("{{url('getActionPerformedByUser')}}?user_id="+user_id); 
        });
    });




    function setTab(id) 
    {
        $('.cate-class').removeClass('cate-class_active');
        $('#'+id).addClass('cate-class_active');
    }



    $(function()
    { 

        $('[data-toggle="tooltip"]').tooltip();  
        $('.page-link').click(function(e)
        {
            e.preventDefault();
            var aID=$(this).attr('href');
            type=sessionStorage.getItem('name');
            $('#'+type).load(aID); 
        });
    });

    //SORT SCRIPT
    sortAscDesc();
</script>