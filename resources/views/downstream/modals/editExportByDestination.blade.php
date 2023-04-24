 <form id="expDestForm" action="{{url('/downstream')}}" method="POST">
          {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$EXP_DEST_->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_crude_export_destination">  

                 

          <div class="form-group row">
            <label for="year_dest" class="col-sm-1 col-form-label"> Year </label>
            <div class="col-sm-11">
                <input type="text" class="form-control" placeholder="Year Of Export" name="year" id="year_dest" value="{{$EXP_DEST_->year}}" required="" readonly>
            </div>            
          </div> 


          <div class="form-group row">
            <label for="stream_id" class="col-sm-1 col-form-label"> Stream </label>
            <div class="col-sm-5">
                <select class="form-control" name="stream_id" id="stream_id" required>
                    @if($one_str) <option value="{{$one_str->id}}"> {{$one_str->stream_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_str)>0)
                        @foreach($all_str as $all_str)
                            <option value="{{$all_str->id}}">{{$all_str->stream_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="country_id" class="col-sm-1 col-form-label"> Country </label>
            <div class="col-sm-5">
                <select class="form-control" name="country_id" id="country_id">
                    @if($one_con) <option value="{{$one_con->id}}"> {{$one_con->country_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_con)>0)
                        @foreach($all_con as $all_con)
                            <option value="{{$all_con->id}}">{{$all_con->country_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div> 
          </div> 


           <div class="form-group row">
            <label for="destination" class="col-sm-1 col-form-label"> Destination </label>
            <div class="col-sm-5">
                <select class="form-control" name="destination" id="destination" readonly>
                    @if($one_cont) <option value="{{$one_cont->id}}"> {{$one_cont->name}} </option> 
                    @else <option value=""> </option> @endif
                    @if(count($all_cont)>0)
                        @foreach($all_cont as $all_cont)
                            <option value="{{$all_cont->id}}">{{$all_cont->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <label for="company_id" class="col-sm-1 col-form-label"> Company </label>
            <div class="col-sm-5">
                <select class="form-control" name="company_id" id="company_id">
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option> 
                    @else <option value="">  </option> @endif
                    @if(count($all_com)>0)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
          </div>         
    

          <div class="form-group row" style="height: 8px"> <hr> </div>

          <div class="form-group row">
            <label for="january_ce" class="col-sm-1 col-form-label"> January </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="January" name="january" id="january_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->january}}">
            </div>

            <label for="febuary_ce" class="col-sm-1 col-form-label"> February </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="February" name="febuary" id="febuary_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->febuary}}">
            </div>
          </div>         

          <div class="form-group row">
            <label for="march_ce" class="col-sm-1 col-form-label"> March </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="March" name="march" id="march_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->march}}">
            </div>

            <label for="april_ce" class="col-sm-1 col-form-label"> April </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="April" name="april" id="april_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->april}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="may_ce" class="col-sm-1 col-form-label"> May </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="May" name="may" id="may_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->may}}">
            </div>

            <label for="june_ce" class="col-sm-1 col-form-label"> June </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="June" name="june" id="june_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->june}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="july_ce" class="col-sm-1 col-form-label"> July </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="July" name="july" id="july_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->july}}">
            </div>

            <label for="august_ce" class="col-sm-1 col-form-label"> August </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="August" name="august" id="august_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->august}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="september_ce" class="col-sm-1 col-form-label"> September </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="September" name="september" id="september_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->september}}">
            </div>

            <label for="october_ce" class="col-sm-1 col-form-label"> October </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="October" name="october" id="october_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->october}}">
            </div>
          </div>          

          <div class="form-group row">
            <label for="november_ce" class="col-sm-1 col-form-label"> November </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="November" name="november" id="november_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->november}}">
            </div>

            <label for="december_ce" class="col-sm-1 col-form-label"> December </label>
            <div class="col-sm-5">
                <input type="number" step="0.01" class="form-control" placeholder="December" name="december" id="december_de" onkeyup="checkValue(this)" value="{{$EXP_DEST_->december}}">
            </div>
          </div>           


         
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Export Destination </button>
          </div>
</form>


<script>

    $(function()
    {
        $("#expDestForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('expDestForm', "{{url('/downstream')}}", 'editexport_destination');

            displayDestination();
        });


        $('#year_dest').datepicker(
        {
            autoclose: true,startView: 'decade',format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        })

        $('#month_dest').datepicker(
        {
            autoclose: true, format: "MM",
            viewMode: "months", 
            minViewMode: "months"
        })
    });

</script>