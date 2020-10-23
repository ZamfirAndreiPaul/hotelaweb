<!DOCTYPE html>
<?php

session_start();

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Hotel Atlas</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pricing.php">Preturi</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="testimonials.php">Testimoniale</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.php">Despre Noi</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="contact-us.php">Rezerva Camera</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <?php
                    if (isset($_GET["add"]))
                    {
                        if($_GET['add'] == "succes")
                        {
                            echo "</h4>";
                                    echo"<br> <form style='margin-bottom: 30px' action='confirm.inc.php' method='post'>
                                        <h4 style='color: #1c7430; font-weight: bold; border: 1px solid #1c7430; border-radius: 8px; margin-bottom: 20px'>Ai rezervat camera cu succes. Pretul total este : ".$_SESSION['days']." Lei.
                                        <br> De pe:".$_SESSION['depe']." Pana pe:".$_SESSION['panape']."
                                        <br> Doriti sa confirmati rezervarea?</h4>
                                        <input type=\"hidden\" name=\"name\" value=\"".$_SESSION['name']."\">
                                        <input type=\"hidden\" name=\"email\" value=\"".$_SESSION['email']."\">
                                        <input type=\"hidden\" name=\"phone\" value=\"".$_SESSION['phone']."\">
                                        <input type=\"hidden\" name=\"depe\" value=\"".$_SESSION['depe']."\">
                                        <input type=\"hidden\" name=\"panape\" value=\"".$_SESSION['panape']."\">
                                        <input type=\"hidden\" name=\"room\" value=\"".$_SESSION['room']."\">
                                        <button class=\"btn btn-primary btn-block\" type='submit' name='da'>Da</button>
                                        <button class=\"btn btn-primary btn-block\" type='submit' name='nu'>Nu</button>
                                    </form>";
                        }
                    }
                    if (isset($_GET['error']))
                    {
                        if($_GET['error'] == "emptyfields")
                        {
                            echo "<h4 style='color: #b21f2d; font-weight: bold; border: 1px solid #b21f2d; border-radius: 8px; margin-bottom: 50px'>Toate campurile sunt obligatorii.</h4>";
                        }
                    }
                    if (isset($_GET['confirm']))
                    {
                        if($_GET['confirm'] == "nu")
                        {
                            echo "<h4 style='color: #b21f2d; font-weight: bold; border: 1px solid #b21f2d; border-radius: 8px; margin-bottom: 50px'>Ai anulat rezervarea. Ne pare rau si va mai asteptam pe la noi. O zi buna.</h4>";
                        }
                        if($_GET['confirm'] == "da")
                        {
                            echo "<h4 style='color: #1c7430; font-weight: bold; border: 1px solid #1c7430; border-radius: 8px; margin-bottom: 50px'>Rezervarea a fost facut cu succes. Un operator v-a lua legatura cu dumneavoastra. Va uram o zi buna.</h4>";
                        }
                    }
                    ?>
                    <h2 class="text-info">Rezerva Camera</h2>
                    <p>Verificati disponibilitatea camerei</p>
                </div>
                <form action="add.php" method="post">
                    <div class="form-group"><label>Name</label><input class="form-control" type="text" name="name"></div>
                    <?php

                        if (isset($_GET["room"])) {
                            if ($_GET['room'] == "single") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\" selected=\"\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                            }
                            else if ($_GET['room'] == "double") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\">Single</option><option value=\"Double\" selected=\"\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                            }
                            else if ($_GET['room'] == "doubletwin") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\" selected=\"\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                            }
                            else if ($_GET['room'] == "doublekid") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\" selected=\"\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                            }
                            else if ($_GET['room'] == "triple") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\" selected=\"\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                            }
                            else if ($_GET['room'] == "family") {
                                echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\" selected=\"\">Family</option></optgroup></select></div>";
                            }
                        }
                        else
                        {
                            echo "<div class=\"form-group\"><label>Tip Camera</label><select class=\"form-control\" name=\"room\"><optgroup label=\"Selecteaza una dintre camere\"><option value=\"Single\" selected=\"\">Single</option><option value=\"Double\">Double</option><option value=\"Double Twin\">Double Twin</option><option value=\"Double Kid\">Double Kid</option><option value=\"Triple\">Triple</option><option value=\"Family\">Family</option></optgroup></select></div>";
                        }

                    ?>

                    <div class="form-group"><label>Email</label><input class="form-control" type="email" name="email"></div>
                    <div class="form-group"><label>Telefon</label><input class="form-control" type="text" name="phone"></div>
                    <div class="form-group"><label>De pe </label><input class="form-control" type="date" name="depe"></div>
                    <div class="form-group"><label>Pana pe</label><input class="form-control" type="date" name="panape"></div>
                    <div class="form-group"><label>Alte adaugari</label><textarea class="form-control" name="adaugari"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="add_btn">Rezerva</button></div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Acasa</a></li>
                        <li><a href="#">Rezerva Camera</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright Hotel Atlas</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>