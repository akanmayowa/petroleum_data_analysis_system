<form id="streamForm" action="{{url('/admin/add_streams')}}" method="POST">
    {{ csrf_field() }}
            <input type="hidden" name="id" id="id" value="{{$STR->id}}">
            <input type="hidden" name="_date" id="_date" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_streams">

          <div class="form-group row">
                <label for="stream_code" class="col-sm-2 col-form-label"> Stream code </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Stream Code" name="stream_code" id="stream_code" value="{{$STR->stream_code}}" required readonly>
                </div>
          </div>

          <div class="form-group row">
                <label for="stream_name" class="col-sm-2 col-form-label"> Stream </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Stream Name" name="stream_name" id="stream_name" value="{{$STR->stream_name}}" 
                    required>
                </div>
          </div>

          <div class="form-group row">
            <label for="company_id_se" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_se">
                    @if($one_com)<option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value=""> </option> @endif
                    @if(count($all_com)>0)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="production_type" class="col-sm-2 col-form-label"> Production Type</label>
            <div class="col-sm-10">
                <select class="form-control" name="production_type" id="production_type">                  
                    @if($one_typ)<option value="{{$one_typ->id}}"> {{$one_typ->production_type_name}} </option> 
                    @else <option value=""> </option>@endif
                    @if(count($all_typ)>0)
                        @foreach($all_typ as $all_typ)
                            <option value="{{$all_typ->id}}">{{$all_typ->production_type_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Stream</button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#streamForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('streamForm', "{{url('/admin/add_streams')}}", 'edit_stream');

            displayStream();
        });
    });        
  </script>