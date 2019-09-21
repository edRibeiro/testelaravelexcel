<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row mt-5">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                            <a class="btn btn-primary float-right" href="{{ url('clientes/create')}}">Novo Cliente
                                    <i class="fas fa-user-plus"></i>
                                </a>
                        <h3 class="card-title">Clientes</h3>
            
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>
                                        <a class="text-dark" href="#">
                                            ID
                                        </a>
                                    </th>
                                    <th>
                                        <a class="text-dark" href="#">
                                            Nome
                                        </a>
                                    </th>
                                    <th>CPF</th>
                                    <th>Celular</th>                        
                                    <th>
                                        <a class="text-dark" href="#">
                                            Data de Registro
                                        </a>
                                    </th>                        
                                   
                                </tr>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{-- $cliente->id --}}</td>
                                    <td>{{ $cliente->nome.' '.$cliente->sobrenome }}</td>
                                    <td>{{ $cliente->getFullCPF() }}</td>
                                    <td>{{ $cliente->celular }}</td>
                                    @if($cliente->created_at)
                                        <td>{{ $cliente->created_at }}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                      {{-- /.card-body -->
                      <div class="card-footer ">
                          <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
                          
                          <div class="d-flex justify-content-center">{{ $clientes->links() }}</div>
                      </div>
                    </div>
                    <!-- /.card --}}
                  </div>
                </div>    
            
            </div>
            
            <div id="DeleteModal" class="modal fade " role="dialog">
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <form action="" id="deleteForm" method="post">
                      <div class="modal-content">
                          <div class="modal-header bg-warning">                  
                              <h4 class="modal-title text-center">Confirmar Exclusão</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            @method('delete')
                            @csrf 
                              <p class="text-center">Tem certeza de que deseja excluir?</p>
                          </div>
                          <div class="modal-footer">
                              
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, Remover</button>
                              
                          </div>
                      </div>
                  </form>
                </div>
               </div>
               {{--
               <script type="application/javascript">
                function deleteData(id)
                 {
                     var id = id;
                     var url = '{{ route("clientes.destroy", ":id") }}';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }
            
                function formSubmit()
                {
                    $("#deleteForm").submit();
                }
             </script>
             --}}
        </div>
        <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    </body>
</html>
