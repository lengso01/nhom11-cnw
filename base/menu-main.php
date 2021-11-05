 <header class="mb-5"> 
        <nav class="navbar align-items-center">
        <a class="navbar-brand font-weight-bold" href="#">∞Infinity</a>
        <div class="d-flex align-items-center">
            <p class="mr-2 mb-0 font-weight-bold"><img src="image/default.png" class="rounded-circle avatar-lg img-thumbnail mr-2" alt="profile-image" style="width:30px; height: 30px"><?php echo $fetch_info['name'] ?></p>
            <a href="logout-user.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>
    <ul class="mt-3 nav justify-content-center">
                    <li class="nav-item">
        <a class="nav-link active" href="home.php">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="chat.php">Trò chuyện</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="appointment.php">Lời nhắc</a>
    </li>
    <li class="nav-item ">
        <form class="form-inline">
            <input class="form-control mr-sm-2 border-0" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </li>
    </ul>
</header>