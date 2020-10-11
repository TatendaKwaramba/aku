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
                        <select name="bank" class="browser-default">
                            <option value="" disabled selected>Select</option>
                            <option value="ALAT by WEMA">ALAT by WEMA</option>
                            <option value="ASO Savings and Loans">ASO Savings and Loans</option>
                            <option value="Bowen Microfinance Bank">Bowen Microfinance Bank</option>
                            <option value="CEMCS Microfinance Bank">CEMCS Microfinance Bank</option>
                            <option value="Citibank Nigeria">Citibank Nigeria</option>
                            <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                            <option value="Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
                            <option value="Eyowo">Eyowo</option>
                            <option value="Fidelity Bank">Fidelity Bank</option>
                            <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                            <option value="First City Monument Bank">First City Monument Bank</option>
                            <option value="FSDH Merchant Bank Limited">FSDH Merchant Bank Limited</option>
                            <option value="Globus Bank">Globus Bank</option>
                            <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                            <option value="Hackman Microfinance Bank">Hackman Microfinance Bank</option>
                            <option value="Hasal Microfinance Bank">Hasal Microfinance Bank</option>
                            <option value="Heritage Bank">Jaiz Bank</option>
                            <option value="Keystone Bank">Kuda Bank</option>
                            <option value="Lagos Building Investment Company Plc.">Lagos Building Investment Company Plc.</option>
                            <option value="One Finance">One Finance</option>
                            <option value="Parallex Bank">Parallex Bank</option>
                            <option value="Parkway - ReadyCash">Parkway - ReadyCash</option>
                            <option value="Polaris Bank">Polaris Bank</option>
                            <option value="Providus Bank">Providus Bank</option>
                            <option value="Rubies MFB">Rubies MFB</option>
                            <option value="Sparkle Microfinance Bank">Sparkle Microfinance Bank</option>
                            <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                            <option value="Sterling Bank">Sterling Bank</option>
                            <option value="Suntrust Bank">Suntrust Bank</option>
                            <option value="TAJ Bank">TAJ Bank</option>
                            <option value="TCF MFB">TCF MFB</option>
                            <option value="Titan Bank">Titan Bank</option>
                            <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                            <option value="United Bank For Africa">United Bank For Africa</option>
                            <option value="Unity Bank">Unity Bank</option>
                            <option value="Unity Bank">Unity Bank</option>
                            <option value="Unity Bank">Unity Bank</option>
                            <option value="VFD">VFD</option>
                            <option value="Wema Bank">Wema Bank</option>
                            <option value="Access Bank">Access Bank</option>
                            <option value="Access Bank (Diamond)">Access Bank (Diamond)</option>
                            <option value="Zenith Bank">Zenith Bank</option>
                        </select>

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
