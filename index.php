<?php 
    include_once 'functions/functions.php';

?>

<!DOCTYPE html>
<html>

<?php include_once 'kepala.php'; ?>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-2">
    <div class="row mt-3">
            <div class="col-sm">
                <h3>Cari berdasarkan genre</h3>
                <?php 
                    $sel = mysqli_query($conn, "SELECT * FROM genre ORDER BY genre");
                    while($row = mysqli_fetch_assoc($sel)){?>
                    <a class="text-primary mr-3" href="<?php echo 'search.php?genre='.$row['genre_id'] ?>"><?php echo $row['genre']?></a>
                    <?php } ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Film Trending</h3>
                <?php 
                    $SearchQuery = mysqli_query($conn, "SELECT * FROM movies ORDER BY RAND() LIMIT 20");

        $rowLimit = 0;
        while($movie = mysqli_fetch_assoc($SearchQuery)){
            $rowLimit++;

            $link = "movie.php?id=".$movie['movie_id'];

            if($rowLimit == 1){
                echo '<div class="row mt-3">';
            }
            echo '<div class="col-sm">';
                echo '<div class="container">';
                echo '<a href="'.$link.'">';
                if($movie['movie_imagepath'] == ''){
                    echo '<img class="secontainer" src="'.'images/noimage.png'.'">';
                }else{
                    echo '<img class="secontainer" src="'.$movie['movie_imagepath'].'">';
                }
                    echo '<h5 style="text-align:center;">'.$movie['movie_title'].'</h5>';
                echo '</a>';
                echo '</div>';
            echo '</div>';
            if($rowLimit == 5){
                echo '</div>';
                $rowLimit = 0;
            }
        }

        if($rowLimit == 5){
            echo '</div>';
            $rowLimit = 0;
        }else{
            while($rowLimit != 5){
                echo '<div class="col-sm">';
                echo '</div>';
                $rowLimit++;
            }
            echo '</div>';
        }
                    ?>
            </div>
        </div>
        
    </div>
</body>


</html>