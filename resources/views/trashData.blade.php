<!doctype html>
<html lang="en">

<head>
    <title>Trash Table Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Toggle Button CSS -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />

    <!-- Bootstrap Toggle Button JS -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
    <main>
        <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <h2 class="text-uppercase text-center">Users Data</h2>
                                <div class="table-responsive">
                                    <a href="/getdata"><button class="btn btn-warning" name="Trash" style="margin-left:896px">Go to all users</button></a>
                                    <table class="table table-primary" border="2px">
                                        @csrf
                                        <thead>
                                            <tr>
                                                {{-- @if (session('created'))
                                                    <div class="alert alert-success">
                                                        {{ session('created') }}
                                                    </div>
                                                @elseif (session('deleted'))
                                                    <div class="alert alert-warning">
                                                        {{ session('deleted') }}
                                                    </div>
                                                @elseif (session('updated'))
                                                    <div class="alert alert-info">
                                                        {{ session('updated') }}
                                                    </div>
                                                @endif --}}


                                                <th scope="col">SNo.</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col" colspan="2">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>
                                                        <input data-id="{{ $item->id }}" id="ChangeStatusButton"
                                                            class="toggle-class" type="checkbox" data-onstyle="success"
                                                            data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                                            data-off="InActive" {{ $item->status ? 'checked' : '' }}>


                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td><a href="{{route('restoreData',['id' => $item-> id])}}" class="btn btn-success form-control">Restore</a>
                                                    </td>
                                                    <td>
                                                        <a href="/forceDelete/{{$item->id}}"
                                                            class="btn btn-danger form-control">Parmanent delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </button>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

    <script>
        $(document).ready(function() {
            $('.toggle-class').on('change', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var userId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('changeStatus') }}",
                    data: {
                        'status': status,
                        'userId': userId
                    },
                    success: function(data) {
                        alert(data.success);
                    }
                });

            });
        });
    </script>
</body>

</html>
