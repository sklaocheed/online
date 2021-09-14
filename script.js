$(document).ready(function(){
  $('#idcard').on('keyup',function(){
    if($.trim($(this).val()) != '' && $(this).val().length == 13){
      id = $(this).val().replace(/-/g,"");
      var result = Script_checkID(id);
      if(result === false){
        $('span.error').removeClass('true').text('เลขบัตรประชาชนของท่านไม่ถูกต้อง');
      }else{
        $('span.error').addClass('true').text('เลขบัตรประชาชนของท่านถูกต้อง');
      }
    }else{
      $('span.error').removeClass('true').text('');
    
    }
  })
});

function Script_checkID(id){
    if(! IsNumeric(id)) return false;
    if(id.substring(0,1)== 0) return false;
    if(id.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i);
    if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
    return true;
}
function IsNumeric(input){
    var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
    return (RE.test(input));
}