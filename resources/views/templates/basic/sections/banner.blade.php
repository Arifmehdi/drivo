@php
$bannerContent = @getContent('banner.content', true)->data_values;
@endphp

<section class="banner-section bg-img"
    data-background-image="{{ frontendImage('banner', @$bannerContent->background_image) }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-10">
                <div class="banner-content text-center">
                    <h1 class="banner-content__title wow pulse">
                        {{ __(@$bannerContent->heading) }}
                    </h1>
                    <div class="banner-content__buttons mt-4">
                        <a href="{{ @$bannerContent->button_one_link }}" class="btn btn--base  wow fadeInLeft">
                            @php echo $bannerContent->button_one_icon @endphp
                            <span class="text">{{ __(@$bannerContent->button_one_text) }}</span>
                        </a>
                        <a href="{{ @$bannerContent->button_two_link }}" class="btn btn--base-two  wow driver-app-btn fadeInRight">
                            @php echo $bannerContent->button_two_icon @endphp
                            <span class="text">{{ __(@$bannerContent->button_two_text) }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10">
                <div class="banner-thumb wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <img src="{{ frontendImage('banner', @$bannerContent->image) }}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .driver-app-btn {
    border: 2px solid #000; /* black border */
    color: #fff; /* text color */
    background-color: transparent; /* keep it transparent */
    /*padding: 8px 15px;*/
    /*border-radius: 5px;*/
    /*transition: all 0.3s ease;*/
    /*text-decoration: none;*/
    /*display: inline-block;*/
}

.driver-app-btn:hover {
    background-color: #000; /* fill black on hover */
    color: #fff;
}

</style>