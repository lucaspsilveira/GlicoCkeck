@extends('layouts.app')
@push('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>    
@endpush
@section('content')

    <h1 class="title">Registros de Pressão Arterial</h1>
    <canvas id="myChart" width="100%" height=""></canvas>
        <table class="table is-fullwidth">
                <thead>
                    <th class="">Data/Hora Registro</th>
                    <th class="">Pressão Arterial</th>
                    <th class="">Ações</th>
                </thead>
                <tbody>
                    <?php $datas = array(); $glicose = array(); ?>
                @foreach ($registrosPressaoArterial as $registro)
                    <tr>
                        <?php
                        $datas[] = $registro->created_at->format("d/m/Y");
                        $pressao_sistolica[] = $registro->pressao_arterial_sistolica;
                        $pressao_diastolica[] = $registro->pressao_arterial_diastolica;
                        ?>
                        <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                        <td>{{$registro->pressao_arterial_sistolica . "/". $registro->pressao_arterial_diastolica  }} mg/dl</td>
                        <td>                          
                                        <button class="delete" type="submit" onclick="ativaModal({{$registro->id}})"></button>              
                                       
                                    <span class="icon "onclick="location.href='{{route('UsuarioPressaoArterialRegistros.edit', $registro->id)}}'">
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
                            document.getElementById("form-exclusao").action = "{{route('UsuarioPressaoArterialRegistros.index')}}/"+ id;
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
                label: 'pressão sistólica',
                data: <?php  echo json_encode(array_reverse($pressao_sistolica)); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
                fill: false
            },
            {
                label: 'pressão diastólica',
                data: <?php  echo json_encode(array_reverse($pressao_diastolica)); ?>,
                backgroundColor: [
                    'rgba(215, 99, 0, 1)',
                ],
                borderColor: [
                    'rgba(215, 99, 0, 1)',
                ],
                borderWidth: 1,
                fill: false,
                borderDash: [5, 5],
                
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