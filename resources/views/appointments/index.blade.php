@extends('layouts.app')

@section('content')
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Citas
        </div>
        <div class="panel-body">
            @if (count($appointments)==0)
            <p>No hay citas registradas.</p>
            @endif
            @if (count($appointments) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Empresa</th>
                        <th>Asesor</th>
                        <th>Departamento</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                        <tr class="{{ $appointment->active ? 'success' : 'danger' }}">
                            <td class="table-text">{{ $appointment->id }}</td>
                            <td class="table-text">{{ date_format(date_create($appointment->date), "h:i A d/m/y") }}</td>
                            <td class="table-text"><a href="{{ url('users/view') . '/' . $appointment->user->id }}">{{$appointment->user->name}}</a></td>
                            <td class="table-text"><a href="{{ url('companies/view') . '/' . $appointment->company->id }}">{{$appointment->company->name}}</a></td>
                            <td class="table-text">{{$appointment->assistant->name}}</td>
                            <td class="table-text">{{ $appointment->company->state->name }}</td>
                            <td class="table-text">{{$appointment->status}}</td>
                            <td class="table-text"><a href="{{ url('appointments/view') . '/' . $appointment->id }}">Ver</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
    <div align="center">
        {{ $appointments->render() }}
    </div>
</div>
@endsection