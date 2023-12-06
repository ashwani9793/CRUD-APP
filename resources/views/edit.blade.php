<!doctype html>
<html lang="en">

<head>
    <title>Update data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <main>
        <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5 text-center">
                                    <h2 class="text-uppercase text-center mb-5">Update Record</h2>

                                    <form action="/update/{{$crudModel->id}}" method="POST">
                                        @csrf
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1cg">Your Name</label>

                                            <input type="text" id="form3Example1cg"
                                                class="form-control form-control-lg" name="name" value="{{$crudModel->name}}">
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3cg">Your Email</label>

                                            <input type="email" id="form3Example3cg"
                                                class="form-control form-control-lg" name="email" value="{{$crudModel->email}}">
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4cg">Password</label>

                                            <input type="password" id="form3Example4cg"
                                                class="form-control form-control-lg" name="password" value="{{$crudModel->password}}">
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                                type="submit" value="Update" name="submit">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
