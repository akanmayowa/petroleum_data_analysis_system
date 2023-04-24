<script>
    // $(function()
    // {
    //     var height = $('#append_pub_page').height();
    //     var h = (height / 1645);

    //     for (var i = 1; i <= h; i++) 
    //     {
    //         $('#append_pub_page').append('<div style="background-color :#ccc"> <hr> '+ i+ '</div>');
    //     }
    // });

    

    function check_publication_status()
    {
        $(function()
        {
            var year = '{{$yrs}}';
            $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
            {
                return data;
            }); 
                 
        });

    }


    function load_remark(table_id, year) 
    { 
        $('#editremark').load("{{url('publication')}}/nogiar/modals/editPublicationRemark?table_id=" + table_id +"&year=" + year);
        $('#edit_remark').modal('show');
    }


    // $(function () 
    // {
    //     $('.summernote').summernote(
    //     {
    //         height: 200,                 // set editor height
    //         minHeight: null,             // set minimum height of editor
    //         maxHeight: null,             // set maximum height of editor
    //         focus: true                  // set focus to editable area after initializing summernote
    //     });
    // });


    window.pdfDir = {!! json_encode($dir) !!};




    function getId(id) 
    {
        // clear form
        $('#fig_title_1').val('');
        $('#fig_title_2').val('');
        $('#fig_title_1e').val('');
        $('#fig_title_2e').val('');

        var fig1 = $('.fig1_' + id + '').html();
        var fig2 = $('.fig2_' + id + '').html();

        $('#fig_title_1').val(fig1);
        $('#fig_title_2').val(fig2);

        $('#fig_title_1e').val(fig1);
        $('#fig_title_2e').val(fig2);


        //TEMP TABLE
        // var temp_title = $('#temp_'+id+'').html();
        // $('#table_title').val(temp_title);
    }

    function setId(id) 
    {
        var table_id = $('#table_id').val();
        var year = $('#year').val();

        $('#table_title').val('');
        // $('#remark').summernote('code', '');
        // CKEDITOR.instances['remark'].setData('');
        $('#top').prop('checked', false);     $('#bottom').prop('checked', false);

        $.get('{{url('checkPubYear')}}?year=' + year + '&table_id=' + id, function (data) 
        {  
            $('#table_id').val(data.table_id);
            $('#table_title').val(data.table_title);
            // $('#remark').summernote('code', data.remark);
            CKEDITOR.instances['remark'].setData(data.remark);
            $('#header').val(data.header);
            $('#sub_head').val(data.sub_head);
            $('#sub_sub_head').val(data.sub_sub_head);

            if (data.position == 1) {  $('#top').prop('checked', true);   $('#posit').val(1);  }
            else if (data.position == 0) {  $('#bottom').prop('checked', true);  $('#posit').val(0);  }
        });



        // $('#table_id').val(id);

        // //AJAX SCRIPT TO GET DETAILS FOR
        // $(function () 
        // {
        //     var table_id = $('#table_id').val();
        //     var year = $('#year').val();
        //     if (table_id != '') 
        //     {
        //         $('#table_title').val('');
        //         $('#remark').summernote('code', '');
        //         $('#top').prop('checked', false);     $('#bottom').prop('checked', false);
        //         $.get('{{url('getTempTableHeader')}}?year=' + year + '&table_id=' + table_id, function (data) 
        //         {  
        //             $('#table_title').val(data.table_title);
        //             $('#remark').summernote('code', data.remark);
        //             $('#header').val(data.header);
        //             $('#sub_head').val(data.sub_head);
        //             $('#sub_sub_head').val(data.sub_sub_head);
        //         });

        //         //for temp remark
        //         $.get('{{url('getTempTableHeaderTemp')}}?year=' + year + '&table_id=' + table_id, function (data) 
        //         {  
        //             if (data.position == 1) {  $('#top').prop('checked', true); }
        //             else if (data.position == 0) {  $('#bottom').prop('checked', true); }
                    
        //             $('#table_title').val(data.table_title);
        //             $('#remark').summernote('code', data.remark);
        //         });
        //     }

        // });

    }

    function topFunction() 
    {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }


    $(function () 
    {
        $('[data-toggle="tooltip"]').tooltip();
    });


    //Switching Charts







    // GET PAGE NO
    $(function () 
    {  
        // var $plus = $('#plus');
        var $table_title = $('.table_title');
        var $table_id = $('.table_id');
        var $page_no = $('#page_no');
        var $add_remark_btn = $('#add_remark_btn');
        var $update_remark_btn = $('#update_remark_btn');


        // function doFind() 
        // {
        //     var query = findText($table_title.val());
        //     if (query.found) 
        //     {
        //         $page_no.val(query.page);
        //     }
        //     else 
        //     {
        //         $page_no.val('');
        //     }
        // }


        $add_remark_btn.on('mouseover', function () 
        {
            var $table_title = $('#table_title');   var $table_id = $('#table_id'); 

            //put page number if found
            var query = findText($table_title.val(), $table_id.val());
            if (query.found) 
            {
                $page_no.val(query.page);
            }
            else 
            {
                $page_no.val('');
            }
        });

        $update_remark_btn.on('mouseover', function () 
        {
            var $table_title = $('#table_title');   var $table_id = $('#table_id'); 

            //put page number if found
            var query = findText($table_title.val(), $table_id.val());
            if (query.found) 
            {
                $page_no.val(query.page);
            }
            else 
            {
                $page_no.val('');
            }
        });

    });



    
    let pdfData = {!! json_encode($r) !!};
    window.pdfData = pdfData;

    // alert(JSON.stringify(pdfData));

    pdfData.forEach(function (v, k) 
    {
        var rr = v.data.split(/\s/).join('');
        pdfData[k].data = rr;
    });

    function buildQuery(txt) 
    {
        var rr = txt.split('(').join('').split(')').join('').split('');
        rr = '[.| ]*' + rr.join('[.| ]*') + '[.| ]*';
        // console.log(rr);
        return rr;
    }

    function foundWithProbability(sampleCollection, value)
    {     
        let occurence = 0; 
        sampleCollection.forEach(function(v, k)
        {         
          if (value.search(new RegExp(buildQuery( v ))) != -1)
          {
             occurence+=1;  
          }
        });

        // console.log(occurence, sampleCollection.length);

        return (occurence == sampleCollection.length);

    }


    // function findMultiple(arr)
    // {

    //     let response = [];

    //     arr.forEach(function(value,key)
    //     {
    //        var rr = findText(value);

    //        response[value]  = rr; 

    //     });

    //    return response;

    // }



    function findText(txt) //$no_spec_char = preg_replace('/[^\X20-\x7E]/', '', $ROW); 
    {
        var height = $('#append_pub_page').height();
        var h = (height / 1645);  
        
        if (txt != null)
        {

            // ##### ADD SCRIPT ##### //
            var sample_size = txt;
            var sample_size2 = txt.substr(0, 20);
            var txt_1 = ' : ';
            var texted = txt_1.concat(txt);

            
            // ##### ADD SCRIPT ##### //
            var sampleSize = txt.trim().split(' ');
            var sampleSize_2 = sample_size2.trim().split(' ');
            // ##### ADD SCRIPT ##### //
            var found = false;
            var page = 0;
            pdfData.forEach(function (value, key) 
            {
                //  value.data.search(new RegExp(buildQuery(txt.split(' ').join('')))) != -1
                if(foundWithProbability(sampleSize, value.data)) 
                {  
                    found = true;  page = value.page;                   
                }
                else if(foundWithProbability(sampleSize_2, value.data)) 
                {  
                    found = true;  page = value.page;                   
                }

                //console.log('ONE => ' + sample_size + ' :: TWO => ' + sample_size2 + ' :: THREE => ' + sample_size3);
            });

            // alert('Found => ' + found + ' : Page => ' + page);

            return { found: found, page: page };

        }
        else
        {           
            return { found: false, page: 0 };
        }
    }


    
    function generateTableOfContent(i) 
    {
        $(function () 
        {
            for (var j = 0; j <= i; j++) 
            {
                var $table_title = $('.table_title' + j + '');
                var $page_no = $('#page_no' + j + '');

                //put page number if found
                var query = findText($table_title.val());
                if (query.found) 
                {
                    $page_no.val(query.page);   
                }
                else 
                {
                    $page_no.val('');
                }
            }

        });
    }


   function getTableTitleCollection(collection)
   {
     let r = [];
     collection.forEach(function(v,k)
     {
       r.push(v.table_title);
     });
     return r;
   }

   function getPageNumberCollection(collection)
   {
      let r = [];  
      collection.forEach(function(v, k)
      {
        var pageData = findText(v.table_title, v.table_id);
        //console.log('Lead : '+v.table_title);
        // pageData.text = v;
        pageData.data = v;
        r.push(pageData);
      });   
      return r;
   }


   function pushPageDataToServer(collection)
   {      
      let balance = 0;
      // alert('Pushing to server ... ');   
      $('#gen_tab_head_btn').prop('disabled', true);
      $('#noGenBtn').prop('disabled', true);
      $('#progressMsg').html('Hold on, Generating Headers ... ');

      collection.forEach(function(value, key)
      {
        // console.log('pushing...');
        value._token = '{{ csrf_token() }}';
        value.year = $('#year_gen').val();
        balance+=1;
        //console.log(value);
        $.ajax({
          url: '{{ route('add_page_number') }}',
          type:'post',
          data:value,
          success:function(response)
          {
            balance-=1;
            if (balance <= 0)
            {
                var year = '{{$yrs}}';
                $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
                {
                    var stage_id = data.stage_id;
                    getStages(stage_id);
                    // if(stage_id == 3)
                    // { 
                    //     $('#saveFileBtn').hide();   $('#uplFileBtn').hide();  $('#genTabBtn').hide();  
                    //     $('#saveUpBtn').show();     $('#sendToHP').show(); 
                    // }
                });

                $('#gen_tab_head').modal('hide');  
                location.reload(); 

                $('#progressMsg').html('Done ... ');
                $('#progressMsg').html(' ');
            }
          }  
        });

      });

   }

   window.pushPageDataToServer = pushPageDataToServer;


   function pushBulkToServer(data)
   {
      let pageDataCollection = getPageNumberCollection(data);
      //console.log(pageDataCollection);
      // window.pageDataCollection =  pageDataCollection;
      pushPageDataToServer(pageDataCollection);
   }









    //##############################?//


    function setType(type)
    {
        $('#notify_type').val(type);
    }

    function getStages(stage_id)
    {
        // if(stage_id == 0){       $('#saveFileBtn').show();  }
        // else if(stage_id == 1){  $('#uplFileBtn').show();  $('#saveFileBtn').hide();  }
        // else if(stage_id == 2){  $('#genTabBtn').show();  $('#saveFileBtn').hide();  $('#uplFileBtn').hide();  }
        // else if(stage_id == 3){  $('#sendToManager').show();   $('#saveUpBtn').show();  $('#saveFileBtn').hide();  
        //                          $('#uplFileBtn').hide();  $('#genTabBtn').hide(); }  
        // else if(stage_id == 4){  $('#man_div').show();   $('#saveUpBtn').show();  $('#saveFileBtn').hide();  
        //                          $('#uplFileBtn').hide();  $('#genTabBtn').hide();  $('#sendToManager').hide();  }
        // else if(stage_id == 5){  $('#bsp_div').show();   $('#saveUpBtn').show();  $('#saveFileBtn').hide();
        //                          $('#uplFileBtn').hide();  $('#genTabBtn').hide();  $('#sendToManager').hide();  $('#man_div').hide();  }
        // else if(stage_id == 6){  $('#hp_div').show();   $('#saveFileBtn').hide();   $('#saveUpBtn').show();    $('#uplFileBtn').hide();  
        //                          $('#genTabBtn').hide();    $('#sendToManager').hide();  $('#man_div').hide();  $('#bsp_div').hide();  }
        // else if(stage_id == 7){  $('#dir_div').show();  $('#saveFileBtn').hide();   $('#saveUpBtn').hide();    $('#uplFileBtn').hide();  
        //                          $('#genTabBtn').hide();    $('#sendToManager').hide();  $('#man_div').hide();  $('#bsp_div').hide();  
        //                          $('#hp_div').hide();   $("#sendToPublish").prop('disabled', false);      }
        // else if(stage_id == 8){  $('#publishBtn').show();  $('#saveFileBtn').hide();  $('#saveUpBtn').hide();    $('#uplFileBtn').hide();  
        //                          $('#genTabBtn').hide();    $('#sendToManager').hide();  $('#man_div').hide();  $('#bsp_div').hide();  
        //                          $('#hp_div').hide();   $('#dir_div').hide();  }
        // else if(stage_id == 9){  $('#uploadFinal').show();  $('#saveFileBtn').hide();   $('#saveUpBtn').hide();    $('#uplFileBtn').hide();  
        //                          $('#genTabBtn').hide();    $('#sendToManager').hide();  $('#man_div').hide();  $('#bsp_div').hide();  
        //                          $('#hp_div').hide();   $('#publishBtn').hide();  }
        // // if(stage_id == 8){  $('#saveFileBtn').show();  }     
        //                     // $('#appPubBtn').show();     $('#decPubBtn').show();

        // var position = stage_id - 2;

        // $.get('{{url('getWorkflowUser')}}?position=' + position, function (Data) 
        // {
            // if(user_id == Data.user_id){   $("#sendToBSP").prop('disabled', true);   $("#decToBSP").prop('disabled', true);   }
            // if(user_id == Data.user_id){   $("#sendToHP").prop('disabled', true);    $("#decToHP").prop('disabled', true);    }
            // if(user_id == Data.user_id){   $("#sendToDir").prop('disabled', true);   $("#decToDir").prop('disabled', true);    }
            // if(user_id == Data.user_id){   $("#sendToPublish").prop('disabled', true);  $("#decToPublish").prop('disabled', true); }
        // });


        // var position = stage_id - 2;

        // $.get('{{url('getWorkflowUser')}}?position=' + position, function (Data) 
        // {
        //     if(user_id == Data.user_id){   $("#sendToBSP").prop('disabled', false);   $("#decToBSP").prop('disabled', false);   }
        //     if(user_id == Data.user_id){   $("#sendToHP").prop('disabled', false);   $("#decToHP").prop('disabled', false);   }
        //     if(user_id == Data.user_id){   $("#sendToDir").prop('disabled', false);   $("#decToDir").prop('disabled', false);      }
        //     if(user_id == Data.user_id){   $("#sendToPublish").prop('disabled', false);  $("#decToPublish").prop('disabled', false); }
        // });
    }

    // $(function()
    // {
    //     $('#uploadBTN').addClass("hideClass");

    //     $('#saveFileBtnTest').click(function()
    //     {
    //         $('#uploadBTN').removeClass("hideClass");
    //     });
    // });


    function hideSaveShowUpload()
    { 

        // var stage_id = check_publication_status();
        // alert(stage_id);       
        // $('#saveFileBtn').hide(); 
        // $('#uplFileBtn').show();
    }


    function hideSaveAndUpload()
    { 
        // var year = '{{$yrs}}';
        // $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
        // {
        //     var stage_id = data.stage_id;
        //     if(stage_id == 2){ $('#saveFileBtn').hide();  $('#uplFileBtn').hide(); $('#genTabBtn').show();  $('#saveUpBtn').show(); }
        // });  
        //$('#saveFileBtn').hide();  $('#uplFileBtn').hide(); $('#genTabBtn').show();  $('#saveUpBtn').show();     
    }

    function hideSaveAndUploadFinal()
    {  
        $('#uploadFinalBtn').show();     
    }


    window.onafterprint = function () 
    {
        updateSaveUpload(window._year);

        var year = '{{$yrs}}';
        $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
        {
            var stage_id = data.stage_id;
            // if(stage_id == 1){ $('#saveFileBtn').hide();  $('#uplFileBtn').show(); }
            getStages(stage_id);
        }); 
        // hideshow(); 
        
    }

    function showUploadFinalBtn()
    {
        // $('#publishBtn').hide(); 
        $('#uploadFinal').show();
    }

    //hide upload button
    

    function updateSaveUpload(year) 
    {
        $(function () 
        {
            year = year;
            save_upload = 1;
            formData =
            {
                year: year,
                save_upload: save_upload,
                _token: '{{csrf_token()}}'
            }
            $.post('{{route('update-save-upload')}}', formData, function (data, status, xhr) 
            {
                if (data.status == 'success') 
                {
                    toastr.success(data.message); 

                    // $('#upl_pub').modal('hide'); 
                }else{ toastr.error(data.message); }                 
            });
        });
    }



    // e.preventDefault();  
    $(function()
    {  
        var year = '{{$yrs}}';      var pdf_file = $('#pdf_file').val();

        formData = 
        {
            year:year, pdf_file:pdf_file, _token:'{{csrf_token()}}'
        }
        $.post('{{route('upload_publication')}}', formData, function(data, status, xhr)
        {
            if(data.status=='success')
            {   
                $('#upl_pub').modal('hide'); 
                $('#pdf_file').val('');  
                $('#saveFileBtn').hide(); 
                $('#uplFileBtn').hide(); 
                $('#genTabBtn').show(); 
                $('#saveUpBtn').show();

                toastr.success(data.message); 
            }
            else{  toastr.error(data.message);  }                      
        }) 
    });
    

    //enable Save Upload
    $('#enableSaveUploadForm').on('submit', function(e) 
    {
        e.preventDefault();
        $(function()
        {  
            var year = '{{$yrs}}';

            formData = 
            {
                year:year, _token:'{{csrf_token()}}'
            }
            $.post('{{route('enable-save-upload')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {   
                    $('#enable_save_uploadModal').modal('hide');  

                    $('#saveFileBtn').show(); 

                    toastr.success(data.message); 
                }
                else{  toastr.error(data.message);  }       
            }) 
        });
    });


    //GENERATE ALL PAGE NUMBER
    $('#genHeadForm').on('submit', function(e) 
    {
        e.preventDefault();
        $(function()
        {  
            var year = '{{$yrs}}';  
            $.get('{{url('getAllPageNo')}}?year=' +year, function(data)
            {   
                pushBulkToServer(data);
            }); 
        });
    });


    //Send Notification For Approval
    $('#sendNotifyForm').on('submit', function(e) 
    {
        e.preventDefault();
        $(function()
        {  
            var year = '{{$yrs}}';  var notify_type = $('#notify_type').val();

            formData = 
            {
                year:year, notify_type:notify_type, _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-head-for-approval')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                { 
                    toastr.success(data.message);

                    $('#sendNotifyModal').modal('hide');
                    $('#successModal').modal('show');

                    //determine which button to show and hide
                    // if(notify_type == 'Publication Manager')
                    // {
                    //     $('#sendToBSP').show();  $('#sendToManager').hide();  $('#sendToHP').hide();  $('#sendToDir').hide();
                    // }

                    // else if(notify_type == 'B&SP - Budget & Strategic Planning')
                    // {
                    //     $('#sendToHP').show();  $('#sendToManager').hide();  $('#sendToBSP').hide();  $('#sendToDir').hide();
                    // }
                    
                    // else if(notify_type == 'HP - Head of Planning')
                    // {
                    //     $('#sendToDir').show();  $('#sendToManager').hide();  $('#sendToBSP').hide();  $('#sendToHP').hide();
                    // }

                    // else if(notify_type == 'Director')
                    // {
                    //     $('#publishBtn').show();  $('#sendToManager').hide();  $('#sendToBSP').hide();  $('#sendToHP').hide();  $('#sendToDir').hide();
                    // }                              
                     

                    //getting the current stage id
                    $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
                    {  
                        var stage_id = data.stage_id;
                        getStages(stage_id);
                    });

                }
                else{  toastr.error(data.message);  }  
                       
            }) 
        });
    });


    //Approving Publications
    $('#pubApprForm').on('submit', function(e) 
    {
        e.preventDefault();
        $(function()
        {  
            var year = '{{$yrs}}';  var app_dec = 1;  var reason = null; //var stage_id = $('#stage');

            formData = 
            {
                year:year, app_dec:app_dec, reason:reason, _token:'{{csrf_token()}}'
            }
            $.post('{{route('approve-publication')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                { 
                    toastr.success(data.message);

                    $('#pub_appr_modal').modal('hide');

                    //getting the current stage id
                    $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
                    {  
                        var stage_id = data.stage_id;
                        getStages(stage_id);
                    });
                }
                else{  toastr.error(data.message);  }  
                       
            }) 
        });
    });


    //Approving Publications
    $('#decApprForm').on('submit', function(e) 
    {
        e.preventDefault();
        $(function()
        {  
            var year = '{{$yrs}}';  var app_dec = 0;  var reason = $('#reason').val(); //var stage_id = $('#stage');

            formData = 
            {
                year:year, app_dec:app_dec, reason:reason, _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-head-for-decline')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                { 
                    toastr.warning(data.message);

                    $('#dec_appr_modal').modal('hide');
                    //getting the current stage id
                    $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
                    {  
                        var stage_id = data.stage_id;
                        getStages(stage_id);
                    });
                }
                else{  toastr.error(data.message);  }  
                       
            }) 
        });
    });

    $("#uploadForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('uploadForm', "{{url('/publication/upload')}}", 'upl_pub');
        $('#successUploadModal').modal('show'); 
    });

    $("#uploadFinalForm").on('submit',function(e)
    { 
        e.preventDefault();
        processForm('uploadFinalForm', "{{url('/publication/upload-final')}}", 'upl_final_pub');
        $('#successUploadModal').modal('show'); 
    });


    //success UPLOADING FORM
    $("#pdf_ok_btn").on('click',function(e)  
    { 
        var year = '{{$yrs}}';
        $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
        {
            var stage_id = data.stage_id;
            getStages(stage_id);
        });
    });





    //set division
    function setDivision(name)
    {
        $('#_division').val(name);
    }

    //APPROVE OR DECLINE COMMENT
    $(function()
    {
        //APPROVING COMMENT AND ARTICLE SECTION
        $('#comm_app_btn').click(function(e)
        {  
            e.preventDefault(); 
            // var id = $(this).attr('id');   alert(id);        
            year = {{$yrs}};
            division = $('#_division').val();
            comment = $('#comment').val();
            status_id = '1';

            formData = 
            {
                year:year,  
                division:division,
                comment:comment,
                status_id:status_id,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('publication-comment')}}', formData, function(data, status, xhr)
            {
                if(data.status=='ok')
                {   
                    toastr.success(data.message);
                }
                else{  toastr.error(data.message);  }  
                $('#add_comment_div').modal('hide'); 
                $('#approve_divisional_article').modal('hide'); 
                $('#_division').val('');  
                $('#comment').val('');         
            })
        });
        //DECLINING COMMENT AND ARTICLE SECTION
        $('#comm_dec_btn').click(function(e)
        {  
            e.preventDefault();        
            year = {{$yrs}};
            division = $('#_division').val();
            comment = $('#comment').val();
            status_id = '0';

            formData = 
            {
                year:year,  
                division:division,
                comment:comment,
                status_id:status_id,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('publication-comment')}}', formData, function(data, status, xhr)
            {
                if(data.status=='ok')
                {   
                    toastr.success(data.message);
                }
                else{  toastr.error(data.message);  }  
                $('#add_comment_div').modal('hide'); 
                $('#_division').val('');  
                $('#comment').val('');           
            })
        });
    });




    //SENDING NOTIFICATION FOR PUBLICATION APPROVAL
    $(function()
    {
        $('#sendApprForm').on('submit',function(e)
        {  
            e.preventDefault();       
            year = $('#year_napp').val();
            user_id = $('#user_id').val();
            message = $('#message').val();

            formData = 
            {
                year:year,  
                user_id:user_id, 
                message:message,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('send-for-approval')}}', formData, function(data, status, xhr)
            {
                if(data.status=='ok')
                {   
                    toastr.success(data.message);
                }
                else{  toastr.error(data.message);  }  


                var year = '{{$yrs}}';
                $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
                {
                    var stage_id = data.stage_id;
                    getStages(stage_id);
                });

                $('#send_for_appr').modal('hide'); 
                $('#year').val('');  
                $('#message').val('');         
            })
        });
    });

    // JAVASCRIPT AJAX FUNCTION

    function appendTable(data, tableId) 
    {

        if (tableId == '1.0') 
        {
            $('#' + tableId).prepend('<tr>  <td> ' + data.id + ' </td>  <td> ' + data.company + ' </td> <td> ' + data.concession + ' </td> <td> ' + data.contract + ' </td>  <td> ' + data.year_of_award + ' </td>  <td> ' + data.license_expire_date + ' </td>   <td> ' + data.area + ' </td> <td> ' + data.terrain + ' </td>   <td> <a data-toggle="modal" style="cursor: pointer; color:#fff; font-size:10px" tooltip="true" onclick="view_bala_opl(' + data.id + ')" class="btn btn-warning btn-sm pull-right" title="View Oil Prospecting Licenses"> <i class="fa fa-list"></i>   </a> <a data-toggle="modal" style="cursor: pointer; color:#fff; background-color:#202020; font-size:10px" tooltip="true" onclick="load_bala_opl(' + data.id + ')" class="btn btn-info btn-sm pull-right" title="Edit (OPL) Oil Prospective License"> <i class="fa fa-pencil"></i>    </a>  </td>   </tr>');
            //$('#general_status_id').append('<option value="'+data.id+'"> '+sta+' </option>');
        }

    }

    //function to process form data
    function processForm(formid, route, modalid) 
    {

        formdata = new FormData($('#' + formid)[0]);
        formdata.append('_token', '{{csrf_token()}}');

        $.ajax(
        {
            // Your server script to process the upload
            url: route,
            type: 'POST',
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data, status, xhr) 
            {
                if(data.status == 'ok') 
                {
                    $('#' + modalid).modal('hide');
                    toastr.success(data.message, {timeOut: 10000});                        
                }
                else
                {
                    toastr.error(data.message, {timeOut: 10000});
                }                    

            },
        })

    }

    $(function() 
    {
        //
        $("#remarkForm").on('submit', function (e) 
        {  
            e.preventDefault();
            var table_id = $('#table_id').val();   
            var posit = $('.posi').val(); 
            var position = $('#posit').val(); 
            if(position == ''){ position = posit; }
            var year = $('#year').val(); 
            var table_title = $('#table_title').val(); 
            var page_no = $('#page_no').val(); 
            var fig_title_1 = $('#fig_title_1').val(); 
            var fig_title_2 = $('#fig_title_2').val(); 
            var page_no = $('#page_no').val(); 
            // var remark_content = $('#remark').val();  
            remark = CKEDITOR.instances['remark'].getData();


            formData = 
            {
                table_id:table_id,
                position:position,
                year:year,
                table_title:table_title,
                page_no:page_no,
                fig_title_1:fig_title_1,
                fig_title_2:fig_title_2,
                page_no:page_no,
                remark:remark,
                _token:'{{csrf_token()}}'
            }
            $.post('{{url('/publication/nogiar/admin/add_publication_remark')}}', formData, function(data)
            {
                if(data.status=='ok')
                {   
                    toastr.success(data.info);
                    $('#add_remark').modal('hide');

                    //APPENDING TEMP COMMENTS
                    if(position == 1){ $('#topTab_'+table_id).html(remark);     $('#bottomTab_'+table_id).html(''); }
                    else if(position == 0){ $('#bottomTab_'+table_id).html(remark);   $('#topTab_'+table_id).html('');  }
                    return;
                }
                else{ return toastr.error(data.error); }                    
            })  




            //APPENDING TEMP COMMENTS
            // processForm('remarkForm', "{{url('/publication/nogiar/admin/add_publication_remark')}}", 'add_remark');

            //clear form
            // var position = document.getElementsByName("position"); t_id.toFixed(0);
            var tab_id = Math.round(t_id); //(t_id + '').split('.').join('_'); // 
            $('#section_id').val('');
            $('input[name=position]').attr('checked', false);
            $('#header').val('');
            $('#sub_head').val('');
            $('#sub_sub_head').val('');
            $('#table_title').val('');
            $('#content_reg').summernote('code', '');
            $('#page_no').val(''); 


        });

        //add review
        $("#reviewForm").on('submit', function (e) 
        {
            e.preventDefault();
            formdata = new FormData($('#reviewForm')[0]);
            formdata.append('_token', '{{csrf_token()}}');
            route = "{{url('/publication/nogiar/reviewPublication')}}";

            $.ajax(
                {
                    // Your server script to process the upload
                    url: route,
                    type: 'POST',
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data, status, xhr) 
                    {
                        if (data.status == 'success') 
                        {
                            $('#add_review').modal('hide');
                            $('#rev_btn').hide();
                            toastr.success(data.message, {timeOut: 10000});
                        }
                        else{ toastr.error(data.message, {timeOut: 10000}); } 
                    },
                })
        });

        //add approval
        $("#approvalForm").on('submit', function (e) 
        {
            e.preventDefault();
            formdata = new FormData($('#approvalForm')[0]);
            formdata.append('_token', '{{csrf_token()}}');
            route = "{{url('/publication/nogiar/approvePublication')}}";

            $.ajax(
                {
                    // Your server script to process the upload
                    url: route,
                    type: 'POST',
                    data: formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data, status, xhr) 
                    {
                        if (data.status == 'success') 
                        {
                            $('#add_approval').modal('hide');
                            $('#appv_btn').hide();
                            toastr.success(data.message, {timeOut: 10000});
                        }
                        else{ toastr.error(data.message, {timeOut: 10000}); } 
                    },
                })
        });

    });

    //setting the position
    $(function()
    {
        $('.posi').click(function()
        {
            $('#posit').val($(this).val());
        });
    }); 


    function checkPosition()
    {
        var top = $('#top').val();    var bottom = $('#bottom').val();
        if(top == '' && bottom == ''){ alert('Please select a position - TOP or BOTTOM'); }
    }



    //show decline form
    // $(function()
    // {
    //     $('#declineBtn').click(function()
    //     {
    //         $('#res').show();    $('#pub_appr_btn').prop('disabled', true);
    //     });
    // });


    //SETTING APPROVE OR DECLINE PARAMETERS
    // function setApprove()
    // {
    //     $(function() {    $('#app_dec').val('1');     $('#declineBtn').hide();     });        
    // }

    // function setDeline()
    // {
    //     $(function() {    $('#app_dec').val('0');     $('#pub_appr_btn').hide();  $('#declineBtn').hide();   $('#res').show();    });        
    // }





    //CHECKING ALL STATUS
    $(function()
    {
        var year = '{{$yrs}}';    var user_id = '{{\Auth::user()->id}}';
        $.get('{{url('getPublicationStageId')}}?year=' + year, function (data) 
        {
            var stage_id = data.stage_id;
            getStages(stage_id);   var position = stage_id - 2;

            $.get('{{url('getWorkflowUser')}}?position=' + position, function (Data) 
            {
                if(user_id == Data.user_id){   $("#sendToBSP").prop('disabled', false);      $("#decToBSP").prop('disabled', false);   }
                if(user_id == Data.user_id){   $("#sendToHP").prop('disabled', false);       $("#decToHP").prop('disabled', false);    }
                if(user_id == Data.user_id){   $("#sendToDir").prop('disabled', false);      $("#decToDir").prop('disabled', false);   }
                if(user_id == Data.user_id){   $("#sendToPublish").prop('disabled', false);  $("#decToPublish").prop('disabled', false); }
            });
        });

    });


    

    //ckeditor
    // ClassicEditor
    //.create( document.querySelector( '#remark' ) )
    //.then( editor => {
    //        console.log( editor );
    //} )
    //.catch( error => {
    //                 console.error( error );
    //} );




    function testPDF()
    {
        var searchText = "JavaScript";
        function searchPage(doc, pageNumber) 
        {
            return doc.getPage(pageNumber).then(function (page) 
            {
                return page.getTextContent();
            }).then(function (content) 
            {
                // Search combined text content using regular expression
                var text = content.items.map(function (i) { return i.str; }).join('');
                var re = new RegExp("(.{0,20})" + searchText + "(.{0,20})", "gi"), m;
                var lines = [];
                while (m = re.exec(text)) 
                {
                    var line = (m[1] ? "..." : "") + m[0] + (m[2] ? "..." : "");
                    lines.push(line);
                }
                return {page: pageNumber, items: lines};
            });
        }

        var loading = PDFJS.getDocument("//cdn.mozilla.net/pdfjs/tracemonkey.pdf");
        loading.promise.then(function (doc) 
        {
            var results = [];
            for (var i = 1; i <= doc.numPages; i++)
            results.push(searchPage(doc, i));
            return Promise.all(results);
        }).then(function (searchResults) 
        {
            // Display results using divs
            searchResults.forEach(function (result) 
            {
                var div = document.createElement('div'); div.className="pr"; document.body.appendChild(div);
                div.textContent = 'Page ' + result.page + ':';
                result.items.forEach(function (s) 
                {
                  var div2 = document.createElement('div'); div2.className="prl"; div.appendChild(div2);
                  div2.textContent = s; 
                });
            });
        }).catch(console.error);    
    }







    CKEDITOR.replace('remark',
    {           

    }).on('cut copy paste', function (e) {e.cancel();});

    CKEDITOR.config.extraPlugins = "base64image";


</script>