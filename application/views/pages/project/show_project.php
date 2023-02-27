<section>
    <div class="well well-sm">
      <div class="container" style="margin-top: 30px;">
        <div class="profile-head" style="background-color: #6C7A89">
            
          <div class="col-md-4 col-sm-6">
            <div id="map" style="width:40%x;height:400px;background:White">      
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7XTpRX5A-G83XNzV_7ORF-OYKfepSD4g&callback=myOptions"></script>
                <script>
                    var myOptions = {
                        zoom: 14,
                        center: new google.maps.LatLng(55.910213, -3.319792)
                    }

                    var geocoder = new google.maps.Geocoder;
                    var infowindow = new google.maps.InfoWindow;

                    var map = new google.maps.Map(document.getElementById("map"), myOptions);

                    var marker;

                    function placeMarker(location) {
                        geocoder = new google.maps.Geocoder();

                        if (marker) {
                            marker.setPosition(location);
                        } else {
                            marker = new google.maps.Marker({
                                position: location,
                                map: map
                            });
                        }

                        geocoder.geocode({
                            'location': location
                        }, function(results) {
                            if (results[1]) {
                                map.setZoom(15);
                                infowindow.setContent(results[1].formatted_address);
                                infowindow.open(map, marker);
                                var addresslocaion = results[1].formatted_address;
                                //Note  when extracting the location for database input use the variable "addresslocation"
                                
                                
                                
                                //Splits up location string and applys the vaules to hidden html inputs
                                var getcode = addresslocaion.match('[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}');
                                var postcode = getcode[0];
                                var removePost = addresslocaion.replace(postcode,'');
                                var values = removePost.split(',');
                                var streetname = values[0];
                                var city = values[1];
                                var country = values[2];
                                
                                 $("#loca1").val(streetname);
                                 $("#loca2").val(city);
                                 $("#loca3").val(country);
                                 $("#loca4").val(postcode);
                                
                                
                                
                                
                            }
                        });



                    }

                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng)
                    });
                </script>

            <h6>Jenifer Smith</h6>
          </div>
          <!--col-md-4 col-sm-4 col-xs-12 close-->
    </div>
    
    
          <div class="col-md8">
            <h5 id="h01"><?php echo $info[0]['title']; ?> </h5>
            <h2 id="h01" style="color: white;">Project Owner:  </h2>
            <p id="p01"> <?php echo $info[0]['firstname'] ?> <?php echo $info[0]['lastname']?></p>
            <p><?php echo $info[0]['email'];?></p>
            <!-- <h2 id="h01" style="color: white;">Description: </h2>
            <p> <?php echo $info[0]['description']; ?></p> -->
            <br>
            <ul>
              <li><span class="glyphicon glyphicon-calendar"></span> <?php echo $info[0]['startDate']; ?> - <?php echo $info[0]['endDate'];?></li>
              <li><span class="glyphicon glyphicon-map-marker"></span> Edinburgh</li>
              <li><span class="glyphicon glyphicon-ok-circle"></span> <?php if($info[0]['completed'] == 0){echo "Active";}else{echo "Completed";}?></li>
              <li><span class="glyphicon glyphicon-ok-sign"></span> On Schedule </li>
              <li><span class="glyphicon glyphicon-gbp"></span> Budget: <?php echo $info[0]['budget']; ?></li>

              <?php 
              if($this->session->accountID == $info[0]['managerID']) 
              {?>
               <a href="<?php echo site_url ('edit_project/'.$info[0]['projectID'] ) ?>"> <button type="button" class="btn btn-warning" >Edit Project</button></a>
              <?php 
              }else{ ?>
				<a href="<?php echo site_url('interest_project/'.$info[0]['projectID'] ) ?>"> <button type="button" class="btn btn-warning" >Show Interest</button></a>
             <?php } ?>



              <?php 
              if($this->session->accountID == $info[0]['managerID']) 
              {?>
               <a href="<?php echo base_url() ; echo "index.php/edit_tasks/"; echo $info[0]['projectID'];?>"> <button type="button" class="btn btn-warning" >Edit Tasks</button></a>
              <?php 
              } ?>

           
              

              
            </ul>


          </div>
          <!--col-md-8 col-sm-8 col-xs-12 close-->
    
</div>
        
        <!--profile-head close-->
    
   <?php

 

   if($tasks == null)
   {
      echo "This project has no tasks";
   }
   else
   {
   $i = -1; 
   foreach ($tasks as $task) {
      $i++;
       ?>

          <div class="panel panel-default">
            <div class="panel-heading"> 

              <h3 class="panel-title"> <?php echo $task['title']; ?></h3>
            </div>
            <div class="panel-body">
              <h3><?php echo $task['startDate']; ?> - <?php echo $task['endDate'];?></h3>

              <br>
         <div class="row">    
        <?php 
        $j = -1;
          $rolesNew;
          $noPeople;

          if(empty($roles[$i])    )
            {
               $rolesNew[$i] = $rolesback[$i];
               $noPeople=true;
            }else{
              $rolesNew[$i] = $roles[$i];
              $noPeople=false;
            }
          foreach ($rolesNew[$i] as $role) {
            $j++;
             ?>



            
                <div class="col-sm-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading"> 
                       <h3 class="panel-title"><?php echo $role['roleName'];?></h3>
                     </div>
                     <?php if(!$noPeople) { ?>
                    <div class="panel-body">
                      
                      
                        <h1> <?php echo $role['firstname']; echo " "; echo $role['lastname']; ?> </h1>
                       <!-- <img src="pictures/Profile-pic.jpg" alt="..."> -->
                          <div class="caption">
                            
                            <p>Software Engineer</p>
                            <?php 
                            foreach($skills[$i][$j] as $skill)
                              {  ?>
                                <p><?php echo $skill['skillName']; ?></p>
                              <?php 
                            } ?>
                            <p><a href="<?php echo site_url() ?>/find_profile/<?php echo $role['username']?>" class="btn btn-primary" role="button">Profile</a> </p>
                          </div>
                      
                    </div>
                    <?php  } ?>
                  </div>
                </div>
             
          <?php
        
          }
         ?>     

             </div>
          </div>


       <?php
     }
     } 
    ?>


  
      
    



    
    

    

  </section>
