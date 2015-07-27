<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><script type="text/javascript" src="templates/default/js/combobox.js"></script>
<script language="javascript" src="templates/default/js/jsgst.js"></script>
<script language="javascript" src="templates/default/js/jsgst_autocomplete.js"></script>
<script language="javascript" src="templates/default/js/ai.js"></script>
<!-- JS消息提示层 show_message('发布成功') -->
<div id="show_message_area"></div>
<?php echo $this->js_show_msg(); ?>
<?php echo $GLOBALS['schedule_html']; ?>
<?php if($this->Config['jsg_schedule'] || jsg_getcookie('jsg_schedule')) echo jsg_schedule(); ?>
<!-- Ajax端内容返回 -->
<div id="ajax_output_area"></div>

<div id="footer">Copyright &copy;  2011 - 2012 pugo.in <a href="index.php?mod=other&amp;code=about">关于我们</a> <a href="index.php?mod=tag&amp;code=意见反馈">意见反馈</a> <a rel="nofollow" title="网站公告" target="_blank" href="index.php?mod=other&amp;code=notice">网站公告</a> [<a rel="nofollow" title="网站备案" target="_blank" href="http://www.miibeian.gov.cn/"><?php echo $this->Config['icp']; ?></a>] <?php echo $this->Config['tongji']; ?></div>

<script type="text/javascript">
$(document).ready(function(){
$('.goTop').click(function(e){
e.stopPropagation();
$('html, body').animate({scrollTop: 0},300);
backTop();
return false;
});
});
</script>
<div id="backtop" class="backTop <?php echo $t_col_backTop; ?>"><a href="/#" class="goTop" ></a></div>
<script type="text/javascript">
window.onscroll=backTop;
function backTop(){
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollTop==0){
   document.getElementById('backtop').style.display="none";
   }else{
   document.getElementById('backtop').style.display="block";
    }
  }
backTop();
</script>
</body>
</html>
<?php echo $GLOBALS['iframe']; ?>