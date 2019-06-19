<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
          <ul class="sidebar-menu" id="nav-accordion">
            <li><a href="index.php"><i class="fa fa-home"></i><span>Hoofdscherm</span></a></li>
            <?php
            if($_SESSION["BeheerderSession"] > 0){ ?>
                    <li><a href="klassen.php"><i class="fa fa-group"></i><span>Klassen</span></a></li>
                    <li><a href="docenten.php"><i class="fa fa-group"></i><span>Docenten</span></a></li>
                    <li><a href="studenten.php"><i class="fa fa-group"></i><span>Studenten</span></a></li>
                    <li><a href="fontawesome.php"><i class="fa fa-asl-interpreting"></i><span>Font awesome </span></a></li>
            <?php }else if($_SESSION["DocentSession"] > 0){ ?>
                    <li><a href="klassen_overzicht.php"><i class="fa fa-group"></i><span>Klassen</span></a></li>
            <?php }else if($_SESSION["StudentSession"] > 0) { ?>

            <?php }else{
                header("Location: login.php");
                exit();
            }
            ?>
          </ul>
        </div>
    </div>
</aside>
