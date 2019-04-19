<?php 
    include_once 'functions/functions.php';

	if(!isset($_GET['id'])){
		header("Location: index.php");
    }
    
    if(isset($_POST['comment'])){
        if(!isset($_SESSION['email'])){
            echo '<script>alert("Kamu harus masuk terlebih dahulu untuk memberikan komentar"); window.location.href="login.php"</script>';
        }else{
            $comment = $_POST['comment'];
            $email = $_SESSION['email'];
            $useridq = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='$email'");
            $useridq = $useridq ->fetch_assoc();
            $userid = $useridq['user_id'];
            $movieid = $_GET['id'];

            $ins = mysqli_query($conn, "INSERT INTO comments (movie_fk, user_fk, comment) VALUES ('$movieid','$userid','$comment')");
            if(!$ins){
                echo 'error aaaaa';
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

    while($movie = mysqli_fetch_assoc($query)){
?>

<!DOCTYPE html>
<html>

<?php include_once 'kepala.php'; ?>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container">
        <div class="row mr-1 ml-1 mt-3">
            <div class="col-sm-9">
                <div class="container pl-0">
                    <h3 class="montserrat" style="display:inline-block;"><?php echo $movie['movie_title']; ?> <span
                            class="badge badge-secondary"><?php echo $movie['movie_year']; ?></span></h3>
                    <?php include_once 'rating.php' ?>
                </div>

                <div class="container pl-0">
                    <p><?php echo $movie['movie_desc']; ?></p>
                </div>
                <div class="container mt-3 pl-0">
                    <p><b>Genre : </b> <?php echo $movie['genre']; ?></p>
                </div>
                

            </div>
            <div class="col-sm-3">
            <div class="container">
                <img class="secontainer shadow p-1 mb-1 bg-white rounded" src="<?php echo $movie['movie_imagepath'] ?>">
                <a href="rate.php?id=<?php echo $_GET['id']; ?>" class="btn btn-block btn-primary">Berikan Penilaian</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row mr-1 ml-1 mt-3">
            <div class="col-sm">
                <div class="container pl-0">
                    <?php $comments = mysqli_query($conn, "SELECT * FROM comments JOIN users ON users.user_id = comments.user_fk WHERE comments.movie_fk=$id ORDER BY comment_date DESC"); ?>
                    <h3 class="montserrat">Komentar <span
                            class="badge badge-secondary"><?php echo mysqli_num_rows($comments); ?></span></h3>

                    <div class="container">

                        <div class="row">
                            <div class="col-sm-1">
                                <img src="images/noone.png" width="40px" height="40px">
                            </div>
                            <div class="col-sm-7 pl-0">
                                <form class="form-group" method="POST">
                                    <label for="comment">Tulis komentar mu disini</label>
                                    <textarea class="form-control" rows="1" id="comment" name="comment"></textarea>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2" style="float:right;">Post
                                        komentar</button>
                                </form>
                            </div>
                        </div>

                        <?php 
                    
                    while($comment = mysqli_fetch_assoc($comments)){
                        echo '<div class="row">';
                        echo '<div class="col-sm-1">';
                        echo '<img src="images/noone.png" width="40px" height="40px">';
                        echo '</div>';
                        echo '<div class="col-sm-7 pl-0">';
                        echo '<p class="mb-0"><b>'.$comment['user_username'].'</b></p>';
                        echo $comment['comment'];
                        echo '</div>';
                        echo '</div>';
                    }

                    if(mysqli_num_rows($comments) == 0){echo 'Tidak ada komentar';}
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>