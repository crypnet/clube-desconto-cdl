@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{ route('roles.update', $role->id) }}"
              class="form-vertical"
              method="POST">
            @csrf
            <input name="_method"
                   type="hidden"
                   value="PATCH">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">@lang('panel.text.edit', ['value' => trans('panel.text.role')])</h3>
                    <p>
                        <button type="submit"
                                class="btn btn-primary icon-btn"
                                data-toggle="tooltip"
                                title="@lang('panel.text.update', ['value' => trans('panel.text.role')])">
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
                                       value="{{ $role->name }}"
                                       name="name"/>
                                @if ($errors->has('name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">
                                    @lang('panel.entry.description')
                                </label>
                                <textarea class="form-control"
                                          id="description"
                                          rows="4"
                                          placeholder="@lang('panel.place.description')"
                                          name="description">{{ $role->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="display_name"
                                       class="control-label">
                                    @lang('panel.entry.display_name')
                                </label>
                                <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       id="display_name"
                                       placeholder="@lang('panel.place.display_name')"
                                       value="{{ $role->name }}"
                                       name="display_name"/>
                                @if ($errors->has('display_name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="permissions"
                                       class="control-label">
                                    @lang('panel.entry.permissions')
                                </label>
                                <select id="optgroup"
                                        class="ms"
                                        multiple="multiple"
                                        name="permissions[]">
                                    @foreach ($permissions as $p)
                                        <option value="{{ $p->id }}" {{ (in_array($p->id, $role_permissions, true)) ? 'selected' : '' }}>
                                            {{ $p->name }}
                                        </option>
                                    @endforeach
                                </select>
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

