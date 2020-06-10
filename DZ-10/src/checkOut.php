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
    <div class="container mb-5">
        <?php if($checkOut !=NULL): ?>
            <form action="router.php" method="post">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Category</th>
                            <th scope="col">Color</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $allPrice=0; foreach($checkOut as $item): ?>
                            <tr>
                                <th style="width: 50px" scope="row"><img style="width: 100%;" src=" <?= $item->info->image ?>" alt=""></th>
                                <td><?= $item->info->name ?></td>
                                <td><?= $item->info->brand ?></td>
                                <td><?= $item->info->category ?></td>
                                <td><?= $item->info->color ?></td>
                                <td><?= $item->qty ?></td>
                                <td><?= $item->info->price ?></td>
                                <td><?= $item->qty*$item->info->price ?></td>

                                <td>

                                </td>
                            </tr>
                            
                        <?php  $allPrice+=$item->qty*$item->info->price; endforeach ?>
                    </tbody>
                </table>              

        <?php else: ?>
            <div class="alert alert-info mb-5" role="alert">
                Your shoping cart is empty
            </div>    
        <?php endif ?>    
                <a href="router.php?action=list" class="btn btn-primary mr-3">Back</a>
                <a href="router.php?action=buy" class="btn btn-success float-right ml-3">Buy</a>
                <span class="float-right m-2" style="font-size: 18px"><span class="text-secondary mr-1">Total sum: </span> <?= $allPrice ?><span style="font-size: 18px;color: rgb(25, 156, 25);">$</span></span>
            </form>
    </div>

</body>
</html>
