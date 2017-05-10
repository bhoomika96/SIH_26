<?php if(!isset($base_url) || empty($base_url)) $base_url = $this->config->item("base_url"); ?>
		<tr>
			<td>	
				<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="e4e8eb" class="container600">
				
					<tr><td height="30"></td></tr>
					
					<tr>
				        <td align="center">
				        	<img editable="true" src="<?php echo $base_url;?>email/top-rounded-bg.png" style="display: block;" width="580" height="6" border="0" class="rounded-edg-bg" />
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
																
																	Your account <?php echo $time_left;?>
																
															</td>
														</tr>			
														<tr><td height="20"></td></tr>
														<tr>
															<td align="center" mc:edit="subtitle1" style="color: #9ba4b0; font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																
																	Your account is overdue payment and has automatically been downgraded to a free account.<br /><br />
																	If you wish to renew your account, you can do so with the link below.
																
															</td>
														</tr>
														<tr><td height="30"></td></tr>
														<tr>
															<td align="center" style="font-size: 30px;">
                                                                <a href="<?php echo $base_url;?>renew/<?php echo $unique;?>">Renew account</a>
															</td>
														</tr>
														<tr><td height="40"></td></tr>
													</table>
												</td>
											</tr><!----------- end main section ----------->
											

						        			<tr mc:repeatable><td height="40"></td></tr>
						        			
										</table>										
									</td>
								</tr>
							</table>			
						</td>
					</tr>
					
					<tr>
				        <td align="center">
				        	<img editable="true" src="<?php echo $base_url;?>email/bottom-rounded-bg.png" style="display: block;" width="580" height="6" border="0" class="rounded-edg-bg" />
				        </td>
			        </tr>
			        <!------- end main section ------->
