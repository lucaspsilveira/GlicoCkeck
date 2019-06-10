@extends('layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>    
@endpush
@section('content')

    <h1 class="title">Registros de batimentos cardíacos</h1>
    <canvas id="myChart" width="100%" height=""></canvas>
    <table class="table is-fullwidth">
            <thead>
                <th class="">Data/Hora Registro</th>
                <th class="">Batimentos Cardíacos</th>
                <th class="">Ações</th>
            </thead>
            <?php $datas = array(); $glicose = array(); ?>
            
            <tbody>
                @foreach ($registrosBatimentosCardiacos as $registro)
                <tr>
                    <?php
                    $datas[] = $registro->created_at->format("d/m/Y");
                    $batimentos_cardiacos[] = $registro->batimentos_cardiacos;
                    ?>
                        <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                        <td>{{(str_replace('.', ',',$registro->batimentos_cardiacos))}} bpm</td>
                        <td>
                                        <button class="delete" type="submit" onclick="ativaModal({{$registro->id}})"></button>              
                                       
                                    <span class="icon " onclick="location.href='{{route('UsuarioBatimentosRegistros.edit',$registro->id)}}'">
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
                        document.getElementById("form-exclusao").action = "{{route('UsuarioBatimentosRegistros.index')}}/"+ id;
                        element.classList.add("is-active"); 
                        element.classList.add("is-clipped");
                    }
                    function desativaModal() {
                        var element = document.getElementById("modal-verificacao");
                        element.classList.remove("is-active"); 
                        element.classList.remove("is-clipped");
                    }
                    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          
          labels: <?php  echo json_encode(array_reverse($datas));?>,
            datasets: [{
                label: 'batimentos cardíacos',
                data: <?php  echo json_encode(array_reverse($batimentos_cardiacos)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                lineTension:0.1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
                </script>  
@endsection