<?php
session_start();
include("conn.php");

if(empty($_SESSION["admin_username"])) {
    header("Location:Dashboard.php");
    exit;
}

if(isset($_GET['movie_id'])) {
    $movie_id = intval($_GET['movie_id']);
    $con = new connect();

    if(isset($_POST['update'])) {
        $name = $con->conn->real_escape_string($_POST['name']);
        $banner = $con->conn->real_escape_string($_POST['banner']);
        $rel_date = $con->conn->real_escape_string($_POST['rel_date']);
        $industry_id = intval($_POST['industry_id']);
        $genre_id = intval($_POST['genre_id']);
        $lang_id = intval($_POST['lang_id']);
        $duration = $con->conn->real_escape_string($_POST['duration']);

        $sql = "UPDATE movie SET 
                name='$name', 
                movie_banner='$banner', 
                rel_date='$rel_date', 
                industry_id='$industry_id', 
                genre_id='$genre_id', 
                lang_id='$lang_id', 
                duration='$duration' 
                WHERE id=$movie_id";

        if ($con->update($sql)) {
            header("Location: movie.php");
            exit;
        } else {
            echo "Error updating record.";
        }
    } else {
        $sql = "SELECT * FROM movie WHERE id=$movie_id";
        $result = $con->select_by_query($sql);

        if($result->num_rows == 1) {
            $movie = $result->fetch_assoc();
        } else {
            echo "Movie not found.";
            exit;
        }

        $industriesResult = $con->select_all('industry');
        $genresResult = $con->select_all('genre');
        $languagesResult = $con->select_all('language');
    }
} else {
    echo "Movie ID not provided.";
    exit;
}
include("admin_header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>Edit Movie</title>
</head>
<body>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="background-color:#B03060;">
                <?php include("admin_sidenavbar.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center mt-2" style="color:#B03060;">Edit Movie</h5>
                <form method="post" enctype="multipart/form-data">
                    <div class="container" style="color: #B03060;">
                        <hr>
                        <label for="name"><b>Movie Name</b></label><br>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie name" name="name" value="<?php echo htmlspecialchars($movie['name']); ?>" required><br>

                        <label for="banner"><b>Movie Banner Path</b></label><br>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie banner path" name="banner" value="<?php echo htmlspecialchars($movie['movie_banner']); ?>" required><br>

                        <label for="duration"><b>Movie Duration</b></label><br>
                        <input type="text" style="border-radius: 30px;" placeholder="Enter the movie duration" name="duration" value="<?php echo htmlspecialchars($movie['duration']); ?>" required><br>

                        <label for="rel_date"><b>Movie Release Date</b></label><br>
                        <input type="date" style="border-radius: 30px;" name="rel_date" value="<?php echo htmlspecialchars($movie['rel_date']); ?>" required><br>

                        <label for="industry_id"><b>Industry</b></label><br>
                        <select name="industry_id" style="border-radius: 30px;" required>
                            <?php while ($industry = $industriesResult->fetch_assoc()) { ?>
                                <option value="<?= $industry['id'] ?>" <?php if($movie['industry_id'] == $industry['id']) echo 'selected'; ?>><?= htmlspecialchars($industry['industry_name']); ?></option>
                            <?php } ?>
                        </select><br>

                        <label for="genre_id"><b>Genre</b></label><br>
                        <select name="genre_id" style="border-radius: 30px;" required>
                            <?php while ($genre = $genresResult->fetch_assoc()) { ?>
                                <option value="<?= $genre['id'] ?>" <?php if($movie['genre_id'] == $genre['id']) echo 'selected'; ?>><?= htmlspecialchars($genre['genre_name']); ?></option>
                            <?php } ?>
                        </select><br>

                        <label for="lang_id"><b>Language</b></label><br>
                        <select name="lang_id" style="border-radius: 30px;" required>
                            <?php while ($language = $languagesResult->fetch_assoc()) { ?>
                                <option value="<?= $language['id'] ?>" <?php if($movie['lang_id'] == $language['id']) echo 'selected'; ?>><?= htmlspecialchars($language['lang_name']); ?></option>
                            <?php } ?>
                        </select><br>
                        <br>
                        <input type="submit" name="update" value="Update" class="btn" style="background-color:#B03060; color:white;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("admin_footer.php"); ?>
</body>
</html>
