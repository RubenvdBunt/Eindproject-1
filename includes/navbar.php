<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="">
                <i class="fa fa-cog"></i>
                <span class="username"><?php echo $_SESSION['email'] ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <li><a href="login-update.php"><i class="fa fa-lock" aria-hidden="true"></i> Wachtwoord wijzigen</a></li>
                <li><a href="includes/logout.php"><i class="fa fa-power-off"></i> Uitloggen</a></li>
            </ul>
        </li>
    </ul>
</div>
