<form id="" action="{{url('/bala')}}" method="POST">
          <?php 
                $one_com = \App\company::where('id', $M_FIELD_->company_id)->first();       $all_com = \App\company::get();
                $one_fie = \App\field::where('id', $M_FIELD_->field_id)->first();       $all_fie = \App\field::get();
          ?>
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$M_FIELD_->id}}" required>
            <input type="hidden" name="date_" id="date_" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="add_marginal_field">



        <div class="form-group row">
            <label for="company_id" class="col-sm-2 col-form-label"> Company </label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> @endif
                    @if($all_com)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}"> {{$all_com->company_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="field_id" class="col-sm-2 col-form-label"> Fields </label>
            <div class="col-sm-10">
                <select class="form-control" name="field_id" id="field_id" required>
                    @if($one_fie) <option value="{{$one_fie->id}}"> {{$one_fie->field_name}} </option> @endif
                    @if($all_fie)
                        @foreach($all_fie as $all_fie)
                            <option value="{{$all_fie->id}}"> {{$all_fie->field_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
          </div>

          <div class="form-group row">
                <label for="blocks" class="col-sm-2 col-form-label">OML Number </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="OML Number" name="blocks" id="blocks" value="{{$M_FIELD_->blocks}}" required>
                </div>
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Marginal Field </button>
          </div>
          </form>