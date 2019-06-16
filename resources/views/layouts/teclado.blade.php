@push('head')
    <style>
        .numero {
            align-items: center;
            background-color: #f5f5f5;
            border-radius: 290486px;
            display: inline-flex;
            font-size: 1.8rem;
            height: 2em;
            justify-content: center;
            /* margin-right: 1.5rem; */
            min-width: 2.5em;
            padding: .25rem .5rem;
            text-align: center;
            vertical-align: top;
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
@endpush
<div class="container" style="margin-top:50px;">
    <div class="columns is-mobile">
        <div class="column numero">
          1
        </div>
        <div class="column numero">
          2
        </div>
        <div class="column numero">
          3
        </div>
    </div>
    <div class="columns is-mobile">
        <div class="column numero">
          4
        </div>
        <div class="column numero">
          5
        </div>
        <div class="column numero">
          6
        </div>
      </div>
      <div class="columns is-mobile">
        <div class="column numero">
          7
        </div>
        <div class="column numero">
          8
        </div>
        <div class="column numero">
          9
        </div>
      </div>
      <div class="columns is-mobile">
        <div class="column numero">
          ,
        </div>
        <div class="column numero">
          0
        </div>
        <div class="column numero">
          apagar
        </div>
      </div>
</div>
<script>
        var numeros = document.getElementsByClassName("numero");
        for (let index = 0; index < numeros.length; index++) {
            const elemento = numeros[index];
            
            elemento.addEventListener("click", function() {
                texto_dentro = this.innerHTML.trim();
                var input = document.getElementById("peso");
                if (texto_dentro == "apagar") {
                    input.value = parseFloat(input.value.substring(0, input.value.length - 1)) ;
                } else if (texto_dentro == ",") {
                    input.value = parseFloat(input.value + ".01");
                } else {
                    input.value = input.value + texto_dentro;
                }
            
            });
        }
</script>