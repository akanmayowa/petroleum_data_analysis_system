 <form id="uForm" action="{{route('admin.updateuser')}}" method="POST">
        @php 
            $one_role = \App\roles::where('id', $USER->role)->first();  $all_roles = \App\roles::orderBy('role_name', 'asc')->get(); 
        @endphp
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$USER->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            {{-- <input type="hidden" class="form-control" name="type" id="" value="add_users"> --}}


            <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Email </label>
                        <div class="col-10">
                            <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email" value="{{$USER->email}}" focused>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Fullname </label>
                        <div class="col-10">
                            <input class="form-control" type="text" required="" placeholder="Fullname" name="name" id="name" value="{{$USER->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year_rc" class="col-sm-2 col-form-label"> Password </label>
                        <div class="col-10">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password" value="{{$USER->password}}" readonly="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label"> Roles </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role" id="role" required>
                                @if($one_role) <option value="{{$one_role->id}}"> {{$one_role->role_name}} </option> @else <option value=""> N/A</option> @endif
                                    @if(count($all_roles)>0)
                                        @foreach($all_roles as $all_roles)
                                            <option value="{{$all_roles->id}}">{{$all_roles->role_name}}</option>
                                        @endforeach
                                    @endif
                            </select>
                        </div>
                    </div>    

         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update User </button>
          </div>
</form>




  <script>
    $(function()
    {      
        $("#uForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('uForm', "{{url('/admin/updateuser')}}", 'edituser');

            displayUsers();
        });
    });        
  </script>
