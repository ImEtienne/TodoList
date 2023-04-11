@extends('main')
@section('title', 'Todo Liste')
@section('todo')
    <form action="{{route('create')}}" method="GET">
        <div class="mb-3 mt-3">
            <label for="nom" class="form-label"><span>Note</span></label>
            <input type="text" class="form-control" name="nom" placeholder="note...">
            <div id="emailHelp" class="form-text">Limité à 256 caractères</div>
        </div>
        <input class="btn btn-primary" type="submit" name="ajouter" value="Créer">
    </form>
    @unless(empty($todoList))
        <table class="table table-hover">
            <thead class="table-light ">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th style="text-align: center;" colspan="2">action</th>
            </tr>
            </thead>
            @forelse($todoList as $todo)
                <tr>
                    <td>{{$todo -> id}}</td>
                    <td>{{$todo -> nom}}</td>
                    <td>{{$todo -> created_at}}</td>
                    <td>{{$todo -> updated_at}}</td>
                    <td class="mod">
                        <a type="button" class="btn btn-primary" href="{{route('modform',['id'=>$todo->id])}}"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Modifier</a>
                        <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa-solid fa-trash-can"></i>&nbsp;Supprimer</a>

                        <!-- Modal Delete-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        êtes-vous sûr de vouloir supprimer ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <a type="button" class="btn btn-danger" href="{{route('delete',['id'=>$todo->id])}}"><i class="fa-solid fa-trash-can"></i>&nbsp;Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>

                {{--href="{{route('delete',['id'=>$todo->id])}}"--}}
            @empty
                <p style="color:red; font-weight: bold"> Aucune note ! </p>
            @endforelse
        </table>
    @endunless

@endsection

