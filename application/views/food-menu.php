<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Mran Supermarket</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

         <!-- Font -->
        <!-- Stylesheets -->      
        <link href="<?php echo  base_url('/assets/fonts/ionicons.css');?>" rel="stylesheet">
    
        <!-- Stylesheets -->
        <link href="<?php echo  base_url('/assets/plugin-frameworks/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo  base_url('/assets/common/styles.css');?>" rel="stylesheet">

</head>

<body>
<?php $this->load->view('menu.php'); ?>
<div class="container ">
    <div class="row">
        <div class="col-12 ">
        
          
<section>
        <div >
                <div class="heading"><br>
                        
                        <h2>Products List</h2>
                       
                </div>

                <div class="row">
                        <div class="col-sm-12">
                                <ul class="selecton brdr-b-primary mb-70">
                                        <!-- <li><a class="active" href="#" data-select="*"><b>ALL</b></a></li> -->
                                        <!-- <li><a href="#" class="active" data-select="pizza"><b>PIZZA</b></a></li>
                                        <li><a href="#" data-select="pasta"><b>PASTA</b></a></li>
                                        <li><a href="#" data-select="salads"><b>SALADS</b></a></li>
                                        <li><a href="#" data-select="deserts"><b>DESERTS</b></a></li> -->
                                        <?php
                                       // print_r($Pizza);
                                        $i=1;
                                                foreach ($category_heading as $key => $value) {
                                                        if($i == 1){
                                                                echo "<li><a href='#' class='active'  data-select='$value'><b>$value</b></a></li>";
                                                                $i++;
                                                        }else{
                                                                echo "<li><a href='#'  data-select='$value'><b>$value</b></a></li>";     
                                                        }
                                                        
                                                }
                                        
                                        ?>
                                </ul>
                        </div><!--col-sm-12-->
                </div><!--row-->

                <div class="row">
                <?php
                        foreach ($category_heading as $key => $value) {
                                
                                        foreach ($$value as $key => $product) {
                                                //print_r($product);
                                                
                                        echo "<div class='col-md-6 food-menu $value'>";
                                                echo "<div class='sided-90x mb-30'>";
                                                echo "<div class='s-left'><img class='br-3' src='". base_url("assets/images/food/$product->product_image") ."' alt='Menu Image'></div>";
                                                echo "<div>";
                                                        echo "<h5 class='mb-10'><b>$product->product_title</b><b class='color-primary float-right'>$product->currency: $product->price</b></h5>";
                                                        echo "<p class='text-justify'>";
                                                                echo $product->product_description;
                                                                if(!empty($product->items_details)){
                                                                       echo  "<h5>ingredients</h5>";
                                                                         foreach ($product->items_details as $key_product_item => $value_product_item) {
                                                                                echo "<span class='badge badge-dark mx-1 my-1' style='font-size:12px;'>$value_product_item->item_title</span>";
                                                                                 
                                                                         }
                                                                 }
                                                                echo "<br><input type='number' value='1' name='quantity' class='quantity form-control'>";
                                                        echo "</p>";
                                                        
                                                        
                                                        echo "<a href='" .  base_url('/index.php/user/selectUser/' . $product->product_id) .'/1'. "' class='btn btn-info link d-block my-4'>Select</a>";
                                                                
                                                        
                                                echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        }
                               
                        }
                                        
                ?>


                        
                </div><!-- row -->

                <!-- <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6> -->
        </div><!-- container -->
</section>
        </div>
    </div>
</div>




<?php $this->load->view('footer') ?>
<script>
// unanonymous function ready
       $(document).ready(function()
       {
              
               $('.quantity').on('click',function(){
              //this works when clicking the up and down arrow of the tab
                var quantity = $(this).val();
                // clicked number is put into the variable quantity
                var linkAddress = $(this).closest('.food-menu').find('.link');
                /*this tells that to go to the top of that particular div class code-
               ("<div class='col-md-6 food-menu $value'>")
               and to find the link that is the SELECT BUTTON code-
              (echo "<a href='" .  base_url('/index.php/user/selectUser/' . $product->product_id) .'/1'. 
                       "' class='btn btn-info link'>Select</a>")
                       and assign it into quantity link address variable
                       */
                 var href = linkAddress.attr('href');
                 // take the value in the link and assign it into href variable
                       var splittedUrl = href.split("/");
                       // this is the string varibale which is being seperated by "/" and is assigned to splitted variable
                       console.log(splittedUrl);
                       var lastIndex = splittedUrl.length - 1;
                       /* this is an array , since it is a local host, the link path is static what if it is hosted to the 
                       www the length of the pach varies so that the quantity number is at the last index in the variable
                       so the [array_length {splitted url}] - 1 gives us the last index where the quantity is and 
                        it is assigned to last index variable
                       
                       */
                       splittedUrl[lastIndex] = quantity;
                       // the new quantity is assigned to the last index of the array splitted url.
                       var newHref = splittedUrl.join('/');
                       /* the ARRAY IS BEING CONVERTED TO A STRING AGAIN BY USING JOIN ALONG WITH 
                       THE SPLITTED URL ARRAY AND IS ASSIGNED TO NEWHREF VARIABLE.
                       */
                       linkAddress.attr('href',newHref);
                       // THIS SPECIFY THAT THE CHANGED URL IS AGAIN REPLACED TO LINK ADDRESS VARIABLE
                       //console.log(newHref);
                //        href = href+'/'+quantity;
                //        linkAddress.attr('href',href);
                //        console.log(linkAddress.attr('href'));
               });
        });
</script>
</body>
</html>