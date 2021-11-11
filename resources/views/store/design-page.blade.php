<p>You are in design domain: {{ $shopDomain ?? Auth::user()->name }}</p>
	tefdfdf
  <form action="" method="POST" enctype="multipart/form-data">
                     <div class="Polaris-Layout">
							<div class="Polaris-Layout__AnnotatedSection">
								<div class="Polaris-Layout__AnnotationWrapper">
									<div class="Polaris-Layout__Annotation">
										<h2 class="Polaris-Heading">Imagery</h2>
									
									</div>
									<div class="Polaris-Layout__AnnotationContent">
								        <div class="Polaris-Card">
											<div class="Polaris-Card__Section">
												<div class="Polaris-FormLayout">
													<div class="Polaris-FormLayout__Item">
														<label>Product image</label>
														<input type='file' id="readUrl" name="product_image">
                                                        <img id="uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
														<div class="Polaris-Labelled__HelpText" >This will be displayed in the checkout and email notifications.</div>
													</div>
													<div class="Polaris-FormLayout__Item">
														<label>Header image</label>
														<input type='file' id="readUrl" name="design_header_uploadedImage">
                                                        <img id="design_header_uploadedImage" name="design_header_uploadedImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
														<div class="Polaris-Labelled__HelpText" >This will be the header image on the bundle page.</div>
													</div>
													<div class="Polaris-FormLayout__Item">
														<label>Header image width</label>
														<select id="design_header_img_width" name="design_header_img_width" class="Polaris-Select__Input" aria-invalid="false">
															<option value="default">Default</option>
															<option value="full-width">Full-width</option>
															<option value="match-page-content">Match page content</option>
														</select>
														
													</div>
											    </div>
										    </div>
									   </div>
									</div>
								</div>

                                <div class="Polaris-Layout__AnnotationWrapper">
									<div class="Polaris-Layout__Annotation">
										<h2 class="Polaris-Heading">Additional fields</h2>
									
									</div>
									<div class="Polaris-Layout__AnnotationContent">
								        <div class="Polaris-Card">
											<div class="Polaris-Card__Section">
												<div class="Polaris-FormLayout">
													<div class="Polaris-FormLayout__Item">
														<div class="form-group">
															<input type="checkbox" id="html0">
															<label for="html0">Add a note field</label>
														  </div>
														<div class="Polaris-Labelled__HelpText" >Add a text field to the bundle summary so your customers can add a note.</div>
													</div>
												    <div class="Polaris-FormLayout__Item">
														<label>Note field label</label>
														<textarea  name="notes" rows="4" cols="50"></textarea>
													</div>
													<button class="save-form" type="submit" name="submit">Save</button>
											    </div>
										    </div>
									   </div>
									</div>
								</div>  
							</div>
				    </div>
	   </form>