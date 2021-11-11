<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ \Osiset\ShopifyApp\getShopifyConfig('app_name') }}</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
        <link rel="stylesheet" href="{{ asset('public/style.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('styles')
    </head>

    <body>
        
        <div class="tabpanel">
		    <div class="container-fluid">
			    <div class="card-body">
			     @include('partials.navbar')
			     @yield('content')
			    </div>
	        </div>
	    </div>
       

        @if(\Osiset\ShopifyApp\getShopifyConfig('appbridge_enabled'))
            <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
            <script  src="https://unpkg.com/turbolinks"></script>
            <script>
                var AppBridge = window['app-bridge'];
                var createApp = AppBridge.default;
                var app = createApp({
                    apiKey: '{{ \Osiset\ShopifyApp\getShopifyConfig('api_key', Auth::user()->name ) }}',
                    shopOrigin: '{{ Auth::user()->name }}',
                    forceRedirect: true,
                });
            </script>
            <script>
                $(".view-text").click(function(){
                      $('.view_bundle').text($(this).val());
                      $('.view_bundle').val($(this).val());
                });
            </script>
                 <script>
		      
		                $(".variant-list").hide();
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
                                
                                $(".empty_text").hide();
                                 $(".variant-list").show();
                                for (let i = 0; i < product_title.length; i++) {
        
                                     
                                var html ="<li class='product_variant draggable' draggable='true'>"+
                                    "<input type='hidden' name='product_id[]' value='"+product_id[i]+"'>"+
                                    "<div class='left-content'>"+
                                       "<img src='{{ asset('public/images/drag.png') }}' class='drag-icon'>"+
                                            "<div class='product-title'>"+
                                              "<input type='hidden' name='product_img[]' value='"+prouduct_img[i]+"'>"+
                                                    "<img  src='"+prouduct_img[i]+"'>"+
                                                "<div class='prodcut-cntnt'>"+
                                                    "<input type='hidden' name='product_title[]' value='"+product_title[i]+"'>"+
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
            
             <script>
                    $( function() {
                  
                    $( "#sortable" ).sortable();
                    } );
                    </script>
            

            @include('shopify-app::partials.flash_messages')
        @endif

        @yield('scripts')
    </body>
</html>
