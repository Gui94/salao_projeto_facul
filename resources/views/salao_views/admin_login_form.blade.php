    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.cycle.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/script.js') }}"></script>
<br/>
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('autenticando') }}">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Login</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
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