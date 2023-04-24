<style>
    /* Customize the label (the container) */
    .container 
    {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
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
      height: 25px;
      width: 25px;
      background-color: #E5E4E2;
      border-radius: 50%;
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
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
</style>


    <div class="table-responsive"> 
     <form class="form-horizontal" method="post" action="{{url('/admin/delegate_role')}}">   
        {{ csrf_field() }} 

        <table class="table table-sm mb-0" border="0">
          <tr>
            <th style="width: 25%">
                <span style="font-size: 18px; color: #202020"> Divisions in PRIS  </span> <br> <br>

                @forelse($categories as $categories)
                    <p class="" id="dele_{{$categories->id}}" onclick="showDeleId({{$categories->id}})" onmouseup="setTab({{$categories->id}})"> 
                        <label class="container"> {{$categories->category_name}}
                          <input type="radio" id="perm_{{$categories->id}}" name="delegated_role" value="{{$categories->category_name}}" class="switch checkall" />
                          <span class="checkmark"></span>
                        </label>

                        {{-- <input type="radio" id="perm_{{$categories->id}}" name="delegated_role" value="{{$categories->category_name}}" class="switch checkall" /> {{$categories->category_name}}  --}}
                    </p>
                @empty
                @endforelse
            </th>

            <th style="width: 30%">
                <button data-toggle="tooltip" type="button" style="cursor: pointer; color:#E52B50; background: #fff; border:#FFB7C5 thin solid; font-size:14px; border-radius:25px; padding: 6px" class="btn btn-sm pull-right" data-original-title="Clear Boxes" id="clear_box">  <i class="fa fa-remove"></i> </button> 

                    <select class="pull-right form-control" name="dele_user_id" id="dele_user_id" style="width: 90%; margin-right: 10px" required>
                        <option value=""> Select User </option>
                        @forelse($delegate_users as $delegate_users)
                            <option value="{{$delegate_users->id}}">{{$delegate_users->name}}</option>
                        @empty
                        @endforelse
                    </select>
            </th>

            <th style="width: 35%">
                <div class="row">
                    <div class="col-md-4 col-xs-6"><label for="end_date" class="label pull-right" style="margin: top: 15px!important"> Expiry Date </label></div>
                    <div class="col-md-8 col-xs-6"><input type="date" class="form-control pull-left" name="end_date" id="end_date"></div>
                </div>
                
                 
            </th>

            <th style="width: 10%">
                <button type="submit" class="btn btn-info btn-sm pull-right" name="updated" id="updated" style=""><i class="fa fa-check"></i> Delegate </button>
            </th>
          </tr>

        </table>




         
        </form>
    </div> <!-- end col -->





    <script>
        $(function()
        {
            $('[data-toggle="tooltip"]').tooltip(); 
        });

        //on category click script
        function showDeleId(id) 
        {
          var perm_cate_id = id;                                   
        }


        function setTab(id) 
        {
            // $('.cate-class').removeClass('cate-class_active');
            // $('#dele_'+id).addClass('cate-class_active');
        }

        $(function()
        {            
            $('#perm_role_id').on("change", function(e)
            {   
                // $('input[type=checkbox]').each(function(){ $(this).removeAttr('checked'); });
                var role_id = $(this).val();    
                  $.get('{{url('checkPermissions')}}?role_id=' +role_id, function(data)
                  {  
                    // $('.checkall').attr( 'checked', false );
                    // 
                    $.each(data, function(index, permObj)
                    {
                        $('#perm_'+permObj.permission_id).attr( 'checked', true );                              
                    });
                  }); 
            });
        });

        function clearBoxes()
        {
            var all = document.getElementsByClassName("checkall");
            all.checked = true;
        }


        $('#perm_role_id').mouseleave(function()
        {
            //$('.checkall').attr( 'checked', true); 
        });

        $(function()
        {
            $('#clear_box').click(function()
            {
                //$('.checkall').removAattribute( 'checked');
                $('.trow').remove(); 
                $('#perm_role_id').get(0).selectedIndex = 0;
                $('.cate-class').removeClass('cate-class_active');
            });
        });

    </script>