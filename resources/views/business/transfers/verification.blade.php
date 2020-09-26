@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('/business/transfer/finalize') }}">
        <div class="card col s6 offset-s3" class="addSingleAgent">
            <div class="card-content  with-padding " style="font-size: large">
                <strong>Verify Transfer</strong>
            </div>

            <div class="card-content with-padding">
                <input name="id" type="hidden" value="{{ $id }}">
                <input name="transfer_code" type="hidden" value="{{ $transfercode }}">
                <div class="row">
                    <div class="input-field">
                        <input name="otp" type="number"
                            class="validate" placeholder="OTP Code">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field">
                        <button type="submit" class="btn blue btn-primary">
                            Verify
                        </button>
                    </div>
                </div>
        </div>

        </div>
        </div>

        </div>

    </form>

@stop
