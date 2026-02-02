@extends('layouts.bootstrap5')
@section('konten')
    <div class="col-lg-8">
        <canvas id="myChart"></canvas>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/3.0.1/chartjs-plugin-annotation.min.js"></script>
    <script>
        let absen = {{ Js::from($absen) }}
        let labels = Object.keys(absen);
        let data = Object.values(absen);
        console.log(labels);
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
        labels: labels,
        datasets: [{
            label: 'Performa Kehadiran',
            data: data,
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: false
            }
        },
        plugins: {
    annotation: {
      annotations: {
        line1: {
          type: 'line',
          yMin: 8,
          yMax: 8,
          borderColor: 'rgb(255, 99, 132)',
          borderWidth: 2,
          label: {
            backgroundColor: 'red',
            content: 'Jam Masuk 08:00',
            display: true
            }
        }
      }
    }
  }
        }
    });
    </script> 
@endpush