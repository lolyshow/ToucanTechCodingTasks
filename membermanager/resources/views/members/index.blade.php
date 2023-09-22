@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Demo members data</h2>
                    <a href="{{ url('/download-csv') }}" class="btn btn-primary">Download CSV</a>

                </div>
                <div class="card-body ">
                    <a href="{{ url('/member/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        Add New
                    </a>
                    <div class="form-group col-6 d-flex mt-2">
                        <label for="school_filter" class="col-4">Filter by School:</label>
                        <select class="form-control" id="school-select" name="school_filter">
                            <option value="">All Schools</option>
                            @foreach($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>School</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody id="member-details">
                                @foreach($members as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->school_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to update the table based on the selected school
    function updateTable(selectedSchoolId) {
        const memberTableBody = document.getElementById('member-details');
        memberTableBody.innerHTML = ''; // Clear the table body

        // Make an API call to fetch members based on the selected school
        if (selectedSchoolId) {
            try{

                fetch(`/api/members?school_id=${selectedSchoolId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("data",data)
                       if(data?.status ===200){
    
                           // Populate the table with fetched members
                           data?.data?.forEach((member, index) => {
                               const row = document.createElement('tr');
                               row.innerHTML = `
                                   <td>${index + 1}</td>
                                   <td>${member.name}</td>
                                   <td>${member.email}</td>
                                   <td>${member.school_name}</td>
                               `;
                               memberTableBody.appendChild(row);
                           });
                       }
                    });
            }
            catch(error){

            }
        }
    }

    // Add an event listener to the school dropdown
    const schoolSelect = document.getElementById('school-select');
    schoolSelect.addEventListener('change', function () {
        const selectedSchoolId = this.value;
        updateTable(selectedSchoolId);
    });

    // Initial table population with all members
    updateTable(''); // Display all members initially
</script>


@endsection