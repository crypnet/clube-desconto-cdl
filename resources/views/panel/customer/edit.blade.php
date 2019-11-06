@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{ route('customer.update', $user->id) }}"
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
                                <label for="fantasy_name"
                                       class="control-label">
                                    Nome Fantasia
                                </label>
                                <input class="form-control {{ $errors->has('fantasy_name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       id="fantasy_name"
                                       placeholder="Nome Fantasia"
                                       value="{{ $user->fantasy_name }}"
                                       name="fantasy_name"/>
                                @if ($errors->has('name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('fantasy_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="reason_name"
                                       class="control-label">
                                    Razão Social
                                </label>
                                <input type="text"
                                       class="form-control {{ $errors->has('reason_name') ? 'is-invalid' : '' }}"
                                       name="reason"
                                       value="{{ $user->reason_name }}"
                                       id="reason_name"
                                       placeholder="Razão Social"/>
                                @if ($errors->has('reason_name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('reason_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="cnpj"
                                       class="control-label">
                                    CNPJ
                                </label>
                                <input type="text"
                                       class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : '' }}"
                                       name="cnpj"
                                       value="{{ formatMask($user->cnpj, strlen($user->cnpj) == 14 ? '##.###.###/####-##' : '###.###.###-##') }}"
                                       id="cnpj"
                                       placeholder="CNPJ"/>
                                @if ($errors->has('cnpj'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="status"
                                       class="control-label">
                                    @lang('panel.customer_prospects.type_person')
                                </label>
                                <select class="form-control"
                                        name="status"
                                        id="status">
                                    @if($user->status ==1)
                                    <option selected="selected" value="1">
                                        Ativo
                                    </option>
                                    <option value="0">
                                        Inativo
                                    </option>
                                        @else
                                        <option  value="1">
                                            Ativo
                                        </option>
                                        <option selected="selected" value="0">
                                            Inativo
                                        </option>
                                    @endif
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
<script>
    $('#status').
</script>
@endsection

