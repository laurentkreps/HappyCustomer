@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mt-5"></div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Statistics</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-3 offset-md-3">
                            <div class="form-group row">
                        <label for="changeCampaign" class="col-4 col-form-label">Campaign </label> 
                            <div class="col-8">
                            <select class="form-control" id="changeCampaign" name="changeCampaign">
                                @foreach($campaigns as $camp)
                                    <option value="{{ $camp->id }}">{{ $camp->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="campaignChart" width="400" height="400"></canvas>
                        </div>
                         <div class="col-md-6">
                            <canvas id="campaignChartNumbers" width="400" height="400"></canvas>
                        </div>
                    </div>

              </div>
          </div>
      </div>
  </div>
</div>


@endsection
@section('extracss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
@endsection
@section('extrajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script>
    $('#changeCampaign').change(function() {
        location.replace('{{ asset('/admin/statistics') }}/' + $('#changeCampaign').val());   
    });
    $( document ).ready(function() {
    $('#changeCampaign').val('{{ $id }}');
});
</script>
<script>
var ctx = document.getElementById('campaignChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        @foreach($months as $month)
            '{{ $mois[$month+0] }}',
        @endforeach
        ],
        datasets: [{
            label: 'Average (%) of Votes',
            data: [
            @foreach($votes as $vote)
                {{ $vote }},
            @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 0, 0, 0.2)',
                'rgba(0, 0, 255, 0.2)',
                'rgba(255, 206, 255, 0.2)',
                'rgba(255, 255, 64, 0.2)',
                'rgba(75, 230, 150, 0.2)',
                'rgba(190, 180, 255, 0.2)',
                'rgba(226, 95, 95, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 0, 255, 1)',
                 'rgba(255, 206, 255, 1)',
                 'rgba(255, 255, 64, 1)',
                 'rgba(75, 230, 150, 1)',
                 'rgba(190, 180, 255, 1)',
                 'rgba(226, 95, 95, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 100
                }
            }]
        }
    }
});
</script>
<script>
var ctx = document.getElementById('campaignChartNumbers').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        @foreach($months as $month)
            '{{ $mois[$month+0] }}',
        @endforeach
        ],
        datasets: [{
            label: 'Votes by number',
            data: [
            @foreach($votesCount as $vote)
                {{ $vote }},
            @endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 0, 0, 0.2)',
                'rgba(0, 0, 255, 0.2)',
                'rgba(255, 206, 255, 0.2)',
                'rgba(255, 255, 64, 0.2)',
                'rgba(75, 230, 150, 0.2)',
                'rgba(190, 180, 255, 0.2)',
                'rgba(226, 95, 95, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(0, 0, 255, 1)',
                 'rgba(255, 206, 255, 1)',
                 'rgba(255, 255, 64, 1)',
                 'rgba(75, 230, 150, 1)',
                 'rgba(190, 180, 255, 1)',
                 'rgba(226, 95, 95, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
