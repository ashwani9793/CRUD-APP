<!doctype html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('javascript/form.js') }}"></script>

</head>

<body>
    <main>
       <section class="vh-100 bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="row bg-dark p-2 langButton"><span class="text-white text-center pb-2 pt-0">Change Language</span>
                    <a class="btn btn-outline-primary" href="{{url('/en')}}" role="button">English</a>
                    <a class="btn btn-outline-warning" href="{{url('/hi')}}" role="button">हिंदी</a>
                    <a class="btn btn-outline-info" href="{{url('/guj')}}" role="button">गुजराती</a>
                </div>
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px; background-color:black; color:white">
                                <div class="card-body p-5 text-center">
                                    <h2 class="text-uppercase text-center text-info">@lang('lang.title')</h2>

                                    <form action="/submit" method="POST" id="login">
                                        @csrf
                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form3Example1cg">@lang('lang.name')</label>

                                            <input type="text" id="form3Example1cg" value="{{old('name')}}"
                                                class="form-control form-control-lg" name="name" />
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3cg">@lang('lang.email')</label>

                                            <input type="email" id="form3Example3cg"
                                                class="form-control form-control-lg" name="email" value="{{old('email')}}"/>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typePasswordX">@lang('lang.password')</label>
                                              
                                            <input type="password" class="form-control form-control-lg typePasswordX" name="password" />
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typePasswordX">@lang('lang.rpassword')</label>
                                                <input type="password" class="form-control form-control-lg typePasswordX" name="password_confirmation" />
                                                @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror

                                                <div class="d-flex justify-content-start mt-1">
                                                    <input type="checkbox" name="showPass" id="showPass"
                                                        class="form-check-input">&nbsp;@lang('lang.showPass')
                                                </div>                                       
                                            </div>

                                        <div class="d-flex justify-content-center">
                                            <a href="/login" class="bn5"><input class="btn text-white"
                                                type="submit" value="@lang('lang.submit')" name="submit"></a>
                                                
                                                <a href="/login" class="bn5"><input class="btn text-white"
                                                type="button" value="@lang('lang.login')" name="login"></a>
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
