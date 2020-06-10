<?php 
    session_start();

    require_once 'products.php';

    // session_destroy();
    
    // include_once ("card.php");
    // include_once ("fun.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pricing example · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="assets/css/pricing.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Woman Shoes</a>
            <a class="p-2 text-dark" href="#">Man Shoes</a>
            <a class="p-2 text-dark" href="#">Children</a>
            <a style="display: inline-block;text-decoration: none; position: relative; font-size: 24px;"
            href="card.php?action=list">&#128465; 
            <!-- <span style="position: absolute;top: 0;right: 0;width: 16px;height: 16px;border-radius: 50%;background-color: red; font-size: 13px; color: #fff; text-align: center; line-height: 13px;">
               <strong><?php
                   echo "$qty";
                ?></strong></span> -->
        </a>
        </nav>
    </div>

    <div class="container">
        <ul style="display: flex;justify-content: space-between; flex-wrap: wrap;">
            <?php foreach ($products as $product_id => $product) :?>
                <li class="mb-4 d-inline-block" style="width: 30%;box-shadow: 3px 2px 5px rgba(0, 0, 0,.1);">
                    <strong class="d-block w-100 text-center bg-info text-white"><?= $product['manufacturer'] ?></strong>
                    <div style="width: 95%; height:100px; background-color: silver;margin: 5px auto; display: flex;justify-content: center;padding: 35px 0;"><span>not img</span></div>
                    <p class="text-center"><?= $product['name']?></p>
                    <p class="text-center"><?= $product['price']?>
                        <span style="font-size: 16px;" class="text-success">$</span></p>
                    <a class="btn btn-success btn-sm mx-auto d-block w-50 my-2" href="card.php?action=add&product_id=<?= $product_id ?>">
                        Add to card
                    </a>
                </li>
            <?php endforeach?>
        </ul>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Team</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
            </div>
        </footer>

    </div>

</body>
</html>
