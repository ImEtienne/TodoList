<!Doctype html>
<html>
<head>
    <meta charset="uft-8">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link rel="icon" href="icons-tasklist.png" type="image/x-icon"/>
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('style.css')}}" rel="stylesheet" media="screen" type="text/css"/>
</head>
<body>
@include('header')
<div class="main">
    <!-----------------------Confirmer avec succès------------------------->
    <div class="container-md">
        @if(session()->has('etat'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    <p class="etat"> {{session()->get('etat')}}</p>
                </div>
            </div>
        @endif
        <!----------------------------Message d\'erreur -------------------------->
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-------------------------- Affiche la liste des noms --------------------->
        @yield('todo')

    </div>
</div>

@include('footer')
<!-------------------------- JavaScript Bundle with Popper ------------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
