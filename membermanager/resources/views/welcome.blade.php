@extends('layout.layout')
@section('content')
    <canvas id="schoolMembersChart" width="400" height="200"></canvas>

    <script>
    // Get the data for the chart (you may pass it from your controller)
    var schoolData = @json($schoolMembers);

    // Prepare labels and data arrays
    var labels = [];
    var data = [];

    schoolData.forEach(function(school) {
        labels.push(school.school_name);
        data.push(school.total_members);
    });

    // Create a bar chart
    var ctx = document.getElementById('schoolMembersChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Members',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Background color
                borderColor: 'rgba(75, 192, 192, 1)',     // Border color
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Members'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Schools'
                    }
                }
            }
        }
    });
</script>
@endsection 