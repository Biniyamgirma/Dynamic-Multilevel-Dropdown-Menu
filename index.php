<?php 
include ("conn.php");
$sql="SELECT `regionName`, `regionId` FROM `region` WHERE 1";
$result=mysqli_query($conn,$sql);
$sql2="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/style.css">
    <script src="./bootstrap/bootstrap.bundle.js"></script>
    <title>Region</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nav Bar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-dark-color dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
            Region
          </button>
          <ul class="dropdown-menu dropdown-menu-dark-color">
             <?php while($row=mysqli_fetch_assoc($result)){ 
                         $regionId=$row['regionId'];
                         $regionName=$row['regionName'];
                         ?>
                 
            <li class="dropend">
                <a class="dropdown-item dropdown-toggle color-item"data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#">
                    <?php echo$regionName;?>
                </a>
            <ul class="dropdown-menu dropdown-menu-dark bg-dark-color">
                        <?php
                            $sql2="SELECT `regionId`, `zoneId`, `zoneName` FROM `zone` WHERE regionId='$regionId'";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2=mysqli_fetch_assoc($result2)){
                                $zoneName=$row2['zoneName'];
                                $zoneId=$row2['zoneId'];
                         ?>
                <li class="dropdown ">
                    <a class="dropdown-item dropdown-toggle color-item" data-bs-toggle="dropdown" href="#">
                        <?php echo$zoneName; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark bg-dark-color">
                        <?php
                            $sql3="SELECT * FROM `town` WHERE zoneId='$zoneId' ";
                            $result3=mysqli_query($conn,$sql3);
                            while($row3=mysqli_fetch_assoc($result3)){
                                $townName=$row3['townName'];
                                $townId=$row3['townId'];
                         ?>
                        <li>
                            <a class="dropdown-item color-item" href="conn.php?id=<?php echo$townId;?>">
                            <?php echo$townName ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
            </li>
            <?php   } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>