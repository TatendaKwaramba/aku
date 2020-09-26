@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('/business/transfer') }}">
        <input type="hidden" name="name" value="{{ $name }}"/>
        <input type="hidden" name="account" value="{{ $account }}"/>
        <input type="hidden" name="id" value="{{ $id }}"/>
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
            </div>
        </div>

        </div>
        </div>

        </div>

    </form>

@stop
