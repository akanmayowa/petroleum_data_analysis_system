
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

<div class="table-responsive"> 
<form class="form-horizontal" method="post" action="{{url('/admin/save_role')}}">   
    {{ csrf_field() }}  

    <table class="table table-sm mb-0" border="0">
      <tr>
        <th style="width: 25%">
            <span style="font-size: 18px; color: #202020">  Divisions in PRIS  </span>
        </th>

        <th style="width: 25%">
            <button data-toggle="tooltip" type="button" style="cursor: pointer; color:#fff; font-size:10px; border-radius:13px;" class="btn btn-danger btn-sm pull-right" data-original-title="Clear Boxes" id="clear_box">  <i class="fa fa-remove"></i> </button> 

            <select class="pull-right form-control" name="perm_role_id" id="perm_role_id" style="width: 70%; margin-right: 10px" required>
                <option value=""> Select Role </option>
                @if(count($Role)>0)
                    @foreach($Role as $Role)
                        <option value="{{$Role->id}}">{{$Role->role_name}}</option>
                    @endforeach
                @endif
            </select>
        </th>

        <th style="width: 40%">
            <h5 style="margin-left: 25px; color: #202020">  
                <label class="container"> Check All
                  <input type="checkbox" id="check_all">
                  <span class="checkmark"></span>
                </label>
            </h5>
        </th>

        <th style="width: 10%">
            <button type="submit" class="btn btn-info btn-sm pull-right" name="updated" id="updated" style="" onclick="return confirm('Are you sure you want to assign permission to Role?')"><i class="fa fa-check"></i> Assign </button> 
        </th>
      </tr>




      <tr> 
        <th style="width: 25%">
            @forelse($categories as $categories)
                <p class="cate-class" id="{{$categories->id}}" onclick="showId({{$categories->id}})" onmouseup="setTab({{$categories->id}})"> {{$categories->category_name}} </p>
            @empty
            @endforelse
        </th>

        <th style="width: 25%">
            
        </th>

        <th style="width: 40%; padding: 5px 25px">
            <table class="table">                        
                <tr id="constants">    </tr>
            </table>
        </th>

        <th style="width: 10%">
            
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
    function showId(id) 
    {
      var permission_category_id = id;

      $.get('{{url('getConstants')}}?permission_category_id=' +permission_category_id, function(data)
      {  //success data
         $('#constants').empty();
        $.each(data, function(index, constObj)
        {         
          $('#constants').append('<tr class="trow"> <th> <label class="container"> '+constObj.permission_name+'  <input type="checkbox" id="perm_'+constObj.id+'" name="permission_list[]" value="'+constObj.id+'" class="switch checkall" />   <span class="checkmark"></span>   </label>  </th> <tr>');      
        });
        $('#constants').append('  <input type="hidden" name="cate_id" value="'+id+'" />');
        //$('#const').val(id);
        $('#'+id).val(id);
      }); 
      
      $('#perm_role_id').get(0).selectedIndex = 0;
    }


    function setTab(id) 
    {
        $('.cate-class').removeClass('cate-class_active');
        $('#'+id).addClass('cate-class_active');
    }

    $(function()
    {
        $('#cleared').on("change", function(e)
        {   
             alert(); //$('.checkall').attr( 'checked', true );         
        });

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



    //CHECK ALL CHECKBOXES
    $(function()
    {
        $('#check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked);    
        });
    });

</script>

