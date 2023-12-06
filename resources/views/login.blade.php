<!doctype html>
<html lang="en">

<head>
    <title>LogIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="{{ asset('javascript/form.js') }}"></script>

</head>

<body>
    <main>
        @if (session('logOutMassage'))
        <div class="alert alert-info">
            {{ session('logOutMassage') }}
        </div>
    @endif
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div>
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50">Please enter your login and password!</p>

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-outline form-white mb-4">
                                            <input type="email" id="typeEmailX" value="{{ old('email') }}" name="email"
                                                class="form-control form-control-lg"/>
                                                    @error('email')
                                                <span class="text-danger">{{$message}}</span><br>
                                                     @enderror
                                            <label class="form-label" for="typeEmailX">Email</label>
                                            
                                        </div>
                                      

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" name="password"
                                                class="form-control form-control-lg typePasswordX"/>

                                            <div class="d-flex justify-content-start mt-1">
                                                <input type="checkbox" name="showPass" id="showPass"
                                                    class="form-check-input">&nbsp;Show password
                                            </div>
                                            @error('password')
                                            <span class="text-danger">
                                                {{$message}}</span><br>
                                            @enderror
                                            <label class="form-label" for="typePasswordX">Password</label>
                                        </div>
                                        
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit"
                                            name="submit">Login</button>
                                    </form>

                                </div>
                                <div>
                                    <p>Don't have an account? <a href="/" class="text-white-50 fw-bold">Sign
                                            Up</a>
                                    </p>
                                </div>
                                @if (session('error'))
                                    <p style="color:red">{{ session('error') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
