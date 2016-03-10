<div class="recent-works">
				<div class="container">
					<h3><b>Pelatihan Jogja Science Training</b></h3>
					<div id="owl-demo" class="owl-carousel owl-theme">

          <?php
          if ($pelatihan== NULL) {
           echo 'belum ada pelatihan';
          }
          else
          {
            foreach ($pelatihan as $data) { ?>
                <a href="<?php echo site_url('home/detail_pelatihan'.'/'.$data->id) ?>"><div class="item" style="background: white;">
                <img src="<?php echo base_url('assets/images/pelatihan'.'/'.$data->url) ?>" style=" display: block;width: 100%; height: 200px;" width="100px" height="100px">
                  <h5 align="center"><b><?php echo $data->nama ?> </b></h5>
                </div>
                </a>
            <?php
            }
          }
           ?>
				
					</div>
					 
				</div>
			</div>
			<script>
				$(document).ready(function() {
 
  var owl = $("#owl-demo");
 
  owl.owlCarousel({
      items : 10, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
  $(".play").click(function(){
    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function(){
    owl.trigger('owl.stop');
  })
 
});
			</script>