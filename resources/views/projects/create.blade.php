@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-offset-2 col-sm-8">
		@if(Session::has('status'))
         <div class="alert alert-success" align="center">
           	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        		<span aria-hidden="true">&times;</span>
    		</button>
            <p>{{ Session::get('status') }}</p>
        </div>
        @endif
		<div class="panel panel-default">
			<div class="panel-heading">
				Nuevo Proyecto
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Descripcion</label>
						<textarea class="form-control" name="description" placeholder="Descripcion">{{ old('description') }}</textarea>
						@if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Empresa</label>
						{{ Form::select('company', $companies, null, ['class' => 'form-control']) }}
						@if ($errors->has('company'))
						    <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Convocatoria</label>
						{{ Form::select('term', $terms, null, ['class' => 'form-control']) }}
						@if ($errors->has('term'))
						    <span class="help-block">
                                <strong>{{ $errors->first('term') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Registrar Proyecto</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection