@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')

    <div class="col-md-12">
        <form action="{{ route('permision.update', $permission->id) }}"
              class="form-vertical"
              method="POST">
            @csrf
            <input name="_method"
                   type="hidden"
                   value="PATCH">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">@lang('panel.text.edit', ['value' => trans('panel.text.permission')])</h3>
                    <p>
                        <button type="submit"
                                class="btn btn-primary icon-btn"
                                data-toggle="tooltip"
                                title="@lang('panel.text.update', ['value' => trans('panel.text.permission')])">
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
                                    Nome da Permissão
                                </label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       id="name"
                                       placeholder="Nome da Permissão"
                                       value="{{ $permission->slug }}"
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
                                    Descrição
                                </label>
                                <textarea class="form-control"
                                          id="description"
                                          rows="4"
                                          placeholder="Descrição"
                                          name="description">{{ $permission->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="display_name"
                                       class="control-label">
                                    Display Name
                                </label>
                                <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       id="display_name"
                                       placeholder=" Display Name"
                                       value="{{ $permission->name }}"
                                       name="display_name"/>
                                @if ($errors->has('display_name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('display_name') }}</strong>
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

