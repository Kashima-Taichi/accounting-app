// リンクにマウスがあたっている時とそうでない時のスタイル調整
$(function() {$('[id=link]').mouseover(function() {
        $(this).css({'color':'#FFDF00'});
    })
    .mouseleave(function() {
        $(this).css({'color':'#008BBB'});
    }); 
});