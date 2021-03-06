@extends('layouts.app')

@section('content')

    <h1 class="title">Registros de peso</h1>
    <table class="table is-fullwidth">
            <thead>
                <th class="">Data/Hora Registro</th>
                <th class="">Peso</th>
                <th class="">Ações</th>
            </thead>
            <tbody>
        @foreach ($registrosPeso as $registro)
        <tr>
                <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                <td>{{(str_replace('.', ',',$registro->peso))." ". $registro->unidade}}</td>
                <td>                            
                            <button class="delete" type="submit" onclick="ativaModal({{$registro->id}})"></button>              
                               
                            <span class="icon "onclick="location.href='{{route('UsuarioPesoRegistros.edit', $registro->id)}}'">
                                <i class="fas fa-edit"></i>
                              </span>
                        </td>
        </tr>
        @endforeach
            </tbody>
    </table>
            <div class="modal" id="modal-verificacao">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                      <header class="modal-card-head">
                        <p class="modal-card-title">Confirmação de exclusão</p>
                        <button class="delete" aria-label="close" onclick="desativaModal()"></button>
                      </header>
                      <section class="modal-card-body">
                        <p>Você realmente deseja excluir esse registro? Essa ação é irreversível.</p>
                      </section>
                      <footer class="modal-card-foot">
                        <form id="form-exclusao" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            
                            <button class="button is-danger" type="submit">Excluir</button>              
                           </form>
                        <button class="button" onclick="desativaModal()">Cancel</button>
                      </footer>
                    </div>
                  </div>
                    <script>
                            function ativaModal(id) {
                                var element = document.getElementById("modal-verificacao");
                                document.getElementById("form-exclusao").action = "{{route('UsuarioPesoRegistros.index')}}/"+ id;
                                element.classList.add("is-active"); 
                                element.classList.add("is-clipped");
                            }
                            function desativaModal() {
                                var element = document.getElementById("modal-verificacao");
                                element.classList.remove("is-active"); 
                                element.classList.remove("is-clipped");
                            }
                        </script>   
@endsection