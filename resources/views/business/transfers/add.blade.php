@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('/business/transfer') }}">
        <input type="hidden" name="name" value="{{ $name }}"/>
        <input type="hidden" name="account" value="{{ $account }}"/>
        <div class="card" class="addSingleAgent">
            <div class="card-content blue white-text  with-padding " style="font-size: large">
                <strong>@if(isset($data['name']))
                    {{ $data['name'] }}
                @endif</strong><span class="right">@if(isset($data['name']))
                    {{ $data['account'] }}
                @endif</span>
            </div>

            <div class="card-content with-padding">

                    <div class="row valign center">
                        <div class="input-field col s6 valign center">
                            <input name="deposit" id="agent_first_name" type="number"
                                class="validate" required>
                            <label for="agent_first_name"><strong>Deposit</strong></label>
                        </div>
                    </div>
 

                <div class="row valign center">
                    <div class="input-field col s6 valign center">
                        <input name="commission" id="agent_id_number" type="number"
                            class="validate">
                        <label for="agent_id_number"><strong>Commission</strong></label>
                    </div>
                </div>
                <div class="row valign center">
                    <div class="input-field col s6">
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
