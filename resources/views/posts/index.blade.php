@extends('layouts.app')
@section("title", "Tous les posts")
@section("content")

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
<div class="row flex-lg-nowrap">
    <div class="col mb-3">
    <div class="e-panel card">
        <div class="card-body">
        <div class="card-title">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Créer un nouveau post</a>
        </div>
        <div class="e-table">
            <div class="table-responsive table-lg mt-3">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="align-top">
            No
            </th>
            <th class="max-width">Titre</th>
            <th class="sortable">Date de création</th>
            <th>Contenu</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <td class="align-middle">
            {{ $post->id }}
            </td>
            <td class="text-nowrap align-middle">{{ $post->title }}</td>
            <td class="text-nowrap align-middle justify-content-center"><span>{{ $post->created_at->format('Y-m-d') }}</span></td>
            <td class="text-center align-middle">{{ $post->content }}</td>
            <td class="text-center align-middle">
            <div class="btn-group align-top">

                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                    <a class="btn btn-secondary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>




            </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


    </div>
              <div class="d-flex justify-content-center">
                <ul class="pagination mt-3 mb-0">
                  <li class="disabled page-item"><a href="#" class="page-link">‹</a></li>
                  <li class="active page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">›</a></li>
                  <li class="page-item"><a href="#" class="page-link">»</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="col-sm-2"></div>
</div>
@endsection
