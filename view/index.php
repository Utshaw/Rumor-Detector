<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Rumor Detector</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/landing-page.css">

    <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />

    <link rel="stylesheet" href="../css/modal-modification.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        function castVote( newsID, userID)
        {   
          console.log(newsID + " - " + userID);
          if(userID == -1) {
            window.location.href = "./login.php?message=loginfirst"; 
          }else{

            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", theUrl, true); // true for asynchronous 
            xmlHttp.send(null);

          }

        }
    </script>

</head>

<body>



    <?php require_once "header.php" ?>

    <?php require_once "../controller/news_controller.php" ?>



    <div class="content">
    <h2>Top Fake News</h1>

    <!-- content changes on each page -->
    <div class="container-fluid" >

    <table class="table" style="width: 100%">
  <thead>
    <tr>
      <th scope="col" colspan=3>News</th>
      <th scope="col" >Fake news probability</th>
      <th scope="col" colspan=2>Cast your vote</th>
    </tr>
  </thead>
  <tbody>



  <?php 


  

        foreach ($news

            as $single_news) :
            $percentageVal = -1;
            if($single_news["COUNT(News_Authenticate)"] != 0){
                $percentageVal = ($single_news["IFNULL(SUM(News_Authenticate),0)"] /  $single_news["COUNT(News_Authenticate)"] * 100);
            }else{
                $percentageVal = -1;
            }
            
            ?>


    <tr>
      <th scope="row" colspan=3> <?=$single_news["News"]?> </th>
      <td <?php if($percentageVal >= 0 && $percentageVal <= 50 ): ?> <?echo 'style="background-color:red ; color: white"'?>  <? else: echo 'style="background-color:green ; color: white"'?> <?php  endif;?> ><?php if ($single_news["COUNT(News_Authenticate)"] != 0) : echo ($single_news["IFNULL(SUM(News_Authenticate),0)"] /  $single_news["COUNT(News_Authenticate)"] * 100) . "%" ; else: echo "N/A";  endif; ?> </td>
      <td colspan=2>  <a href="#" onclick="castVote(<?=$single_news["News_ID"]?>, <?php if(isset($session_user_id)): echo $session_user_id;  else: echo "-1"; endif;?>)"><i class="fa fa-close" style="font-size:24px; color: red"></i></a> <i class="fa fa-check" style="font-size:24px;color:green"></i>
    </tr>

    <?php endforeach; ?>


  



  </tbody>
</table>

    </div>
</div>



    <!-- Modals -->
    <div class="modal fade bd-example-modal-lg" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle</th>
                                    <th>Model</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Cost</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cart_output_modal"> </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Continue Shopping</button><a href="checkout.php" class="btn btn-primary">Proceed to checkout</a></div>
            </div>
        </div>
    </div>



    <!-- PROMO Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="promo_header">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body" id="promo_body">
                    <p>Some text in the modal.</p>
                </div>
                <img id="promo_car" src="../images/sample_car.jpg">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- <?php require_once "../controller/bus_search_controller.php"; ?> -->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <!-- <script type="text/javascript" src="../js/script.js"></script> -->


</body>

</html>
