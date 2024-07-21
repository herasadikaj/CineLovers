<?php
include("header.php");
include("conn.php");

$con=new connect();
$tbl="movie";
$result=$con->select_movie($tbl,"nowshowing");
?>
    <section class="mt-5 ">
            <div class="container">
                <div class="row">
                    <?php
                    if($result->num_rows>0)
                    {
                         while($row=$result->fetch_assoc())

                            {
                             $ind=$con->select("industry",$row["industry_id"]);
                             $indrow=$ind->fetch_assoc();

                             $lang=$con->select("language",$row["lang_id"]);
                             $langrow=$lang->fetch_assoc();

                             $gen=$con->select("genre",$row["genre_id"]);
                             $genrow=$gen->fetch_assoc();
                             ?>
                              <div class="col-md-3">
                              <img src="<?php echo $row["movie_banner"];?>" style="width: 100%; height:350px;"/>
                              <h6 class="text-center mt-2"style="height:40px;"><?php echo$row["name"];?></h6>
                              <p><b>Release Date:</b><?php echo$row["rel_date"];?></p>
                              <p><b>Industry:</b><?php echo$indrow["industry_name"];?></p>
                              <p><b>Language:</b><?php echo$langrow["lang_name"];?></p>
                              <p><b>Genre:</b><?php echo$genrow["genre_name"];?></p>
                              </div>
                             <?php
                            }
                    }
                    ?>
                </div>
            </div>
    </section>
<?php
include("footer.php");
?>