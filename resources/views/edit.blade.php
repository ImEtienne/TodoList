@extends('main')
@section('title', 'edit Todo')
@section('todo')
    <form action='{{route('modform',['id'=>$nom->id])}}' method="post">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="formGroupExampleInput" placeholder="nom..." value="{{old('nom',$nom->nom)}}">
        </div>
        <input class="btn btn-primary" type="submit" value="Modifier">
        <button type="button" class="btn btn-danger"><a style="color:white; text-decoration: none;"href="{{route('index')}}">Annuler</a></button>
        @csrf
    </form>
@endsection
