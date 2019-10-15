@extends('Admin.layouts.app')

@section('page_title', 'Edit User')
@section('page_tagline', '')

@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit User <small></small></h2>
        <?php /* ?>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <?php */ ?>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        @include('Admin.msg.message')
        <br />
        <form id="menu-form" action="{{ route('user.update', $user->id) }}" method="POST" data-parsley-validate
          class="form-horizontal form-label-left">
          @method('PUT')
          @csrf

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name:
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12"
                placeholder="Full Name" value="{{ old('name', $user->name) }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email:
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"
                placeholder="Email" value="{{ old('email', $user->email) }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password:
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12"
                placeholder="Password" value="{{ old('password') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="update_password" class="control-label col-md-3 col-sm-3 col-xs-12">Update Password:
              <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="radio-inline"><input type="radio" name="update_password" value="1"> Update Password
              </label>
              <label class="radio-inline"><input type="radio" name="update_password" value="0" checked> Don't Update
                Password
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_level">User Level:
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="user_level" id="user_level" class="form-control col-md-7 col-xs-12 chosen" required>
                <option value="null">Select Parent Menu</option>
                @if(isset($priority) && count($priority)>0)
                @foreach ($priority as $pr)
                <option value="{{$pr->id}}" @php if ($pr->id == old('user_level', $user->user_level))
                  echo " selected";
                  @endphp
                  >{{$pr->priority_name}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label class="radio-inline"><input type="radio" name="status" value="1"
                  <?php echo (old('status', $user->status) == 1) ? 'checked' : '' ?>>
                Active </label>
              <label class="radio-inline"><input type="radio" name="status" value="0"
                  <?php echo (old('status', $user->status) == 0) ? 'checked' : '' ?>>
                Inactive </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
