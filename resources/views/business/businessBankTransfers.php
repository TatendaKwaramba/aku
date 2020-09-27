<div style="display: inline-block">
<form method="post" action="/business/addtransfer">
        <input type="hidden" name="name" value="{{businessInfo.name}}">
        <input type="hidden" name="account" value="{{businessInfo.account}}">
        <input type="hidden" name="deposit" value="{{businessInfo.deposit}}">
        <input type="hidden" name="commission" value="{{businessInfo.commission}}">
        <input type="hidden" name="mobile" value="{{businessInfo.cellphone}}">
        <input type="hidden" name="id" value="{{businessInfo.id}}">
        <button id="20009" type="submit" class="waves-effect waves btn-flat indigo accent-3 white-text
                        <?php if (Auth::user()->hasRole('admin_global')) {
        echo " uiroles ";
        } ?>"
                ><i class="fa fa-trash-o" aria-hidden="true"></i> TRANSFER
        </button>
</form>
</div>