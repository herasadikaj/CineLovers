<?php
session_start();
if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");

}

else{
include("admin_header.php");
    ?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#B03060;">
            <?php include("admin_sidenavbar.php"); ?>
            </div>
          <div class="col-md-10">
            <h5 class="text-center mt-2" style="color:#B03060;"> Admin Dashboard</h5>
        </div>
    </div>
</section>

<?php
include("admin_footer.php");
}

    ?>