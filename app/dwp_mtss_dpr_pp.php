<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dwp_mtss_dpr_pp extends Model
{
    //
    protected $table = 'dwp_mtss_dpr_pp';

    protected $fillable = ['policy_objective', 'zbb_pillar', 'zbb_pp', 'zbb_spp', 'dwp_pp', 'kpi', 'kpi_performance', 'responsible_division', 'critical_linkage', 'created_by'];
}
