@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('/business/transfer') }}">
        <input type="hidden" name="name" value="{{ $name }}"/>
        <input type="hidden" name="account" value="{{ $account }}"/>
        <input type="hidden" name="id" value="{{ $id }}"/>
        <input type="hidden" name="dep" value="{{ $deposit }}"/>
        <input type="hidden" name="com" value="{{ $commission }}"/>
        <div class="card col s6 offset-s3" class="addSingleAgent">
            <div class="card-content  with-padding " style="font-size: large">
                <strong>@if(isset($data['name']))
                    {{ $data['name'] }}
                @endif</strong><span class="right">@if(isset($data['name']))
                    {{ $data['account'] }}
                @endif</span>
            </div>

            <div class="card-content with-padding">
                    <div class="row">
                    <small><label for="">Please choose one either Commission or Balance to transfer from</label></small>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input name="deposit" type="number"
                                class="validate" placeholder="Deposit">
                        </div>
                    </div>
 

                <div class="row">
                    <div class="input-field">
                        <input name="commission" type="number"
                            class="validate" placeholder="Commission">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field">
                        <input name="bank_code" type="number"
                            class="validate" placeholder="Bank Code" required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <button type="submit" class="btn blue btn-primary">
                            Transfer
                        </button>
                    </div>

                </div>
                <div class="row">
                    <small><label for="" class="teal-text">You will receive an OTP code for verification of Transfer. It expires in 30 minutes.</label></small>
                </div>
            </div>
        </div>

        </div>
        </div>

        </div>

    </form>

@stop
@push('script')
<script>
      $(document).ready(function(){
            $('select').material_select();
        });
</script>
@endpush
