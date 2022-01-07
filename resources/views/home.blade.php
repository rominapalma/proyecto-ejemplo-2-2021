<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/app.css') }}">
    <!-- Importación de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    @include('includes.navbar')
    <section class="mt-5">
        <div class="container ">
            <h4 class="mb-5">Elige un curso:</h4>
            <div class="row text-center mb-4">
                @foreach ($courses as $course)
                <div class="col-4 d-flex justify-content-center my-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$course->image}}" class="card-img-top" alt="Imagen de curso">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->name}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="/course/{{ $course->id }}" class="btn btn-primary">Ir al curso</a>
                        </div>
                    </div>
                </div>     
                @endforeach
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>