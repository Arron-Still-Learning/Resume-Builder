@extends('admin.master')

@section('title', 'Weekly Chart')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chart.css') }}">
@endsection

@section('content')
    <div class="chart_body">
        <div class="chartcontainer">
            <div class="view-buttons d-flex box-end">
                <button>
                    <a href="{{ route('admin.weekly.chart') }}">Weekly</a>
                </button>
                <button>
                    <a href="{{ route('admin.monthly.chart') }}">Monthly</a>
                </button>
            </div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="{{ asset('js/weeklychart.js') }}"></script>
@endsection
