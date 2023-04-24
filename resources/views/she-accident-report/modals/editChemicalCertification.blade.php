<form id="hseChemCertForm" action="{{url('she-accident-report')}}" method="POST">
      {{ csrf_field() }}
      @php 
          $one_com = \App\company::where('id', $MANAGE->company_id)->first();                     
          $all_com = \App\company::orderBy('company_name', 'asc')->get();
          $one_cat = \App\she_pet_category::where('id', $MANAGE->certification_category_id)->first();                      
          $all_cat = \App\she_pet_category::where('type', 'Lab')->orderBy('category_name', 'asc')->get(); 
          $one_sta = \App\she_pet_status::where('id', $MANAGE->status_id)->first();                     
          $all_sta = \App\she_pet_status::where('type', 'Lab')->orderBy('status_name', 'asc')->get();
      @endphp


      <input type="hidden" class="form-control" id="id" name="id" value="{{$MANAGE->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_chemical_certification">



          <div class="form-group row">
            <label for="year_pett" class="col-sm-2 col-form-label"> Year </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Year - YYYY" name="year" id="year_pett" value="{{$MANAGE->year}}" required readonly>
            </div>

            <label for="month_pett" class="col-sm-2 col-form-label"> Month </label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Month - YYYY" name="month" id="month_pett" value="{{$MANAGE->month}}" required readonly>
            </div>
          </div> 



          <div class="form-group row">
            <label for="company_id_chems" class="col-sm-2 col-form-label"> Company</label>
            <div class="col-sm-10">
                <select class="form-control" name="company_id" id="company_id_chems" required>
                    @if($one_com) <option value="{{$one_com->id}}"> {{$one_com->company_name}} </option>
                    @else<option value="">  </option>@endif
                    @if(count($all_com)>0)
                        @foreach($all_com as $all_com)
                            <option value="{{$all_com->id}}">{{$all_com->company_name}}</option>
                        @endforeach
                    @endif
                    <option value="0"> Others</option>
                </select>
            </div>
        </div>

          <div class="form-group row">
            <label for="others" class="col-sm-2 col-form-label other_"> Others </label>
            <div class="col-sm-10 other_">
                <input type="text" class="form-control" placeholder="Company Name" name="others" id="others" value="{{$MANAGE->others}}">
            </div>
          </div>


        <div class="form-group row">
            <label for="chemical_name" class="col-sm-2 col-form-label"> Chemical Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Chemical Name" name="chemical_name" id="chemical_name" value="{{$MANAGE->chemical_name}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="certification_category_id" class="col-sm-2 col-form-label"> Certification Category </label>
            <div class="col-sm-10">
                <select class="form-control" name="certification_category_id" id="certification_category_id" required>
                    @if($one_cat) <option value="{{$one_cat->id}}"> {{$one_cat->category_name}} </option> 
                    @else <option> </option> @endif
                    @if($all_cat)
                        @foreach($all_cat as $all_cat)
                            <option value="{{$all_cat->id}}"> {{$all_cat->category_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div> 


        <div class="form-group row">
            <label for="chemical_type" class="col-sm-2 col-form-label"> Chemical Type </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Chemical Type" name="chemical_type" id="chemical_type" value="{{$MANAGE->chemical_type}}" required>
            </div>
        </div> 


        <div class="form-group row">
            <label for="certification_date" class="col-sm-2 col-form-label"> Certification Date </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" placeholder="Certification Date " name="certification_date" id="certification_date" value="{{$MANAGE->certification_date}}">
            </div>
        </div> 


        {{-- <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status_id" required>
                    @if($one_sta) <option value="{{$one_sta->id}}"> {{$one_sta->status_name}} </option> @else <option> </option> @endif
                    @if($all_sta)
                        @foreach($all_sta as $all_sta)
                            <option value="{{$all_sta->id}}"> {{$all_sta->status_name}} </option>                            
                        @endforeach
                    @endif
                </select>
            </div>
        </div>  --}}

        <div class="form-group row">
            <label for="status_id" class="col-sm-2 col-form-label"> Status </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Approval Status" name="status_id" id="status_id" value="{{$MANAGE->status_id}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="remark" class="col-sm-2 col-form-label"> Remark </label>
            <div class="col-sm-10">
                <textarea rows="2" class="form-control" placeholder="Remark" name="remark" id="remark">{{$MANAGE->remark}}</textarea>
            </div>
        </div>
        


        <div class="modal-footer" id="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="" id="" class="btn btn-dark waves-effect waves-light" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update Chemical Certification </button>
        </div>

</form>



<script>
    $(function()
    {
        $("#hseChemCertForm").on('submit', function(e)
        {   
            e.preventDefault();            
            editForm('hseChemCertForm', "{{url('/she-accident-report')}}", 'edit_app_chemical');

            displayChemicalCertification();
        });


        $('#year_pett').datepicker
        ({
          format: "yyyy", autoClose: true,
          viewMode: "years", 
          minViewMode: "years"
        });

        $('#month_pett').datepicker
        ({
          format: "MM",
          viewMode: "months", 
          minViewMode: "months"
        });





        //compute TOTAL       
        $(document).on("input", ".spill", function()
        {
            var total = 0;
            $('.spill').each(function()            
            {
                total += parseFloat($(this).val());
            });

            $("#total_no_of_spills").val(total);                        
       
        });
      
    });


    $(function()
    {        
        //show others
        $('.other_').hide();
        $("#company_id_chems").on('change',function(e)
        { 
            var comp = $('#company_id_chems').val();
            if(comp == 0){ $('.other_').show(); }else if(comp != 0){ $('.other_').hide(); }
        });
    });
</script>