<?php 
    include_once 'functions/functions.php';
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
    }
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $currentDir = getcwd();
        $uploadDirectory = "/images/";
        $path = "images/";
        if(isset($_FILES['image'])){
            $fileName = $_FILES['image']['name'];
            $fileTmpName  = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
        
            $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
            $up = $path . basename($fileName);
        
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        
                    if ($didUpload) {
                        echo "The file " . basename($fileName) . " has been uploaded";
                    } else {
                        echo "An error occurred somewhere. Try again or contact the admin";
                    }
                    $qq = mysqli_query($conn, "INSERT INTO movies (movie_title,movie_desc,movie_imagepath,movie_year,genre_fk) VALUES ('$title','$desc','$up','$year','$genre')");
                    if($qq){
                        echo 'SUCCESSFULL';
                    }
        }else{
            
        }
        
        echo $up;
    }
?>

<!DOCTYPE html>
<html>

<?php include_once 'head.php'; ?>

<body>
    <?php include_once 'navbar.php'; ?>
    <div class="container mt-2"> 
        <div class="row mt-3">
            <div class="col-sm">
            <h1>Add Movie</h1>
            <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                        <label name="title">Movie Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Movie Title">
                    </div>
                    <div class="form-group">
                        <label name="desc">Movie Desc</label>
                        <textarea name="desc" type="text" class="form-control" placeholder="Movie Description"></textarea>
                    </div>
                    <div class='form-group'>
                        <label name="image">Movie Poster</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="year">Movie Year</label>
                        <input name="year" type="number" class="form-control" placeholder="Movie Year">
                    </div>
                    <div class="form-group">
                    <label name="genre">Movie Genre</label>
                    <select class="form-control" name="genre">
                        <?php $q = mysqli_query($conn, "SELECT * FROM genre");
                            while($row = mysqli_fetch_assoc($q)){
                                echo '<option value="'.$row['genre_id'].'">'.$row['genre'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">ENTER</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>