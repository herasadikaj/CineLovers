<?php
session_start();

if (empty($_SESSION["admin_username"])) {
    header("Location: Dashboard.php");
    exit();
}

include("conn.php");

$con = new connect();

$industries = $con->select_by_query("SELECT id, industry_name FROM industry");
$genres = $con->select_by_query("SELECT id, genre_name FROM genre");
$languages = $con->select_by_query("SELECT id, lang_name FROM language");

if (isset($_POST["btn_insert"])) {
    $name = $_POST["movie_txt"];
    $release = $_POST["DATE_txt"];
    $industry_id = $_POST["industry_id"];
    $genre_id = $_POST["genre_id"];
    $lang_id = $_POST["lang_id"];
    $duration = $_POST["duration"];
    $banner_path = $_POST["banner_path"]; 

    $sql = "INSERT INTO movie (name, rel_date, industry_id, genre_id, lang_id, duration, movie_banner) VALUES ('$name', '$release', '$industry_id', '$genre_id', '$lang_id', '$duration', '$banner_path')";

    if ($con->insert($sql)) {
        header("Location: movie.php");
        exit();
    } 
}

include("admin_header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Add Movie</title>
</head>
<body>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#B03060;">
                <?php include("admin_sidenavbar.php") ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center mt-2" style="color:#B03060;">Add a movie</h5>
                <form method="post" enctype="multipart/form-data">
                    <div class="container" style="color: #B03060;">
                        <hr>
                        <label for="banner_path"><b>Movie Banner Path</b></label>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie banner path" name="banner_path" required>

                        <label for="movie_txt"><b>Movie Name</b></label>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie name" name="movie_txt" required>

                        <label for="duration"><b>Movie Duration</b></label>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie duration" name="duration" required>

                        <label for="DATE_txt"><b>Movie Release date</b></label>
                        <input type="date" style="border-radius: 30px;" placeholder="Enter the release date" name="DATE_txt" required>

                        <label for="industry_id"><b>Industry</b></label>
                        <select name="industry_id" style="border-radius: 30px;" required>
                            <?php while ($industry = $industries->fetch_assoc()) { ?>
                                <option value="<?= $industry['id'] ?>"><?= $industry['industry_name'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="genre_id"><b>Movie Genre</b></label>
                        <select name="genre_id" style="border-radius: 30px;" required>
                            <?php while ($genre = $genres->fetch_assoc()) { ?>
                                <option value="<?= $genre['id'] ?>"><?= $genre['genre_name'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="lang_id"><b>Movie Language</b></label>
                        <select name="lang_id" style="border-radius: 30px;" required>
                            <?php while ($language = $languages->fetch_assoc()) { ?>
                                <option value="<?= $language['id'] ?>"><?= $language['lang_name'] ?></option>
                            <?php } ?>
                        </select>
                                <br>
                                <br>
                                <br>
                       

                        <a href="movie.php" class="btn" style="background-color:#B03060;color:white;">Cancel</a>
                        <button type="submit" name="btn_insert" class="btn" style="background-color:#B03060; color:white">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("admin_footer.php"); ?>

</body>
</html>
