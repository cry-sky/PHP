<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Card</title>

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
        </nav>
    </div>
    <div class="container">
        <?php if($cardItems !=NULL): ?>
            <form action="router.php" method="post">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $allPrice=0; foreach($cardItems as $item): ?>
                            <tr>
                                <th style="width: 50px" scope="row"><img style="width: 100%;" src=" <?= $item->info->image ?>" alt=""></th>
                                <td><?= $item->info->name ?></td>
                                <td>
                                    <input type="hidden" name="qty[id][]" value="<?= $item->id ?>">
                                    <input style="width: 40px;text-align: right;" type="number" name="qty[qty][]" min="1" value="<?= $item->qty ?>" step="1">
                                </td>
                                <td><?= $item->info->price ?></td>
                                <td><?= $item->qty*$item->info->price ?></td>
                                <td>
                                    <a href="router.php?action=remove&removeId=<?= $item->id ?>">Remove</a>
                                </td>
                            </tr>
                            
                        <?php  $allPrice+=$item->qty*$item->info->price; endforeach ?>
                        <tr>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"><?= $allPrice ?><span style="font-size: 18px;color: rgb(25, 156, 25);">$</span>
                            </td>
                            <td scope="col"><a href="router.php?action=removeAll" style="color: red">Remove all</a></td>
                        </tr>
                    </tbody>
                </table>              

        <?php else: ?>
            <div class="alert alert-info mb-5" role="alert">
                Your shoping cart is empty
            </div>    
        <?php endif ?>    
                <a href="./index.php" class="btn btn-primary mr-3">Continue Shoping</a>
                <a class="btn btn-warning mr-3" href='router.php?action=addNew'>Add new product</a>
                <input type="submit" class="btn btn-danger" name="Save" value="Save Changes">
                <a href="router.php?action=checkOut" class="btn btn-success float-right">Checkout</a>
            </form>
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
