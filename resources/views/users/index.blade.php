@extends ('layout.app')
@section("content")
  <div class="title_content">
    <div class="module_title">
    <img src="https://cdn-teams-slug.flaticon.com/stickers.jpg" alt="" class="img_content">
    <h3>Configurações de Usuarios</h3>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $erro)
    <li>{{ $erro }}</li>
    @endforeach
    </ul>
    </div>
  @endif
  <div class="d-flex justify-content-between ">
    <div class="btn-group space-buttons" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
    <label class="btn btn-outline-brown" for="btncheck1">Ativo</label>

    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
    <label class="btn btn-outline-brown" for="btncheck2">Inativo</label>
    </div>
    <div class="space-buttons">
    <button type="button" class="btn btn-success btn-success-space" data-bs-toggle="modal"
      data-bs-target="#exampleModal" id="cadastrar">Cadastrar Usuario</button>
    </div>
  </div>
  <div class="module_users">
    <ul class="list-group">
    @foreach ($users as $user)
    <li class="list-group-item">
      <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
      <img src="https://cdn-teams-slug.flaticon.com/stickers.jpg" alt="" class="img_users">
      <div class="separator">
      <div class="name_list">
      <label class="form-check-label" for="secondCheckbox">{{$user->name}}</label>
      <label class="form-check-label" for="secondCheckbox">{{$user->id}}</label>
      </div>
      <div class="buttons_list">
      <div class="btn_rigth"><button class="btn btn-light editar" data-bs-toggle="modal"
        data-bs-target="#exampleModal" data-iduser="{{$user->id}}"
        data-urluser="{{route('user.edit', [$user->id])}}">Editar</button></div>
      </div>
      </div>
    </li>
    @endforeach
    </ul>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="{{route('user.store')}}" method="POST">
      @csrf
      <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" >Criar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">
        <div class="col-md-6">
          <label for="name">Nome:</label>
          <input type="text" class="form-control" placeholder="Digite seu Nome" name="name" id="name">
        </div>
        <div class="col-md-6">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" placeholder="Digite seu E-mail" name="email" id="email">
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <label for="password">Senha:</label>
          <input type="password" class="form-control" placeholder="Digite sua senha" name="password" id="password">
        </div>
        <div class="col-md-6">
          <label for="confirm_password">Confirme sua Senha:</label>
          <input type="password" class="form-control" placeholder="Digite sua senha" name="confirm_password"
          id="confirm_password">
        </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" onclick="criarUsuario()" class="btn btn-primary">Salvar</button>
      </div>
      </div>
    </form>
    </div>
  </div>




@endsection

@push('scripts')
  <script>
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    function criarUsuario() {
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();
    $.ajax({
      url: '{{route("user.store")}}',
      type: 'POST',
      data: {
      name: name,
      email: email,
      password: password,
      confirm_password: confirm_password
      },
      success: function (data) {

      console.log(data);
      },
      error: function (data) {
      console.log(data);
      }
    })
    }
    $('.editar').on('click', function () {
    let id = $(this).data('iduser');
    let url = $(this).data('urluser');

    $.ajax({
      url: url,
      type: 'GET',
      success: function (data) {
      console.log('sucesso', url);
      console.log('data:', data);

      $('#name').val(data.name);
      $('#email').val(data.email);
      }
    })
    })
  $('#cadastrar').on('click', function () {
    $('#name').val('');
    $('#email').val('');
  })



  </script>
@endpush