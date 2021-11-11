<style>
      .edit-bundle-detail {
    padding: 30px;
    border-radius: 10px;
}
.bundle-content {
        display: flex;
    justify-content: space-between;
    border-radius: 5px;
}
.heading-text {
    min-width: 0;
    max-width: calc(100% - 2rem);
    margin-top: 1.6rem;
    /*margin-left: 2rem;*/
    flex: 1 1 24rem;
    padding: 1.6rem 1rem 0;
}
.right-side-content, .variant-list .card-body ul.list-variant {
    min-width: 0;
    max-width: calc(100% - 2rem );
    margin-top: 1.6rem;
    /*margin-left: 2rem;*/
    flex: 2 2 48rem;
}
.Polaris-FormLayout__Item.image-with-feilds {
    flex-direction: row;
    justify-content: unset;
    grid-gap: 50px;
}
.edit-fields {
    display: flex;
    align-items: center;
}
.edit-bundle-detail input#update_id {
    width: 100%;
    max-width: 270px;
    height: 36px;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #dadada;
}
.sc-kEYyzF.iCQAsp {
    align-items: center;
}
.sc-kEYyzF.iCQAsp p {
    margin-bottom: 0px;
    padding: 15px 0px;
}
.edit-image label {
    font-size: 16px;
    font-weight: 600;
    padding-bottom: 30px;
}
.edit-image img {
    border-radius: 4px;
    border: 1px solid #eee;
}
.edit-fields input[type="button"] {
    background: #008060;
    color: #fff;
}
.edit-fields input#edit_product_image {
    width: 100%;
}
.edit-image {
    margin-bottom: 10px;
}
.right-side-content .Polaris-FormLayout__Item .Polaris-Form_Layout__Item {
    display: flex;
    flex-direction: column;
}
.variant-list .card-body {
    display: flex;
    justify-content: space-between;
    border-radius: 5px;
    padding: 0px;
}
.variant-list .card-body h2.variant-Heading {
    min-width: 0;
    max-width: calc(100% - 2rem);
    margin-top: 1.6rem;
    /*margin-left: 2rem;*/
    flex: 1 1 24rem;
    padding: 1.6rem 1rem 0;
}
.Polaris-Stack__Item, .note-padding {
    padding: 30px;
}
.note-padding button.btn.btn-success {
    position: relative;
    background: #008060;
    border-width: 0;
    border-color: transparent;
    color: #fff;
    padding: 10px 50px;
    border-radius: 5px;
}
.note-padding {
    border-top: 1px solid #e1e3e5;
}
.Polaris-Stack__Item {
    text-align: right;
}
.variant-list {
    border-top: 1px solid #e1e3e5;
}
.edit-bundle-detail input#update_id {
    display: none;
}
.edit-bundle-detail .sc-kEYyzF.iCQAsp {
    margin-bottom: 0px;
}
.product-add-popup .search_in-btn input {
    border: solid 1px #bfbebe !important;
    border-radius: 7px;
    width: 100%;
    height: 38px;
        margin: 10px 0px 20px;
}
.product-add-popup .search_in-btn button.search_btn {
    display: none;
}
</style>
    <?php 
    
        header("Access-Control-Allow-Origin: *");
        
        $url = "https://84981951fd1b93864003d8dcf84538bd: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@kioui-apps-dev.myshopify.com/admin/api/2021-07/products.json";
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $resp = curl_exec($curl);
        curl_close($curl);
        
        $jsonArrayResponse = json_decode($resp);
        $get_product = $jsonArrayResponse->products;
        $count_data = count($get_product);
    ?>
     <div class="tabpanel">
		    <div class="container-fluid">
			    <div class="card-body">
			        @include('partials.navbar')
                    <form action="{{ url('post-edit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
              
                    <div class="edit-bundle-detail">
              
                    <input type="text" name="update_id" id="update_id" value="{{ $edit_bundle->id }}">
                                <div class="sc-kEYyzF iCQAsp">
                                	<span><span class="Polaris-Icon Polaris-Icon--colorBase Polaris-Icon--applyColor">
                                	<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-9 4h2v-4H9v4zm0-6h2V6H9v2z"></path></svg></span></span><div class="sc-kkGfuU jasPPz">
                                	<p>You are creating the <strong><span>fd</span></strong> bundle.</p></div>
                                </div>
                                <div class="bundle-content">
                                    <div class="heading-text">
                               <h2 class="Polaris-Heading">Imagery</h2>
                               </div>
                               <div class="right-side-content">
                                   <div class="Polaris-Card">
                                       <div class="Polaris-Card__Section">
                                <div class="Polaris-FormLayout__Item">   
                                <div class="edit-image">
                                    <label> Product Image </label>                
                                    <img src="{{ asset('public/images/'.$edit_bundle->design_product_image) }}" style='width:100px;height:100px' class="img-responsive" name="edit_design_image" id="edit_img">
                                   </div>
                                    <div class="edit-fields">
                                   <input type="hidden" name="hidden_update_file" id="hidden_update_file" value="{{ $edit_bundle->design_product_image }}">
                                    <input type="file" name="edit_product_image" id="edit_product_image">
                                    <input type="button" class="button" value="Upload" id="but_upload">
                                </div>
                                </div>
                                
                                <div class="Polaris-FormLayout__Item">      
                                	<label> Bundle Name </label>                
                                	<input type="text" name="edit_bundle_name" id="edit_bundle_name" value="{{ old('bundle_name', $edit_bundle->bundle_name ) }}">
                                
                                </div>
                                
                                <div class="Polaris-FormLayout__Item">
                                    <div class="Polaris-Form_Layout__Item">
                                        <label> Bundle Product Name </label>
                                        <input type="text" name="edit_bundle_product_name" id="edit_bundle_product_name" value="{{ old('bundle_product_name', $edit_bundle->bundle_product_name ) }}">
                                    </div>
                             </div>
                        </div>
                   </div>
             </div>
       </div>     
                    </div>
                                    
                                <!-- bundle details -->
                                <?php   $get_product_name = $edit_bundle->bundle_product_title;
                                        $get_bundle_product_img  = $edit_bundle->bundle_product_img;
                                        $get_bundle_product_id  = $edit_bundle->bundle_product_id;
                                        $convert_array = explode(",",$get_product_name);
                                        $array_bundle_img = explode(",",$get_bundle_product_img);
                                        $array_bundle_product_id = explode(",",$get_bundle_product_id);
                                        $count_product =   count($convert_array);
                                        $count_array_bundle_img =   count($array_bundle_img);
                                        $count_array_bundle_id =   count($array_bundle_product_id);
                                        
                                ?>
                                <div class="variant-list">
                                     <div class="container-fluid">
                                        <div class="card-body">
                                           <h2 class="variant-Heading">Bundle details</h2>
                                           <ul class="list-variant" id="sortable">
                                               <?php  for($i=0;$i<$count_product;$i++) { 
                                                         for($j=0;$j<$count_array_bundle_img;$j++){
                                                              for($k=0;$k<$count_array_bundle_id;$k++){
                                                         if($i==$j && $i==$k && $k==$i) {     
                                                             
                                               ?>
                                               
                                        <li class='product_variant draggable' draggable='true'>
                                            <input type='hidden' name='edit_product_id[]' value='<?php echo $array_bundle_product_id[$k]; ?>'>
                                                <div class='left-content'>
                                                    <img src='{{ asset('public/images/drag.png') }}' class='drag-icon'>
                                                        <div class='product-title'>
                                                            <input type='hidden' name='edit_product_img[]' value='<?php echo $array_bundle_img[$j]; ?>'>
                                                            <img  src='<?php echo $array_bundle_img[$j]; ?>'>
                                                        <div class='prodcut-cntnt'>
                                                            <input type='hidden' name='edit_product_title[]' value='<?php echo $convert_array[$i]; ?>'>
                                                            <h3 class='Polaris-Heading'><?php echo $convert_array[$i]; ?></h3>
                                                        </div>
                                                        </div>
                                                </div>
                                        
                                                <div class='right-btn'>
                                                    <button class='remove_btn' href='javascript:void(0);'>Remove</button>
                                                </div>       
                                        </li>
                                                    
                                               <?php  } } } } ?>
                                              
                                           </ul>
                                        </div>
                                     </div>
                                </div>
                                
                                <!-- end -->
					 
                                <div class="Polaris-Stack__Item">
                                    <button class="Polaris-Button Polaris-Button--primary" type="button" data-toggle="modal" data-target="#exampleModal">
                                    		<span class="Polaris-Button__Text">Add products</span>
                                    </button>
                                </div>
                                <div class="note-padding">
                                <div class="Polaris-FormLayout__Item">
                                    <div class="Polaris-FormLayout__Item">
                                        <label> Notes </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="notes">{{ old('notes', $edit_bundle->notes ) }}</textarea>
                                    </div>
                                </div>
                                
                                	<div class="Polaris-FormLayout__submit">
                                        <div class="Polaris-FormLayout__submit">
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        </div>
        							</div>
        							</div>
					
					   
					</form>
                    
                    </div>
                </div>
                </div>
                    <!--popup-->
                    <div class="product-add-popup modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    	<div class="modal-dialog" role="document">
                    	  <div class="modal-content">
                    	    <form class="modal-content form-horizontal" id="editor" >
                    		<div class="modal-header"> 
                    		  <h4 class="modal-title" id="exampleModalLabel">Add products</h4>
                    		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    			<span aria-hidden="true">&times;</span>
                    		  </button>
                    		</div>
                    		<div class="modal-body">
                    		
                    			<div class="search_in-btn">
                    				<input type="text"  class="search" name="search" id="search" autocomplete="off" placehodler="search">
                    				<button type="submit" class="search_btn"><i class="fa fa-search"></i></button>
                    			</div>
                    			</form>
                    			<ul class="product-list">
                    			<?php for($i=0;$i<$count_data;$i++) { 
                    				$get_images  =  $get_product[$i]->images;
                    				$count_images = count($get_images);
                    				for($j=0;$j<$count_images;$j++) {
                    			?>
                    			    <li>
                    					<div class="form-group">
                    						<input type="hidden" name="product_id"  id ="<?php echo $get_product[$i]->id; ?>" value="<?php echo $get_product[$i]->id; ?>">
                    	            		<input  data-id="<?php echo $get_images[$j]->src; ?>" type="checkbox" id="<?php echo $get_product[$i]->id; ?>" name ="get_product[]" value="<?php echo $get_product[$i]->title; ?>">
                    						<label for="<?php echo $get_product[$i]->id; ?>"></label>
                    						
                    					<div class="list-content">
                    						<div class="list-img">
                    						<img src="<?php echo $get_images[$j]->src; ?>">
                    						</div>
                    						<h4><?php echo $get_product[$i]->title; ?></h4>
                    					</div>   
                    					</div>
                    					
                    				</li>
                    			<?php  
                    				}
                    			}
                    			?>
                    		</ul>
                    		<div class="modal-footer">
                    		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    		        <button type="submit" class="btn btn-primary" id="selected_checkbox">Save</button>
                    		</div>
                    		</div>
                  
                    		
                    	  </div>
                    	</div>
                      </div>
                      <!--popupend-->
                      
              
                    <script>
                    $( function() {
                  
                    $( "#sortable" ).sortable();
                    } );
                    </script>

		          <script>
		             
                        $editor = $('#editor'),
                            $editor.on('submit', function(e) {
                                
                            if (this.checkValidity && !this.checkValidity()) return;
                                e.preventDefault();
                                var get_data = [];
                                var product_id =[];
                                var get_img_src=[];
                
                                //loop through all checkboxes which is checked
                                $('#editor input[type=checkbox]:checked').each(function() {
                        
                                get_data.push($(this).val());//push value in array
                                product_id.push($(this).attr('id'));//push value in array
                                get_img_src.push($(this).attr("data-id"));//push value in array
                                
                            });
                            values = {
                                extralist_text: get_data,//pass same 
                                extralist_id: product_id,
                                extralist_img_src:get_img_src
                                
                            };
                                
                                var product_title = values['extralist_text'];
                                var product_id = values['extralist_id'];
                                var prouduct_img = values['extralist_img_src'];
                               for (let i = 0; i < product_title.length; i++) {
        
                                     
                                var html ="<li class='product_variant draggable' draggable='true'>"+
                                    "<input type='hidden' name='edit_product_id[]' value='"+product_id[i]+"'>"+
                                    "<div class='left-content'>"+
                                       "<img src='{{ asset('public/images/drag.png') }}' class='drag-icon'>"+
                                            "<div class='product-title'>"+
                                              "<input type='hidden' name='edit_product_img[]' value='"+prouduct_img[i]+"'>"+
                                                    "<img  src='"+prouduct_img[i]+"'>"+
                                                "<div class='prodcut-cntnt'>"+
                                                    "<input type='hidden' name='edit_product_title[]' value='"+product_title[i]+"'>"+
                                                    "<h3 class='Polaris-Heading'>"+product_title[i]+"</h3>"+
                                                "</div>"+
                                             "</div>"+
                                    "</div>"+
                                    
                                    "<div class='right-btn'>"+
                                    "<button class='remove_btn' href='javascript:void(0);'>Remove</button>"+
                                    "</div>"+
                                
                                "</li>";
                                $(".list-variant").append(html);
								
                                }
                                $('#exampleModal').modal('hide');
                                $('#editor input[type=checkbox]:checked').prop('checked',false);
                              
                            //console.log(values);
                            // var count = values.length;
                            // alert(JSON.stringify(values));
                        });
                        
                   
                </script>
                
                <script>
                        $(".variant-list").on('click','.remove_btn',function(){
                            $(this).parent().parent().remove();
                        });
                        
                </script>
                
            <script>
            $(document).ready(function(){
            
            $("#but_upload").click(function(){
            
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            
            var fd = new FormData();
            var files = $('#edit_product_image')[0].files;
            
            // Check file selected or not
            if(files.length > 0 ){
               fd.append('file',files[0]);
            
               $.ajax({
                  url: "{{ url('check-image') }}",
                  type: 'post',
                  data: fd,
                  contentType: false,
                  processData: false,
                  success: function(response){
                     // alert(response);
                     if(response != 0){
                            
                    
                         
                        $("#edit_img").attr("src",response); 
                        $(".Polaris-FormLayout__Item edit_img").show(); // Display image element
                     }else{
                        alert('file not uploaded');
                     }
                  },
               });
            }else{
               alert("Please select a file.");
            }
            });
            });
            </script>
            
            
             <script type="text/javascript">
                    
                    $(document).ready(function(){
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    
                    $("#search").keyup(function(){
                    
                    var search = $(this).val();
                    $.ajax({
                    type: "POST",
                    url:"{{ url('autocomplete-search') }}",
                    data:'keyword='+$(this).val(),
                    success: function(data){
                    
                    //$("#suggesstion-box").show();
                    $(".product-list").html(data);
                        modal.style.display = "block";
                    //$("#search-box").css("background","#FFF");
                    }
                    });
                    
                    });
                    });
            
            </script>
    
    
