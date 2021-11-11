<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bundle;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class Usercontroller extends Controller
{
    /*
    * call the  index file
    *
    */
    
    public function index(Request $request) {
        
        return view('setup-page');    
    }
    
    /*
    * call the products file
    *
    */
    
    public function products(Request $request) {
        
        return view('products-page');    
    }

    
    /*
    * call the  design file
    *
    */
    
    public function design(Request $request) {
        
	    return view('design-page');  
    
    }
    
    
     /*
    * call the  Bundle details
    *
    */
    
    public function bundle_details(Request $request) {
        
         $bundle_details = DB::table('bundles')->get();
	   return view('bundle-details',['get_bundle'=>$bundle_details]);  
    
    }
    
    /*
    * call the  Edit file
    *
    */
    
    public function edit_bundle($id) {
        
        $edit_bundle = Bundle::select("*")
                        ->where('id',$id)
                        ->first();
                        
        return view('edit-bundle',['edit_bundle'=>$edit_bundle]);    
    }
    
    
    /*
    * call the edit images to upload
    *
    */
    
    public function check_image(Request $request) {
        
        if(isset($_FILES['file']['name'])){
        
            /* Getting file name */
            $filename = $_FILES['file']['name'];
            
            /* Location */
            $location = "public/images/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");
            
            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                
             $currentURL =$request->getSchemeAndHttpHost().'/';
                
             $response =  $currentURL.$location;
            }
            }
            
            echo $response;
            exit;
            }
        
        echo 0;  
    }
    
    
    
    
     /*
    * call the  design file
    *
    */
    
    public function post_setup(Request $request) {

        $validatedData = $request->validate([
            'bundle_name' => 'required',
            'product_name' => 'required'
        ]);
            
          $bundle_name =  $request->input('bundle_name');
          $product_name=  $request->input('product_name');
        
        $setup_data = array(
            'bundle_name' =>$bundle_name,
            'product_name' =>$product_name
            );
            
        $request->session()->put('setup_data',$setup_data);
        
        return redirect()->route('products');
    
    }
    
     /*
    * call the  design file
    *
    */
    
    public function post_products(Request $request) {
    
            $product_id =  implode(",",$request->input('product_id'));
            $product_img =  implode(",",$request->input('product_img'));
            $product_title =  implode(",",$request->input('product_title'));
                
            $product_data = array(
            'product_id' =>$product_id,
            'product_img' =>$product_img,
            'product_title' =>$product_title
            );
            
            $request->session()->put('product_data',$product_data);
            
             return redirect()->route('design');
     
    }
    
      /*
    * call  the post request to design
    *
    */
    
    public function post_design(Request $request) {
        
        /** token created  **/  
        $unique_token_created =  Str::random(45);
        
        /** token created  **/  

        $setup_data = $request->session()->get('setup_data');
        /** setup session data **/  
        $bundle_name= $setup_data['bundle_name'];
        $bundle_product_name = $setup_data['product_name'];
        /** End setup session data **/
        
        
        /** product selected  session data **/  
        $product_data = $request->session()->get('product_data');
        
        $product_id = $product_data['product_id'];
        $product_img = $product_data['product_img'];
        $product_title = $product_data['product_title'];
        
       /**********************************************/
       
        $file = $request->file('product_image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename =time().'.'.$extension;
        $file->move('public/images/', $filename);
        
        /*********************************************/
        $design_header_uploadedImage = $request->file('design_header_uploadedImage');
        $extension_header_img = $design_header_uploadedImage->getClientOriginalExtension(); // getting image extension
        $filename_header_img =time().'.'.$extension_header_img;
        $design_header_uploadedImage->move('public/images/', $filename_header_img);
            
        
        $design_header_img_width = $request->input('design_header_img_width');
        
        $shop = auth()->user();
        $get_store_name = $shop->name;
        
        /********************************************/
       
       /**********************************************/
       

        /**-------------------------------------------- **/  
        
        $bundle_details = new bundle;
        $bundle_details->bundle_name = $bundle_name;
        $bundle_details->bundle_product_name = $bundle_product_name;
        $bundle_details->bundle_product_id = $product_id;
        $bundle_details->bundle_product_img = $product_img;
        $bundle_details->bundle_product_title = $product_title;
        
        $bundle_details->design_product_image = $filename;
        $bundle_details->design_header_product_img = $filename_header_img;
        $bundle_details->design_header_product_img_width = $design_header_img_width;
        $bundle_details->notes = $request->input('notes');
        
        
         $bundle_details->bundle_token = $unique_token_created;
          $bundle_details->store_name = $get_store_name;
         
         
      
                
        //$bundle_details->design_bundle_data = $notes;
        
       $test =  $bundle_details->save();
       if($test=true) {
           $request->session()->flash('flash_message', 'Bundle is Added!');
          return redirect()->route('home');
       } else {
            echo "not available";
       }
     
    }
    
     /*
    * call the  deletet function to delete the bundle in db
    *
    */
    
    public function delete_bundle(Request $request,$id) {
        
        $user = Bundle::where('id', $id)->firstorfail()->delete();
        $request->session()->flash('flash_message_delete', 'Bundle is Deleted!');
        return redirect()->route('bundle-details');
    
    }
    
    /*
	* call the autocomplete function to search product
	*
	*/
	  public function autocompleteSearch(Request $request)
    {


    	$query = $_POST["keyword"];

    	if(!empty($query)) {

			
		$html='';
		//$query = $request->get('query');

	
		$url = "https://84981951fd1b93864003d8dcf84538bd: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@kioui-apps-dev.myshopify.com/admin/api/2021-07/products.json";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);

		$products = json_decode($resp, JSON_PRETTY_PRINT);
			
		foreach ($products as $product) {
			foreach ($product as $key => $value) {
				if( stripos( $value['title'], $query ) !== false ) {
                    $html .='<li>';
                    $html .='<div class="form-group">';
                    $html .='<input type="hidden" name="product_id"  id ="'.$value['id'].'" value="'.$value['id'].'">';
                    $html .='<input  data-id="'.$value["images"][0
                    ]["src"].'" type="checkbox" id="'.$value['id'].'" name ="get_product[]" value="'.$value['title'].'">';
                    $html .= '<label for="'.$value['id'].'"></label>';
                    
                    
                    $html .='<div class="list-content">';
                    $html .='<div class="list-img">';
                    $html .='<img src="'.$value["images"][0
                    ]["src"].'">';
                    $html .='</div>';
                    $html .= '<h4>' . $value['title'] . '</h4>';
                    $html .='</div>';
                    $html .='</div>';
                    $html .='</li>';
				}
			}
		}
		
		return response()->json($html);


	 } else {

	 	$html='';
		//$query = $request->get('query');

	
		$url = "https://84981951fd1b93864003d8dcf84538bd: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@kioui-apps-dev.myshopify.com/admin/api/2021-07/products.json";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);

		$products = json_decode($resp, JSON_PRETTY_PRINT);
			
		foreach ($products as $product) {
			foreach ($product as $key => $value) {
			    $html .='<li>';
                $html .='<div class="form-group">';
                $html .='<input type="hidden" name="product_id"  id ="'.$value['id'].'" value="'.$value['id'].'">';
                $html .='<input  data-id="'.$value["images"][0
                ]["src"].'" type="checkbox" id="'.$value['id'].'" name ="get_product[]" value="'.$value['title'].'">';
                $html .= '<label for="'.$value['id'].'"></label>';
                
                
                $html .='<div class="list-content">';
                $html .='<div class="list-img">';
                $html .='<img src="'.$value["images"][0
                ]["src"].'">';
                $html .='</div>';
                $html .= '<h4>' . $value['title'] . '</h4>';
                $html .='</div>';
                $html .='</div>';
                $html .='</li>';
				
			}
		}
		
		return response()->json($html);


	 }
		
		//$count_data = count($get_product);

		// $query = $request->get('query');
		//  $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
		// return response()->json($filterResult);
    } 
    
    
    /*
    * call the  Post Edit file
    *
    */
    
    public function post_edit(Request $request) {
        
          
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            
              $file = $request->file('edit_product_image');
              if(!empty($file)) {
                
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $file->move('public/images/', $filename); 
                  
              } else {
                            
                    $filename =  $request->input('hidden_update_file'); 
                  
              }
             
        
              $edit_update_id =  $request->input('update_id');
              
              $edit_bundle_name =  $request->input('edit_bundle_name');
              $edit_bundle_product_name =  $request->input('edit_bundle_product_name');
                
                         
                         
              $edit_product_id =  implode(",",$request->input('edit_product_id'));
              $edit_product_img =  implode(",",$request->input('edit_product_img'));
              $edit_product_title = implode(",",$request->input('edit_product_title'));
              
              $notes =  $request->input('notes');
              
              
              $update_data  =  DB::table('bundles')
              ->where('id', $edit_update_id)
              ->update(['bundle_name' => $edit_bundle_name,'bundle_product_name'=>$edit_bundle_product_name,'bundle_product_id'=>$edit_product_id,'bundle_product_img'=>$edit_product_img,'bundle_product_title'=>$edit_product_title,'design_product_image'=>$filename,'notes'=>$notes]);
           
                if($update_data=true) {
                    
                    $request->session()->flash('flash_message_update_data', 'Bundle is updated!');
                    return redirect()->route('home');
                } else {
                    $request->session()->flash('flash_message_update_error', 'something wrong!');
                    return redirect()->route('home');
                }
              /*
              * update values in database
              *
              */
        }
        
    /*
    *  created snippet code here
    *
    */
    
    public function snippet(Request $request) {
        
          
         
        /*************************************
            * create  product post request
            *
         */
          
        $product_variant = array('product' =>

        array(
                'title'=>'dev testing',
                'body_html'=>'<b>This is a dummy product and must not be deleted or altered</b>.<br><b>Dummy products are essential for the Bundle Builder app to function.</b><br>Learn more here: https://support.weareeight.com/hc/en-us/articles/360020184698-Dummy-Products',
             
                 'images' => array(
                                array(
                                'src' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkA7ofXvHllbfFuXnVZXLPScpomeaqJyXuJg&usqp=CAU',
                            )
                        )
                    )
        );
    //echo json_encode($product_variant);

//$url = curl_init("https://da3c3db55b59cad570511f7cd80b44cd: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@auspicious-app-store.myshopify.com/admin/api/2021-07/products/6949888163992/variants.json");
$url = "https://f89b2f17caf9c47ce755bf3e0948b6e9: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@bundle-builder-apps.myshopify.com/admin/api/2021-10/products.json";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_VERBOSE, 0);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($product_variant));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec ($curl);
curl_close ($curl);

$obj = json_decode($response);
print_r($obj);

 /*****************************************************
    *  End request
    *
  */
 
        
         $shop = auth()->user();
         
         $themes =  $shop->api()->rest('GET','/admin/api/2021-10/themes.json')['body']['themes'];
         
         foreach($themes as $theme):
                if($theme->role=='main'):
                    $active_theme = $theme;
                endif;
          endforeach;
        
        
        
        $data_to_put = [
            "asset" => [
                "key"  => "templates/product.bundle-counter.liquid",
                "value" =>"<script>test</script>"
            ]    
            
        ];
                
         $snippet =  $shop->api()->rest('PUT','/admin/api/2021-10/themes/'.$active_theme->id.'/assets.json',$data_to_put);
        //$this->include_snippet($active_theme->id,$shop);
         dd(1);
    
    }
    
    public function test() {
            
            echo "tesT";
        //   $shop = auth()->user();
        //         $get_store_name = $shop->name;

        //     $bundle_details_data = DB::table('bundles')->where('store_name',$get_store_name)->get();    
         
        //     $data = array();
        //   for($i=0;$i<count($bundle_details_data);$i++) {
               
        //             $data['bundle_name'][$i] = $bundle_details_data[$i]->bundle_name;
                    
        //             $data['design_header_product_img'][$i] = $bundle_details_data[$i]->design_header_product_img;
        //     }
                
           
        //   echo"<pre>";
        //   print_r($data);
        //   die;
    }
      
    
    
}
