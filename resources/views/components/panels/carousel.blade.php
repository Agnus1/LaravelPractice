@props(['banners'])
<section class="bg-white">
    <div data-slick-carousel>
        @foreach($banners as $banner)
            <x-panels.banner :banner="$banner"/>
        @endforeach
    </div>
</section>
