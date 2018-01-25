<style>
.panel-info > .panel-heading{
	background-color:#4CCFC1;
	color:white;
	
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
</style>
<div class="col-md-4 col-md-offset-1">
    <div class="panel panel-info">
        <div class="panel-heading">Digite seu email e senha para logar na sua conta</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('autenticando_cliente') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email_login') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email_login" value="{{ old('email_login') }}">
                        @if ($errors->has('email_login'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_login') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Senha</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Logar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
