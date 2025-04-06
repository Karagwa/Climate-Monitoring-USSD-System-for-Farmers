{{-- resources/views/admin/analytics.blade.php --}}
@extends('admin.admin')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Farmers by Type</h4>
                    <canvas id="farmersChart" height="150"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Messages by Month</h4>
                    <canvas id="messagesChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Farmers Chart
    new Chart(document.getElementById('farmersChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: @json($farmersByType->pluck('farming_type')),
            datasets: [{
                data: @json($farmersByType->pluck('count')),
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc']
            }]
        }
    });

    // Messages Chart
    new Chart(document.getElementById('messagesChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Messages',
                data: @json(array_fill(0, 12, 0)) // Initialize with zeros
                    @foreach($messagesByMonth as $month)
                        .map((v, i) => i+1 == {{ $month->month }} ? {{ $month->count }} : v)
                    @endforeach,
                backgroundColor: '#4e73df'
            }]
        }
    });
</script>
@endpush
@endsection