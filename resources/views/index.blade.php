@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
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
        </div>

@endforeach
</div>
</div>
</div>
@endsection
