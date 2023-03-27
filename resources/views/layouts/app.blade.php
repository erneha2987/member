<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
/* Header styles */
header {
  background-color: #f8f9fa;
  padding: 10px 0;
}
.navbar-brand {
  font-weight: bold;
}
.nav-link {
  font-size: 1.1rem;
}

/* Main styles */
main {
  margin-top: 20px;
}

/* Footer styles */
footer {
  background-color: #f8f9fa;
  padding: 10px 0;
  margin-top: 20px;
}
footer p {
  text-align: center;
  font-size: 0.9rem;
  margin-bottom: 0;
}

/* Global styles */
.container {
  max-width: 960px;
  margin: 0 auto;
}

</style>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="">My App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('schools.index') }}">Schools</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>Copyright &copy; {{ date('Y') }}
                <a href="">My App</a>. All rights reserved.
            </p>
        </div>
    </footer>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
