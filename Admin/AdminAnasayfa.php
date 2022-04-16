<?php 
if(isset($_SESSION['Yonetici'])){
?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
   		 <?php require_once("Includes/sidebar.php");?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php require_once("Includes/nav.php");?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!--PHP İNDEX SAYFALARINI BURAYA YAZACAN -->
                    <?php
						if((!$AdminRoutesCode) or ($AdminRoutesCode=="") or ($AdminRoutesCode==0)){
							include($AdminRoutes[1]);
						}else{
							include($AdminRoutes[$AdminRoutesCode]);
						}
                    ?>
               
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
      
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Page level custom scripts -->
	<?php require_once("Includes/scripts.php");?>
</body>
<?php
}else{
	header("Location:index.php?ARO=1");
	exit();
}
?>
</html>




