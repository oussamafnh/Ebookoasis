@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to the eBookOasis Library</h1>
            <p class="hero-description">Discover and explore a wide collection of eBooks.</p>
        </div>
    </div>

    <div class="book-carousel">

        <div class="book-carousel-header">

            <h1 class="book-carousel-title">Newest Books</h1>
            <a href="/ebooks" class="book-carousel-more">
                More
            </a>
        </div>

        <div class="marquee">
            <ul class="marquee-content">
                @foreach ($ebooks as $ebook)

                    <li>
                        <div class="book-card">
                            <img src="{{$ebook->cover_image}}"
                                alt="The Great Gatsby Cover" class="book-cover">
                            <div class="book-details">
                                <h3 class="book-title">{{$ebook->title}}</h3>
                                <p class="book-author">{{$ebook->author}}</p>
                            </div>
                    </li>

                @endforeach
            </ul>
        </div>


    </div>

    <section class="testimonials">
        <h2 class="section-title">Testimonials</h2>
        <figure class="snip1533">
            <figcaption>
                <blockquote>
                    <p>If you do the job badly enough, sometimes you don't get asked to do it again.</p>
                </blockquote>
                <h3>Abdelilah Namil</h3>
                <h4>UM5</h4>
            </figcaption>
        </figure>
        <figure class="snip1533">
            <figcaption>
                <blockquote>
                    <p>I'm killing time while I wait for life to shower me with meaning and happiness.</p>
                </blockquote>
                <h3>Ursula Gurnmeister</h3>
                <h4>Facebook</h4>
            </figcaption>
        </figure>
        <figure class="snip1533">
            <figcaption>
                <blockquote>
                    <p>The only skills I have the patience to learn are those that have no real application in life. </p>
                </blockquote>
                <h3>Ingredia Nutrisha</h3>
                <h4>Twitter</h4>
            </figcaption>
        </figure>
    </section>

    <section class="about-us">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </section>



    <section class="footer">

        <p>EbooksOasis , 2023 &copy;  </p>

    </section>

    <script>
        const root = document.documentElement;
        const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
        const marqueeContent = document.querySelector("ul.marquee-content");

        root.style.setProperty("--marquee-elements", marqueeContent.children.length);

        for (let i = 0; i < marqueeElementsDisplayed+5; i++) {
            marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
        }
    </script>
@endsection
