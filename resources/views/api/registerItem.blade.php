<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/post.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

<!-- REGISTRAR PRODUCTO DESDE ADMIN -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a href="{{route('adminUser.index')}}"><button  class="btn btn-primary btn-block ms-2">Regresar</button></a>
    </nav>
   
    <div class="container d-flex justify-content-center mt-3">
        <div class="card">
                <div class="card-body">
                    <h1>Crear producto</h1>

                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                     @include('templates.form')
                    </form>

                </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>