<section id="content">
  <div class="container"> 
   <br/><br/>  
   <? include("top-menu.php"); ?>
   <br/><br/>
	<?php if (validation_errors()) : ?>
	<div class="row"> 
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<?= validation_errors() ?>
		</div>
	</div>
	</div>
	<?php endif; ?>
	<?php if (isset($error)) : ?>
	<div class="row"> 
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert">
			<?= $error ?>
		</div>
	</div>
	</div>
	<?php endif; ?> 
	    <?php if (isset($success)) : ?>
	    <div class="row"> 
		<div class="col-md-12">
			<div class="alert alert-success" role="alert">
				<?= $success ?>
			</div>
	   </div>
	</div>
	<?php endif; ?>
   <div class="card">  
   <div class="card-header ch-alt">
      <h2>Profile picture <small>Upload your profile picture here. Make sure its not greater than 1mb in size and type .jpg, .jpeg, .png only.</small></h2>
                        </div> 
        <div class="card-body card-padding">
		   <div class="row"> 
		        <div class="col-md-8">
		        <form action="" method="POST" action="<? echo site_url('dasboard/profilepicture');?>" enctype="multipart/form-data" >
				    Select File To Upload:<br /><br />
				    <input type="file" name="userimage"  />
				    <br /><br />
				    <input type="submit" name="submit" value="Upload" class="btn btn-success" />
				</form>
		        </div> 
		        <div class="col-md-4">  
		        <? if ($user_details[0]['pic']){ ?>
		         <img class="thumbnail gr-border thumb" src="<? echo base_url().'upload/users/profile/'.$userid.'_thumb.jpg'; ?>?n=<? echo rand(31, 4000); ?>" alt="">  
		         <? }else{ ?>
		         <img class="thumbnail gr-border thumb" src="/upload/users/placeholder-user-photo.png" alt="">  
		         <? } ?> 
		         
                 <? if ($user_details[0]['pic']){ ?>
		         <img class="thumbnail gr-border profile_thumb" src="<? echo base_url().'upload/users/profile/'.$userid.'_profile_thumb.jpg'; ?>?n=<? echo rand(31, 4000); ?>" alt="">  
		         <? }else{ ?>
		         <img class="img-responsive gr-border profile_thumb"  src="/upload/users/placeholder-user-photo.png" alt="">   
		         <? } ?> 
		         
		         
		        </div>
		   </div>
    	</div>
   </div>
   