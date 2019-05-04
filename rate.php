<?php 
    include_once 'functions/functions.php';

	if(!isset($_GET['id']) || !isset($_SESSION['email'])){
		header("Location: index.php");
    }
    
    if(isset($_POST['comment'])){
        if(!isset($_SESSION['email'])){
            echo '<script>alert("You must log in first to be able to comment"); window.location.href="login.php"</script>';
        }else{
            $comment = $_POST['comment'];
            $email = $_SESSION['email'];
            $useridq = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='$email'");
            $useridq = $useridq ->fetch_assoc();
            $userid = $useridq['user_id'];
            $movieid = $_GET['id'];

            $ins = mysqli_query($conn, "INSERT INTO comments (movie_fk, user_fk, comment) VALUES ('$movieid','$userid','$comment')");
            if(!$ins){
                echo 'Failed';
            }
        }
    }

    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM movies JOIN genre ON genre.genre_id = movies.genre_fk WHERE movie_id=$id");

    $ratingQuery = mysqli_query($conn, "SELECT AVG(rating) AS rating FROM rating WHERE movie_fk=2");

    if(mysqli_num_rows($ratingQuery) > 0){
        while($rate = mysqli_fetch_assoc($ratingQuery)){
            $rating = $rate['rating'];
        }
    }else{
        $rating = 0;
        $ratingRounded = 0;
    }

    $ratingRounded = round($rating);
    $email = $_SESSION['email'];
    $getUserId = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$email'");
    while($row = mysqli_fetch_assoc($getUserId)){
        $userid = $row['user_id'];
    }

    if(isset($_POST['rate'])){
        $rate = $_POST['rate'];
        $q = mysqli_query($conn, "INSERT INTO rating (movie_fk,user_fk,rating) VALUES ($id,$userid,$rate)");
        header("Location: movie.php?id=".$id);
    }

    while($movie = mysqli_fetch_assoc($query)){
?>

<!DOCTYPE html>
<html>

<?php include_once 'head.php'; ?>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container">
        <div class="row mr-1 ml-1 mt-3">
            <div class="col-sm-9">
                <div class="container pl-0">
                    <h3 class="montserrat" style="display:inline-block;"><?php echo $movie['movie_title']; ?> <span
                            class="badge badge-secondary"><?php echo $movie['movie_year']; ?></span></h3>
                </div>
            </div>
            <div class="col-sm-3">
                <img class="secontainer shadow p-1 mb-1 bg-white rounded" src="<?php echo $movie['movie_imagepath'] ?>">
            </div>
        </div>
        <?php } ?>
        <div class="row mr-1 ml-1 mt-3">
            <div class="col-sm-4">
                <div class="container pl-0">
                    <h3 class="montserrat">Give a Rate</h3>
                    <form method="POST">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="Very Good">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="Good">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="Not Bad/Standard"Not Bad/Standard>3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2">
                        <label for="star2" title="Bad">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="Very Bad">1 star</label>
                    </div>
                    <input type="submit" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>


</html>