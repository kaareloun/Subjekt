<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="" action="/" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="input-group">
                          <input type="text" name="username" class="form-control" placeholder="Username" value="{{old('username')}}">
                          {{$errors->first('username')}}
                        </div>
                        <div class="input-group">
                          <input type="password" name="password" class="form-control" placeholder="Password">
                          {{$errors->first('password')}}
                        </div>
                        <div class="input-group">
                            <input type="submit" name="submit" value="Login">
                        </div>
                    </form>
                    Test kasutaja: kasutaja/parool
                </div>
            </div>
        </div>
    </div>
</div>
