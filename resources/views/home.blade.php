@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Fil d'actualité") }}</div>

                <div class="card-body">
                @foreach ($posts as $post)
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info">
                            <img class="rounded-circle" src="{{ url('uploads/users/avatar.png')}}" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2" style="margin-left: 15px;"><span class="d-block font-weight-bold name">{{ $post->user->name }}</span><span class="date text-black-50" style="font-size: 12px;">Publié le - {{ $post->created_at->format('Y-m-d') }}</span></div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text" style="font-size: 12px;">{{ $post->content }}</p>
                        </div>
                        <div class="mt-2">
                            <img src="{{ url('uploads/posts/'.$post->picture) }}" alt="image actuelle" style="max-height: 500px;" >
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                        </div>
                    </div>
                    <div class="bg-light p-2">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea" style="font-size: 12px; "></textarea></div>
                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
