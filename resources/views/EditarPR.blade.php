@extends('admin.head')


            <form action="/ActualizarPR/{{$Producto->id}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Editar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Nombre del producto</label>
                        <input type="text" class="form-control" required name='Pnombre' value="{{$Producto->Nombre}}">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" required name ='Pdescripcion' value="{{$Producto->Descripcion}}">
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" min="1" class="form-control" required name ='Pcantidad' value="{{$Producto->Cantidad}}">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type='text' class="form-control" required name ='Pprecio' value="{{$Producto->Precio}}">
                    </div>
                    <label>Tipo de Categorias</label>
                    <label for="categoria"></label>
                    <select id="categoria"  name="categoria" value ="{{$Producto->category->id}}">
                    @if (!is_null($Categoria))
                        @foreach ($Categoria as $c)
                        <option value="{{$c->id}}">{{$c->id}}.-{{$c->Nombre}}</option>
                        @endforeach
                    @endif
                       
                    </select> 
                    <div class="form-group">
                        <strong>Imagen:</strong>
                        <input type="file" name="urlfoto" id="imgp">
                    </div>                
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="/productos" role="button">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
    