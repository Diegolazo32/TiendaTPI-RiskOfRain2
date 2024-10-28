

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Inicio - {{$User->nombre}}</title>
    <!--<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>-->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>

@include('templates.navAuth')

@if($User->rol == 'Usuario')
@endif


    
    
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <h1>Productos</h1>
                    
                    <form action="{{route('tienda.buscar')}}" method="post" class="">
                        @csrf
                        <input type="text" name="buscar" id="buscar" class="form-control">
                        <button type="submit" class="btn btn-primary mt-3">Buscar</button>
                        <a href="{{route('tienda.Auth')}}"><input type="button" class="btn btn-primary ms-2 mt-3" value="Limpiar busqueda"></a>
                        
                    </form>
                    <div class="row">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            </div>
                    @endif
                        @foreach ($productos as $Producto)
                            <div class="col-4 mt-4">
                                <div class="card">
                                <img src="{{asset('storage').'/'.$Producto->foto}}" width="auto" height="400">
                                    <div class="card-body">
                                        <h5 class="card-title less-chars">{{$Producto->nombre}}</h5>
                                        <p class="card-text fifty-chars" >{{$Producto->descripcion}}</p>
                                        <p class="card-text">Precio: ${{$Producto->precio_venta}}</p>

                                        

                                        
                                                <form action="{{route('tienda.addCarrito')}}" method="POST" class="">
                                                    @csrf
                                                    <input type="hidden" name="producto_id" value="{{$Producto->id}}">
                                                    <input type="hidden" name="usuario_id" value="{{$User->id}}">
                                                    <input type="number" name="cantidad" value="1" min="1" max="10" class="form-control mb-2">
                                                                                                
                                                    <button type="submit" class="btn btn-primary" width="">Añadir al carrito</button>
                                                </form>
                                           

                                                <a href="{{route('tienda.showProducto', $Producto->id)}}" class="btn btn-primary mt-2">Ver producto</a>
                                            @php
                                                $found=false;
                                            @endphp    

                                            
                                                @foreach($wish as $deseo)
                                                    @if($Producto->id == $deseo->producto_id)
                                                        <form action="{{route('tienda.deleteWish', $deseo->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-block mt-2">Eliminar de la lista de deseos</button>
                                                        </form>
                                                        @php
                                                            $found=true;
                                                        @endphp    
                                                    @endif
                                                @endforeach
                                                @if($found==false)
                                                    <form action="{{route('tienda.addWish')}}" method="POST">

                                                        @csrf
                                                        <input type="hidden" name="producto_id" value="{{$Producto->id}}">
                                                        <input type="hidden" name="usuario_id" value="{{$User->id}}">

                                                        <button type="submit" class="btn btn-primary mt-2">Añadir a la lista de deseos</button>
                                                    </form>
                                                @endif    

                                        

                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>