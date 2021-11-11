@extends('shopify-app::layouts.default')

@section('content')
<?php $app_url = env('APP_URL'); ?>
<?php  //$a = $shopDomain ?? Auth::user()->name;
?>
<?php $date = new DateTime(); 
$time = $date->getTimestamp(); ?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
       <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
 <link href="<?php echo $app_url; ?>/resources/css/custom.css?<?php echo $time; ?>" rel="stylesheet" />
  <link href="<?php echo $app_url; ?>/resources/css/style.css?<?php echo $time; ?>" rel="stylesheet" />

<!--Navbar-->


 <div class="tabpanel">
		    <div class="container-fluid">
			    <div class="card-body">
                    <ul class="tabs">
                        <li><a href="#tab-1" class="menu-items-pg">Dashboard</a></li>
                        <li><a href="#tab-2" class="menu-items-pg">Products</a></li>
                        <li><a href="#tab-3" class="menu-items-pg">Design</a></li>
                        <li><a href="#tab-4" class="menu-items-pg">Bundle Details</a></li>
                    </ul>
			    </div>
	        </div>
	    </div>
	    
    <div id="tab-1">
        @include('store.setup-page')
    </div>
    <div id="tab-2">
        @include('store.products-page')
    </div>
    <div id="tab-3">
        @include('store.design-page')
    </div>


<!--EndNavbar -->
  
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: '',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
       
          
    </script>

      
     <script>
     var Shopname="{{ $shopDomain ?? Auth::user()->name }}";
 $(document).ready(function() {
    $('ul.tabs').each(function(){
      var active, content, links = $(this).find('a');
      active = links.first().addClass('active');
      content = $(active.attr('href'));
      links.not(':first').each(function () {
        $($(this).attr('href')).hide();
      });
      $(this).find('a').click(function(e){
        active.removeClass('active');
        content.hide();
        active = $(this);
        content = $($(this).attr('href'));
        active.addClass('active');
        content.show();
        return false;
      });
    });
  });
  
 </script>
@endsection


