<style>
.panel-info > .panel-heading{
	background-color:#4CCFC1;
	
}
.panel-info > .panel-heading{
	border-color:#4CCFC1;
	
}

.btn-primary{
	color: #fff;
    background-color: #4CCFC1;
    border-color: #4CCFC1;
}

.btn-primary:hover{
	color: white;
    background-color: #009999;
    border-color: #009999;
}
input{
    font-family:arial;
}
</style>
<div class="col-md-4 col-md-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">Preencha os formulários para cadastrar</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('cadastrar_usuario') }}"">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Nome</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                        @if ($errors->has('nome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            <div class="form-group{{ $errors->has('sobrenome') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Sobrenome</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="sobrenome" value="{{ old('sobrenome') }}">

                        @if ($errors->has('sobrenome'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sobrenome') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Senha</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="senha">

                        @if ($errors->has('senha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('senha') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('telefone_residencial') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">telefone residencial</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="telefone_residencial" value="{{ old('telefone_residencial') }}">

                        @if ($errors->has('telefone_residencial'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone_residencial') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('telefone_residencial') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">telefone celular</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="telefone_celular" value="{{ old('telefone_celular') }}">

                        @if ($errors->has('telefone_celular'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone_celular') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Endereço</label>

                         <div class="col-md-8">
                        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}">

                        @if ($errors->has('endereco'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Cadastrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>