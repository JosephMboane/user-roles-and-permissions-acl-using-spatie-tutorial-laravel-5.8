@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Processo</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a style="background-color: #87EFFE; color: black" class="btn btn-success" href="{{ route('products.create') }}"> Adicionar Processo</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div id="successMessage" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
{{--            <th>N</th>--}}
            <th>N° de Processo</th>
            <th>Tipo Legal de Crime</th>
            <th>Detalhes</th>
            <th width="280px">Acções</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
{{--	        <td>{{ ++$i }}</td>--}}
	        <td>{{ $product->id }}-10-D/2020</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Mostrar</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}

{{--<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
@endsection

