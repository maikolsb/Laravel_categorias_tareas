@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <div class="row mx-auto">
        <form action="{{ route('categories.update', ['category' => $category->id])  }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('name')
            <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la categoría</label>
                <input type="text" class="form-control" name='name' value="{{ $category->name }}">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color de la categoría</label>
                <input type="color" class="form-control" style="pointer-events: none;" name='color' value="{{ $category->color }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar categoría</button>
        </form>

        <div>
            <br>
            @if ($category->tareas->count() > 0)

            @foreach ($category->tareas as $tarea)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('tareas-edit', ['id' => $tarea->id]) }}">{{ $tarea->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('tareas-destroy', [$tarea->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach

            @else
            no hay tareas para esta categoria
            @endif
        </div>
    </div>
</div>
@endsection