<form id="" action="{{url('/workflows')}}" method="POST">
    <input type="hidden" class="form-control" id="module" name="setting_id" value="{{$wfsetting->id}}" required>
    {{ csrf_field() }}

    <div class="form-group row">
          <label for="role_name" class="col-sm-2 col-form-label">{{$wfsetting->module}} </label>
          <div class="col-sm-10">
              <select class="form-control users" name="workflow_id" >
                @forelse ($workflows as $workflow)
                  <option value="{{$workflow->id}}" {{ $workflow->id==$wfsetting->workflow_id? 'selected':'' }}>{{$workflow->name}}</option>
                @empty
                  <option value="">No Workflow Created</option>
                @endforelse
              </select>
          </div>
    </div>

    <input type="hidden" name="type" value="update_workflow_setting">


    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="update_wf_setting_btn" id="update_wf_setting_btn" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Setting</button>
    </div>
</form>