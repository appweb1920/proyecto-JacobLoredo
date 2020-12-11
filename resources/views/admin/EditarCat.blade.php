@extends('admin.head')


            <form action="/ActualizarCat/{{$Categoria->id}}" method="post" >
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Editar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Nombre de la categoria</label>
                        <input type="text" class="form-control" required name='Cnombre' value="{{$Categoria->Nombre}}">
                    </div>           
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="/productos" role="button">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Agregar">
                </div>
            </form>
    