 <div id="accordion">
 <h3 class="ui-accordion-header"><strong>Can I add one pixel in the Facebook sales channel Shopify app, and add my other pixels in this app (FBTrack)?</strong></h3>
  <div class="panel">
    <p>Also NO, You need to put ALL your pixels into FBTrack and use ONLY Fbtrack to manage all your pixels. 
    Otherwise you will have duplicates and inaccurate reporting</p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>Can I use this app in addition to the Shopify native Facebook pixel integration (in prefernces section)?</strong></h3>
  <div class="panel">
    <p>Also NO, You need to put ALL your pixels into FBTrack and use ONLY Fbtrack to manage all your pixels. 
    Otherwise you will have duplicates and inaccurate reporting</p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>Do I need to do something before using this app?</strong></h3>
  <div class="panel">
   <p>Yes, please remove your Facebook Pixel ID from the Facebook sales channel Shopify app, or the Preferences Page on your Shopify Store 
   if you previously added it in there, and remove it from any other pixel tracking app you might have previously used. 
   You will need to use only FBTrack to manage your Facebook pixels. If you use other tools at the same time, you will have inaccurate reporting</p>
   </div>		

   
  <h3 class="ui-accordion-header"><strong>Do I need to add any code to my theme?</strong></h3>
  <div class="panel">
    <p>
   No, you don't need to add any code to your theme.
    </p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>How many Facebook Pixels can I add using this app?</strong></h3>
  <div class="panel">
    <p>
  We have limited the number of main/backup Pixels that can be added to 10, and the number of collection pixels to 25. 
  This is in order to preserve performance, and is largely sufficient for 99%+ of cases. 
  Apps that allow you to add unlimited pixels will make your website slower, 
  and result in inaccurate reporting if you add too many pixels 
    </p>
  </div>
  
  
  <h3 class="ui-accordion-header"><strong>What does the collection column mean?</strong></h3>
  <div class="panel">
    <p>
   The collection column allows you to choose if you want your pixel to fire for all your store, or fire only for products in a certain collection. 
	If you choose "All - Main / Backup Pixel" for your pixel, then it will fire for all your store.
	Otherwise if you choose a specific collection, your pixel will fire only for products in that collection,
	and this will allow to segment your data by niche, and optimize your campaigns more efficiently
    </p>
  </div>
  
   <h3 class="ui-accordion-header"><strong>Is the shipping cost included when reporting the purchase value?</strong></h3>
  <div class="panel">
    <p>
   Yes Shipping cost is included in the purchase value in order to allow your Facebook Ads manager to determine the real ROI of your campaigns, and adsets
    </p>
  </div>
  
    <h3 class="ui-accordion-header"><strong>How do I check that the app is working properly on my store?</strong></h3>
  <div class="panel">
    <p>
   Yes If you would like to check (and we recommed that you do), please use the <a href="https://chrome.google.com/webstore/detail/facebook-pixel-helper/fdgfkebogiimcoedlicjlajpkdmockpc?hl=en" title="Pixel helper" style="color:blue;">
       Facebook pixel helper Chrome browser extension</a> to check that events are firing correctly on your website
    </p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>My pixel is not firing in the checkout pages, is this normal?</strong></h3>
  <div class="panel">
      <p>
          Yes, this is absolutly normal. Shopify apps can't make changes to the checkout pages. This will not affect your pixels' reporting and optimization
      </p>
  </div>
  
  
  <h3 class="ui-accordion-header"><strong>Where can I check the events, and values that my Facebook Pixel is reporting?</strong></h3>
  <div class="panel">
      <p>
         All events, and values that your pixels send to Facebook will appear in the events manager section of your Facebook business manager. 
         If the events are associated to specific campaigns, 
         they will also appear in your ads manager attributed to their respective campaigns
      </p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>What about Facebook product feed generation?</strong></h3>
  <div class="panel">
    <p>You can use any Facebook product feed generation app that is compatible with Shopify's default Facebook pixel integration. 
The product feed generated should send the shopify's product id as ITEM GROUP ID to Facebook, 
NOT send the variant's id. You should have a unique entry in the feed for each product, not an entry for each variant of a product &gt;&gt; 
<a href="https://prnt.sc/nzv0qs" title="Check Screenshot">Check Screenshot</a>
      </p>
  </div>
  
  <h3 class="ui-accordion-header"><strong>I am a beginner in Facebook advertising. Where can I find my Facebook Pixels ids?</strong></h3>
  <div class="panel">
    <p>You can get new pixels in your Facebook business manager (you need to create a Facebook business manager if not already created).
    You can check this link here for guidance &gt;&gt; 
    <a href="https://www.facebook.com/business/help/314143995668266" title="Guide Pixels" style="color:blue;">https://www.facebook.com/business/help/314143995668266
    </a> 
    </p>
    </div>


 <h3 class="ui-accordion-header"><strong>I want to cancel my subscription, what do I do?</strong></h3>
  <div class="panel">
    <p>We are sorry to see you go, but if you wish to cancel your subscription, please just remove the app from your store, and it will be automatically cancelled. 
You won't be charged anything after that moment. The billing is handled by Shopify, and this is the way it works
    </p>
    </div>
    
    <h3 class="ui-accordion-header"><strong>Do I need to do anything after removing this app?</strong></h3>
  <div class="panel">
    <p>No, you don't need to do anything after removing the app. After being removed, everything will be as if you have never installed the app
    </p>
    </div>
  
</div>
    
    
    <!-- end faq content -->


@section('scripts')
    @parent
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
var acc = document.getElementsByClassName("ui-accordion-header");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("ui-accordion-header-active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>


 
@endsection
