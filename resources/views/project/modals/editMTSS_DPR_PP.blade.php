<form id="" action="{{url('/project')}}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" name="id" value="{{$DPR_PP->id}}" required>
            <input type="hidden" class="form-control" name="type" id="" value="add_mtss_dpr_pp">



        <div class="form-group row">
            <label for="policy_objective" class="col-sm-2 col-form-label"> MTSS DPR PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="2016-2020 MTSS Policy Objectives" name="policy_objective" id="policy_objective" value="{{$DPR_PP->policy_objective}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_pillar" class="col-sm-2 col-form-label"> MTSS DPR PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Based Budget Set By FGN" name="zbb_pillar" id="zbb_pillar" value="{{$DPR_PP->zbb_pillar}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_pp" class="col-sm-2 col-form-label"> ZBB PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Based Budget Program Priority" name="zbb_pp" id="zbb_pp" value="{{$DPR_PP->zbb_pp}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="zbb_spp" class="col-sm-2 col-form-label"> ZBB SPP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Zero Bassed Budget Sub-Programme Priority" name="zbb_spp" id="zbb_spp" value="{{$DPR_PP->zbb_spp}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="dwp_pp" class="col-sm-2 col-form-label"> DWP PP </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="DPR Work Plan- Program Priority" name="dwp_pp" id="dwp_pp" value="{{$DPR_PP->dwp_pp}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="kpi" class="col-sm-2 col-form-label"> KPIs </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="2016-2020 MTSS Policy Objectives" name="kpi" id="kpi" value="{{$DPR_PP->kpi}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="kpi_performance" class="col-sm-2 col-form-label"> Performance </label>
            <div class="col-sm-10">
                <select class="form-control" name="kpi_performance" id="kpi_performance" required>
                    @if($DPR_PP) <option value="{{$DPR_PP->kpi_performance}}" >{{$DPR_PP->kpi_performance}} </option> @endif
                    <option value="0%"> 0% </option>
                    <option value="25%"> 25% </option>
                    <option value="50%"> 50% </option>
                    <option value="75%"> 75% </option>
                    <option value="100%"> 100% </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="responsible_division" class="col-sm-2 col-form-label"> Division </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Responsible Division" name="responsible_division" id="responsible_division" value="{{$DPR_PP->responsible_division}}" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="critical_linkage" class="col-sm-2 col-form-label"> Linkage </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Critical Linkage" name="critical_linkage" id="critical_linkage" value="{{$DPR_PP->critical_linkage}}" required>
            </div>
          </div>


        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="" id="" class="btn btn-dark" onclick="return confirm('Are you sure you want to UPDATE Details?')"> <i class="fa fa-check"></i> Update DPR Program Priority</button>
        </div>
</form>