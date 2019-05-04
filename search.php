<?php 
    include_once 'functions/functions.php';
?>

<!DOCTYPE html>
<html>

<?php include_once 'head.php'; ?>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-3">
        <?php 
    //Search Query
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $SearchQuery = mysqli_query($conn, "SELECT * FROM movies WHERE movie_title LIKE '%$search%' ORDER BY movie_title ASC");

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
    }else if(isset($_GET['genre'])){
        $genreId = $_GET['genre'];
        $SearchQuery = mysqli_query($conn, "SELECT * FROM movies WHERE genre_fk='$genreId'");


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
    }
    ?>
    </div>
</body>


</html>