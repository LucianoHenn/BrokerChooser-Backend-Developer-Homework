@extends('layouts.app')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css">

@section('content')
<div class="container-fluid">
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Test List</h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive mb-4">
                <table class="table border text-nowrap mb-5 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Name</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Type</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Created at</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Manage</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $test)

                        @php
                        $statusClass = '';
                        switch($test->status->name) {
                        case 'Pending':
                        $statusClass = 'bg-warning-subtle text-warning';
                        break;
                        case 'Active':
                        $statusClass = 'bg-success-subtle text-success';
                        break;
                        case 'Finished':
                        $statusClass = 'bg-primary-subtle text-primary';
                        break;
                        default:
                        $statusClass = 'bg-danger-subtle text-danger';
                        }
                        @endphp

                        <tr>
                            <td>
                                <span class="badge rounded-pill {{ $statusClass }} fw-semibold fs-2">{{ $test->status->name }}</span>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal fs-4">{{ $test->name }} </p>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal fs-4">{{ $test->type->name }}</p>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal fs-4">{{ $test->created_at }}</p>
                            </td>

                            <td>
                                <div class="dropdown dropstart">
                                    <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                        <li>
                                            <a id="{{ $test->id }}" class="dropdown-item d-flex align-items-center gap-3 start" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 4v16l13 -8z" />
                                                </svg>Start</a>
                                        </li>
                                        <li>
                                            <a id="{{ $test->id }}" class="dropdown-item d-flex align-items-center gap-3 stop" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-pause " width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                    <path d="M14 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                </svg>Stop</a>
                                        </li>
                                        <!-- <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                    <path d="M21 21l-6 -6" />
                                                </svg>View
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/js/bootstrap-switch.min.js"></script>
<script>
    $(document).ready(function() {

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $('.start').on('click', function(event) {

            var clickedId = event.target.id;
            console.log('Clicked element id:', clickedId);

            // Set up the AJAX request headers


            // Make the Ajax request
            $.ajax({
                url: 'api/tests/' + event.target.id + '/start', // Replace 'your-ajax-endpoint-url' with the actual URL
                method: 'PUT', // or 'GET' depending on your endpoint
                data: {
                    // Add any data you need to send with the request
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                    })

                    setTimeout(function() {

                        window.location.reload();
                    }, 2000); // 2ess the response data
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: xhr.responseJSON.message,
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });

                }
            });
        });


        $('.stop').on('click', function(event) {

            var clickedId = event.target.id;


            $.ajax({
                url: 'api/tests/' + event.target.id + '/stop',
                method: 'PUT',
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                    })

                    setTimeout(function() {

                        window.location.reload();
                    }, 2000); // 2

                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: xhr.responseJSON.message,
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });
                }
            });
        });
    });
</script>

@endsection