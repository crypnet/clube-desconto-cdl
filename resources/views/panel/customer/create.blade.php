@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <form action="{{ route('customer.store') }}"
              class="form-vertical"
              method="POST">
            @csrf
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="tile-title">@lang('panel.text.create_m', ['value' => trans('panel.text.client')])</h3>
                    <p>
                        <button type="submit"
                                class="btn btn-primary icon-btn"
                                data-toggle="tooltip"
                                title="@lang('panel.text.store', ['value' => trans('panel.text.client')])">
                            <i class="fa fa-floppy-o mr-0"
                               aria-hidden="true"></i>
                        </button>
                    </p>
                </div>
                <div class="tile-body"
                     style="margin-top: -2%">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="fantasy_name"
                                                   class="control-label">
                                                @lang('panel.customer_prospects.fantasy_name')
                                            </label>
                                            <input class="form-control {{ $errors->has('fantasy_name') ? 'is-invalid' : '' }}"
                                                   type="text"
                                                   id="fantasy_name"
                                                   placeholder="@lang('panel.customer_prospects.fantasy_name')"
                                                   value="{{ old('fantasy_name') }}"
                                                   name="fantasy_name"/>
                                            @if ($errors->has('fantasy_name'))
                                                <div class="form-control-feedback">
                                                    <strong>{{ $errors->first('fantasy_name') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="reason"
                                                   class="control-label">
                                                @lang('panel.customers.store')
                                            </label>
                                            <input class="form-control {{ $errors->has('store') ? 'is-invalid' : '' }}"
                                                   type="text"
                                                   id="reason"
                                                   placeholder="@lang('panel.customers.store')"
                                                   value="{{ old('reason') }}"
                                                   name="reason"/>
                                            @if ($errors->has('reason'))
                                                <div class="form-control-feedback">
                                                    <strong>{{ $errors->first('reason') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="cnpj_cpf"
                                                   class="control-label">
                                                @lang('panel.customer_prospects.cnpj_cpf')
                                            </label>
                                            <input class="form-control {{ $errors->has('cnpj_cpf') ? 'is-invalid' : '' }} cnpj_cpf"
                                                   type="text"
                                                   id="cnpj_cpf"
                                                   placeholder="@lang('panel.customer_prospects.cnpj_cpf')"
                                                   value="{{ old('cnpj_cpf') }}"
                                                   name="cnpj_cpf"
                                                   data-inputmask='"mask": "999.999.999-99"'
                                                   data-mask/>
                                            @if ($errors->has('cnpj_cpf'))
                                                <div class="form-control-feedback">
                                                    <strong>{{ $errors->first('cnpj_cpf') }}</strong>
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
                                                <option value="1">
                                                  Ativo
                                                </option>
                                                <option value="0">
                                                    Inativo
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('extra-script')
    <script src="{{ asset('js/mask.js') }}"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('[data-mask]').inputmask();
        $('.cnpj_cpf').inputmask('99.999.999/9999-99');
    });

</script>
@endsection

