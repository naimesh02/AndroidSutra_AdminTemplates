  <link rel="stylesheet" href="css/summernote/summernote.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
  	<?php 
			include('conn.php');
		session_start();	
		if(isset($_GET["id"])){
					
			$fetch="select  * from tblmagazine where id='".$_GET["id"]."'";
			$row=mysqli_query($conn,$fetch);
			while($r=mysqli_fetch_array($row)){
				$title=$r["magazineName"];
				$desc=$r["description"];
				$image=$r["image"];
				
				}
	}
			if(isset($_POST["submit"])){
		$date=new DateTime();
	$currentDate= $date->format('Y-m-d');

	
	$file=$_FILES["file"];
	$name=$file['name'];
	$type=$file['type'];
	$size=$file['size'];
	$path=$file['tmp_name'];
		
	if($_GET['imageUrl'])
	$imagePath=$_GET['imageUrl']."&token=".$_GET['token'];
else
	$imagePath=null;
		$sql="INSERT INTO `tblmagazine`(`magazineName`,`description`, `image`, `storeDate`) VALUES ('".$_POST["name"]."','".$_POST["myeditor"]."','".$imagePath."','".$currentDate."')";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
	header("Location:./ViewMagazine.php");
		exit();
	}
	else
	{
		echo "error";
		}		
	}
			
			

if(isset($_POST["update"])){
		$date=new DateTime();
			$currentDate= $date->format('Y-m-d');
		
				
			$file=$_FILES["file"];
			$name=$file['name'];
		
			$type=$file['type'];
			$size=$file['size'];
			$path=$file['tmp_name'];
		if($name=="")
			{
				$name=$image;
			}
			if($_GET['imageUrl'])
	$imagePath=$_GET['imageUrl']."&token=".$_GET['token'];
else
	$imagePath=null;
				$sql="UPDATE `tblmagazine` SET `magazineName`='".$_POST['name']."',`description`='".$_POST["myeditor"]."',`image`='".$imagePath."',`storeDate`='".$currentDate."' WHERE `id`='".$_GET["id"]."'";
				
			$res=mysqli_query($conn,$sql);
			if($res)
			{
			header("Location:./ViewMagazine.php");
				exit();
			}
			else
			{
				echo "error";
				}
			
				
		}
		if($_SESSION["username"]!=''){
	
			
		include('Header_ToolBar.php');
		
		
	?>
	<script>
		function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(){
        target.src = fr.result;
    }
    fr.readAsDataURL(src.files[0]);
}

function putImage() {
    var src = document.getElementById("file");
    var target = document.getElementById("target");
    showImage(src, target);
}
function fillVideo(){

var src = document.getElementById("videoSrc");

    var target = document.getElementById("video");
	target.src=src.value;
}

	</script>
	
	            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                           <li><a href="dashboard.php">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Update Magazines</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mailbox-compose-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel email-compose mg-b-15">
                            <div class="panel-heading hbuilt">
                                <div class="p-xs h4">
                                    New message
                                </div>
                            </div>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <form method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label text-left">Title</label>
                                            <div class="col-sm-11">
                                                <input type="text" name="name" value="<?php 
												if(isset($_GET["id"])){ echo  $title ;}?>" class="form-control input-sm" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-1 control-label text-left">Image</label>
                                            <div class="col-sm-11">
                                              <input type="file" name="file" id="file" style="width:40%;
		padding:10px;
		margin-top:30px;
		padding-left:40px;
		font-size:16px;
		font-family:raleway;
		float:left;" />	
	<img id="target" src="<?php if(isset($_GET["id"]) && !isset($_GET['imageUrl'])) {echo $image;}elseif(isset($_GET['imageUrl'])){ echo  $_GET['imageUrl']; }?>" 
		style="width:150px;height:150px; margin-left:20px">                          </div>
                                        </div>
                                  	<div class="form-group">
								  <textarea  name="myeditor" id="summernote"><?php 
								   if(isset($_GET["id"])){ echo $desc; } ?></textarea> 
						</div><div class="form-group">
							 <div class="panel-footer">
							  <input type="submit" class="btn btn-primary ft-compse" name="<?php 
							  if(isset($_GET["id"])){echo "update"; }else{ echo "submit";}?>" value="<?php 
							  if(isset($_GET["id"])){ echo "Update"; }else{ echo "Submit";} ?>" />
							  </div>
							  </div>
							     	<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
                                    </form>
                                </div>
                            </div>
                                           </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
 
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-storage.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
      <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
      <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
      <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
      <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDVhwLoEvBuEr7aIjX_KqjkZG3hVWiqiYM",
    authDomain: "android-sutra.firebaseapp.com",
    databaseURL: "https://android-sutra.firebaseio.com",
    projectId: "android-sutra",
    storageBucket: "android-sutra.appspot.com",
    messagingSenderId: "886248667438",
    appId: "1:886248667438:web:00c38770c730e7f33822bf",
    measurementId: "G-E3SB8PYZDY"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  var uploadImage=document.getElementById("file");
  uploadImage.addEventListener('change',function(e){
  	var files=e.target.files[0];
	var storageRef=firebase.storage().ref('/'+ files.name);
	 	var task = storageRef.put(files);
	 	
	 	var imageUrls= function(file) {     
	 	storageRef.ref("images/" + files)       
	 	.getDownloadURL()       
	 	.then(function onSuccess(url) {         
	 		return url;       
	 	})       
	 	.catch(function onError(err) {        
	 	 console.log("Error occured..." + err);      
	 	  })  
	 	}
	 	var imageUrl=storageRef.getDownloadURL().then(function onSuccess(url) 
	 	{         
	 		
	 		if((window.location.href).substring((window.location.href).length-3)!='php')
	 		{
	 			window.location.href = window.location.href+'&imageUrl='+url;
	 		}
	 		else{
	 			// alert('hello')
	 			window.location.href = window.location.href+'?imageUrl='+url;
	 		}
	 		
	 		return url;      
	 		 })       
	 	.catch(function onError(err) 
	 		{         
	 			console.log("Error occured..." + err);       
	 		})  
	console.log(imageUrl)
	// alert(urls);
	
  })
</script>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- summernote JS
		============================================ -->
    <script src="js/summernote/summernote.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
		}
			else
			{
				header("Location:index.php");
				}
				?>