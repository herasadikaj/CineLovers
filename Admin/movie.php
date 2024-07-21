<?php
session_start();
include("conn.php");

if(empty($_SESSION["admin_username"])) {
    header("Location:index.php");
} else {
    $con = new connect();

    $sql = "SELECT movie.id, movie.name, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name, movie.duration
    FROM movie, genre, industry, cinelovers.language
    WHERE
    movie.industry_id=industry.id AND
    movie.genre_id=genre.id AND
    movie.lang_id=language.id;";
    $result = $con->select_by_query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin Panel- Online Movie Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#B03060;color:white;">
    <img src="../images/logo2.png" style="width:30px;"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <h5><a class="nav-link" href="dashboard.php">Admin Panel Online Movie Ticket Booking</a></h5>
            </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Admin/index.php">Logout</a>
                </li>
            </ul>
        
    </div>
</nav>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#B03060;">
                <?php include('admin_sidenavbar.php'); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center mt-2" style="color:#B03060;">Movie Details</h5>
                <table class="table mt-5" border="1">
                    <thead style="background-color:#B03060; color:white;">
                        <tr>
                        <th>Id</th>
                            <th>Banner</th>
                            <th>Name</th>
                            <th>Release Date</th>
                            <th>Industry</th>
                            <th>Genre</th>
                            <th>Language</th>
                            <th>Movie Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $row["id"]; ?></td>
                                    <td><img src="../<?php echo $row["movie_banner"]; ?>" style="height:100px;"></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["rel_date"]; ?></td>
                                    <td><?php echo $row["industry_name"]; ?></td>
                                    <td><?php echo $row["genre_name"]; ?></td>
                                    <td><?php echo $row["lang_name"]; ?></td>
                                    <td><?php echo $row["duration"]; ?></td>
                                    <td>
                                    <a href="editmovie.php?movie_id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit Movie</a>
                                    <a href="deletemovie.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete Movie</a>                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include("admin_footer.php"); ?>
</body>
</html>
<?php

}
?>
