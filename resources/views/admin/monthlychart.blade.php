@extends('admin.master')

@section('title', 'Monthly Chart')

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
                {{-- <button onclick="viewMonthly()">Monthly</button> --}}
            </div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="{{ asset('js/monthlychart.js') }}"></script>
@endsection
