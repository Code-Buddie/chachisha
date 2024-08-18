@extends('layouts.app')

@push('css')
    <style>

        .banner {
            background: linear-gradient(to top, rgba(84, 23, 23, 0.88), rgba(138, 30, 30, 0.88)), url("/images/banner.jpg") no-repeat center;
            background-size: cover;
        }

        #map, #cases_chart {
            height: 60vh;
        }
    </style>

@endpush


@section('content')
    <section class="bg-red-600 dark:bg-red-600 banner">
        <div class="container sm:px-16 lg:px-24 py-24">
            <h1 class="mb-2 text-2xl font-extrabold  leading-none md:text-2xl lg:text-3xl text-white">
                It is not enough to shame the shameless</h1>            
        </div>
    </section>

    <div class="container py-12 px-12 w-full">
        <livewire:search-and-filter />
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawDualX);

        function drawDualX() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Cases', {role: 'style'}],
                ['Illicit Enrichment', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Bribery and Extortion', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Embezzlement and Misappropriation', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Abuse of Functions', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Money Laundering', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Fraud', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Forgery and Use of Forgeries', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Asset Recovery', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Grand Corruption', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Influence Peddling and Trading in Influence', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
                ['Access to Justice for Marginalized Communities', Math.floor(Math.random() * (40 - 10 + 1)) + 10, 'color: #76A7FA'],
            ]);


            var materialOptions = {
                chart: {
                    title: 'Case Types',
                    subtitle: 'Based on most recent data collected'
                },
                colors: ['#e04343'],
                hAxis: {
                    title: 'Number of Cases'
                },
                vAxis: {
                    title: 'Case Type'
                },
                bars: 'vertical',
                axes: {
                    x: {
                        label: 'Number of cases', side: 'top'
                    }
                }
            };
            var materialChart = new google.charts.Bar(document.getElementById('cases_chart'));
            materialChart.draw(data, materialOptions);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['geochart'],
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            // Define the data for the chart
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Country');
            data.addColumn('number', 'Popularity');
            data.addRows([
                ['Ghana', 400],
            ]);

            // Set chart options
            var options = {
                region: '011', // Code for Africa
                displayMode: 'regions',
                resolution: 'countries',
                colorAxis: {colors: ['#d57f7f', '#e04343']}, // Colors for the heatmap
                datalessRegionColor: '#FFFFFF'
            };

            // Create the GeoChart
            var chart = new google.visualization.GeoChart(document.getElementById('map'));

            // Draw the chart with the specified data and options
            chart.draw(data, options);
        }
    </script>

@endpush


