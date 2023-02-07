<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light shadow">
<div class="container">
<a class="navbar-brand" href="#"><img src="https://www.amaans.lk/wp-content/uploads/2022/05/AMAANS-1-Copy-1.png" style="padding-left: 15px; width: 195px; height: 60px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Servies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        
            

            <div class="container-fluid">
                
                
  </div>
            <div class="d-flex align-items-center ">

            <?php
                if (isset($this->session->userdata['logged_in'])) {
                    $username = ($this->session->userdata['logged_in']['username']);
                    ?>
      <!-- Icon -->
      <a class="text-reset me-3 float-end" href="##">
        <i class="fas fa-shopping-cart fa-lg"></i>
        
      </a>
      <a class="text-reset float-end" href="##">
        
        <li class="nav-item dropdown">
                
                    <?php
                    echo "<div class=\"dropdown \">
                    
                            <a href=\"#\" class=\"nav-link dropdown-toggle\" role=\"button\"  data-toggle=\"dropdown\" >";
                    echo "<i class='fa-solid fa-user fa-lg'></i>";
                                echo "  " . $username;
                                echo "<span class=\"caret\"></span>
                            </a>
                            <div class=\"dropdown-menu\" >
                                <a class=\"dropdown-item\" href=\"logout\">Logout</a>
                                <a class=\"dropdown-item\" href=\" ";
                                echo base_url().'user_authentication';
                                echo  "\">Dashboard</a>  
                            </ul>
                        </div>";
                }
                ?>
            </li>
      </a>
      
        </ul>
    </div>
    </div>   
</nav>