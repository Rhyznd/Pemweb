@extends('layouts.frontend')

@section('content')
<!--==================== HOME ====================-->
<section>
    <div class="swiper-container">
        <div>
            <!--========== ISLANDS 1 ==========-->
            <section class="islands">
                <img src="{{ asset('frontend/assets/img/borabora.jpg') }}" alt="" class="islands__bg" />
                <div class="bg__overlay">
                    <div class="islands__container container">
                        <div class="islands__data" style="z-index: 99; position: relative">
                            <h2 class="islands__subtitle">
                                Explore
                            </h2>
                            <h1 class="islands__title">
                                Wonderfull World
                            </h1>
                            <p class="islands__description">
                                It's the perfect time travel and
                                enjoy the <br />
                                beauty of the world.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>



<!--==================== POPULAR ====================-->
<section class="section" id="popular">
    <div class="container">
        <span class="section__subtitle" style="text-align: center">Best Choice</span>
        <h2 class="section__title" style="text-align: center">
            Popular Places
        </h2>

        <div class="popular__container swiper">
            <div class="swiper-wrapper">
                @foreach($travel_packages as $travel_package)
                <article class="popular__card swiper-slide">
                    <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                        <img src="{{ Storage::url($travel_package->galleries->first()->images) }}" alt=""
                            class="popular__img" />
                        <div class="popular__data">
                            <h2 class="popular__price">
                                <span>Rp. </span>{{ number_format($travel_package->price,2) }}
                            </h2>
                            <h3 class="popular__title">
                                {{ $travel_package->location}}
                            </h3>
                            <p class="popular__description">{{ $travel_package->type }}</p>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>

            <div class="swiper-button-next">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="bx bx-chevron-left"></i>
            </div>
        </div>
    </div>
</section>

<!-- blog -->
<section class="blog section" id="blog">
    <div class="blog__container container">
        <span class="section__subtitle" style="text-align: center">Our Blog</span>
        <h2 class="section__title" style="text-align: center">
            The Best Trip For You
        </h2>

        <div class="blog__content grid">
            @foreach($blogs as $blog)
            <article class="blog__card">
                <div class="blog__image">
                    <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                    <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </div>

                <div class="blog__data">
                    <h2 class="blog__title">
                        {{ $blog->title }}
                    </h2>
                    <p class="blog__description">
                        {{ $blog->excerpt }}
                    </p>

                    <div class="blog__footer">
                        <div class="blog__reaction">
                            {{ date('d M Y', strtotime($blog->created_at)) }}
                        </div>
                        <div class="blog__reaction">
                            <i class="bx bx-show"></i>
                            <span>{{ $blog->reads }}</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection