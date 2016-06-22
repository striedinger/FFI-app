@extends('layouts.app-nosidebar')

@section('content')
<div class="content center-block" style="padding-top:10px;">
	<div class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="cognito" style="">
				<script src="https://services.cognitoforms.com/s/96WfSQU04kS-yV28mKxXrA"></script>
				<script>Cognito.load("forms", { id: "1" });</script>
			</div>	
		</div>
	</div>
</div>
@endsection