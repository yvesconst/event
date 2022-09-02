@extends('layouts.app')

<style>
    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .padding {
        padding: 5rem;
    }

    .card {
        background: #fff;
        border-width: 0;
        border-radius: 0.25rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        margin-bottom: 1.5rem;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(19, 24, 44, 0.125);
        border-radius: 0.25rem;
    }

    .list-item {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
    }

    .list-item.block .media {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .list-item.block .list-content {
        padding: 1rem;
    }

    .w-40 {
        width: 40px !important;
        height: 40px !important;
    }

    .avatar {
        position: relative;
        line-height: 1;
        border-radius: 500px;
        white-space: nowrap;
        font-weight: 700;
        border-radius: 100%;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        border-radius: 500px;
        box-shadow: 0 5px 10px 0 rgba(50, 50, 50, 0.15);
    }

    .avatar img {
        border-radius: inherit;
        width: 100%;
    }

    .gd-primary {
        color: #fff;
        border: none;
        background: #448bff linear-gradient(45deg, #448bff, #44e9ff);
    }

    .flex {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .text-color {
        color: #5e676f;
    }

    .text-sm {
        font-size: 0.825rem;
    }

    .h-1x {
        height: 1.25rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .no-wrap {
        white-space: nowrap;
    }

    .list-row .list-item {
        -ms-flex-direction: row;
        flex-direction: row;
        -ms-flex-align: center;
        align-items: center;
        padding: 0.75rem 0.625rem;
    }

    .list-item {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
    }

    .list-row .list-item > * {
        padding-left: 0.625rem;
        padding-right: 0.625rem;
    }

    .dropdown {
        position: relative;
    }

    a:focus,
    a:hover {
        text-decoration: none;
    }

    list-item {
        background: white;
        border-bottom: solid 1px lightgray;
    }

    #posts-list.has-comments div.no-comments {
        display: none;
    }
</style>

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
                            <input type="hidden" id="{{ 'post-' . $post->id }}">
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
                    <div class="bg-white" id="posts-list">
                        <div class="container-fluid d-flex justify-content-center">
                        <div class="list list-row card no-comments" id="sortable" data-sortable-id="0" aria-dropeffect="move">
                        @foreach ($post->commentaire as $com)
                            <div class="list-item" data-id="9" data-item-sortable-id="{{ $com->id}}" draggable="true" role="option" aria-grabbed="false" style="border-bottom: solid 1px lightgray;">
                                <div><a href="#" data-abc="true"><span class="w-40 avatar gd-info"><img src="https://img.icons8.com/bubbles/24/000000/user.png" alt="."></span></a></div>
                                <div class="flex">
                                    <a href="#" class="item-author text-color" data-abc="true">{{ $com->user->name }}</a>
                                    <div class="item-except text-muted">{{ $com->content}}</div>
                                </div>
                                <div class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">{{ $com->created_at->format('Y-m-d') }}</div>
                                </div>
                                <div>
                                    <div class="item-action dropdown">
                                        <a href="#" data-toggle="dropdown" class="text-muted" data-abc="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                            <a class="dropdown-item edit" data-abc="true">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item trash" data-abc="true">Delete item</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="d-flex flex-row fs-12">
                            <div class="like p-2 cursor"><a href="/post/like"><i class="fa fa-thumbs-o-up"></i></a><span class="ml-1">  {{ $post->like->count()}}</span></div>
                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">  {{ $post->commentaire->count()}}</span></div>
                        </div>
                    </div>
                    <div class="bg-light p-2">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea" style="font-size: 12px;" id="{{ 'contentpost-' . $post->id }}"></textarea></div>
                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none submit-form" type="button" id="{{ 'submitbtn-' . $post->id }}">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button" id="">Cancel</button></div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function parseDisplayDate(date) {
        date = (date instanceof Date? date : new Date( Date.parse(date) ) );
        var display = date.getDate() + ' ' +
                        ['January', 'February', 'March',
                        'April', 'May', 'June', 'July',
                        'August', 'September', 'October',
                        'November', 'December'][date.getMonth()] + ' ' +
                        date.getFullYear();
        return display;
    }

    function createComment(data) {
        var html = '<div class="list-item" data-id="9" data-item-sortable-id="'+ data.id +'" draggable="true" role="option" aria-grabbed="false" style="border-bottom: solid 1px lightgray;">' +
                '<div><a href="#" data-abc="true"><span class="w-40 avatar gd-info"><img src="https://img.icons8.com/bubbles/24/000000/user.png" alt="."></span></a></div>' +
                '<div class="flex"><a href="#" class="item-author text-color" data-abc="true">' + '{{ Auth::user()->name }}' +
                '</a> <div class="item-except text-muted">' + data.content + '</div></div><div class="no-wrap">' +
                '<div class="item-date text-muted text-sm d-none d-md-block">' + parseDisplayDate(data.created_at) +
                '</div></div><div><div class="item-action dropdown"><a href="#" data-toggle="dropdown" class="text-muted" data-abc="true">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">' +
                '<circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a>' +
                '<div class="dropdown-menu dropdown-menu-right bg-black" role="menu"><a class="dropdown-item edit" data-abc="true">Edit</a><div class="dropdown-divider"></div><a class="dropdown-item trash" data-abc="true">Delete item</a></div></div></div></div>';

        return html;
    }
    function displayComment(data) {
        var commentHtml = createComment(data);
        var commentEl = $(commentHtml);
        commentEl.hide();
        var postsList = $('#sortable');
        postsList.addClass('has-comments');
        postsList.append(commentEl);
        commentEl.slideDown();
    }
    function postSuccess(data, textStatus, jqXHR) {
        $('#contentpost-' + data.post_id).val("");
        displayComment(data);
        console.log("yes");
        console.log(data);
    }

    function postError(jqXHR, textStatus, errorThrown) {
        console.log("no");
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    }

    function postComment(data) {
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '/comments',
            data: data,
            headers: {
            'X-Requested-With': 'XMLHttpRequest'
            },
            success: postSuccess,
            error: postError
        });
    }

    function handleSubmit() {
        var btn = $(this);
        let id = btn.attr("id").split('-')[1];
        console.log(id);
        var data = {
            "content": $('#contentpost-' + id).val(),
            "post_id": id,
            "_token": "{{ csrf_token() }}"
        };

        postComment(data);

        return false;
    }

    function likeComment(data) {
        console.log(data);
        $.ajax({
            type: 'POST',
            url: '/comments',
            data: data,
            headers: {
            'X-Requested-With': 'XMLHttpRequest'
            },
            success: postSuccess,
            error: postError
        });
    }

    $(function() {
        $('.submit-form').click(handleSubmit);
        $('.submit-form').click(likeComment);
    });
</script>
@endsection
