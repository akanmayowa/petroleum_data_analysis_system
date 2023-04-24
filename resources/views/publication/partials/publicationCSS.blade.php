<style>
	
    .blue-btn 
    {
        cursor: pointer;
        color: #fff;
        font-size: 10px;
        border-radius: 13px;
        margin-right: 10px;
        background-color: #67a8e4;
    }

    .green-btn 
    {
        cursor: pointer;
        color: #fff;
        font-size: 10px;
        border-radius: 13px;
        margin-right: 10px;
        background-color: #339966;
    }

    .black-btn 
    {
        cursor: pointer;
        color: #fff;
        font-size: 10px;
        border-radius: 13px;
        margin-right: 10px;
        background-color: #202020;
    }

    .white-btn 
    {
        cursor: pointer;
        color: #000;
        font-size: 10px;
        border-radius: 13px;
        margin-right: 10px;
        background-color: #ffffff;
        border: #C0C0C0 thin dotted;
    }

    .edit-btn 
    {
        cursor: pointer;
        color: #fff;
        font-size: 10px;
        border-radius: 13px;
        margin-right: 10px;
        background-color: #01796F;
    }

    .th_h 
    {
        font-size: 15px;
        padding: 0px;
    }

    .th_h-sm
    {
        font-size: 12px !important;
        padding: 0px;
    }

    .th_head 
    {
        background-color: #A3C1AD;
    }

    .th_title 
    {
        margin-left: 0px;
        color: #292929;
    }

    .pic 
    {
        min-height: 100%;
        min-width: 100%;
        max-height: 100%;
        max-width: 100%;
    }

    .div-height 
    {
        /*max-height: 250px;
        overflow: auto;*/
    }

    .table td, .table th 
    {
        padding: 5px 7px;
        vertical-align: middle;
        border-top: 0px solid #dee2e6;
    }

    .section-pad 
    {
        margin: 3% 0px;
    }

    .remark-div 
    {
        /*border: #e1e1e1 thin dotted;*/
        padding: 10px 0px;
        margin: 10px 1px !important;
    }

    /* The container */
    .container 
    {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input 
    {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark 
    {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark 
    {
        background-color: #0097a7;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark 
    {
        background-color: #0097a7;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after 
    {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after 
    {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after 
    {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .hide 
    {
        color: #fff;
    }

    .hd 
    {
        font-size: 13px;
        font-weight: bolder;
    }

    .temp-table 
    {
        color: #FF0800;
        font-size: 18px;
        margin-bottom: -20px;
    }

    .table-striped tbody tr:nth-of-type(odd)
    {
        -webkit-print-color-adjust: exact!important;
        background-color:#fff;      /*5DD289     ACE1AF    7FFFD4*/
    }


    .chart-pad
    {
        margin: 30px 0px;
    }

    .canvas-pad-right
    {
        padding-right: 30px;
    }

    .canvas-pad-left
    {
        padding-left: 30px;
    }


    .hideClass
    {
        display: none;
    }

    .body
    {
        -webkit-print-color-adjust: exact!important;
    }

    table tbody tr:nth-of-type(odd)
    {
        -webkit-print-color-adjust: exact!important;
        /*background-color:#F7E7CE;*/      /*5DD289     ACE1AF    7FFFD4*/
    }

    .bfont-size
    {
        font-size: 16px;
    }

    .bfont-size
    {
        font-size: 13px !important;
    }

    .f-12
    {
        font-size: 12px !important;
    }

    .f-11
    {
        font-size: 10px !important;
    }

    .f-9
    {
        font-size: 9px !important;
    }


    .page-break
    {
        page-break-after: always !important;
    }
            
</style>