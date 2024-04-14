@extends('utilizador.utilizador_dashboard')
@section('conta')

<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
        <form id="actualizar_perfil" action="" method="POST">
            @csrf
        <h3 class="mb-4">Informações Pessoais</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome de Utilizador</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NIF</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Género</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data de Nascimento</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Província</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Município</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Distrito</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sobre</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </form>
                    </div>
                
</div>









{{-- <section class="inner-page">
    <div class="container">

      <section class="py-5 my-5">
        <div class="container">
            <h1 class="mb-5">Account Settings</h1>
            <div class="shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="shadow">
                        </div>
                        <h4 class="text-center">Eren Jaeger </h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i>
                            Account
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Password
                        </a>
                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <i class="fa fa-user text-center mr-1"></i>
                            Security
                        </a>
                        <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                            <i class="fa fa-tv text-center mr-1"></i>
                            Application
                        </a>
                        <a class="nav-link" id="notidication-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                            <i class="fa fa-bell text-center mr-1"></i>
                            Notification
                        </a>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <h3 class="mb-4">Account Setting</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Numebr</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <h3 class="mb-4">Password Setting</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <h3 class="mb-4">Security Setting</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Two-factor Auth</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="recovery">
                                        <label class="form-check-label" for="recovery">
                                        Recover
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                        <h3 class="mb-4">Application Setting</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="app-check">
                                        <label class="form-check-label" for="app-check">
                                        App Check
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                        Lorem ipsum dolor sit.
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                        <h3 class="mb-4">Notification Setting</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notification1">
                                        <label class="form-check-label" for="notification1">
                                            Lorem ipsum dolor sit Lorem ipsum dolor sit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notification2">
                                        <label class="form-check-label" for="notification2">
                                            Lorem ipsum dolor sit Lorem ipsum dolor sit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notification3">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Lorem ipsum dolor sit Lorem ipsum dolor sit
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">Update</button>
                            <button class="btn btn-light">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> --}}



        {{-- <section class="py-5 my-5">
          <div class="container">
              <h1 class="mb-5">Dasboard</h1>
              <div class="shadow rounded-lg d-block d-sm-flex">
                  <div class="profile-tab-nav border-right">
                      <div class="p-4">
                          <div class="img-circle text-center mb-3">
                              <img src="{{ (!empty($profileData->foto)) ? url('upload/utilizador_imagens/'.$profileData->foto) : url('upload/no_image.jpg') }}" alt="Image" class="shadow">
                          </div>
                          <h4 class="text-center"> {{ $profileData->nome_utilizador }} </h4>
                      </div>
                      <div class="nav flex-column nav-pills" id="v-pills" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                              <i class="fa fa-home text-center mr-1"></i>
                              Conta
                          </a>
                          <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                              <i class="fa fa-key text-center mr-1"></i>
                              Palavra-Passe
                          </a>
                          <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                              <i class="fa fa-user text-center mr-1"></i>
                              Agendamento
                          </a>
                          <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                              <i class="fa fa-tv text-center mr-1"></i>
                              Agendamentos
                          </a>
                          <a class="nav-link" id="notidication-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                              <i class="fa fa-bell text-center mr-1"></i>
                              Notification
                          </a>
                      </div>
                  </div>
                  <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                      <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                          <h3 class="mb-4">Informações Pessoais</h3>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Nome</label>
                                      <input type="text" class="form-control" value="{{$profileData->nome}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Nome de Utilizador</label>
                                      <input type="text" class="form-control" value="{{$profileData->nome_utilizador}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Email</label>
                                      <input type="text" class="form-control" value="{{$profileData->email}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Telefone</label>
                                      <input type="text" class="form-control" value="{{$profileData->telefone}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>NIF</label>
                                      <input type="text" class="form-control" value="{{$profileData->nif}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Género</label>
                                      <input type="text" class="form-control" value="{{$profileData->genero}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Data de Nascimento</label>
                                      <input type="text" class="form-control" value="{{$profileData->data_nascimento}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Província</label>
                                      <input type="text" class="form-control" value="{{$profileData->provincia}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Município</label>
                                      <input type="text" class="form-control" value="{{$profileData->municipio}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Distrito</label>
                                      <input type="text" class="form-control" value="{{$profileData->distrito}}">
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Sobre</label>
                                      <textarea class="form-control" rows="4" value="">{{$profileData->sobre}}</textarea>
                                  </div>
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary">Actualizar</button>
                              <button class="btn btn-light">Delete</button>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                          <h3 class="mb-4">Alterar Palavra-Passe</h3>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Palavra-Passe Antiga</label>
                                      <input type="text" class="form-control" value="">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Palavra-Passe Nova</label>
                                      <input type="text" class="form-control" value="">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Confirmar Palavra-Passe Nova</label>
                                      <input type="text" class="form-control" value="">
                                  </div>
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary">Update</button>
                              <button class="btn btn-light">Delete</button>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                          <h3 class="mb-4">Agendamentos</h3>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Login</label>
                                      <input type="text" class="form-control" value="">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Two-factor Auth</label>
                                      <input type="text" class="form-control" value="">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="recovery">
                                          <label class="form-check-label" for="recovery">
                                          Recover
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary">Update</button>
                              <button class="btn btn-light">Delete</button>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                          <h3 class="mb-4">Application Setting</h3>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="app-check">
                                          <label class="form-check-label" for="app-check">
                                          App Check
                                          </label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="defaultCheck2">
                                          <label class="form-check-label" for="defaultCheck2">
                                          Lorem ipsum dolor sit.
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary">Update</button>
                              <button class="btn btn-light">Delete</button>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                          <h3 class="mb-4">Notification Setting</h3>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="notification1">
                                          <label class="form-check-label" for="notification1">
                                              Lorem ipsum dolor sit Lorem ipsum dolor sit
                                          </label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="notification2">
                                          <label class="form-check-label" for="notification2">
                                              Lorem ipsum dolor sit Lorem ipsum dolor sit
                                          </label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="notification3">
                                          <label class="form-check-label" for="defaultCheck2">
                                              Lorem ipsum dolor sit Lorem ipsum dolor sit
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div>
                              <button class="btn btn-primary">Update</button>
                              <button class="btn btn-light">Delete</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section> --}}



@endsection