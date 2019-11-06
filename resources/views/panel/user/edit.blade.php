@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{ route('users.update', $user->id) }}"
              class="form-vertical"
              method="POST">
            @csrf
            <input name="_method"
                   type="hidden"
                   value="PATCH">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">@lang('panel.text.edit', ['value' => trans('panel.text.user')])</h3>
                    <p>
                        <button type="submit"
                                class="btn btn-primary icon-btn"
                                data-toggle="tooltip"
                                title="@lang('panel.text.update', ['value' => trans('panel.text.user')])">
                            <i class="fa fa-floppy-o mr-0"
                               aria-hidden="true"></i>
                        </button>
                    </p>
                </div>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name"
                                       class="control-label">
                                    @lang('panel.entry.name')
                                </label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       id="name"
                                       placeholder="@lang('panel.place.name')"
                                       value="{{ $user->name }}"
                                       name="name"/>
                                @if ($errors->has('name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="role"
                                       class="control-label">
                                    @lang('panel.entry.role')
                                </label>
                                <select class="form-control"
                                        name="role"
                                        id="role">
                                    @foreach ($roles as $r)
                                        <option value="{{ $r->id }}" {{ !is_null($user->role) && $user->role->id === $r->id ?
										'selected="selected"' : '' }}>
                                            {{ $r->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password"
                                       class="control-label">
                                    @lang('panel.entry.password')
                                </label>
                                <input type="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       name="password"
                                       id="password"
                                       placeholder="@lang('panel.place.password')"/>
                                @if ($errors->has('password'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation"
                                       class="control-label">
                                    @lang('panel.entry.password_confirmation')
                                </label>
                                <input type="password"
                                       class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                       name="password_confirmation"
                                       id="password_confirmation"
                                       placeholder="@lang('panel.place.password_confirmation')"/>
                                @if ($errors->has('password_confirmation'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email"
                                       class="control-label">
                                    @lang('panel.entry.email')
                                </label>
                                <input type="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       name="email"
                                       value="{{ $user->email }}"
                                       id="email"
                                       placeholder="@lang('panel.place.email')"/>
                                @if ($errors->has('email'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('extra-script')

@endsection

