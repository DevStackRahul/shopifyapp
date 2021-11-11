@extends('shopify-app::layouts.default')

@section('content')

    <!-- You are: (shop domain name) -->
<p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>
<div class="flash-message">
    
    @if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif

  </div> <!-- end .flash-message -->
  <div class="flash-message">
    
    @if(Session::has('flash_message_update_data'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_update_data') !!}</em></div>
    @endif

  </div> <!-- end .flash-message -->
<form action="{{ route('post-setup') }}" method="POST">
@csrf
<div class="sc-kEYyzF iCQAsp">
<span><span class="Polaris-Icon Polaris-Icon--colorBase Polaris-Icon--applyColor">
<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 10a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-9 4h2v-4H9v4zm0-6h2V6H9v2z"></path></svg></span></span><div class="sc-kkGfuU jasPPz">
<p>You are creating the <strong><span class='view_bundle'></span></strong> bundle.</p></div>
</div>
<div class="Polaris-Layout">
<div class="Polaris-Layout__AnnotatedSection">
<div class="Polaris-Layout__AnnotationWrapper">
<div class="Polaris-Layout__Annotation">
<h2 class="Polaris-Heading">Bundle details</h2>
<div class="Polaris-Layout__AnnotationDescription">
<p>Name your bundle, upload a header image and let your users know what the bundles' criteria are by adding a description.</p>
</div>
</div>
<div class="Polaris-Layout__AnnotationContent">
<div class="Polaris-Card">
<div class="Polaris-Card__Section">
	<div class="Polaris-FormLayout">
		<div class="Polaris-FormLayout__Item">
			<label>Bundle name</label>
			<input required name="bundle_name"  autocomplete="on" class="Polaris-TextField__Input view-text" type="text"  aria-invalid="false" value=""> 
			<div class="Polaris-Labelled__HelpText" >This will only be used in your Shopify dashboard; it won't be visible to customers.</div>
		</div>
		<div class="Polaris-FormLayout__Item">
			<label>Product name</label>
			<input required name="product_name"  autocomplete="on" class="Polaris-TextField__Input view_bundle" type="text"  aria-invalid="false" value=""> 
			<div class="Polaris-Labelled__HelpText" >This is the bundle name your customers will see in the checkout and email notifications.</div>
		</div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="Polaris-PageActions">
<div class="Polaris-Stack ">
<button class="Polaris-Button" type="button"><span class="Polaris-Button__Text">Cancel</span></button>
<button class="Polaris-Button Polaris-Button--primary" type="submit" name="submit" id="submit"><span class="Polaris-Button__Text">Next</span></button>
</div>
</div>
</form>

<a href="{{ url('snippet') }}" class="snippet">Add script testing</a>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection