<!-- <ul class="nav nav-pills">
    <div class="container">

        <ul class="nav nav-pills nav-fill">

            <button type="button" class="btn btn-primary justify-content-end"
                onclick="window.location.href = 'index.php?controller=cart&action=show';">
                <img src=" assets/cart-8x.png" width="30" alt="">
                <a class="badge badge-light"
                    href="index.php?controller=cart&action=show"><?=count($_SESSION["arrCart"]);?></a>
                <span class="sr-only">unread messages</span>
            </button>
        </ul>
    </div> -->





<nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php"><img src="assets/OVERLOOK_LOGO-14.png" alt="Rainbowtique Logo"
            width="150"></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-link"
                    href="#">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link"
                    href="#">Assignments</a>
            </li>
     
        </ul>

        <!-- <button type="button" class="btn btn-primary ml-sm-2"
            onclick="window.location.href = 'index.php?controller=cart&action=show';">
            <img src=" assets/cart-8x.png" width="30" alt="">
            <a class="badge badge-light"
                href="index.php?controller=cart&action=show"><?=count($_SESSION["arrCart"]);?></a>
            <span class="sr-only">unread messages</span>
        </button> -->
    </div>
</nav>