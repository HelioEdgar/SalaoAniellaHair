@extends('utilizador.utilizador_dashboard')
@section('conta')

<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
        <form id="actualizar_perfil" action="" method="POST">
            @csrf
            
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
                    </form>
                    </div>
                
</div>



@endsection