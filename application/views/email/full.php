<?php if(!isset($base_url) || empty($base_url)) $base_url = $this->config->item("base_url"); ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <title>Letter - Responsive Email Template</title>

    <style type="text/css">
    
    	
	    body{
            width: 100%; 
            background-color: #485361; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
        }
        
        p,h1,h2,h3,h4{
	        margin-top:0;
			margin-bottom:0;
			padding-top:0;
			padding-bottom:0;
        }
        
        span.preheader{display: none; font-size: 1px;}
        
        html{
            width: 100%; 
        }
        
        table{
            font-size: 14px;
            border: 0;
        }
        
        @media only screen and (max-width: 640px){
			
            .header-bg{width: 440px !important; height: auto !important;}
            .rounded-edg-bg{width: 420px !important; height: 5px !important;}
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            
            .logo{width: 400px !important;}
			
			.main-image{width: 400px !important; height: auto !important;}
			.main-text-container{width: 340px !important; height: auto !important;}
			
						
			.container600{width: 440px !important;}
			.container580{width: 420px !important;}
			.container560{width: 400px !important;}
			.container540{width: 380px !important;}
			.main-content{width: 418px !important;}
           
			
			
			
			.section-item{width: 380px !important;}
            .section-img{width: 380px !important; height: auto !important;}
			
			
		}
		
		@media only screen and (max-width: 479px){
			
			
			
            .header-bg{width: 280px !important; height: auto !important;}
            .rounded-edg-bg{width: 260px !important; height: 5px !important;}
            .main-header{font-size: 24px !important; line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            
            .logo{width: 240px !important;}
			
			.main-image{width: 240px !important; height: auto !important;}
			.main-text-container{width: 180px !important;}
			
					
			.container600{width: 280px !important;}
			.container580{width: 260px !important;}
			.container560{width: 240px !important;}
			.container540{width: 220px !important;}
			.main-content{width: 258px !important;}
           
			
			.section-item{width: 220px !important;}
            .section-img{width: 220px !important; height: auto !important;}
            .section-title{line-height: 28px !important; font-size: 16px !important;}
            
            
            .footer{width: 280px !important;}
		}
		
	</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

	
	<span class="preheader">Letter Responsive Email Template</span>
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="485361">
	
		<tr><td height="20"></td></tr>
		
		<!-------------- header ------------->
		<tr>
			<td align="center">
				<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="container600">
					<tr>
						<td>
							<img src="<?php echo $base_url;?>layout/email/top-bg.png" width="600" height="4" style="display: block;" alt="" class="header-bg" />
						</td>	
					</tr>
					<tr><td height="18"></td></tr>
					<tr>
						<td align="center">
							<table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container560">
								<tr>
									<td>
										<table border="0" align="left" cellpadding="0" cellspacing="0" >
				                			<tr>
				                				<td align="center">
				                					<a href="" style="display: block; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="logo" width="82" height="17" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/logo.png" alt="logo" /></a>
				                				</td>
				                			</tr>
				                		</table>
				                		
				                		<table border="0" align="left" cellpadding="0" cellspacing="0">
				                			<tr>
				                				<td height="20" width="20"></td>
				                			</tr>
				                		</table>
				                		
				                		<table border="0" align="right" cellpadding="0" cellspacing="0">
				                			<tr><td height="5"></td></tr>
				                			<tr>
				                				<td align="center" mc:edit="navigation" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">
				                					
				                						<a href="" style="color: #a9b3c2; text-decoration: none;">web version</a>	
				                					
				                				</td>
				                			</tr>
				                		</table>	
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr><td height="1" bgcolor="cdd0d3"></td></tr>
				</table>	
			</td>
		</tr><!-------------- end header ------------->
		
		
		<!-------------- main content ------------->
		<tr>
			<td>	
				<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="e4e8eb" class="container600">
				
					<tr><td height="30"></td></tr>
					
					<tr>
				        <td align="center">
				        	<img editable="true" src="<?php echo $base_url;?>layout/email/top-rounded-bg.png" style="display: block;" width="580" height="6" border="0" class="rounded-edg-bg" />
				        </td>
			        </tr>
					
					<tr>
						<td>
							<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" bgcolor="cdd0d3" class="container580">
								
								<tr>
									<td>
										<table border="0" align="center" width="578" cellpadding="0" cellspacing="0" bgcolor="f6f8fa" class="main-content">
											
											<!----------- main section ----------->
											<tr mc:repeatable>
												<td>
													<table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560">
														<tr><td height="40"></td></tr>
														<tr>
															<td align="center" mc:edit="title1" style="color: #5d6775; font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																
																	Don’t Miss This Opportunity
																
															</td>
														</tr>			
														<tr><td height="20"></td></tr>
														<tr>
															<td align="center" mc:edit="subtitle1" style="color: #9ba4b0; font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																
																	Vivamus facilisis odio vitae tincidunt.
																
															</td>
														</tr>
														<tr><td height="30"></td></tr>
														<tr>
															<td align="center">
																<a href="" style="display: block; width: 122px; height: 40px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="122" height="40" border="0" style="display: block; width: 122px; height: 40px;" src="<?php echo $base_url;?>layout/email/download-btn.png" alt="download" /></a>
															</td>
														</tr>
														<tr><td height="40"></td></tr>
														<tr>
													        <td align="center">
													        	<img editable="true" mc:edit="main-image" src="<?php echo $base_url;?>layout/email/main-img.png" style="display: block;" width="560" height="304" border="0" alt="main image" class="main-image" />
													        </td>
												        </tr>
													</table>
												</td>
											</tr><!----------- end main section ----------->
											
											<tr mc:repeatable><td height="40"></td></tr>
											
											<!----------- main text ----------->
											<tr mc:repeatable>
												<td>
													<table border="0" align="center" width="540" cellpadding="0" cellspacing="0" class="container540">
														<tr>
															<td align="center">
																<table border="0" align="left" width="30" cellpadding="0" cellspacing="0">
																	<tr>
																		<td align="center" width="30" valign="top">
																        	<img editable="true" mc:edit="icon" src="<?php echo $base_url;?>layout/email/icon.png" style="display: block;" width="20" height="20" border="0" alt="icon" />
																		</td>
																	</tr>
																</table>	
																<table border="0" align="left" width="10" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="10" height="20"></td>
																	</tr>	
																</table>
																<table border="0" align="left" width="500" cellpadding="0" cellspacing="0" class="main-text-container">
																	<tr>
																		<td mc:edit="title2" style="color: #58656e; font-weight: bold; font-size: 16px; font-family: Helvetica, Arial, sans-serif;">
																			
																				Responsive Design
																			
																		</td>
																	</tr>
																	
																	<tr><td height="10"></td></tr>
																	
																	<tr>
																		<td mc:edit="subtitle2" style="color: #9ba4b0; font-size: 13px; font-family: Helvetica, Arial, sans-serif; line-height: 22px;">
																			
																				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum, orci sit amet imperdiet ultrices, odio eros congue enim, et porta nibh mauris in nulla.
																			
																		</td>
																	</tr>
																</table>		
															</td>
														</tr>
														
															
													</table>
												</td>
											</tr>
											<!----------- end main text ----------->
											
											<tr mc:repeatable><td height="50"></td></tr>
											
											<!----------- divider ----------->
											<tr mc:repeatable>
									        	<td>
									        		<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
									        			<tr>
									        				<td align="center">
										        				<img src="<?php echo $base_url;?>layout/email/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider" />
									        				</td>
									        			</tr>
									        		</table>
									        	</td>
									        </tr><!----------- end divider ----------->
											
											<tr mc:repeatable><td height="40"></td></tr>
											
											<!----------- section 1 ----------->
											<tr mc:repeatable>
						        				<td align="center">
						        					<table border="0" width="540" align="center" cellpadding="0" cellspacing="0" class="container540">
						        						<tr>
						        							<td>
						        								
						        								<table border="0" width="200" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr>
						        										<td>
						        											<a href="" style=" border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="image1" src="<?php echo $base_url;?>layout/email/image1.png" style="display: block;" width="200" height="200" border="0" alt="section image" class="section-img"/></a>
						        										</td>
						        									</tr>
						        								</table>
						        								
						        								<table border="0" width="20" align="left" cellpadding="0" cellspacing="0">
						        									<tr><td width="20" height="40"></td></tr>
						        								</table>
						        								
						        								<table border="0" width="320" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr><td height="10"></td></tr>
						        									
						        									<tr>
									        							<td mc:edit="title3" style="color: #58656e; font-size: 17px; font-weight: bold; font-family: Helvetica, Arial, sans-serif;" class="section-title">
												        					
												        						Be The Best Of Whatever You Do
												        					
												        				</td>	
									        						</tr>
									        						
									        						<tr><td height="15"></td></tr>
									        						
									        						<tr>
									        							<td mc:edit="subtitle3" style="color: #9ba4b0; font-size: 13px; font-family: Helvetica, Arial, sans-serif; line-height: 24px;">
									        								
									        									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum, orci sit amet imperdiet ultrices, odio eros congue enim, et porta nibh mauris in nulla.
									        								
									        							</td>
									        						</tr>
																	
																	<tr><td height="20"></td></tr>
																	
																	<tr>
																		<td>
																			<a href="" style="display: block; width: 90px; height: 30px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="90" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/readmore-btn.png" alt="read more" /></a>
																		</td>
																	</tr>
						        								</table>
						        							</td>
						        						</tr>
						        					</table>
						        				</td>
						        			</tr><!------- end section1 ------->
											
											<tr mc:repeatable><td height="30"></td></tr>
											
											<!----------- divider ----------->
											<tr mc:repeatable>
									        	<td>
									        		<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
									        			<tr>
									        				<td align="center">
										        				<img src="<?php echo $base_url;?>layout/email/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider" />
									        				</td>
									        			</tr>
									        		</table>
									        	</td>
									        </tr><!----------- end divider ----------->
											
											<tr mc:repeatable><td height="30"></td></tr>
											
											<!----------- section 2 ----------->
											<tr mc:repeatable>
						        				<td align="center">
						        					<table border="0" width="540" align="center" cellpadding="0" cellspacing="0" class="container540">
						        						<tr>
						        							<td>
						        								<table border="0" width="320" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr><td height="10"></td></tr>
						        									
						        									<tr>
									        							<td mc:edit="title4" style="color: #58656e; font-size: 17px; font-weight: bold; font-family: Helvetica, Arial, sans-serif;" class="section-title">
												        					
												        						Be The Best Of Whatever You Do
												        					
												        				</td>	
									        						</tr>
									        						
									        						<tr><td height="15"></td></tr>
									        						
									        						<tr>
									        							<td mc:edit="subtitle4" style="color: #9ba4b0; font-size: 13px; font-family: Helvetica, Arial, sans-serif; line-height: 24px;">
									        								
									        									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum, orci sit amet imperdiet ultrices, odio eros congue enim, et porta nibh mauris in nulla.
									        								
									        							</td>
									        						</tr>
																	
																	<tr><td height="20"></td></tr>
																	
																	<tr>
																		<td>
																			<a href="" style="display: block; width: 90px; height: 30px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="90" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/readmore-btn.png" alt="read more" /></a>
																		</td>
																	</tr>
						        								</table>
						        								
						        								<table border="0" width="20" align="left" cellpadding="0" cellspacing="0">
						        									<tr><td width="20" height="40"></td></tr>
						        								</table>
						        								
						        								<table border="0" width="200" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr>
						        										<td>
						        											<a href="" style=" border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="image2" src="<?php echo $base_url;?>layout/email/image2.png" style="display: block;" width="200" height="200" border="0" alt="section image" class="section-img"/></a>
						        										</td>
						        									</tr>
						        								</table>
						        								
						        							</td>
						        						</tr>
						        					</table>
						        				</td>
						        			</tr><!------- end section2 ------->
						        			
						        			<tr mc:repeatable><td height="30"></td></tr>
						        			
						        			<!----------- divider ----------->
											<tr mc:repeatable>
									        	<td>
									        		<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
									        			<tr>
									        				<td align="center">
										        				<img src="<?php echo $base_url;?>layout/email/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider" />
									        				</td>
									        			</tr>
									        		</table>
									        	</td>
									        </tr><!----------- end divider ----------->
											
											<tr mc:repeatable><td height="30"></td></tr>
											
											<!----------- section 3 ----------->
											<tr mc:repeatable>
						        				<td align="center">
						        					<table border="0" width="540" align="center" cellpadding="0" cellspacing="0" class="container540">
						        						<tr>
						        							<td>
						        								
						        								<table border="0" width="200" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr>
						        										<td>
						        											<a href="" style=" border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="image3" src="<?php echo $base_url;?>layout/email/image3.png" style="display: block;" width="200" height="200" border="0" alt="section image" class="section-img"/></a>
						        										</td>
						        									</tr>
						        								</table>
						        								
						        								<table border="0" width="20" align="left" cellpadding="0" cellspacing="0">
						        									<tr><td width="20" height="40"></td></tr>
						        								</table>
						        								
						        								<table border="0" width="320" align="left" cellpadding="0" cellspacing="0" class="section-item">
						        									<tr><td height="10"></td></tr>
						        									
						        									<tr>
									        							<td mc:edit="title5" style="color: #58656e; font-size: 17px; font-weight: bold; font-family: Helvetica, Arial, sans-serif;" class="section-title">
												        					
												        						Be The Best Of Whatever You Do
												        					
												        				</td>	
									        						</tr>
									        						
									        						<tr><td height="15"></td></tr>
									        						
									        						<tr>
									        							<td mc:edit="subtitle5" style="color: #9ba4b0; font-size: 13px; font-family: Helvetica, Arial, sans-serif; line-height: 24px;">
									        								
									        									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum, orci sit amet imperdiet ultrices, odio eros congue enim, et porta nibh mauris in nulla.
									        								
									        							</td>
									        						</tr>
																	
																	<tr><td height="20"></td></tr>
																	
																	<tr>
																		<td>
																			<a href="" style="display: block; width: 90px; height: 30px; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="readMoreBtn" width="90" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/readmore-btn.png" alt="read more" /></a>
																		</td>
																	</tr>
						        								</table>
						        							</td>
						        						</tr>
						        					</table>
						        				</td>
						        			</tr><!------- end section3 ------->
						        			
						        			<tr mc:repeatable><td height="40"></td></tr>
						        			
										</table>										
									</td>
								</tr>
							</table>			
						</td>
					</tr>
					
					<tr>
				        <td align="center">
				        	<img editable="true" src="<?php echo $base_url;?>layout/email/bottom-rounded-bg.png" style="display: block;" width="580" height="6" border="0" class="rounded-edg-bg" />
				        </td>
			        </tr>
			        <!------- end main section ------->
			        
			        
			        <tr>
						<td align="center">
							<table border="0" align="center" cellpadding="0" cellspacing="0">
							
								<tr><td height="30"></td></tr>
								<tr>
									<td>
										<table border="0" width="110" align="center" cellpadding="0" cellspacing="0">
											<tr>
												<td>
			        								<a style="display: block; width: 30px; border-style: none !important; border: 0 !important;" href="#"><img editable="true" mc:edit="twitter" width="30" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/twitter.png" alt="twitter" /></a>		
			        							</td>
			        							<td>&nbsp;&nbsp;&nbsp;</td>
			        							<td>
			        								<a style="display: block; width: 30px; border-style: none !important; border: 0 !important;" href="#"><img editable="true" mc:edit="facebook" width="30" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/facebook.png" alt="facebook" /></a>
			        							</td>
			        							<td>&nbsp;&nbsp;&nbsp;</td>
			        							<td>
			        								<a style="display: block; width: 30px; border-style: none !important; border: 0 !important;" href="#"><img editable="true" mc:edit="google" width="30" height="30" border="0" style="display: block;" src="<?php echo $base_url;?>layout/email/google.png" alt="google" /></a>
			        							</td>			
											</tr>
										</table>
									</td>
        							
        						</tr>
        						<tr><td height="30"></td></tr>
        						<tr>
        							<td align="center">
        								<table border="0" width="300" align="center" cellpadding="0" cellspacing="0" class="footer">
        									<tr>
        										<td align="center" mc:edit="copy" style="color: #a5b0bf; font-size: 12px; font-family: Helvetica, Arial, sans-serif; line-height: 30px;">
			        								
			        									 You are currently signed up to Company’s newsletters as: <span style="color: #576376;">email@email.com</span> to unsubscribe <span style="color: #2680c6">click here</span> 
			        								
			        							</td>		
        									</tr>
        								</table>
        							</td>
        						</tr>
        						<tr><td height="30"></td></tr>
        						
							</table>
						</td>
			        </tr>
        								        
				</table>		
			</td>
		</tr><!-------------- end main content ------------->
		
		<tr><td height="40"></td></tr>
		
	</table>

</body>
</html>