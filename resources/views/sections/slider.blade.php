<!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->


        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            
@if(isset($slider) && $slider->count())         
        @foreach($slider as $slide)
            <div class="item {{ !isset($mainSliderStarted) ? 'active' : '' }}">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{ Imagepath($slide->image) }}/w=1800&h=1200');"></div>
                <div class="carousel-caption">
                    <h1 class="text-center">{{ $slide->caption }}</h1>
                    <h5 class="text-center">{{ $slide->secondary_caption }}</h5>                    
                </div>
            </div>
                  <?php $mainSliderStarted=true; ?>
            @endforeach

@else 

            <div class="item active">
                <div class="fill" style="background-image:url('{{ Imagepath($sliderImage) }}/w=1800&h=1200');"></div>
                <div class="carousel-caption">
                    <h1 class="text-center">{{ $sliderCaption}}</h1>
                </div>
            </div>

@endif
        </div>


    @if(isset($slider) && $slider->count()>1)
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <i class="glyphicon glyphicon-chevron-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
   <i class="glyphicon glyphicon-chevron-right"></i>
    <span class="sr-only">Next</span>
  </a>
  @endif

    </header>