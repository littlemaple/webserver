<?php /* 2011-12-29 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!-- 
<?php if($act == 'subclass') { ?>
 -->
<form name="form2" method="post" action="admin.php?mod=fenlei&code=<?php echo $code; ?>&class=<?php echo $class; ?>&subclass=<?php echo $subclass; ?>">
  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tableorder">
    <tr class="header"> 
      <td width="40%">名称</td>
      <td width="30%">排序</td>
      <td width="30%">删除</td>
    </tr>
    
    <!-- 
<?php if(is_array($rs)) { foreach($rs as $key => $val) { ?>
 -->
    
    <tr> 
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><a href="admin.php?mod=fenlei&code=tag&class=<?php echo $class; ?>&subclass=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc">
        <a href="admin.php?mod=fenlei&code=subclass&class=<?php echo $class; ?>&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
		<a href="admin.php?mod=fenlei&code=delsubclass&class=<?php echo $class; ?>&fid=<?php echo $val['id']; ?>"  onclick="return confirm('你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    
    <!-- 
<?php } } ?>
 -->
    <tr>
      <td><input type="submit" name="submit11" value="修改排序" class="button"></td>
    </tr>
  </table>
</form>
<!-- <?php } elseif($act == 'tag') { ?> -->
<form name="form2" method="post" action="admin.php?mod=fenlei&code=<?php echo $code; ?>&class=<?php echo $class; ?>&subclass=<?php echo $subclass; ?>">
  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tableorder">
    <tr class="header"> 
      <td width="40%">名称</td>
      <td width="30%">标志</td>
      <td width="30%">删除</td>
    </tr>
    
    <!-- 
<?php if(is_array($rs)) { foreach($rs as $key => $val) { ?>
 -->
    
    <tr> 
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><a href="#"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dashed #ccc">
        <a href="admin.php?mod=fenlei&code=tag&class=<?php echo $class; ?>&subclass=<?php echo $subclass; ?>&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
		<a href="admin.php?mod=fenlei&code=deltag&class=<?php echo $class; ?>&subclass=<?php echo $subclass; ?>&fid=<?php echo $val['id']; ?>"  onclick="return confirm('你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    
    <!-- 
<?php } } ?>
 -->
    <tr>
      <td></td>
    </tr>
  </table>
</form>
<!-- 
<?php } ?>
 -->