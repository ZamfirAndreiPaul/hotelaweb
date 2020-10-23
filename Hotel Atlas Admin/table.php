<!DOCTYPE html>

<?php

session_start();
if(empty($_SESSION['fname']))
{
    header("Location: login.php?error=needlogin");
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Hotel Atlas</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="table.php"><i class="fas fa-table"></i><span>DataBase Raport</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button></div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">DataBase Raport</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Rezervari in asteptare</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nume</th>
                                            <th>Email</th>
                                            <th>Telefon</th>
                                            <th>Adaugari</th>
                                            <th>De pe</th>
                                            <th>Pana pe</th>
                                            <th>Camera</th>
                                            <th>Confirm</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                        $link = mysqli_connect("localhost", "root", "", "hotelatlas");

                                        $sql = "SELECT * FROM reservation";
                                        if($result = mysqli_query($link, $sql)) {
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<form action='confirm.inc.php' method='post'>";
                                                        echo "<tr>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"name\" value=\"".$row['name']."\">";
                                                                echo $row['name'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"email\" value=\"".$row['email']."\">";
                                                                echo $row['email'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"phone\" value=\"".$row['telefon']."\">";
                                                                echo $row['telefon'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"adaugari\" value=\"".$row['adaugari']."\">";
                                                                echo $row['adaugari'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"depe\" value=\"".$row['depe']."\">";
                                                                echo $row['depe'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"panape\" value=\"".$row['panape']."\">";
                                                                echo $row['panape'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<input type=\"hidden\" name=\"room\" value=\"".$row['room']."\">";
                                                                echo $row['room'];
                                                            echo "</td>";
                                                            echo "<td>";
                                                                echo "<button class=\"btn btn-primary\" type=\"submit\" name='confirm'>Confirm</button>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        echo "</form>";
                                                }
                                                mysqli_free_result($result);
                                            }
                                        }


                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Nume</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td><strong>Telefon</strong></td>
                                            <td><strong>Room</strong></td>
                                            <td><strong>De pe</strong></td>
                                            <td><strong>Pana pe</strong></td>
                                            <td><strong>Camera</strong></td>
                                            <td><strong>Confirm</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Hotel Atlas 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>