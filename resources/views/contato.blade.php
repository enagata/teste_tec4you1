<!DOCTYPE html>
<html lang="pt-br" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contato</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Contato</h1>
    <form action="/" method="POST">
        @csrf
        <div class="form-group">
            <label for="lbMarca">Marca</label>
            <select name="slMarca" id="slMarca" class="form-control" onselect="ajaxMarca()" >
                <option value="" selected>Selecione</option>
                @foreach($marcas as $marca)
                    <option  value="{{$marca->id_Marca}}">{{$marca->nome_Marca}}</option>
                @endforeach
            </select>
            <input type="hidden" id="vlmarca" name="vlmarca">
        </div>
        <div class="form-group">
            <label for="lbVeiculo">Veiculo</label>
            <select name="slVeiculo" id="slVeiculo" class="form-control" disabled >
                <option value="" >Selecione</option>
            </select>
            @foreach($veiculos as $veiculo)
                @if ($cont== 0)
                    <select name="slVeiculo{{$veiculo->id_marca}}" id="slVeiculo{{$veiculo->id_marca}}" class="form-control" style="display: none" onchange="pegaveiculo({{$veiculo->id_marca}},{{$loop->count}})" >
                        <option value="" >Selecione</option>
                        <option  value="{{$veiculo->id_Veiculo}}">{{$veiculo->nome_Veiculo}}</option>
                        {{$cont++}}
                @elseif ($veiculo->id_marca <> $cont)
                    </select>
                    <select name="slVeiculo{{$veiculo->id_marca}}" id="slVeiculo{{$veiculo->id_marca}}" class="form-control" style="display: none" onchange="pegaveiculo({{$veiculo->id_marca}},{{$loop->count}})">
                        <option value="" >Selecione</option>
                        <option  value="{{$veiculo->id_Veiculo}}">{{$veiculo->nome_Veiculo}}</option>
                        {{$cont++}}
                @else
                        <option  value="{{$veiculo->id_Veiculo}}">{{$veiculo->nome_Veiculo}}</option>
                @endif
                @if ($loop->count == $veiculo->id_Veiculo))
                    </select>
                @endif
            @endforeach
            <input type="hidden" value="{{$cont}}" id="contvel" name="contvel">
            <input type="hidden" id="vlvel" name="vlvel">
        </div>
        <div class="form-group">
            <label for="lbPecas">Peças</label>
            <select name="slPecas" id="slPecas" class="form-control" disabled >
                <option value="" >Selecione</option>
            </select>
            @foreach($pecas as $peca)
                @if ($contp== 0)
                    <select name="slPecas{{$peca->id_Veiculo}}" id="slPecas{{$peca->id_Veiculo}}" class="form-control" style="display: none" onchange="pegapeca({{$peca->id_Veiculo}})">
                        <option value="" >Selecione</option>
                        <option  value="{{$peca->id_pecas}}">{{$peca->nome_Pecas}}</option>
                        {{$contp++}}
                @elseif ($peca->id_Veiculo <> $contp)
                    </select>
                    <select name="slPecas{{$peca->id_Veiculo}}" id="slPecas{{$peca->id_Veiculo}}" class="form-control"  style="display: none" onchange="pegapeca({{$peca->id_Veiculo}})">
                        <option value="" >Selecione</option>
                        <option  value="{{$peca->id_pecas}}">{{$peca->nome_Pecas}}</option>
                        {{$contp++}}
                @else
                    <option  value="{{$peca->id_pecas}}">{{$peca->nome_Pecas}}</option>
                @endif
                @if ($loop->count == $peca->id_pecas)
                    </select>
                @endif
            @endforeach
            <input type="hidden" value="{{$contp}}" id="contPeca" name="contPeca">
            <input type="hidden" id="vlpeca" name="vlpeca">
        </div>
        <div class="form-group">
            <label for="observacao">Observação</label>
            <textarea type="text" rows="6" class="form-control" name="observacao" id="observacao" value=""></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info">Enviar Mensagem</button>
        </div>
    </form>
</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="slMarca"]').on('change', function(){
            var cont = document.getElementById("contvel").value;
            document.getElementById("vlmarca").value = $('#slMarca :selected').text();
            for (var i = 0; i < cont + 1; i++) {
                $("#slVeiculo" + i).css("display", "none");
            }
            $("#slVeiculo").css("display", "none");
            var marca = $(this).val();
            $("#slVeiculo" + marca).css("display", "block");
        });
    });
    function pegaveiculo(valor, cont)
    {
        var veiculo=document.getElementById("slVeiculo" + valor).value;
        var select = document.getElementById('slVeiculo' + valor);
        var text = select.options[select.selectedIndex].text;
        document.getElementById("slPecas").style.display="hidden";
        document.getElementById("vlvel").value = text;
        $("#slPecas").css("display", "none");
        for (var i = 0; i < cont + 1; i++) {
            $("#slPecas" + i).css("display", "none");
        }
        $("#slPecas" + veiculo).css("display", "block");
    }
    function pegapeca(valor)
    {
        var select = document.getElementById('slPecas' + valor);
        var text = select.options[select.selectedIndex].text;
        document.getElementById("vlpeca").value = text;
    }
</script>

</body>
</html>

