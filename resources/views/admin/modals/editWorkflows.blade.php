<form id="" action="{{url('/workflows')}}" method="POST">
    <input type="hidden" class="form-control" id="id" name="workflow_id" value="{{$workflow->id}}" required>
    {{ csrf_field() }}

      <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" id="ewfname" value="{{$workflow->name}}" name="wfname" placeholder="">
      </div>

      <div class="panel panel-info panel-line">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Stage Details</h3>
          </div>

          <div class="panel-body">
            <ul id="estgcont" style="padding: 0px">
              @foreach ($workflow->stages as $stage)
                <li style="list-style:none;">
                  <div class="form-cont">
                    <input type="hidden" name="stage_id[]" value="{{$stage->id}}">
                    <div class="form-group row">
                      <label for="" class="col-sm-1 col-form-label">Name</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="stagename[]" id="" placeholder="" value="{{$stage->name}}" required>
                      </div>

                      <label for="" class="col-sm-1 col-form-label">Type</label> 
                      <div class="col-sm-5">
                        <select class="form-control select-type " name="wftype[]" >
                          <option value="1" {{ $stage->type==1? 'selected':'' }}>User</option> 
                          <option value="2" {{ $stage->type==2? 'selected':'' }}>Role</option> 
                        </select>
                      </div>
                    </div>


                    @if($stage->type==1) 
                    <div class="form-group users-div" >
                      <label for="">Users</label>
                      <select class="form-control users" name="user_id[]" >
                        @forelse ($users as $user)
                          <option value=""> </option>
                          <option value="{{$user->id}}" {{ $user->id==$stage->user->id? 'selected':'' }}>{{$user->name}}</option>
                        @empty
                          <option value="">No Users Created</option>
                        @endforelse
                      </select>
                    </div>

                    <div class="form-group roles-div" style="display: none;"> 
                      <label for="">Roles</label> 
                      <select class="form-control roles" name="role[]" > 
                      @forelse ($wfroles as $role)
                         <option value=""> </option>
                         <option value="{{$role->id}}" >{{$role->role_name}}</option>
                         @empty
                          <option value="">No Roles Created</option>
                       @endforelse 
                        
                      </select>
                    </div>

                    @elseif($stage->type==2)
                    <div class="form-group users-div" style="display: none;">
                      <label for="">Users</label>
                      <select class="form-control users" name="user_id[]" >
                        @forelse ($users as $user)
                          <option value=""> </option>
                          <option value="{{$user->id}}" >{{$user->name}}</option>
                        @empty
                          <option value="">No Users Created</option>
                        @endforelse
                      </select>
                    </div>

                    <div class="form-group roles-div" > 
                      <label for="">Roles</label> 
                      <select class="form-control roles" name="role[]" > 
                      @forelse ($wfroles as $role)
                         <option value=""> </option>
                         <option value="{{$role->id}}" {{ $role->id==$stage->role->id? 'selected':'' }}>{{$role->role_name}}</option>
                         @empty
                          <option value="">No Roles Created</option>
                       @endforelse                                
                      </select>
                    </div>
                       
                    @endif
                    <div class="form-group">
                      <button type="button" class="btn btn-danger " id="eremStage">Remove Stage</button>
                    </div>
                  </div>
                  </div>
                </li>
              @endforeach

            </ul>
            <button type="button" id="eaddStage" name="button" class="btn btn-primary">New Stage</button>
          </div>
      </div>

      <input type="hidden" value="update_workflow" name="type">

      


  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" name="update_workflow_btn" id="update_rol_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Workflow</button>
  </div>
</form>