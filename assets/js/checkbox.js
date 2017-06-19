// 検索機能
$(function (){
  //チェックボックスがクリックされた時の動作
  $("#select label input").click(function() {
    $(this).parent().toggleClass("selected");
    $.each($chkbxFilter_tags, function() {
      if($('#' + this).is(':checked')) {
        $("#result " + $chkbxFilter_blocks + ":not(." + this + ")").addClass('hidden-not-' + this);
        $chkbxFilter_all.prop('checked',false).parent().removeClass("selected");
      }
      else if($('#' + this).not(':checked')) {
        $("#result " + $chkbxFilter_blocks + ":not(." + this + ")").removeClass('hidden-not-' + this);
      }
    });

    //チェックボックスが1つも選択されていない場合には表示しない
    if ($('.sort:checked').length == 0 ){
      document.getElementById("result").style.display="none";
    }
  });
});
