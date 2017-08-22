<div class="col-md-7">
    {{-- Example accounts --}}
    <div class="card">
        <h3 class="card-header">Accounts</h3>
        <div class="card-block">
            <h4 class="card-title">example accounts to test site</h4>
            <p class="card-text">
                You can use on of example accounts listed below.
            </p>
            <div class="row">
                <div class="card-group">
                    {{-- Admin account --}}
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Admin</h4>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td><strong>Username</strong></td>
                                    <td>{{config('accounts.admin.name')}}</td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail</strong></td>
                                    <td>{{config('accounts.admin.email')}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Password</strong></td>
                                    <td>{{config('accounts.admin.password')}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" onclick="loginAdmin();">Login</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">User</h4>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td><strong>Username</strong></td>
                                    <td>{{config('accounts.user.name')}}</td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail</strong></td>
                                    <td>{{config('accounts.user.email')}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Password</strong></td>
                                    <td>{{config('accounts.user.password')}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary" onclick="loginUser();">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">
        var email, password, form;

        $(document).ready(function(){
            email = $('input[name="email"]');
            password = $('input[name="password"]');
            form = $('form');

        });

        function loginAdmin() {
            $(email).val('{{config('accounts.admin.email')}}');
            $(password).val('{{config('accounts.admin.password')}}');
            $(form).submit();
        }

        function loginUser() {
            $(email).val('{{config('accounts.user.email')}}');
            $(password).val('{{config('accounts.user.password')}}');
            $(form).submit();
        }
    </script>
@endsection

