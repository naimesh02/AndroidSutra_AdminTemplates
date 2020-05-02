	<?php 
			include('conn.php');
		session_start();
		if($_SESSION["username"]!=''){
		include('Header_ToolBar.php');	
	?>
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
                                            <li><span class="bread-blod">Blogs Tables</span>
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
        <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
						<div  style="background-color:#0B5790; border:thick; border-radius:50px; height:30px; width:200px; text-align:center; font-size:17px; color:#FFFFFF;right:0;position:absolute;  margin-right :40px;">
										
										<a href="UpdateBlogs.php"  style="color:#FFFFFF; font-size:20px;">Add Record</a>
										</div>
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Blogs <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                   
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead  style="text-align:center">
                                             <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">Title</th>
                                                <th data-field="name" data-editable="true" >Description</th>
                                                <th data-field="company">Image</th>
                                                <th data-field="price">Type</th>
												<th data-field="date" data-editable="true">Date</th>
												<!--<th data-field="task" data-editable="true">Status</th>
												<th data-field="email" data-editable="true">Total Sales</th>
                                               --> <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
                                        	
                                            <?php
							   $sql="SELECT * FROM `tblblogs` ";
							   $qry=mysqli_query($conn,$sql);
							   while($res=mysqli_fetch_array($qry)){
							   echo "<tr><td></td><td>".$res["title"]."</td><td>".$res["description"]."</td>";?>
							   <td><img src="upload/<?php echo $res['image'];?>" style="width:350px;height:100px"/></td><td><?php echo $res["type"];?></td>
							  
						<?php
							   echo "</td><td>".$res['storeDate']."</td><td><a href=UpdateBlogs.php?id=".$res["id"]."><img src='Images/pencil.png'></a>&nbsp;&nbsp;&nbsp;<a href=deleteBlogs.php?id=".$res["id"]." onclick=\"return confirm('Are you sure to delete record?')\"><img src='Images/delete.png'></a></td></tr>";
							   }
							   ?>
			
                                            
                                           </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
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