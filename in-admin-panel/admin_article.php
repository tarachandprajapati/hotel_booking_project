<?php 
include 'session_file.php';

function redirect($ras_num) {
echo"<script>window.location.href=\"admin_article.php?update=$ras_num\"</script>";
}
function redirect1($ras_num) {
echo"<script>window.location.href=\"admin_article.php?update=$ras_num&cmd=add\"</script>";
} 

if(isset($_REQUEST['act']))
{
						$act = $_REQUEST['act'];
						
						if($act=="addarticle")
						{
							 							
										include('conn.php'); 
							 			$issue_no=$_REQUEST['issue_no'];
										$article_category=$_REQUEST['article_category'];
										$article_title=$_REQUEST['article_title'];
										$article_by=$_REQUEST['article_by'];
										$article_desc=$_REQUEST['article_desc'];
										$article_page_no=$_REQUEST['article_page_no'];
										$article_image=$_FILES['article_image']['name'];
										
										$flag=1;
										$valid_formats = array("jpg", "png", "gif", "jpeg","JPG", "PNG", "GIF", "JPEG");
										$path = "../article/";
										
										if(strlen($article_image))
										{
											list($txt, $ext) = explode(".", $article_image);
											if(in_array($ext,$valid_formats))
											{
												if($size<(1024*1024))
												{
													
													$actual_image_name_t= $issue_no."_".time().substr(str_replace(" ", "_", $txt), 5)."t.".$ext;
													$actual_image_name_f= $issue_no."_".time().substr(str_replace(" ", "_", $txt), 5)."f.".$ext;
											
													$tmp_t = $_FILES['article_image']['tmp_name'];
											
													/* Conver Image */
											
													$uploadedfile_t = $_FILES['article_image']['tmp_name'];
											
											
													if($ext=="gif")
													{
														$src_t = imagecreatefromgif($uploadedfile_t);
													}
													elseif($ext=="png")
													{
														$src_t = imagecreatefrompng($uploadedfile_t);
													}
													else
													{
														$src_t = imagecreatefromjpeg($uploadedfile_t);
													}
													
									
													list($width_t,$height_t)=getimagesize($uploadedfile_t);
													
													if($width_t>209)
													$newwidth_t=209;
													else
													$newwidth_t=$width_t;
													
													
													if($height_t>260)
													$newheight_t=260;
													else
													$newheight_t=$height_t;
													
													$tmp_t=imagecreatetruecolor($newwidth_t,$newheight_t);
																				
													imagecopyresampled($tmp_t,$src_t,0,0,0,0,$newwidth_t,$newheight_t,$width_t,$height_t);
													
													$filename_t = "../article/".$actual_image_name_t ;
													$tfilename_t = "article/".$actual_image_name_t ;
													
													imagejpeg($tmp_t,$filename_t,100);
													
													imagedestroy($src_t);
													imagedestroy($tmp_t);
													$flag=0;
							
											/* End of Convert Image */
											}
											else
											{
												echo "Image file size max 1 MB";					
												redirect(4);
											}
										}
										else
										{
											echo "Invalid Image file format - Select only JPG, JPEG, GIF or Don't Select Image";	
											redirect(4);
										}
									}
									else
									{
									$flag=0;
									}
										
										
										if($flag==0)
										{
											
										// Insert Data
											$qry = sprintf("insert into article_master (issue_no,article_category,article_title,article_by,article_desc,article_page_no,article_image) values ('%s','%s','%s','%s','%s','%s','%s')",
										mysql_real_escape_string($issue_no),
										mysql_real_escape_string($article_category),
										mysql_real_escape_string($article_title),
										mysql_real_escape_string($article_by),
										mysql_real_escape_string($article_desc),
										mysql_real_escape_string($article_page_no),
										mysql_real_escape_string($tfilename_t));
										if(!mysql_query($qry,$con))
										{
											die("Error " . mysql_error());
										}
										mysql_close($con);
										redirect(1);				  
										}
										
										
										
									
								
								
						}
					if($act=="editarticle")
					{
										include('conn.php'); 
							 			
										$issue_no=$_REQUEST['issue_no'];
										$article_category=$_REQUEST['article_category'];
										$article_title=$_REQUEST['article_title'];
										$article_by=$_REQUEST['article_by'];
										$article_desc=$_REQUEST['article_desc'];
										$article_page_no=$_REQUEST['article_page_no'];
										
										
										// Update Data
										$qry = sprintf("update article_master set issue_no='%s',article_category='%s',article_title='%s', article_by='%s',article_desc='%s', article_page_no='%s' where article_id='". $_REQUEST['article_id'] ."'",
										mysql_real_escape_string($issue_no),
										mysql_real_escape_string($article_category),
										mysql_real_escape_string($article_title),
										mysql_real_escape_string($article_by),
										mysql_real_escape_string($article_desc),
										mysql_real_escape_string($article_page_no));
										if(!mysql_query($qry,$con))
										{
											die("Error " . mysql_error());
										}
										//echo "<font size=2 color=red> New User Add Successully. </font><br>";
										mysql_close($con);
										redirect(3);
										
									
					}
					if($act=="editimage")
					{
						
						include('conn.php'); 
						$sql = "Select * from article_master where article_id='". $_REQUEST['article_id']. "'";
                	        
							$result = mysql_query($sql,$con);
							if($row = mysql_fetch_array($result))
                            {
								$article_image_1=$row['article_image'];
								$issue_no=$row['issue_no'];
							}
							
							$article_image=$_FILES['article_image']['name'];
							
							$flag=1;
										$valid_formats = array("jpg", "png", "gif", "jpeg","JPG", "PNG", "GIF", "JPEG");
										$path = "../article/";
										
										if(strlen($article_image))
										{
											list($txt, $ext) = explode(".", $article_image);
											if(in_array($ext,$valid_formats))
											{
												if($size<(1024*1024))
												{
													
													$actual_image_name_t= $issue_no."_".time().substr(str_replace(" ", "_", $txt), 5)."t.".$ext;
													$actual_image_name_f= $issue_no."_".time().substr(str_replace(" ", "_", $txt), 5)."f.".$ext;
											
													$tmp_t = $_FILES['article_image']['tmp_name'];
											
													/* Conver Image */
											
													$uploadedfile_t = $_FILES['article_image']['tmp_name'];
											
											
													if($ext=="gif")
													{
														$src_t = imagecreatefromgif($uploadedfile_t);
													}
													elseif($ext=="png")
													{
														$src_t = imagecreatefrompng($uploadedfile_t);
													}
													else
													{
														$src_t = imagecreatefromjpeg($uploadedfile_t);
													}
													
									
													list($width_t,$height_t)=getimagesize($uploadedfile_t);
													
													if($width_t>209)
													$newwidth_t=209;
													else
													$newwidth_t=$width_t;
													
													
													if($height_t>260)
													$newheight_t=260;
													else
													$newheight_t=$height_t;
													
													$tmp_t=imagecreatetruecolor($newwidth_t,$newheight_t);
																				
													imagecopyresampled($tmp_t,$src_t,0,0,0,0,$newwidth_t,$newheight_t,$width_t,$height_t);
													
													$filename_t = "../article/".$actual_image_name_t ;
													$tfilename_t = "article/".$actual_image_name_t ;
													
													imagejpeg($tmp_t,$filename_t,100);
													
													imagedestroy($src_t);
													imagedestroy($tmp_t);
													$flag=0;
							
											/* End of Convert Image */
											}
											else
											{
												echo "Image file size max 1 MB";					
												redirect(4);
											}
										}
										else
										{
											echo "Invalid Image file format - Select only JPG, JPEG, GIF or Don't Select Image";	
											redirect(4);
										}
									}
									else
									{
									$flag=0;
									}
								
							
							if($flag==0)
							{
								
								$qry = sprintf("update article_master set article_image='%s' where article_id='". $_REQUEST['article_id'] ."'",
										mysql_real_escape_string($tfilename_t));
										if(!mysql_query($qry,$con))
										{
											die("Error " . mysql_error());
										}
										//echo "<font size=2 color=red> New User Add Successully. </font><br>";
										mysql_close($con);
										
										if($article_image_1!="")
										unlink("../".$article_image_1);
																	
										redirect(3);
							}
										
						
										
						

					}
					
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Aksharparv Admin Panel</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- nice form elements -->
            <link rel="stylesheet" href="lib/uniform/Aristo/uniform.aristo.css" />
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="img/flags/flags.css" />	
		<!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
    
		<!-- 2col multiselect -->
            <link rel="stylesheet" href="lib/multiselect/css/multi-select.css" />
		<!-- enhanced select -->
            <link rel="stylesheet" href="lib/chosen/chosen.css" />
            
            
            
            <!-- datepicker -->
            <link rel="stylesheet" href="lib/datepicker/datepicker.css" />


    
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>
		<?php include 'header.php';?>
                    
                    <!-- Content -->
                    <div class="row-fluid">
						
                        <?php
				  			if ($_REQUEST['update']==1)
				  			echo "<div class='span12'><h3 class='heading'>Article Added Successully. </h3></div>";
				  			elseif ($_REQUEST['update']==3)
				  			echo "<div class='span12'><h3 class='heading'>Article Updated Successully. </h3></div>";
							elseif ($_REQUEST['update']==4)
				  			echo "<div class='span12'><h3 class='heading'>Error in File Uploading. Please Try Again.... </h3></div>";
				
				 		 ?>
                       
							
                            <?php if($_REQUEST['cmd']=="view")
							{
								echo '<div class="span12">';
								echo '<h3 class="heading">Post </h3>';
								include 'conn.php';
								$sql = "SELECT article_master . * , category_master.cat_name as cat_name, author_master.author_name as author_name FROM article_master INNER JOIN category_master ON article_master.article_category = category_master.cat_id Inner join author_master on article_master.article_by=author_master.author_id";
                	            $result = mysql_query($sql,$con);
								?>
							<table class="table table-bordered table-striped table_vam" id="dt_gal">
								<thead>
									<tr>
										<th class="table_checkbox"><input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_gal" /></th>
										<th>Article Image</th>
										<th>Issue No</th>
										<th>Article Category</th>
                                        <th>Article Title</th>
                                        <th>Article By</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									
								<?php
								$i=1;
								while($row = mysql_fetch_array($result))
                            	{
								?>
                                    <tr id='<?php echo $row['article_id'];?>'>
										<td><input type="checkbox" name="row_sel" class="row_sel" /></td>
										
                                        <td style="width:110px">
											<?php if($row['article_image']!="")
											{?>
                                           		<img alt="" src="../<?php echo $row['article_image'];?>" style="height:104px;width:130px">
											
                                            <?php
											}
											else
											{	?>
                                                <img alt="" src="../article/no_image.jpg" style="height:104px;width:130px">
											<?php }?>
										</td>
                                        
                                        
                                        <td>
										<?php echo $row['issue_no'];?>	
										</td>
										<td>
										<?php 
										echo $row['cat_name']."<br>";
										?>
                                        </td>
                                        
                                        <td>
										<?php 
										echo stripslashes($row['article_title'])."<br>";
										?>
                                        </td>
                                        
                                        <td>
										<?php 
										echo stripslashes($row['author_name'])."<br>";
										?>
                                        </td>
										
										<td>
											<a href="admin_article.php?cmd=edit&article_id=<?php echo $row['article_id'];?>" class="sepV_a" title="Edit Article">
                                            <i class="icon-edit"></i></a>
                                            <a href="admin_article.php?cmd=editimage&article_id=<?php echo $row['article_id'];?>" class="sepV_a" title="Edit Article Image">
                                            <i class="icon-picture"></i></a>
                                            
											<a href="#article<?php echo $row['article_id'];?>" data-toggle="modal" data-backdrop="static" class="sepV_a" title="View Article"><i class="icon-eye-open"></i></a>
											<a href="#" class="sepV_a" id='delarticle' title="Delete" ><i class="icon-trash"></i></a> 
										</td>
									</tr>
								<?php 
								$i++;
								} 
								?>	
								</tbody>
							</table>
                            
                            <!-- post Model -->
                            <?php
							$sql = "Select * from article_master";
                	        $result = mysql_query($sql,$con);
							while($row = mysql_fetch_array($result))
                            {
                            ?>
							<div class="modal hide fade" id="article<?php echo $row['article_id'];?>">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">×</button>
									<h3><?php echo "Article Title - ". $row['article_title'];?></h3>
								</div>
								<div class="modal-body">
									<p align="justify"><?php echo $row['article_desc'];?></p>
								</div>
								<div class="modal-footer">
									<a href="#" class="btn" data-dismiss="modal">Close</a>
								</div>
							</div>
                            
                            <?php } ?>
                            <!-- End of post Model -->
                            
							<?php }?>
                            <!-- End View post -->
                            
                            <!-- Add New post -->
                            <?php if($_REQUEST['cmd']=="add")
							{
							 echo '<div class="span12">';
							 echo '<h3 class="heading">Add Article</h3>';
							
							?>
                            <form class="form_validation_ttip" action="admin_article.php" method="post"  enctype="multipart/form-data">
								<div class="formSep">
									<div class="row-fluid">
										<div class="span12">
											<label>Issue No <span class="f_req">*</span></label>
											<select name="issue_no" id="issue_no" data-placeholder="Select Issue No" class="chzn_a">
											<?php
												include 'conn.php';
												$sql = "Select * from issue_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													echo '<option value="'. $row['issue_no'].'">'. $row['issue_no'] .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
											<label>Article Category<span class="f_req">*</span></label>
											<select name="article_category" id="article_category" data-placeholder="Select Article Category" class="chzn_b">
											<?php
												
												$sql = "Select * from category_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													echo '<option value="'. $row['cat_id'].'">'. $row['cat_name'] .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
                                           <label>Article Title <span class="f_req">*</span></label>
											<input type="text" name="article_title" class="span8" />
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span4">
                                           <label>Article Page No in Magaine <span class="f_req">*</span></label>
											<input type="text" name="article_page_no" class="span8" />
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
											<label>Article By<span class="f_req">*</span></label>
											<select name="article_by" id="article_by" data-placeholder="Select Author" class="chzn_c">
											<?php
												
												$sql = "Select * from author_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													echo '<option value="'. $row['author_id'].'">'. stripslashes($row['author_name']) .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
											<label>Article Details <span class="f_req">*</span></label>
											<textarea name="article_desc" id="article_desc" cols="30" rows="10"></textarea>
										</div>
									</div>
                                    
                                    
                                    <div class="row-fluid">
										<div class="span4">
											<div data-fileupload="image" class="fileupload fileupload-new"><input type="hidden">
												<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div>
												<div style="max-width: 80px; max-height: 100px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail"></div>
													<div>
														<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="article_image" id="article_image"/></span>
														<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
													</div>
												</div>
											</div>
                            			</div>
                                        
                                    
								</div>
								
								<div class="form-actions">
									<input type="hidden" name="act" value="addarticle" />
                                    
                                    <button class="btn btn-inverse" type="submit" name="submit" id="submit" value="submit">Save Article</button>
									<button class="btn" onClick="location.href='admin_article.php?cmd=view'; return false;">Cancel</button>
								</div>
							</form>
                        </div>
                        <?php
							}
							?>
                            <!-- End of New post -->
                            
                            <!-- Edit post -->
                            <?php if($_REQUEST['cmd']=="edit")
							{
							 echo '<div class="span6">';
							 echo '<h3 class="heading">Edit Article</h3>';
							 
							include('conn.php');
							$sql = "Select * from article_master where article_id='".$_REQUEST['article_id'] ."'";
							$result = mysql_query($sql,$con);
							if($row = mysql_fetch_array($result))
							{
							$issue_no=$row['issue_no'];
							$article_category=$row['article_category'];
							$article_title=$row['article_title'];
							$article_by=$row['article_by'];
							$article_desc=$row['article_desc'];
							$article_page_no=$row['article_page_no'];
							}
							 
							 
							
							?>
                            <form class="form_validation_ttip" action="admin_article.php" method="post"  enctype="multipart/form-data">
                            
								<div class="formSep">
									
									<div class="row-fluid">
										<div class="span12">
											<label>Issue No <span class="f_req">*</span></label>
											<select name="issue_no" id="issue_no" data-placeholder="Select Issue No" class="chzn_a">
											<?php
												include 'conn.php';
												$sql = "Select * from issue_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													if($issue_no==$row['issue_no'])
													echo '<option value="'. $row['issue_no'].'" selected>'. $row['issue_no'] .'</option>';
													else
													echo '<option value="'. $row['issue_no'].'">'. $row['issue_no'] .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
											<label>Article Category<span class="f_req">*</span></label>
											<select name="article_category" id="article_category" data-placeholder="Select Article Category" class="chzn_b">
											<?php
												
												$sql = "Select * from category_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													
													if($article_category==$row['cat_id'])
													echo '<option value="'. $row['cat_id'].'" selected>'. $row['cat_name'] .'</option>';
													else
													echo '<option value="'. $row['cat_id'].'">'. $row['cat_name'] .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                     <div class="row-fluid">
                                        <div class="span12">
											<label>Article Title <span class="f_req">*</span></label>
											<input type="text" name="article_title" class="span8" value="<?php echo $article_title;?>" />
											
										</div>
									</div>
                                    
                                     <div class="row-fluid">
                                        <div class="span4">
											<label>Article Page No in Magaine<span class="f_req">*</span></label>
											<input type="text" name="article_page_no" class="span8" value="<?php echo $article_page_no;?>" />
											
										</div>
									</div>
                                    
                                    
                                     <div class="row-fluid">
										<div class="span12">
											<label>Article By<span class="f_req">*</span></label>
											<select name="article_by" id="article_by" data-placeholder="Select Author" class="chzn_c">
											<?php
												
												$sql = "Select * from author_master";
                	            				$result = mysql_query($sql,$con);
												while($row = mysql_fetch_array($result))
                            					{
													if($article_by==$row['author_id'])
													echo '<option value="'. $row['author_id'].'" selected>'. $row['author_name'] .'</option>';
													else
													echo '<option value="'. $row['author_id'].'">'. $row['author_name'] .'</option>';
												}
												?>
                                            </select>
											
										</div>
									</div>
                                    
                                    
                                    <div class="row-fluid">
										<div class="span12">
											<label>Article Description <span class="f_req">*</span></label>
											<textarea name="article_desc" id="article_desc" cols="30" rows="10"><?php echo $article_desc;?></textarea>
										</div>
									</div>
                                    
                                   
                                    
                                    
                                    
                                    <div class="row-fluid">
										<div class="span12">
                                    <input  type="hidden"  name="act" value="editarticle" />
                                    <input type="hidden" name="article_id" class="span8" id="article_id" value="<?php echo $_REQUEST['article_id'];?>"/>
                                    </div>
									</div>
                                    
								</div>
								
								<div class="form-actions">
									
                                    <button class="btn btn-inverse" type="submit" name="submit" id="submit" value="submit">Save changes</button>
									<button class="btn">Cancel</button>
								</div>
							</form>
                        </div>
                        <?php
							}
							?>
                            <!-- End of Edit post -->
                            
                            <!-- Edit post Link-->
                            <?php if($_REQUEST['cmd']=="editimage")
							{
							 echo '<div class="span6">';
							 echo '<h3 class="heading">Edit Article Image</h3>';
							 
							include('conn.php');
							$sql = "Select * from article_master where article_id='".$_REQUEST['article_id'] ."'";
							$result = mysql_query($sql,$con);
							if($row = mysql_fetch_array($result))
							{
							$article_image=$row['article_image'];
							}
							?>
                            <form class="form_validation_ttip" action="admin_article.php" method="post"  enctype="multipart/form-data">
                            
								<div class="formSep">
									
									<div class="row-fluid">
										
                                        
                                        <div class="span12">
											<?php 
											if($article_image!="")
											echo "Current Article Image - <br><img src='../". $article_image ."' >";
											else
											echo "No Article Image ";
											
											?>
										</div>
									</div>
                                    
                                     <div class="row-fluid">
										<div class="span4">
											<div data-fileupload="image" class="fileupload fileupload-new"><input type="hidden">
												<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div>
												<div style="max-width: 80px; max-height: 100px; line-height: 0px;" class="fileupload-preview fileupload-exists thumbnail"></div>
													<div>
														<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="article_image" id="article_image"/></span>
														<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
													</div>
												</div>
											</div>
                            			</div>
                                    
                                    <div class="row-fluid">
										<div class="span12">
                                    <input type="hidden" name="act" value="editimage" />
                                    <input type="hidden" name="article_id" class="span8" id="article_id" value="<?php echo $_REQUEST['article_id'];?>"/>
                                    </div>
									</div>
                                    
								</div>
								
								
								
								
								<div class="form-actions">
									
                                    <button class="btn btn-inverse" type="submit" name="submit" id="submit" value="submit">Save changes</button>
									<button class="btn">Cancel</button>
								</div>
							</form>
                        </div>
                        <?php
							}
							?>
                            <!-- End of Edit post Link -->
                            
						</div>
                    </div>
                    
                    <!-- hide elements (for later use) -->
					<div class="hide">
						<!-- actions for datatables -->
						<div class="dt_gal_actions">
							<div class="btn-group">
								<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#" class="delete_rows_dt" data-tableid="dt_gal"><i class="icon-trash"></i> Delete</a></li>
									
								</ul>
							</div>
						</div>
						<!-- confirmation box -->
						<div id="confirm_dialog" class="cbox_content">
							<div class="sepH_c tac"><strong>Are you sure you want to delete this row(s)?</strong></div>
							<div class="tac">
								<a href="#" class="btn btn-gebo confirm_yes">Yes</a>
								<a href="#" class="btn confirm_no">No</a>
							</div>
						</div>
					</div>
                        
                </div>
            </div>
                    
                    
                    <!-- End of Content -->
                    
                    
                    
				</div>
			</div>									
                    
			<!-- sidebar -->
            <?php include 'sidebar.php';?>
            
            <script src="js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<!-- bootstrap plugins -->
			<script src="js/bootstrap.plugins.min.js"></script>
			<!-- tooltips -->
			<script src="lib/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
			<!-- fix for ios orientation change -->
			<script src="js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="lib/antiscroll/antiscroll.js"></script>
			<script src="lib/antiscroll/jquery-mousewheel.js"></script>
            
            <!-- common functions -->
			<script src="js/gebo_common.js"></script>
     		<script src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
			<!-- colorbox -->
			<script src="lib/colorbox/jquery.colorbox.min.js"></script>


            <!-- enhanced select (chosen) -->
            <script src="lib/chosen/chosen.jquery.min.js"></script>
           
          
            <!-- datepicker -->
            <script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
          
            
            <!-- styled form elements -->
            <script src="lib/uniform/jquery.uniform.min.js"></script>
          
            <!-- TinyMce WYSIWG editor -->
            <script src="lib/tiny_mce/jquery.tinymce.js"></script>
			<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
			<script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
			<script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
            <!-- colorpicker -->
			<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
			
            
            <!-- styled form elements -->
            <script src="lib/uniform/jquery.uniform.min.js"></script>
           
           
		
			
            
            <!-- validation -->
            <script src="lib/validation/jquery.validate.min.js"></script>
            
            <!-- datatable -->
			<script src="lib/datatables/jquery.dataTables.min.js"></script>
			<!-- additional sorting for datatables -->
			<script src="lib/datatables/jquery.dataTables.sorting.js"></script>
            
            <!-- tables functions -->
			<script src="js/article_tables.js"></script>
            
            <!-- validation functions -->
            <script src="js/article_validation.js"></script>
	
			<script>
			
				$(document).ready(function() {
					//* show all elements & remove preloader
					
					setTimeout('$("html").removeClass("js")',1000);
					
					
					
				});
			</script>

		</div>
	</body>
</html>