<div id="mySlide" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#mySlide" data-slide-to="0" class="active"></li>
    <li data-target="#mySlide" data-slide-to="1"></li>
    <li data-target="#mySlide" data-slide-to="2"></li>
    <li data-target="#mySlide" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $img . 'images1.jpg'; ?>" alt="picture 01">
      <div class="carousel-caption">
        <h1>Servers</h1>
        <p>Hunger for Sciences</p>
        <div class="btn btn-primary">Read More</div>
        <div class="btn btn-danger">Buy Now</div>
      </div>
    </div>
    <div class="item">
    <img src="<?php echo $img . 'images2.jpg'; ?>" alt="picture 02">
      <div class="carousel-caption">
      Picture 02
      </div>
    </div>

    <div class="item">
    <img src="<?php echo $img . 'images3.jpg' ;?>" alt="picture 03">
      <div class="carousel-caption">
      Picture 03
      </div>
    </div>

    <div class="item">
    <img src="<?php echo $img . 'images4.jpg' ;?>" alt="picture 04">
      <div class="carousel-caption">
      Picture 04
      </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#mySlide" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#mySlide" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>