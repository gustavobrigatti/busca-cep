@extends('app')
@push('scripts')
    <script>
        var input = document.getElementById("cep");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("btnSubmit").click();
            }
        });
        function clickButton() {
            var cep = document.getElementById('cep').value;
            $.post('/ceps/buscaCep', {cep}, function (data) {
                if (!data.erro){
                    $("#text-cep").html(data.endereco.cep);
                    $("#text-logradouro").html(data.endereco.logradouro);
                    $("#text-complemento").html(data.endereco.complemento);
                    $("#text-bairro").html(data.endereco.bairro);
                    $("#text-localidade").html(data.endereco.localidade);
                    $("#text-uf").html(data.endereco.uf);
                    $("#text-ibge").html(data.endereco.ibge);
                    $("#text-gia").html(data.endereco.gia);
                    $("#text-ddd").html(data.endereco.ddd);
                    $("#text-siafi").html(data.endereco.siafi);
                    document.getElementById('card-endereco').style.display = "block";
                    document.getElementById('div-erro').style.display = "none";
                }else{
                    $("#text-cep").html(null);
                    $("#text-logradouro").html(null);
                    $("#text-complemento").html(null);
                    $("#text-bairro").html(null);
                    $("#text-localidade").html(null);
                    $("#text-uf").html(null);
                    $("#text-ibge").html(null);
                    $("#text-gia").html(null);
                    $("#text-ddd").html(null);
                    $("#text-siafi").html(null);
                    document.getElementById('card-endereco').style.display = "none";
                    document.getElementById('div-erro').style.display = "block";
                    $("#p-erro").html('CEP inválido, tente novamente com um CEP válido.');
                }
            });
        }
    </script>
@endpush
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Zero config table start -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Busca de CEP</h5>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-danger alert-dismissible" id="div-erro" style="display: none">
                                        <p style="vertical-align: middle;" id="p-erro"></p>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control mask-cep" name="cep" id="cep" placeholder="Digite o CEP">
                                        <span class="input-group-btn">
                            <button type="button" id="btnSubmit" class="btn btn-primary m-0" onclick="clickButton()">Buscar</button>
                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="card" id="card-endereco" style="display: none">
                                <div class="card-header">
                                    <h5>Endereço</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>CEP</h5>
                                            <h6 id="text-cep"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>LOGRADOURO</h5>
                                            <h6 id="text-logradouro"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>COMPLEMENTO</h5>
                                            <h6 id="text-complemento"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>BAIRRO</h5>
                                            <h6 id="text-bairro"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>LOCALIDADE</h5>
                                            <h6 id="text-localidade"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>UF</h5>
                                            <h6 id="text-uf"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>IBGE</h5>
                                            <h6 id="text-ibge"></h6>
                                        </div>
                                        <div class="col-md-3 col-6 mb-4 text-center">
                                            <h5>GIA</h5>
                                            <h6 id="text-gia"></h6>
                                        </div>
                                        <div class="col-6 mb-4 text-center">
                                            <h5>DDD</h5>
                                            <h6 id="text-ddd"></h6>
                                        </div>
                                        <div class="col-6 mb-4 text-center">
                                            <h5>SIAFI</h5>
                                            <h6 id="text-siafi"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] start -->
@endsection
