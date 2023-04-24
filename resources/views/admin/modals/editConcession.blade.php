<form id="concForm" action="{{url('/admin/update_concession')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$concession->id}}" required>
            <input type="hidden" name="date_c" id="date_c" value="{{\Carbon\Carbon::parse(date('Y-m-d h:i:s'))->diffForHumans()}}">
            <input type="hidden" class="form-control" name="type" id="" value="update_concession">


          <div class="form-group row">
                <label for="concession_name" class="col-sm-2 col-form-label"><i class="">Concession</i></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Concession Held" name="concession_name" id="concession_name" value="{{$concession->concession_name}}" required>
                </div>
          </div>


          <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label"><i class=""> Company </i></label>
                <div class="col-sm-4"> 
                    <select class="form-control" name="company_id" id="company_id" required>
                        @if($one_comp) <option value="{{$one_comp->id}}"> {{$one_comp->company_name}} </option> @else <option value=""> Select Company </option> @endif
                        @if($comp_ddl)
                            @foreach($comp_ddl as $comp_ddl)
                                <option value="{{$comp_ddl->id}}"> {{$comp_ddl->company_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>

                {{-- <label for="addEquity" class="col-sm-3 col-form-label"><span class=""> Edit Equity Distribution and % </span></label>
                <div class="col-sm-1">  <button type="button" name="" id="addEquitye" class="btn btn-sm btn-info pull-right" style="cursor: pointer; font-size:10px; border-radius:13px" data-toggle="tooltip" data-original-title="Add Equity Distribution by Percent for each Company Here"> <i class="fa fa-plus"></i> </button>  </div> --}}
          </div>


           <div id="equity_dive" style="">
              <div class="form-group row">
                    <label for="equity_1" class="col-sm-2 col-form-label"><i class=""> Equity Holder 1 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_1" id="equity_1">
                            @if($one_equ_1) <option value="{{$one_equ_1->id}}"> {{$one_equ_1->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_1)
                                @foreach($all_equ_1 as $all_equ_1)
                                    <option value="{{$all_equ_1->id}}"> {{$all_equ_1->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_1" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_1" id="percentage_1" value="{{$concession->percentage_1}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_2" class="col-sm-2 col-form-label"><i class=""> Equity Holder 2 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_2" id="equity_2">
                            @if($one_equ_2) <option value="{{$one_equ_2->id}}"> {{$one_equ_2->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_2)
                                @foreach($all_equ_2 as $all_equ_2)
                                    <option value="{{$all_equ_2->id}}"> {{$all_equ_2->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_2" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_2" id="percentage_2" value="{{$concession->percentage_2}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_3" class="col-sm-2 col-form-label"><i class=""> Equity Holder 3 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_3" id="equity_3">
                            @if($one_equ_3) <option value="{{$one_equ_3->id}}"> {{$one_equ_3->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_3)
                                @foreach($all_equ_3 as $all_equ_3)
                                    <option value="{{$all_equ_3->id}}"> {{$all_equ_3->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_3" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_3" id="percentage_3" value="{{$concession->percentage_3}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_4" class="col-sm-2 col-form-label"><i class=""> Equity Holder 4 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_4" id="equity_4">
                            @if($one_equ_4) <option value="{{$one_equ_4->id}}"> {{$one_equ_4->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_4)
                                @foreach($all_equ_4 as $all_equ_4)
                                    <option value="{{$all_equ_4->id}}"> {{$all_equ_4->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_4" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_4" id="percentage_4" value="{{$concession->percentage_4}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_5" class="col-sm-2 col-form-label"><i class=""> Equity Holder 5 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_5" id="equity_5">
                            @if($one_equ_5) <option value="{{$one_equ_5->id}}"> {{$one_equ_5->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_5)
                                @foreach($all_equ_5 as $all_equ_5)
                                    <option value="{{$all_equ_5->id}}"> {{$all_equ_5->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_5" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_5" id="percentage_5" value="{{$concession->percentage_5}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_6" class="col-sm-2 col-form-label"><i class=""> Equity Holder 6 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_6" id="equity_6">
                            @if($one_equ_6) <option value="{{$one_equ_6->id}}"> {{$one_equ_6->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_6)
                                @foreach($all_equ_6 as $all_equ_6)
                                    <option value="{{$all_equ_6->id}}"> {{$all_equ_6->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_6" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_6" id="percentage_6" value="{{$concession->percentage_6}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_7" class="col-sm-2 col-form-label"><i class=""> Equity Holder 7 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_7" id="equity_7">
                            @if($one_equ_7) <option value="{{$one_equ_7->id}}"> {{$one_equ_7->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_7)
                                @foreach($all_equ_7 as $all_equ_7)
                                    <option value="{{$all_equ_7->id}}"> {{$all_equ_7->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_7" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_7" id="percentage_7" value="{{$concession->percentage_7}}">
                    </div>
              </div>


              <div class="form-group row">
                    <label for="equity_8" class="col-sm-2 col-form-label"><i class=""> Equity Holder 8 </i></label>
                    <div class="col-sm-4">
                        <select class="form-control" name="equity_8" id="equity_8">
                            @if($one_equ_8) <option value="{{$one_equ_8->id}}"> {{$one_equ_8->company_name}} </option> @else <option value=""> Select Equity Holder </option> @endif
                            @if($all_equ_8)
                                @foreach($all_equ_8 as $all_equ_8)
                                    <option value="{{$all_equ_8->id}}"> {{$all_equ_8->company_name}} </option>                                
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <label for="percentage_8" class="col-sm-2 col-form-label"><i class=""> Percentage % </i></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Shares in Percentage" name="percentage_8" id="percentage_8" value="{{$concession->percentage_8}}">
                    </div>
              </div>
          </div>

          <div class="form-group row">
                <label for="area" class="col-sm-2 col-form-label"><i class=""> Area </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Area in Square Km" name="area" id="area" value="{{$concession->area}}">
                </div>

                <label for="geological_terrain_id" class="col-sm-2 col-form-label"><i class=""> Terrain </i></label>
                <div class="col-sm-4">
                    <select class="form-control" name="geological_terrain_id" id="geological_terrain_id">
                        @if($one_ter) <option value="{{$one_ter->id}}"> {{$one_ter->terrain_name}} </option> @else <option value=""> Select Geological Terrain </option> @endif
                        @if($all_ter)
                            @foreach($all_ter as $all_ter)
                                <option value="{{$all_ter->id}}"> {{$all_ter->terrain_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>



          <div class="form-group row">
                <label for="contract_id" class="col-sm-2 col-form-label"><i class=""> Contract </i></label>
                <div class="col-sm-10">
                    <select class="form-control" name="contract_id" id="contract_id">
                        @if($one_coc) <option value="{{$one_coc->id}}"> {{$one_coc->contract_name}} </option> @else <option value=""> Select Contract Type </option> @endif
                        @if($all_coc)
                            @foreach($all_coc as $all_coc)
                                <option value="{{$all_coc->id}}"> {{$all_coc->contract_name}} </option>                                
                            @endforeach
                        @endif
                    </select>
                </div>
          </div>


          <div class="form-group row">
                <label for="award_date" class="col-sm-2 col-form-label"><i class=""> Award Year </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Year - YYYY" name="award_date" id="award_date" value="{{$concession->award_date}}">
                </div>

                <label for="license_expire_date" class="col-sm-2 col-form-label"><i class=""> License Expires </i></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="License Expiry Date" name="license_expire_date" id="license_expire_date" value="{{$concession->license_expire_date}}">
                </div>
          </div>


          <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"><i class=""> Comment </i></label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" placeholder="Comment Here" name="comment" id="comment">{{$concession->comment}}</textarea>
                </div>
          </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark pull-right" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Concession </button>
          </div>
</form>


<script>
  $(function()
  {  
        $("#concForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('concForm', "{{url('/admin/update_concession')}}", 'edit_conc');

            displayConcession();
        });


        $('#award_dated').datepicker(
        {
          autoclose: true, startView: 'decade',format: "yyyy",
          viewMode: "years", 
          minViewMode: "years"
      });
  });
</script>