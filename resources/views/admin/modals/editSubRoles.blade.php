<form id="" action="{{url('/admin')}}" method="POST">

          <?php $one_role = \App\roles::where('id', $USER->role)->first();       $all_roles = \App\roles::orderBy('role_name', 'asc')->get(); ?>
            <input type="hidden" class="form-control" id="id" name="id" value="{{$ROLE_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_sub_roles">
            {{ csrf_field() }}


         <div class="form-group row">
            <label for="role_id" class="col-sm-3 col-form-label"> Role </label>
            <div class="col-sm-9">
                <select class="form-control" name="role_id" id="role_id" required>
                 @if($one_role) <option value="{{$one_role->id}}"> {{$one_role->role_name}} </option> @else <option value=""> Select Role </option> @endif
                    @if(count($all_roles)>0)
                        @foreach($all_roles as $all_roles)
                            <option value="{{$all_roles->id}}">{{$all_roles->role_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
         </div> 

          <div class="form-group row">
                <label for="sub_role_name" class="col-sm-3 col-form-label"> Sub Role Name </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Sub Role Name" name="sub_role_name" id="sub_role_name" value="{{$ROLE_->sub_role_name}}" required>
                </div>
          </div>


          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label"> Description </label>
            <div class="col-sm-9">
                <textarea rows="2" class="form-control" placeholder="Role Description" name="description" id="description" required>{{$ROLE_->description}}</textarea>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Sub Role</button>
          </div>
</form>