<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a href="#" class="navbar-brand montserrat">
        <img src="popcorn.png" width="30" height="30" class="d-inline-block align-top" alt="">
        MovieRev
    </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>

        <?php if(isset($_SESSION['nama'])){ ?>
        <li class="nav-item active">
            <a class="nav-link" href="logout.php"><?php echo $_SESSION['nama'] ?> <i class="fas fa-user"></i></a>
        </li>
        <?php } else{ ?>
        <li class="nav-item active">
            <a class="nav-link" href="login.php" >Masuk</a>
        </li>
        <?php } ?>
    </ul>


    <form class="form-inline" action="search.php" method="GET">
        <input name="type" type="hidden" value="search">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search" name="search"
            <?php if(isset($_GET['search'])) echo "value='".$_GET['search']."'"; ?>>
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari Film</button>
    </form>
</nav>