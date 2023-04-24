<form id="pubForm" action="{{url('/publication/dwp/update')}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" class="form-control" id="id" name="id" value="{{$SECTION->id}}" required>

        <div id="section" class="col-md-12" style="border:#e1e1e1 thin solid; border-radius: 6px; border-bottom-color: #fff">

            <div style="background-color: #AEC6CF; color: #202020; margin: 0px -15px; padding: 10px 15px">  
                <table width="100%">
                    <tr>
                        <td width="40%"> Add DWP Publications </td>
                        <td width="10%">
                            <input type="text" style="height:25px; margin-top: -4px" class="form-control" placeholder="Publication Year" name="year" id="year_pub" value="{{$SECTION->year}}" required="">
                        </td>
                        <td width="20%">
                            <button type="button" class="btn btn-info pull-right" id="addListBtn" style="font-size:10px; border-radius:13px; margin-top: -4px; margin-left:4px"> List </button> 

                            <button type="button" class="btn btn-success pull-right" id="addContentBtn" style="font-size:10px; border-radius:13px; margin-top: -4px"> Content </button>
                        </td>
                    </tr>
                </table>
                     
            </div> <br>


                  <div class="form-group row">   <!-- <div class="summernote">Hello Summernote</div> -->
                    <label for="header" class="col-md-1 col-form-label"> Header </label>
                    <div class="col-md-5">                        
                        <textarea rows="2" class="form-control" placeholder="Publication Header" name="header" id="header">{{$SECTION->header}}</textarea>
                    </div>

                    <label for="title" class="col-md-1 col-form-label"> Title</label>
                    <div class="col-md-5">
                        <textarea rows="2" class="form-control" placeholder="Publication Title" name="title" id="title">{{$SECTION->title}}</textarea> 
                    </div>                                
                  </div> 


                  <div class="form-group row">
                    <label for="picture_1" class="col-md-1 col-form-label"> Picture </label>
                    <div class="col-md-5" style="">
                        <?php $pic_1 = $SECTION->picture_1; ?>
                        @if($pic_1)
                        	<img src="{{URL::asset('assets/images/publications/'.$pic_1.'/'.$pic_1)}}" class="img-responsive" width="100%" alt="{{$pic_1}}">
                        	<input name="picture_1" id="picture_1" type="file" multiple="multiple">
                        @else
                        	<img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                        	<input name="picture_1" id="picture_1" type="file" multiple="multiple">
                        @endif
                    </div>

                    <label for="picture_2" class="col-md-1 col-form-label"> Picture </label>
                    <div class="col-md-5" style="">
                        <?php $pic_2 = $SECTION->picture_2; ?>
                        @if($pic_2)
                        	<img src="{{URL::asset('assets/images/publications/'.$pic_2.'/'.$pic_2)}}" class="img-responsive" width="100%" alt="{{$pic_2}}">
                        	<input name="picture_2" id="picture_2" type="file" multiple="multiple">
                        @else
                        	<img src="{{asset('assets/images/bg-11.jpg')}}" class="img-responsive" width="100%" alt="Pic"> 
                        	<input name="picture_2" id="picture_2" type="file" multiple="multiple">
                        @endif
                    </div>                                
                  </div>    <hr>


                  <?php 
                  		$contents = \App\dwp_publication_content::where('dwp_id', $SECTION->id)->orderBy('id', 'asc')->get(); 
                  		$content_count = \App\dwp_publication_content::where('dwp_id', $SECTION->id)->count(); 	  $i = 0; 

                  		$lists = \App\dwp_publication_list::where('dwp_id', $SECTION->id)->orderBy('id', 'asc')->get(); 
                  		$list_count = \App\dwp_publication_list::where('dwp_id', $SECTION->id)->count(); 	  $j = 0; 
                  ?>
                  @if($contents)
                  	@foreach($contents as $contents)
                  		<?php $i++; ?>
                  		<div id="row_content{{$i}}" class="form-group row">      <label for="content{{$i}}" class="col-md-1 col-form-label"> Content </label>    
                  			<div class="col-md-11">   
                  				<table>  
                  					<tr>  
                  						<td width="100%">
                  							<textarea rows="2" class="form-control" placeholder="Publication Content {{$i}}" name="content{{$i}}" id="content{{$i}}">{{$contents->content}}</textarea>
                    						<input type="hidden" name="id_content{{$i}}" id="id_content{{$i}}" class="form-control" style="size:50%" value="{{$contents->id}}">
                  						</td> 
                  						<td width="0.5%"> 
                  							<a class="btn_remove_content" name="remove" id="{{$i}}" href="#" title="Remove Content" style="padding:10px">  <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i></a> 
                  						</td>  
                  					</tr> 
                  				</table>       
                  			</div>      
                  		</div> 

                  	@endforeach
                  @endif


                  @if($lists)
                  	@foreach($lists as $lists)
                  		<?php $j++; ?>
                  		<div id="row_list{{$j}}" class="form-group row">      <label for="list{{$j}}" class="col-md-1 col-form-label"> List </label>    
                  			<div class="col-md-11">   
                  				<table>  
                  					<tr>  
                  						<td width="100%">
                  							<input type="text" class="form-control" placeholder="Publication List {{$j}}" name="list{{$j}}" id="list{{$j}}" value="{{$lists->list}}">
                    						<input type="hidden" name="id_list{{$j}}" id="id_list{{$j}}" class="form-control" style="size:50%" value="{{$lists->id}}">
                  						</td> 
                  						<td width="0.5%"> 
                  							<a class="btn_remove_list" name="remove" id="{{$j}}" href="#" title="Remove List" style="padding:10px">  <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i></a> 
                  						</td>  
                  					</tr> 
                  				</table>       
                  			</div>      
                  		</div>

                  	@endforeach
                  @endif


        </div>

        <div id="" class="col-md-12" style="border:#e1e1e1 thin solid; border-radius: 6px; border-top-color: #fff"> <hr>
            <div class="form-group row">
                <label for="footer" class="col-md-1 col-form-label"> Footer </label>
                <div class="col-md-5">
                    <textarea rows="1" class="form-control" placeholder="Publication Footer" name="footer" id="footer">{{$SECTION->footer}}</textarea>
                </div>

                <label for="sub_footer" class="col-md-1 col-form-label"> Subfooter</label>
                <div class="col-md-5">
                    <textarea rows="1" class="form-control" placeholder="Publication Subfooter" name="sub_footer" id="sub_footer">{{$SECTION->sub_footer}}</textarea> 
                </div>                                
            </div>
        </div>

            <div id="" class="col-md-12" style="padding: 15px 0px">                       
                <div class="modal-footer" id="add_footer">  
                    <input type="hidden" name="count_list" id="count_list" value="" class="form-control" style="size:50%">
                    <input type="hidden" name="count_content" id="count_content" value="" class="form-control" style="size:50%">
                    <input type="hidden" name="new_count_list" id="new_count_list" value="" class="form-control" style="size: 50%"> 
                    <input type="hidden" name="new_count_content" id="new_count_content" value="" class="form-control" style="size:50%"> 
                    <button type="reset" class="btn btn-default" style="font-size: 12px">Clear</button>
                    <button type="submit" name="upd_pub_btn" id="upd_pub_btn" class="btn btn-primary" style="font-size: 12px"> <i class="fa fa-plus"></i> Update Content </button>
                </div>
            </div>
     
</form>







<!--script for dublicating form -->
<script>
    $(function ()
    {    
    	//ON LOAD SET OLD NUMBERS OF CONTENT AND LIST    	
    	document.getElementById('count_content').value = '{{$content_count}}'; 	document.getElementById('count_list').value = '{{$list_count}}'; 		


        //ADDING LIST
        var i = '{{$list_count}}'; 
        $('#addListBtn').on('click', function ()  
        {
            i++;  
            $('#section').append(
            '<div id="row_list'+i+'" class="form-group row">      <label for="list'+i+'" class="col-md-1 col-form-label"> List </label>    <div class="col-md-11">   <table>  <tr>  <td width="100%"><input type="text" class="form-control" placeholder="Publication List '+i+'" name="list'+i+'" id="list'+i+'"></td> <td width="0.5%"> <a class="btn_remove_list" name="remove" id="'+i+'" href="#" title="Remove This List" style="padding:10px">  <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>    </a> </td>  </tr> </table>       </div>      </div>'

        );
            document.getElementById('new_count_list').value = i;   
        });
        
        //Function To         
        $(document).on('click', '.btn_remove_list', function()
        {
            var button_id = $(this).attr("id");
            $('#row_list'+button_id+"").remove();
            
            //reducing the count value
            document.getElementById('new_count_list').value = --i;
        });



        //ADDING CONTENT
        var j = '{{$content_count}}'; 
        $('#addContentBtn').on('click', function ()  
        {
            j++;  
            $('#section').append(
            '<div id="row_content'+j+'" class="form-group row">      <label for="content'+j+'" class="col-md-1 col-form-label"> Content </label>    <div class="col-md-11">   <table>  <tr>  <td width="100%"><textarea rows="2" class="form-control" placeholder="Publication Content '+j+'" name="content'+j+'" id="content'+j+'"></textarea></td> <td width="0.5%"> <a class="btn_remove_content" name="remove" id="'+j+'" href="#" title="Remove This Content" style="padding:10px">  <i class="fa fa-remove text-inverse m-r-10" style="color:red"></i>    </a> </td>  </tr> </table>       </div>      </div>'

        );
            document.getElementById('new_count_content').value = j;   
        });
        
        //Function To         
        $(document).on('click', '.btn_remove_content', function ()
        {
            var button_id = $(this).attr("id");
            $('#row_content'+button_id+"").remove();
            
            //reducing the count value
            document.getElementById('new_count_content').value = --j;
        });
            
    });
    
</script> 


