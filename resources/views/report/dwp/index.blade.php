@extends('layouts.app')

@section('content')

<style type="text/css">
    
</style>


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <!-- Notification Panel --> 
                <h4 class="mt-0 header-title"><i class="dripicons-gear" ></i> Reports Dashboard </h4>
                <!-- <p class="text-muted m-b-30 font-14">Configure all project settings here.</p> -->
                
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    @foreach($page as $key=>$page)
                        <li class="nav-item nav-pad" style="padding: 3px 15px">
                            <a class="nav-link  {{isset($_GET[$key]) && $_GET[$key]==$key ? 'active' : ''}}" data-toggle="tab" 
                            onclick="loadUrl('{{url('report/NOGIAR')}}?page={{$key}}&title={{$page}}')" href="#report" role="tab"> {{$page}} </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active p-3" id="report" role="tabpanel" >
                        <h4 class="mt-0 header-title"> {{isset($_GET['title']) ? $_GET['title'] : ''}} </h4>
                            @if($_GET['page']=='quickinsight') 
                                <div id="qnaContainer" style="height: 700px" ></div>
                            @else
                                <div id="reportContainer" style="height: 800px; width: 1200px"></div>
                            @endif
                    </div> 
                </div>


                <!-- <div class="row" style="margin-top: -37px">
                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>

</div>





@endsection


@section('script')



<script type="text/javascript">
    function loadUrl(url)
    {
        window.location=url;
    }

  $(function()
  {
        // Get models. models contains enums that can be used.
        var models = window['powerbi-client'].models;

        @if(isset($_GET['page']) && $_GET['page']=='quickinsight')
        var config= 
        {
            type: 'qna',
            tokenType: models.TokenType.Embed,
            accessToken: '{{$accessToken}}',
            embedUrl: 'https://app.powerbi.com/qnaEmbed?groupId={{$groupId}}',
            datasetIds: ['{{$dataSetId}}'],
            viewMode: models.QnaMode['Interactive']
        };

        // Get a reference to the embedded QNA HTML element
        var qnaContainer = $('#reportContainer')[0];
        // Embed the QNA and display it within the div container.
        var qna = powerbi.embed(qnaContainer, config);
        // qna.off removes a given event handler if it exists.
        qna.off("loaded");
        @else

        var embedConfiguration = 
        {
              type: 'report',

              id: '{{$reportId}}',
              embedUrl: 'https://app.powerbi.com/reportEmbed?reportId={{$reportId}}&groupId={{$groupId}}',
              tokenType: models.TokenType.Aad,
              accessToken: '{{$accessToken}}',
               settings: 
               {
                    filterPaneEnabled: false,
                    navContentPaneEnabled: true                   
               }
        };

        var $reportContainer = $('#reportContainer');
        var report = powerbi.embed($reportContainer.get(0), embedConfiguration);
        @endif

        $('#printData').click(function()
        {
            var report = powerbi.get($reportContainer.get(0));
            report.print()              
        });

  });


</script>

  



@endsection