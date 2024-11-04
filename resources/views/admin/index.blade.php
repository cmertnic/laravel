@extends('layouts.main')

@section('content')
    <h1>Админ Панель</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Номер заявления</th>
                <th>Номер авто</th>
                <th>Текст заявления</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->number }}</td>
                    <td>{{ $report->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection