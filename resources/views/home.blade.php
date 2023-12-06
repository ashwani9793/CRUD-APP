<!doctype html>
<html lang="en">

<head>
  <title>Welcome Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css')}}">
</head>

<body>
  <header>
    <nav class="nav justify-content-center  ">
      <a class="nav-link active" href="#" aria-current="page">Active link</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link" href="/login">Logout</a>
    </nav>
  </header>
  <main>
    <div class="container text-center">
      <p>Welcome {{ $email }}, visit again.😊</p>
    </div>
  </main>
  <footer>
  </footer>
</body>

</html>