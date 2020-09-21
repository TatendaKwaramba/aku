- handle failed jobs
- add checkboxes to approve table
- create job queue for approve all
- exception handling
- proper input validation

if (this.checked)
  $(':checkbox').each ->
    $(this).prop('checked', true)                     
else
  $(':checkbox').each ->
    $(this).prop('checked', false)

document.querySelector('.checkAll').addEventListener('click', e => {
  if (e.target.value == 'Check All') {
    document.querySelectorAll('.container-bikes input').forEach(checkbox => {
      checkbox.checked = true;
    });
    e.target.value = 'Uncheck All';
  } else {
    document.querySelectorAll('.container-bikes input').forEach(checkbox => {
      checkbox.checked = false;
    });
    e.target.value = 'Check All';
  }
});

const checkAllButton = document.getElementById("checkAll");
const checkboxes = document.getElementsByClassName("first");
let isChecked = false;
checkAllButton.addEventListener("click", function(){
  isChecked = !isChecked;
  //check or uncheck inputs
  for(checkbox of checkboxes){
    if(isChecked){
      checkbox.setAttribute('checked', true);
    } else {
      checkbox.removeAttribute('checked');
    }
  }
  checkAllButton.value = isChecked ? "Uncheck All" : "Check All";
});

document.getElementById("Toggle-Switch").addEventListener("click", toggle);

function toggle(source) {
  checkboxes = document.getElementsByName('inputLableautyNoLabeledCheckbox');
  alert('TEST2' + source);
  for (var i = 0, n = checkboxes.length; i < n; i++) {
    checkboxes[i].checked = document.getElementById("Toggle-Switch").checked;
  }
}

$('.check-all').click(function () {
    var checked = this.prop('checked');   
    this.closest('table').find(':checkbox').prop('checked', checked);
}

228
$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all');
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    })
})

$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

$('.checkAll').click(function(){
    if($(this).attr('checked')){
        $('input:checkbox').attr('checked',true);
    }
    else{
        $('input:checkbox').attr('checked',false);
    }
});

  $(function() {
    // ID selector on Master Checkbox
    var masterCheck = $("#masterCheck");
    // ID selector on Items Container
    var listCheckItems = $("#list-wrapper :checkbox");

    // Click Event on Master Check
    masterCheck.on("click", function() {
      var isMasterChecked = $(this).is(":checked");
      listCheckItems.prop("checked", isMasterChecked);
      getSelectedItems();
    });

    $('.checkAll').change(function(){
    var state = this.checked; //checked ? - true else false

    state ? $(':checkbox').prop('checked',true) : $(':checkbox').prop('checked',false);

    //change text
    state ? $(this).next('b').text('Uncheck All') : $(this).next('b').text('Check All')
});


$('#checkall').checkAll('#slaves input:checkbox', {
    reportTo: function () {
        var prefix = this.prop('checked') ? 'un' : '';
        this.next().text(prefix + 'check all');
    }
});​

$('input[type=checkbox][class=cb-element]').attr('checked',this.checked)

$("#check_uncheck").change(function() {
    $(".checkboxes input:checkbox").prop("checked",$(this).is(':checked'));
})