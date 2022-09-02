@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="row flex-lg-nowrap">
    <div class="col mb-3">
    <div class="e-panel card">
        <div class="card-body">
        <div class="card-title">
            <a class="btn btn-primary" href="{{ route('festivals.index') }}"> Back</a>
        </div>
        <div class="e-table">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

	@if (isset($post))

	<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

		@method('PUT')

	@else

	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

	@endif

    @csrf


        <div class="row">
            <div class="form-group row">
                <label for="title">Titre</label>
                <input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post">
            </div>
            <div class="form-group row">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>
            </div>
            <div class="form-group row">

                    <label for="festival_id">Festivals</label>
                    <select id="festival_id" name="festival_id" value="{{ isset($post->festival) ? $post->festival->id : old('festival') }}">
                        @foreach ($festivals as $festival)
                        <option value="{{ $festival->id}}"> {{ $festival->name}} </option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group row" style="margin-top: 15px;">
                @if(isset($post->picture))
                <p>
                    <span>Image actuelle</span><br/>
                    <img src="{{ url('uploads/posts/'.$post->picture) }}" alt="image actuelle" style="max-height: 200px;" >
                </p>
                @endif
                <label for="picture">Image</label>
                <input input type="file" name="picture" id="picture">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-3"></div>
</div>
@endsection
