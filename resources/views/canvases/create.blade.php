@extends('layouts.app')

@section('content')
<div>
	<div class="col-sm-offset-2 col-sm-8">
		@if(Session::has('status'))
            <div class="alert alert-success" align="center">
                <h2>{{ Session::get('status') }}</h2>
            </div>
        @endif
		<div class="panel panel-default">
			<div class="panel-heading">
				Crear Canvas
			</div>
			<div class="panel-body">
				<form method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label>Key Partners</label>
						<textarea class="form-control" name="key_partners" placeholder="Key Partners">{{ old('key_partners') }}</textarea>
						@if ($errors->has('key_partners'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_partners') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Key Activities</label>
						<textarea class="form-control" name="key_activities" placeholder="Key Activities">{{ old('key_activities') }}</textarea>
						@if ($errors->has('key_activities'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_activities') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Key Resources</label>
						<textarea class="form-control" name="key_resources" placeholder="Key Resources">{{ old('key_resources') }}</textarea>
						@if ($errors->has('key_resources'))
                            <span class="help-block">
                                <strong>{{ $errors->first('key_resources') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Value Propositions</label>
						<textarea class="form-control" name="value_propositions" placeholder="Value Propositions">{{ old('value_propositions') }}</textarea>
						@if ($errors->has('value_propositions'))
                            <span class="help-block">
                                <strong>{{ $errors->first('value_propositions') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Customer Relationships</label>
						<textarea class="form-control" name="customer_relationships" placeholder="Customer Relationships">{{ old('customer_relationships') }}</textarea>
						@if ($errors->has('customer_relationships'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_relationships') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Channels</label>
						<textarea class="form-control" name="channels" placeholder="Channels">{{ old('channels') }}</textarea>
						@if ($errors->has('channels'))
                            <span class="help-block">
                                <strong>{{ $errors->first('channels') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Customer Segments</label>
						<textarea class="form-control" name="customer_segments" placeholder="Customer Segments">{{ old('customer_segments') }}</textarea>
						@if ($errors->has('customer_segments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customer_segments') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Cost Structure</label>
						<textarea class="form-control" name="cost_structure" placeholder="Cost Structure">{{ old('cost_structure') }}</textarea>
						@if ($errors->has('cost_structure'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cost_structure') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<label>Revenue Streams</label>
						<textarea class="form-control" name="revenue_streams" placeholder="Revenue Streams">{{ old('revenue_streams') }}</textarea>
						@if ($errors->has('revenue_streams'))
                            <span class="help-block">
                                <strong>{{ $errors->first('revenue_streams') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Crear</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection