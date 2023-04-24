@section('script') 

<script> 

    function checkInitStatus(year)
    {
        //loadNogiarPublication
        $.get('{{url('check-init-status')}}?year='+year, function(data)
        { 
            if(data.status == 'success') {  $('#submitAdd').attr("disabled", true);  } 
            else{ $('#submitAdd').attr("disabled", false);  }       
        });        
    }  


    function loadNogiarPub(year)
    {
        //loadNogiarPublication
        $.get('{{url('loadNogiarPublication')}}?year='+year, function(data)
        {
            CKEDITOR.instances['content'].setData(data.content);
            $('#price').val(data.price);
            if(data.status == 1)
            { 
                $('#saveNogiarPublication').val(data.year+" Publication Archived");
                $('#saveNogiarPublication').attr("disabled", true); 
            }        
        });
    }

    function changeYearval(id)
    {
        mainYear=$('#year_dremark').val();
        if(mainYear==''){ return false; }

        $(`#${id}`).val(mainYear).trigger('change');
    }


    $(function()
    { 
        sessionStorage.setItem('date', null)
        //for using previous year
        loadNogiarPub('{{date('Y')}}');
        $('#nogiar_year').change(function()
        {
            loadNogiarPub($('#nogiar_year').val());             
        });


        //add ucontributors to nogiar
        $('#initAdd').click(function(e)
        {           
            var name = $("#user_id_ini option:selected").text();
            edit_id = $('#edit_id').val();
            year = $('#year_init').val();
            workflow_id = $('#workflow_id').val();
            division = $('#division').val();
            user_id = $('#user_id_ini').val();
            approver_id = $('#approver_id_ini').val();

            if(user_id != '')
            {
                formData = 
                {
                    edit_id:edit_id,
                    year:year,
                    workflow_id:workflow_id,
                    division:division,
                    user_id:user_id,
                    approver_id:approver_id,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('add-init-user')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {                        
                        $('._row').remove();        var y = $('#year_init').val(); 
                        $.get('{{url('getNogiarContributorsByYear')}}?year=' +y, function(data)
                        {  
                            $.each(data, function(index, User)
                            { 
                                $('#init_row').append('<tr class="_row row_'+User.id+'">  <th> '+User.year+' </th>  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.approver.name+' </th> <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  <a onclick="editUser('+User.id+')" href="#" style="cursor: pointer; color:#177245; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right editBtn" title="Edit User Record"> <i class="fa fa-pencil"></i>    </a> </th>   </tr>');
                            });
                        });    
                        // $('#init_row').prepend('<tr class="_row row_'+data.info.id+'">  <th> '+data.info.year+' </th>  <th> '+data.info.division+' </th>  <th> '+data.info.user+' </th>  <th> '+data.info.approver+' </th>  <th>  <a onclick="removeUser('+data.info.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+data.info.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  <a onclick="editUser('+data.info.id+')" href="#" style="cursor: pointer; color:#177245; font-size:10px" tooltip="true" id="'+data.info.id+'" class="btn-sm pull-right editBtn" title="Edit User Record"> <i class="fa fa-pencil"></i>    </a> </th>   </tr>');


                        $('#division').val(0) 
                        $('#user_id_ini').val(0) 
                        $('#approver_id_ini').val(0) 

                        toastr.success(data.message);
                    }
                    else{  toastr.error(data.message);  }
                    
                })
            }
            else
            {
                toastr.warning('Sorry, no user was selected, please select a user to add as a contributor', {timeOut:100000});
            }            

        });

        //initiate Nogiar publication
        $('#submitAdd').click(function()
        { 
            var r = confirm("Are you sure you want to Send NOGIAR Publication Request?");
            if (r == true) 
            {  
                var y = $('#year_init').val();        
                year = $('#year_init').val();
                workflow_id = $('#workflow_id').val();

                formData = 
                {
                    year:year,
                    workflow_id:workflow_id,
                    stage_id:0,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('init-publication')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {   
                        return toastr.success(data.message);
                        $('#year_init').val(0);
                        $('#division').val(0) 
                        $('#user_id_ini').val(0) 
                        $('._row').remove();
                    }
                    return toastr.error(data.message);
                })
                checkInitStatus(y);
            }

        });

        //AJAX SCRIPT TO GET CONTRIBUTOR FOR NOGIAR
        $('#year_init').change(function(e)
        {  
            var y = $(this).val();      
            $('._row').remove();
            $.get('{{url('getNogiarContributorsByYear')}}?year=' +y, function(data)
            {  
                $.each(data, function(index, User)
                { 
                    $('#init_row').append('<tr class="_row row_'+User.id+'">  <th> '+User.year+' </th>  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.approver.name+' </th> <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  <a onclick="editUser('+User.id+')" href="#" style="cursor: pointer; color:#177245; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right editBtn" title="Edit User Record"> <i class="fa fa-pencil"></i>    </a> </th>   </tr>');
                });
            });
            
            //disable initiate submit button
            checkInitStatus(y);
        });





        //AJAX FOR DELETING CONTRIBUTOR - USER

        




        $('#nogiar_year').datepicker(
        {
          autoclose: true, 
          startView: 'decade',
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years",
          orientation: "bottom"
        });

        $('.year').datepicker(
        {
          autoclose: true, 
          startView: 'decade',
          format: "yyyy",
          viewMode: "years", 
          minViewMode: "years",
          orientation: "bottom"
        });


        $('#year_notif').change(function(e)
        { 
          var year = $(this).val();  
          $.get('{{url('getNotificationMessage')}}?year=' +year+'&section=NOTIFY CONTRIBUTORS', function(data)
          {  //success data
            $('#message').val(data.message); 
          });
        });




        //AJAX FOR SENDING NOTIFICATION TO REMARK CONTRIBUTOR
        $('#notify_btn').click(function(e)
        {
            e.preventDefault(); 
            year = $('#year_notif').val(); var message = $('#message').val();
            formData = 
            {
                year:year,  message:message,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('notify-remark-contributor')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    toastr.success(data.message);
                }
                else {  toastr.error(data.message);  }

                $('#notifyModal').modal('hide');
                
            })

        });






        $('#saveNogiarPublication').click(function()
        {
            year=$('#nogiar_year').val();
            price=$('#price').val();
            workflow_id=1;
            content=$('#content').val();

            created_by='';
            formData = 
            {
                year:year,
                price:price,
                workflow_id:workflow_id,
                _token:'{{csrf_token()}}',
                content:content,
                created_by:created_by,
                type:'addNogiar'
            }
            $.post('{{route('addNogiar')}}', formData, function(data,status,xhr)
            {
                if(data.status=='success')
                {
                    toastr.success(data.message);
                }
                toastr.error(data.message);
            })

        });





        //ADD NOGIAR SECTIONS




        $('#year_dremark').change(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type').val();  
          $.get('{{url('getSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            $('#id_dr').val(data.id); 
            $('#title').val(data.title);

            CKEDITOR.instances['content'].setData(data.content);

            if(data.status == 4)
            { 
                $("#save_director_remark").prop('disabled', true); 
                $("#draft_director_remark").prop('disabled', true);
                $("#app_director_remark").prop('disabled', true); 
                $("#dec_director_remark").prop('disabled', true);
                $("#title").prop('disabled', true); 
                // $("#content").summernote('disable');
                CKEDITOR.instances['content'].setReadOnly();
            }
            else if(data.status != 4)
            { 
                $("#save_director_remark").prop('disabled', false); 
                $("#draft_director_remark").prop('disabled', false);
                $("#app_director_remark").prop('disabled', false); 
                $("#dec_director_remark").prop('disabled', false);
                $("#title").prop('disabled', false); 
                // $("#content").summernote('enable');
                CKEDITOR.instances['content'].setReadOnly(false);
            }
          });

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_dremark').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });     
        });

        $('#prevYearDrem').click(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type').val();  
          $.get('{{url('getPrevYearSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            // $('#id_dr').val(data.id); 
            $('#title').val(data.title);
            // $('#year_dremark').val(data.year);
            $('#title').val(''); 
            $('#title').val(data.title);
            CKEDITOR.instances['content'].setData(data.content);

                $("#save_director_remark").prop('disabled', false); 
                $("#draft_director_remark").prop('disabled', false);
                $("#app_director_remark").prop('disabled', false); 
                $("#dec_director_remark").prop('disabled', false);
                $("#title").prop('disabled', false);
                CKEDITOR.instances['content'].setReadOnly(false);
          });   

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_dremark').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });     
        });

        $('#year_reg').change(function(e)
        { 

          var year = $(this).val();             var section_type = $('#section_type_reg').val();  

          // sessionStorage.setItem('date',year);

          $.get('{{url('getSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            $('#id_reg').val(data.id); 
            $('#title_reg').val('');
            $('#title_reg').val(data.title);
            CKEDITOR.instances['content_reg'].setData(data.content);

            if(data.status == 4)
            { 
                $("#save_reg_sign").prop('disabled', true); 
                $("#draft_reg_sign").prop('disabled', true);
                $("#title_reg").prop('disabled', true);
                CKEDITOR.instances['content_reg'].setReadOnly();
            }
            else if(data.status != 4)
            { 
                $("#save_reg_sign").prop('disabled', false); 
                $("#draft_reg_sign").prop('disabled', false);
                $("#title_reg").prop('disabled', false);
                CKEDITOR.instances['content_reg'].setReadOnly(false);
            }
          }); 

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_reg').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });       
        });

        $('#prevYearRstru').click(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type_reg').val();     
          $.get('{{url('getPrevYearSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            // $('#id_reg').val(data.id); 
            $('#title_reg').val('');
            $('#title_reg').val(data.title);
            CKEDITOR.instances['content_reg'].setData(data.content);

                $("#save_reg_sign").prop('disabled', false); 
                $("#draft_reg_sign").prop('disabled', false);
                CKEDITOR.instances['content_reg'].setReadOnly(false);
          }); 

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_reg').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });       
        });

        $('#year_mod').change(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type_mod').val();     
          $.get('{{url('getSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            $('#id_mod').val(data.id); 
            $('#title_mod').val('');
            $('#title_mod').val(data.title);
            CKEDITOR.instances['content_mod'].setData(data.content);

            if(data.status == 4)
            { 
                $("#save_mod_ref").prop('disabled', true); 
                $("#draft_mod_ref").prop('disabled', true);
                $("#title_mod").prop('disabled', true);
                CKEDITOR.instances['content_mod'].setReadOnly(false);
            }
            else if(data.status != 4)
            { 
                $("#save_mod_ref").prop('disabled', false); 
                $("#draft_mod_ref").prop('disabled', false);
                $("#title_mod").prop('disabled', false);
                CKEDITOR.instances['content_mod'].setReadOnly();
            }
          });

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_mod').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });        
        });

        $('#prevYearMref').click(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type_mod').val();     
          $.get('{{url('getPrevYearSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            // $('#id_mod').val(data.id); 
            $('#title_mod').val('');
            $('#title_mod').val(data.title);
            CKEDITOR.instances['content_mod'].setData(data.content);

                $("#save_mod_ref").prop('disabled', false); 
                $("#draft_mod_ref").prop('disabled', false);
                $("#title_mod").prop('disabled', false);
                CKEDITOR.instances['content_mod'].setReadOnly();
          }); 

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_mod').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });       
        });

        $('#year_glo').change(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type_glo').val();     
          $.get('{{url('getSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            $('#id_glo').val(data.id); 
            $('#title_glo').val('');
            $('#title_glo').val(data.title);
            CKEDITOR.instances['content_glo'].setData(data.content);

            if(data.status == 4)
            { 
                $("#save_glossary").prop('disabled', true); 
                $("#draft_glossary").prop('disabled', true);
                $("#title_glo").prop('disabled', true);
                CKEDITOR.instances['content_glo'].setReadOnly(false);
            }
            else if(data.status != 4)
            { 
                $("#save_glossary").prop('disabled', false); 
                $("#draft_glossary").prop('disabled', false);
                $("#title_glo").prop('disabled', false);
                CKEDITOR.instances['content_glo'].setReadOnly();
            }
          }); 

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_glo').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });       
        });

        $('#prevYearGlos').click(function(e)
        { 
          var year = $(this).val();             var section_type = $('#section_type_glo').val();     
          $.get('{{url('getPrevYearSectionDetails')}}?year=' +year+'&section_type=' +section_type, function(data)
          {  //success data
            // $('#id_glo').val(data.id); 
            $('#title_glo').val('');
            $('#title_glo').val(data.title);
            CKEDITOR.instances['content_glo'].setData(data.content);

                $("#save_glossary").prop('disabled', false); 
                $("#draft_glossary").prop('disabled', false);
                $("#title_glo").prop('disabled', false);
                CKEDITOR.instances['content_glo'].setReadOnly(false);
          }); 

            //update publication status
            id = $('#id_dr').val();
            year = $('#year_glo').val();
            section = $('#section_type').val();
            status = 1;
            created_by = '';
            formData = 
            {
                id:id,
                year:year,
                section:section,
                status:status,
                _token:'{{csrf_token()}}',
                created_by:created_by
                // type:'addNogiar'
            }
            $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });       
        });





        $('#draft_director_remark').click(function()
        {
            if(confirm('Are you sure you want to save this as a draft copy?'))
            {
                id = $('#id_dr').val();
                year = $('#year_dremark').val();
                section_type = $('#section_type').val();
                title = $('#title').val();
                content = CKEDITOR.instances['content'].getData();
                status = 1;
                workflow_id = $('#workflow_id').val();
                copy = 'draft_director_remark';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        //update publication status to 0
                        id = $('#id_dr').val();
                        year = $('#year_dremark').val();
                        section = $('#section_type').val();
                        status = 0;
                        formData = 
                        {
                            id:id,
                            year:year,
                            section:section,
                            status:status,
                            _token:'{{csrf_token()}}',
                            // type:'addNogiar'
                        }
                        $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ }); 

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); };
                });


            }

        });

        $('#save_director_remark').click(function()
        {
            if(confirm('Are you sure you want to save this as a final copy?'))
            {
                id = $('#id_dr').val();
                year = $('#year_dremark').val();
                section_type = $('#section_type').val();
                title = $('#title').val();
                content = CKEDITOR.instances['content'].getData();
                status = 2;
                workflow_id = 1;
                copy = 'save_director_remark';
                created_by = '';

                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);                        alert(con);
                    }
                    else{ toastr.error(data.message); }
                });


                    //update publication status to 0
                    id = $('#id_dr').val();
                    year = $('#year_dremark').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#ena_director_remark').click(function()
        {
            if(confirm('Are you sure you want to enable Directors Remark Article?'))
            {
                id = $('#id_dr').val();
                year = $('#year_dremark').val();
                copy = 'draft_director_remark';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('enable-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#save_director_remark").prop('disabled', false); 
                        $("#draft_director_remark").prop('disabled', false);
                        $("#app_director_remark").prop('disabled', false); 
                        $("#dec_director_remark").prop('disabled', false);
                        $("#title").prop('disabled', false); 
                        CKEDITOR.instances['content'].setReadOnly(false);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#app_director_remark').click(function()
        {
            if(confirm('Are you sure you want to APPROVE Directors Remark Article?'))
            {
                id = $('#id_dr').val();
                year = $('#year_dremark').val();
                status = 4;
                copy = 'DIRECTOR REMARK';
                formData = 
                {
                    id:id,
                    year:year,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#title").prop('disabled', true); 
                        CKEDITOR.instances['content'].setReadOnly();
                        $("#save_director_remark").prop('disabled', true); 
                        $("#draft_director_remark").prop('disabled', true);
                        $("#app_director_remark").prop('disabled', true); 
                        $("#dec_director_remark").prop('disabled', true);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#dec_director_remark').click(function()
        {
            if(confirm('Are you sure you want to Decline Directors Remark Article?'))
            {
                id = $('#id_dr').val();
                year = $('#year_dremark').val();
                content = CKEDITOR.instances['content'].getData();
                status = 3;
                copy = 'DIRECTOR REMARK';
                formData = 
                {
                    id:id,
                    year:year,
                    content:content,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('decline-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.warning(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });




        $('#draft_reg_sign').click(function()
        {
            if(confirm('Are you sure you want to save this as a draft copy?'))
            {
                id = $('#id_reg').val();
                year = $('#year_reg').val();
                section_type = $('#section_type_reg').val();
                title = $('#title_reg').val();
                content = CKEDITOR.instances['content_reg'].getData();
                status = 1;
                workflow_id = 1;
                copy = 'draft_reg_sign';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                    
                });


                    //update publication status to 0
                    id = $('#id_dr').val();
                    year = $('#year_reg').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#save_reg_sign').click(function()
        {
            if(confirm('Are you sure you want to save this as a final copy?'))
            {
                id = $('#id_reg').val();
                year = $('#year_reg').val();
                section_type = $('#section_type_reg').val();
                title = $('#title_reg').val();
                content = CKEDITOR.instances['content_reg'].getData();
                status = 2;
                workflow_id = 1;
                copy = 'save_reg_sign';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });


                    //update publication status to 0
                    id = $('#id_dr').val();
                    year = $('#year_reg').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#ena_reg_sign').click(function()
        {
            if(confirm('Are you sure you want to enable DPR Structure Article?'))
            {
                id = $('#id_reg').val();
                year = $('#year_reg').val();
                copy = 'draft_reg_sign';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('enable-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#save_reg_sign").prop('disabled', false); 
                        $("#draft_reg_sign").prop('disabled', false);
                        $("#title_reg").prop('disabled', false); 
                        CKEDITOR.instances['content_reg'].setReadOnly(false);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#app_reg_sign').click(function()
        {
            if(confirm('Are you sure you want to APPROVE DPR Structure Article?'))
            {
                id = $('#id_reg').val();
                year = $('#year_reg').val();
                status = 4;
                copy = 'DPR STRUCTURE';
                formData = 
                {
                    id:id,
                    year:year,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#title_reg").prop('disabled', true); 
                        CKEDITOR.instances['content_reg'].setReadOnly();
                        $("#save_reg_sign").prop('disabled', true); 
                        $("#draft_reg_sign").prop('disabled', true);
                        $("#app_reg_sign").prop('disabled', true); 
                        $("#dec_reg_sign").prop('disabled', true);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#dec_reg_sign').click(function()
        {
            if(confirm('Are you sure you want to Decline DPR Structure Article?'))
            {
                id = $('#id_reg').val();
                year = $('#year_reg').val();
                content = CKEDITOR.instances['content_reg'].getData();
                status = 3;
                copy = 'DPR STRUCTURE';
                formData = 
                {
                    id:id,
                    year:year,
                    content:content,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('decline-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.warning(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });




        $('#draft_mod_ref').click(function()
        {
            if(confirm('Are you sure you want to save this as a draft copy?'))
            {
                id = $('#id_mod').val();
                year = $('#year_mod').val();
                section_type = $('#section_type_mod').val();
                title = $('#title_mod').val();
                content = CKEDITOR.instances['content_mod'].getData();
                status = 1;
                workflow_id = 1;
                copy = 'draft_mod_ref';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                })


                    //update publication status to 0
                    id = $('#id_dr').val();
                    year = $('#year_mod').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#save_mod_ref').click(function()
        {
            if(confirm('Are you sure you want to save this as a final copy?'))
            {
                id = $('#id_mod').val();
                year = $('#year_mod').val();
                section_type = $('#section_type_mod').val();
                title = $('#title_mod').val();
                content = CKEDITOR.instances['content_mod'].getData();
                status = 2;
                workflow_id = 1;
                copy = 'save_mod_ref';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });


                    //update publication status to 0
                    id = $('#id_mod').val();
                    year = $('#year_mod').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#ena_mod_ref').click(function()
        {
            if(confirm('Are you sure you want to enable Main Article?'))
            {
                id = $('#id_mod').val();
                year = $('#year_mod').val();
                copy = 'draft_mod_ref';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('enable-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#save_mod_ref").prop('disabled', false); 
                        $("#draft_mod_ref").prop('disabled', false);
                        $("#title_mod").prop('disabled', false); 
                        CKEDITOR.instances['content_mod'].setReadOnly(false);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#app_mod_ref').click(function()
        {
            if(confirm('Are you sure you want to APPROVE Main Article?'))
            {
                id = $('#id_mod').val();
                year = $('#year_mod').val();
                status = 4;
                copy = 'MAIN ARTICLE';
                formData = 
                {
                    id:id,
                    year:year,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#title_mod").prop('disabled', true); 
                        CKEDITOR.instances['content_mod'].setReadOnly();
                        $("#save_mod_ref").prop('disabled', true); 
                        $("#draft_mod_ref").prop('disabled', true);
                        $("#app_mod_ref").prop('disabled', true); 
                        $("#dec_mod_ref").prop('disabled', true);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#dec_mod_ref').click(function()
        {
            if(confirm('Are you sure you want to Decline Main Article?'))
            {
                id = $('#id_mod').val();
                year = $('#year_mod').val();
                content = CKEDITOR.instances['content_mod'].getData();
                status = 3;
                copy = 'MAIN ARTICLE';
                formData = 
                {
                    id:id,
                    year:year,
                    content:content,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('decline-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.warning(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });




        $('#draft_glossary').click(function()
        {
            if(confirm('Are you sure you want to save this as a draft copy?'))
            {
                id = $('#id_glo').val();
                year = $('#year_glo').val();
                section_type = $('#section_type_glo').val();
                title = $('#title_glo').val();
                content = CKEDITOR.instances['content_glo'].getData();
                status = 1;
                workflow_id = 1;
                copy = 'draft_glossary';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });


                    //update publication status to 0
                    id = $('#id_dr').val();
                    year = $('#year_glo').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#save_glossary').click(function()
        {
            if(confirm('Are you sure you want to save this as a final copy?'))
            {
                id = $('#id_glo').val();
                year = $('#year_glo').val();
                section_type = $('#section_type_glo').val();
                title = $('#title_glo').val();
                content = CKEDITOR.instances['content_glo'].getData();
                status = 2;
                workflow_id = 1;
                copy = 'save_glossary';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    section_type:section_type,
                    title:title,
                    content:content,
                    status:status,
                    workflow_id:workflow_id,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('add-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.success(data.message);
                    }
                    else{ toastr.success('New Publication Section Added Successfully for '+year); }
                });


                    //update publication status to 0
                    id = $('#id_glo').val();
                    year = $('#year_glo').val();
                    section = $('#section_type').val();
                    status = 0;
                    created_by = '';
                    formData = 
                    {
                        id:id,
                        year:year,
                        section:section,
                        status:status,
                        _token:'{{csrf_token()}}',
                        created_by:created_by
                        // type:'addNogiar'
                    }
                    $.post('{{route('nogiar.update-publication')}}', formData, function(data, status, xhr){ });
            }

        });

        $('#ena_glossary').click(function()
        {
            if(confirm('Are you sure you want to enable Glossary?'))
            {
                id = $('#id_glo').val();
                year = $('#year_glo').val();
                copy = 'draft_glossary';
                created_by = '';
                formData = 
                {
                    id:id,
                    year:year,
                    copy:copy,
                    _token:'{{csrf_token()}}',
                    created_by:created_by
                    // type:'addNogiar'
                }
                $.post('{{route('enable-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#save_glossary").prop('disabled', false); 
                        $("#draft_glo").prop('disabled', false);
                        $("#title_glo").prop('disabled', false); 
                        CKEDITOR.instances['content_glo'].setReadOnly(false);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#app_glossary').click(function()
        {
            if(confirm('Are you sure you want to APPROVE Publication Glossary?'))
            {
                id = $('#id_glo').val();
                year = $('#year_glo').val();
                status = 4;
                copy = 'GLOSSARY';
                formData = 
                {
                    id:id,
                    year:year,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('approve-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        $("#title_glo").prop('disabled', true); 
                        CKEDITOR.instances['content_glo'].setReadOnly();
                        $("#save_glossary").prop('disabled', true); 
                        $("#draft_glossary").prop('disabled', true);
                        $("#app_glossary").prop('disabled', true); 
                        $("#dec_glossary").prop('disabled', true);

                        toastr.success(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });

        $('#dec_glossary').click(function()
        {
            if(confirm('Are you sure you want to Decline Publication Glossary?'))
            {
                id = $('#id_glo').val();
                year = $('#year_glo').val();
                content = CKEDITOR.instances['content_glo'].getData();
                status = 3;
                copy = 'GLOSSARY';
                formData = 
                {
                    id:id,
                    year:year,
                    content:content,
                    status:status,
                    copy:copy,
                    _token:'{{csrf_token()}}'
                }
                $.post('{{route('decline-section')}}', formData, function(data, status, xhr)
                {
                    if(data.status=='success')
                    {
                        toastr.warning(data.message);
                    }
                    else{ toastr.error(data.message); }
                });
            }

        });






        //creating publication messages
        $('#MsgForm').on('submit', function(e)
        {
            e.preventDefault();

            id = $('#edit_msg').val();
            year = $('#year_msg').val();
            section = $('#section_msg').val();
            message = $('#message_msg').val();
            formData = 
            {
                id:id,
                year:year,
                section:section,
                message:message,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('add-publication-message')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    toastr.success(data.info);
                    $('#edit_msg').val('');
                    $('#year_msg').val();
                    $('#section_msg').val(0);
                    $('#message_msg').val('');
                }
                else{ toastr.error(data.info); }
            });

        });


        $('#section_msg').on('change', function(e)
        {
            var year = $('#year_msg').val();   var section = $('#section_msg').val();    
            $('#edit_msg').val('');    $('#message_msg').val('');
            
            $.get('{{url('getPublicationMessages')}}?year=' +year+'&section=' +section, function(data)
            {
                $('#edit_msg').val(data.id);   $('#message_msg').val(data.message);
            });

        });


        //Sending Reminder Email
        $('#RemForm').on('submit', function(e)
        {
            e.preventDefault();

            var che = $('#all').prop('checked');
            if( che == true ){ all = 1; }else if( che == false ){ all = 0; }

            id = $('#edit_rem').val();
            user_id = $('#user_id_rem').val();
            division = $('#division_rem').val();
            message = $('#message_rem').val();
            all = all;
            formData = 
            {
                id:id,
                user_id:user_id,
                division:division,
                message:message,
                all:all,
                _token:'{{csrf_token()}}'
            }
            $.post('{{route('send-reminder')}}', formData, function(data, status, xhr)
            {
                if(data.status=='success')
                {
                    toastr.success(data.message);
                    $('#edit_rem').val('');
                    $('#user_id_rem').val(0);
                    $('#division_rem').val(0);
                    $('#message_rem').val('');
                    $('#all').prop('checked', false);
                }
                else{ toastr.error(data.message); }
            });

        });

    });




    function removeUser(id)
    { 
        if(confirm('Are you sure you want to remove this contributor?'))
        { 
            formData = 
            {
                id:id,
                _token:'{{csrf_token()}}'
            }
            $.post('{{url('/publication/remove-contributor')}}', formData, function(data, status, xhr)
            {  //success data
                if(data.status == 'success')
                {    
                    $('._row').remove();
                    var y = $('#year_init').val();    
                    $.get('{{url('getNogiarContributorsByYear')}}?year=' +y, function(data)
                    {  
                        $.each(data, function(index, User)
                        { 
                            $('#init_row').append('<tr class="_row row_'+User.id+'">  <th> '+User.year+' </th>  <th> '+User.division+' </th>  <th> '+User.user.name+' </th>  <th> '+User.approver.name+' </th>  <th>  <a onclick="removeUser('+User.id+')" href="#" style="cursor: pointer; color:red; font-size:10px" tooltip="true" id="'+User.id+'" class="btn-sm pull-right removeBtn" title="Remove Record"> <i class="fa fa-trash"></i>    </a>  </th>   </tr>');
                        });
                    });

                    toastr.success(data.message); 
                }
                else{ toastr.error(data.message); }
            });  
        }  
    }

    // function setDetails()
    // {
    //     var y = $('#year_init').val(); 
    //     $("#division").selectedIndex = 0;
    //     $("#user_id").selectedIndex = 0;  

    //     $.get('{{url('getNogiarContributorsByYear')}}?year=' +y, function(data)
    //     {  
    //         $("#division").selectedIndex = data.division;
    //         $("#user_id").selectedIndex = data.user_id;
    //     });
    // }



    function editUser(id)
    { 
        $(function()
        {
            var year = $('#year_init').val();   
            $.get('{{url('getNogiarContributorsById')}}?id=' +id, function(data)
            {                 
                $("#edit_id").val(id);
                $("#division").prop('value', data.division);
                $("#user_id_ini").prop('value', data.user_id);
                $("#approver_id_ini").prop('value', data.approver_id);
            });
        }); 
                  
    }



    //hide and show div
    $(function()
    {
        $('#t-content').click(function()
        {
            $('#tab-content').toggle();
        });

        $('#l-table').click(function()
        {
            $('#list-table').toggle();
        });

        $('#l-figure').click(function()
        {
            $('#list-figure').toggle();
        });
    });



    //dublicate
    $(function()
    {
        $('#plus').on('click', function()
        {
            var count = $('#count').val();
            if(count > 0){ var i = count; }else{ var i = 0; }
            // var i = 0;      var c = 0;
            i++;  
            $('#tab-content').append(
            '<tr style="padding: 1px">  <th> <input type="text" class="form-control frm title" id="title'+(i-1)+'" name="title'+(i-1)+'">  </th>  <th>     <input type="text" class="form-control frm" id="page_no'+(i-1)+'" name="page_no'+(i-1)+'">   </th>  <th>    <button id="'+(i-1)+'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button>    </th> </tr>'
            );

            console.log(i);
            $('#id').val(i);
            $('#count').val(i);
            // generateTableOfContent(i);
        });
    });




    $(function()
    {
        $('#saveUpBtn').on('mouseout', function()
        {
            var year = $('#year_reset').val();
            $('#year_enab').val(year); 
        });
    });

</script> 





{{-- Table of content script --}}
<script>
    // $(function()
    // {
    //     $('[data-toggle="tooltip"]').tooltip();

    //     var $plus = $('#plus');
    //     var $title = $('.title');
    //     var $page_no = $('#page_no0');
    //     var $generateBtn = $('#generateBtn');


    //     function doFind()
    //     {
    //         var query = findText($title.val());
    //          if (query.found)
    //          {
    //            $page_no.val(query.page);
    //          }
    //          else
    //          {
    //            $page_no.val('');
    //          }            
    //     }

    //     $plus.on('click', function()
    //     {
    //         doFind();
    //     });

    //     $generateBtn.on('click', function()
    //     {
    //         var i = $('#id').val();
    //         for (var j = 1; j <= i; j++) 
    //         {
    //             var $title = $('#title'+j+'');
    //             var $page_no = $('#page_no'+j+'');

    //             //put page number if found
    //             var query = findText($title.val());
    //             if (query.found)
    //             {
    //                $page_no.val(query.page);
    //             }
    //             else
    //             {
    //                $page_no.val('');
    //             } 

    //         }
    //     });

    // });


   {{-- let pdfData = {!! json_encode($r) !!};  --}}

    // pdfData.forEach(function(v, k)
    // {
    //     var rr = v.data.split(/\s/).join('');
    //     pdfData[k].data = rr;
    // });

    // function buildQuery(txt)
    // {
    //     var rr = txt.split('');
    //     rr = '[.| ]*' + rr.join('[.| ]*') + '[.| ]*';
    //     // console.log(rr);
    //     return rr;   
    // }    
       
    // if(value.data.indexOf(txt) != -1)
    
    // toUpperCase().trim().indexOf(txt.toUpperCase().trim())
    // function findText(txt)
    // {
    //   var found = false;
    //   var page = 0;
    //   pdfData.forEach(function(value, key)
    //   {
    //     if(value.data.search(new RegExp(buildQuery(txt.split(' ').join('')))) != -1)
    //     {
    //        found = true;
    //        page = value.page;
    //     }
    //   });

    //   return {
    //     found: found,
    //     page: page
    //   }; 
    // }


    // function generateTableOfContent(i)
    // {
    //     $(function()
    //     {
    //         for (var j = 0; j <= i; j++) 
    //         {
    //             var $title = $('.title'+j+'');
    //             var $page_no = $('#page_no'+j+'');

    //             //put page number if found
    //             var query = findText($title.val());
    //             if (query.found)
    //             {
    //                $page_no.val(query.page);
    //             }
    //             else
    //             {
    //                $page_no.val('');
    //             } 

    //         }

    //     });
    // }


    $(function()
    {
        $('#toc_year').change(function()
        {
          var year = $(this).val();  //alert(year);

          $.get('{{url('getATableOfContent')}}?year=' + year, function(data)
          {  
            //success data
            $('#tab-content').empty();
            $('#tab-content').append('<tr style="border: none;">  <th style="width: 80%">Content Title</th>  <th style="width: 10%">Page No</th>  <th style="width: 10%">Actions</th>  </tr>');
            $.each(data, function(index, TOCObj)
            {
                $('#tab-content').append('<tr style="padding: 1px; border: none;"> <th>  <input type="hidden" class="form-control frm" id="id'+ TOCObj.id +'" name="id'+ TOCObj.id +'" value="'+ TOCObj.id +'">  <input type="text" class="form-control frm title" id="title'+ index +'" name="title'+ index +'" value="'+ TOCObj.title +'"></th>  <th>   <input type="text" class="form-control frm" id="page_no'+ index +'" name="page_no'+ index +'" value="'+ TOCObj.page_no +'"> </th>  <th>   <button type="button" id="'+ index +'" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style=""> X</button> </th> </tr>');
            });            
          });

          //count
          $.get('{{url('getATableOfContentCount')}}?year=' + year, function(data)
          {  
            //success data
            $('#count').val(data);           
          });

          //first
          $.get('{{url('getATableOfContentFirst')}}?year=' + year, function(data)
          {  
            //success data
            $('#first').val(data.id); 
            if(data.id != null)   
            {

            }
            else
            {
                $('#tab-content').append('<tr style="padding: 1px; border: none;"> <th>  <input type="text" class="form-control frm title" id="title0" name="title0">  </th>  <th>  <input type="text" class="form-control frm" id="page_no0" name="page_no0">  </th> <th>   <button type="button" id="0" class="btn btn-sm pull-left mg-r round removeBtn" title="Remove this table row" style="">X</button>    </th> </tr>');
            }       
          });

          //last
          $.get('{{url('getATableOfContentLast')}}?year=' + year, function(data)
          {  
            //success data
            $('#last').val(data.id);           
          });
                        
        });

    });

    $(function()
    {
        $('.nav-link').mousedown(function()
        {
            $('.nav-link').removeClass('tab-nav-link');

            var tab_id = $(this).attr("id");   
            $('#'+tab_id).addClass('tab-nav-link');
        });
    });








        $('#year_sett').on('change', function(e)
        {
            var year = $('#year_sett').val();     $('#sbtn').hide();        
            $.get('{{url('getPublicationTables')}}?year=' +year, function(data)
            {   
                $('.pub_tab_rows').remove();  var i = 1; 
                $.each(data, function(index, Table)
                {
                    var tid = Table.table_id;    var t_id = Math.round(tid); 
                    if(Table.show_table == 1) { var check_ = 'checked="true"'; var styled = 'style=""'; var val = 'value="1"'; }
                    else {  var check_ = ''; var styled = 'style="color: red"'; var val = 'value="0"'; }

                    $('#pub_tables').append('<tr class="pub_tab_rows" '+styled+'>  <th> '+Table.year+'  <input type="hidden" name="sett_'+t_id+'" id="sett_'+t_id+'" value="'+Table.id+'"> </th> <th>'+t_id+' </th>    <th>'+Table.table_title+' </th>  <th style="text-align: left">  <input type="checkbox" onclick="setValue('+t_id+')" class="check_tabs" id="tab_'+t_id+'" name="tab_'+t_id+'" '+check_+' '+val+'>  </th>   </tr>');  i++;
                });

                //show buttons
                if(data != ''){ $('#sbtn').show(); }
                
            });

        });




    //CHECK ALL CHECKBOXES
    $(function()
    {
        //all checkboxes are check by default
        $('input:checkbox').prop('checked', this.checked); 


        $('#check_all').click(function () 
        {    
            $('input:checkbox').prop('checked', this.checked); 
            $('input:checkbox').val(1); 
        });


        //get row clicked
        // $('.check_tabs').click(function() 
        // {   
        //     var id = $(this).attr('id');  alert();

        //     var chk = $('#'+id).prop('checked');
        //     if( chk == true ){ $('#'+id).val(1); }
        //     else if( chk == false ){ $('#'+id).val(0); }
        //     var tab_val = $(this).val();  
        // });


    });

    function setValue(id)
    {
        $(function()
        {
            // var id = $(this).attr("id");

            var chk = $('#tab_'+id).prop('checked'); 
            if( chk == true ){ $('#tab_'+id).val(1); }
            else if( chk == false ){ $('#tab_'+id).val(0); }
            var tab_val = $('#tab_'+id).val();  //alert(tab_val);
        });
    }


</script>


<script>
    CKEDITOR.replace( 'content' );
    CKEDITOR.replace( 'content_reg' );
    CKEDITOR.replace( 'content_mod' );
    CKEDITOR.replace( 'content_glo' );

    CKEDITOR.config.extraPlugins = "base64image";
</script>


 

    @if(Session::has('info'))
        <script>
            $(function() 
            {
                toastr.success('{{session('info')}}', {timeOut:50000});
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() 
            {
                toastr.error('{{session('error')}}', {timeOut:50000});
            });
        </script>
    @endif