<header id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>images/slider/sliders1.png');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="carousel-item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>images/slider/sliders2.png');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="carousel-item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo base_url(); ?>images/slider/sliders3.png');"></div>
            <div class="carousel-caption">

            </div>
        </div>

        <button style="background-color: transparent; border: 0;" class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button     style ="background-color: transparent;border: 0;" class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>