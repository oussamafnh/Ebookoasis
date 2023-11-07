@extends('layouts.app')

@section('content')
    <style>
        .bi-heart {
            font-size: 18px;
            color: gray;
        }

        .bi-heart-fill {
            font-size: 18px;
            color: red;
        }
    </style>



    <link rel="stylesheet" href="{{ asset('css/ebook-show.css') }}">
    <div class="sec1">
        <div class="ebook-cover">
            <img src="{{ $ebook->cover_image }}" alt="{{ $ebook->title }} Cover">
            <h2 class="ebook-title">{{ $ebook->title }}</h2>
            <p class="ebook-author">By {{ $ebook->author }}</p>
        </div>
        <div class="infos">
            <div class="ebook-info">
                <p class="ebook-published">this Book was Published at {{ $ebook->published_at }}</p>
                <p class="ebook-description">{{ $ebook->description }}</p>
            </div>


            <div class="ebook-actions-section">
                @auth
                    <a href="{{ $ebook->file_path }}" class="btn btn-primary" target="_blank">Read</a>
                @else
                    <button href="" class="btn btn-secondary" disabled>Read</button>
                @endauth
                {{-- ////////////////////////////////////////////////////////////////////////////////////// --}}


                @auth
                    @if (auth()->user() && auth()->user()->role === 1)
                        <a class=" " disabled>{{ $likes }} &nbsp;&nbsp;<i class="bi bi-heart"></i></a>
                    @else
                        @if (count($liketrue) > 0)
                            <form action="{{ route('ebooks.like', $ebook) }}" method="POST" class="like-form">
                                @csrf
                                <button style="background-color: rgb(255, 255, 255); border: none"><a type="submit"
                                        class="">{{ $likes }} &nbsp;&nbsp;<i class="bi bi-heart-fill"></i>
                                    </a></button>

                            </form>
                        @else
                            <form action="{{ route('ebooks.like', $ebook) }}" method="POST" class="like-form">
                                @csrf
                                <button style="background-color: rgb(255, 255, 255); border: none"><a type="submit"
                                        class="">{{ $likes }} &nbsp;&nbsp;<i class="bi bi-heart"></i>
                                    </a></button>

                            </form>
                        @endif
                    @endif
                @else
                    <a class=" " disabled>{{ $likes }} &nbsp;&nbsp;<i class="bi bi-heart"></i></a>
                @endauth
            </div>



            <br>
            <br>
            <div class="typecomment-section">
                @auth
                    @if (auth()->user() && auth()->user()->role === 1)
                    @else
                        <form class="comment-form" action="{{ route('ebooks.reviews.store', $ebook) }}" method="POST">
                            @csrf
                            <input type="hidden" name="ebook_id" value="{{ $ebook->id }}">
                            <input name="content" type="text" placeholder="Leave a comment/review" required></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                @else
                    <p>Please <a href="{{ route('users.showLoginForm') }}">log in</a> to leave a comment/review.</p>
                @endauth
            </div>
            <div class="comments-section">
                <h3 class="section-title">Comments & Reviews :</h3>
                @if ($comments->count() > 0)
                    <ul class="comments-list">
                        @foreach ($comments as $comment)
                            <li class="comment">
                                <div class="comment-info">
                                    <div class="thecmnt">
                                        <p> <span class="comment-author">{{ $comment->user->name }}</span> :
                                            {{ $comment->review_text }}</p>
                                    </div>
                                    <span class="comment-date">{{ $comment->created_at->format('M d, Y') }}</span>
                                </div>
                                <p class="comment-text">{{ $comment->content }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No comments/reviews yet.</p>
                @endif
            </div>



        </div>
    </div>
    <script>
        // $(".bi-heart").click(function() {
        //     console.log('bi-heart');
        //     $(this).addClass("bi-heart-fill");


        // setTimeout(function() {
        //     $(".bi-heart").removeClass("bi-heart");
        // }, 500);
        // });
    </script>
@endsection
