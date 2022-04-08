@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
@endsection


@section('botones')

<a href= "{{route('recetas.index')}}" class="btn btn-primary mr-2">VOLVER</a>
@endsection

@section('content') 
       <h2 class="text-center mb-5">Crear Nueva Receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            
      

            <form method="POST" action="{{route('recetas.store')}}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group"> 
                    <label for="titulo">Titulo Receta</label>
                        <input type="text" name="titulo" class="form-control 
                        @error('titulo') is-invalid @enderror" id="titulo" placeholder="Titulo Receta"
                        value={{old('titulo')}}
                        >
                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="categoria"> Categoria </label>
                    <select name="categoria" class="form-control @error('titulo') is-invalid @enderror"
                    id="categoria">
                    <option value="">--SELECCIONE--</option>    

                    @foreach($categorias as $id => $categoria)
                        <option value="{{$id}}" 
                        {{old('categoria')==$id ? 'selected': ''}}> 
                               {{$categoria}}                            
                        </option>
                        
                        @endforeach
                    </select>

                        @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                        @enderror

                </div>
                
                <div class="form-group">
                    <label for="preparacion">Preparación</label>
                <input id="preparacion" type="hidden" name="preparacion" value="{{old('preparacion')}}">
                    <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror"> </trix-editor>
                    @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="ingredientes">ingredientes</label>
                <input id="ingredientes" type="hidden" name="ingredientes" value="{{old('ingredientes')}}">
                    <trix-editor input="ingredientes"  class="form-control  @error('ingredientes') is-invalid @enderror"> </trix-editor>
                    @error('categoria')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}} </strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="image">Elige la Imagen</label>
                <input id="imagen"
                 type="file"
                 class="form-control @error('imagen') is-invalid @enderror"
                 name="imagen">
                
                </div>



                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="AGREGAR RECETA"/>
                </div>

            </form>

        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous"></script>
@endsection