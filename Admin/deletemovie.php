<?php
session_start();

if(empty($_SESSION["admin_username"])) {
    header("Location:index.php");
    exit; 
}

include("conn.php");

if(isset($_GET["id"])) {
    $id = $_GET["id"]; 
    $con = new connect();
    $sql = "SELECT movie.id, movie.name, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name, movie.duration
    FROM movie, genre, industry, cinelovers.language
    WHERE
    movie.id = $id AND
    movie.industry_id=industry.id AND
    movie.genre_id=genre.id AND
    movie.lang_id=language.id";
    $result = $con->select_by_query($sql);

    if($result->num_rows == 1) {
        $movie = $result->fetch_assoc();
    } else {
        echo "Movie not found.";
        exit; 
    }
} else {
    echo "Movie ID not provided.";
    exit; 
}

if(isset($_POST["btn_delete"])) {
    $id = $_GET["id"]; 
    $con = new connect();
    $sql = "DELETE FROM movie WHERE id = $id"; 
    $con->delete($sql, "Record Deleted") ;
    header("Location:movie.php"); 
}

include("admin_header.php");
?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#B03060;"> 
                <?php include("admin_sidenavbar.php")?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center mt-2" style="color:#B03060;">Delete Movie</h5>
                <form method="post">
                    <div class="container" style="color:#B03060;">
                        <hr>

                        <p>Are you sure you want to delete the movie with this title: <strong> <?php echo $movie['name']; ?></strong> ?</p>
                        <br>
                        <br>

                        <button type="submit" name="btn_delete" class="btn" style="background-color:#B03060; color:white">Delete</button>
                        <a href="movie.php" class="btn" style="background-color:#B03060; color:white">Cancel</a>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("admin_footer.php"); ?>
