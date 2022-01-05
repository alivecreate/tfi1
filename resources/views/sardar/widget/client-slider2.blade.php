<!doctype html>
<html lang="en">
<head>

</head>
<body>
    
<section>
      <div class="col-lg-12 wow fadeInDown">
        <div class="heading-line">
          <div class="owl-carousel owl-theme our-clients">

            <?php
                $clientArrs = array_chunk(json_decode(json_encode($clients), true), 2);
            ?>

            @foreach($clientArrs as $i => $clientArr)
            <div class="item">
              <div class="row">
                @foreach($clientArr as $client)
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="logo-boder"><img src="{{url('web')}}/media/lg/{{$client['logo']}}" alt=""  title=""  class="img-fluid"></div>
                    </div>
                @endforeach
              </div>
            </div>
            @endforeach
            

          </div>
        </div>
      </div>
</section>


<script src="{{url('tfi')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{url('tfi')}}/assets/js/jquery.min.js"></script>
<script src="{{url('tfi')}}/assets/js/mainnav.js"></script>
<script src="{{url('tfi')}}/assets/js/fancy-box/jquery-3.3.1.min.js"></script>
<script src="{{url('tfi')}}/assets/js/fancy-box/jquery.fancybox.min.js"></script>
<script src="{{url('tfi')}}/assets/js/owlcarousel/jquery.min.js"></script>
<script src="{{url('tfi')}}/assets/js/owlcarousel/owl.carousel.js"></script>
<script src="{{url('tfi')}}/assets/js/wow/wow.js"></script>
<script src="{{url('tfi')}}/assets/js/wow/page.js"></script>

</body>
</html>
