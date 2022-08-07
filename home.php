<body>
    <!-- Header section -->
    <div class="title d-flex"><a href="index.php">
        <button><img src="images/logo.png">
            <h1>Harirod Online Shopping</h1></button></a>
    </div>
    <div class="sticky-lg-top sticky-md-top sticky-sm-top bg-dark" >
        <nav class="navbar navbar-expand navbar-light pt-2 pb-2">
            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-ul" aria-hidden="true" style="padding-right: 5px;"></i> Categories</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"> Foodgrains & Oil</a></li>
                        <li><a class="dropdown-item" href="#"> Meat, Breakfast & Diary</a></li>
                        <li><a class="dropdown-item" href="#"> Cosmotics & Hygiene</a></li>
                        <li><a class="dropdown-item" href="#"> Cleaning & Households</a></li>
                        <li><a class="dropdown-item" href="#"> Dry fruits</a></li>
                    </ul>
                </div>
                <div class="src-bar">
                    <form class="d-flex" role="search" action="action_page.php">
                        <input type="text" placeholder="What do you need?" name="search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

                <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa fa-user" aria-hidden="true"></i><?php  if(empty($final_name)){
                        echo '  ACCOUNT';
                    }else{ echo htmlspecialchars(" ".strtoupper($final_name));}?></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> CARD</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

