
<?php $app_url = env('APP_URL'); ?>
<?php $date = new DateTime(); 
$time = $date->getTimestamp(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo $app_url; ?>/resources/css/custom.css?<?php echo $time; ?>" rel="stylesheet" />
<div class="Reviewtab" >
			<div class="optiondesing">
			<div class="flagdata"><span class="flag"><svg viewBox="0 0 20 20" class="v3ASA" focusable="false" aria-hidden="true"><path fill="currentColor" d="M2 3h11v4h6l-2 4 2 4H8v-4H3"></path><path d="M16.105 11.447L17.381 14H9v-2h4a1 1 0 0 0 1-1V8h3.38l-1.274 2.552a.993.993 0 0 0 0 .895zM2.69 4H12v6H4.027L2.692 4zm15.43 7l1.774-3.553A1 1 0 0 0 19 6h-5V3c0-.554-.447-1-1-1H2.248L1.976.782a1 1 0 1 0-1.953.434l4 18a1.006 1.006 0 0 0 1.193.76 1 1 0 0 0 .76-1.194L4.47 12H7v3a1 1 0 0 0 1 1h11c.346 0 .67-.18.85-.476a.993.993 0 0 0 .044-.972l-1.775-3.553z"></path></svg></span></div>
			<p>
			
			Your feedback really keeps us going! It only takes a minute. How is your experience?</p>
			<span class="addReview" id="addreview" value="Good" type="button">	<p id="Goodfeed">Good</p><svg viewBox="0 0 20 20" class="v3ASA" focusable="false" aria-hidden="true"><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8M7 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m6 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-3 6a3.006 3.006 0 0 1-2.829-2h5.658A3.006 3.006 0 0 1 10 13m4-4H6a1 1 0 0 0-1 1c0 2.757 2.243 5 5 5s5-2.243 5-5a1 1 0 0 0-1-1"></path></svg>
			</span>
			<span class="suggestion" id="suggestion" value="Bad" type="button"><p id="Badfeed">Bad</p><svg viewBox="0 0 20 20" class="v3ASA" focusable="false" aria-hidden="true"><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8m-3-8a1 1 0 1 0 0-2 1 1 0 0 0 0 2m6-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-3 4c-.247 0-2.451.036-3.707 1.293a.999.999 0 1 0 1.414 1.414c.57-.57 1.881-.705 2.29-.707.415.002 1.726.137 2.296.707a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414C12.451 12.036 10.247 12 10 12"></path></svg></span>
			<button type="button" class="closereview" aria-label="Dismiss notification"><span class="close_span">
			<svg viewBox="0 0 20 20" class="v3ASA" focusable="false" aria-hidden="true"><path d="M11.414 10l4.293-4.293a.999.999 0 1 0-1.414-1.414L10 8.586 5.707 4.293a.999.999 0 1 0-1.414 1.414L8.586 10l-4.293 4.293a.999.999 0 1 0 1.414 1.414L10 11.414l4.293 4.293a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L11.414 10z" fill-rule="evenodd"></path></svg></span>
			</button>
			
			</div>
			
			

			</div>
			

	<!-- start form--> 
	<div class="suggestionPopup hideform" style="">
				<div class="suggestionPopup-inner">
				<a href="" class="popup_close"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class="suggestionpopupForm">
				<form id="suggestion" name="suggestion">
				    @csrf
				<h3>Share your feedback on FBTrack</h3>
				<span>We’re sorry that you’re not enjoying your experience with FBTrack.</span>
                   <div style="display:none;" class="alert alert-success">
<div class="feedback_messagebox">
<div class="feedback_messagebox_icon">
<span>
<svg class="success" viewBox="0 0 20 20" focusable="false" aria-hidden="true">
<g fill-rule="evenodd"><circle fill="currentColor" cx="10" cy="10" r="9"></circle><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m2.293-10.707L9 10.586 7.707 9.293a1 1 0 1 0-1.414 1.414l2 2a.997.997 0 0 0 1.414 0l4-4a1 1 0 1 0-1.414-1.414"></path></g></svg></span></div>
<div>
<div class="feedback_messagebox_text">
<p>Your feedback has been submitted.</p>
</div>
<div class="feedbackmessage">Thank you for taking the time to provide feedback.</div>
</div>
</div>
</div>
				   <div class="form-group">
					<label for="pixelEditor">What issues are you having?</label>
					<input type="text" class="form-control" name="issue" id="suggestionissue" required="">
					</div>

					<div class="form-group">
					<label for="pixelEditor">How can we make the FBTrack experience better?</label>
					<textarea id="suggestionquery33" class="form-control" name="query" required=""></textarea>
					</div>
					
		<input type="submit" value="Send" id="suggestion2" class="btn btn-default" name="sendEmail">
		<h3 aria-label="Looking for support?" class="p_3Gq1y">Looking for support?</h3>
		<p testid="HelpMessage">This form is for feedback only. If you have questions, please use the CONTACT US form</p>
					
				</form>
				</div>
				</div>
			</div>
	
	
	<!-- end form -->
		
	<!--scripts section start -->
@section('scripts')
    @parent	
			
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script>  
     
    $('body').on('click', '#Badfeed', function () {
       $('.suggestionPopup').removeClass('hideform');
    });
    
    $('.popup_close').on('click', function () {
       $('.suggestionPopup').addClass('hideform');
       
    });
    
    
  
    
   
			
			$('#addreview').click(function(e){
			e.preventDefault();
			var go_to_url = 'https://apps.shopify.com/fbtrack-pixel-app#modal-show=ReviewListingModal';
			window.open(go_to_url, '_blank');

			});
    
    
</script>
@endsection
<!--scripts section End -->