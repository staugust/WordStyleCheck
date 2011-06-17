<?php
	$p = $_POST['pNum'];
	$h = $_POST['hNum'];
	echo "<pre>";
	echo "p:",$p,"\n";
	echo "h",$h,"\n";
	$cxml = new DOMDocument('1.0','UTF-8');
	$cxml->formatOutput = false;
	$docEle = $cxml->createElement('doc');
	for($i = 1;$i<=$p;$i++)
	{
		$style = $cxml->createElement('style');
		$psname = "psname".$i;
		$pOutLine = "pOutLine".$i;
		$psz = "psz".$i;
		$pjc = "pjc".$i;
		$eastAsia = "eastAsia".$i;
		$coms = "coms".$i;
		$ascii = "ascii".$i;
		$hascii = "hascii".$i;
		$pcb = "cb".$i;
		$pcu = "cu".$i;
		$pci = "ci".$i;
		$pgbreak = "pgbreak".$i;
		$name = $cxml->createElement('name');
		$name->setAttribute('val', $_POST[$psname]);
		$style->appendChild($name);
		$outLine = $cxml->createElement('OutLineLevel');
		$outLine->setAttribute('val', $_POST[$pOutLine]);
		$style->appendChild($outLine);
		$sz = $cxml->createElement('sz');
		$sz->setAttribute('val', $_POST[$psz]);
		$style->appendChild($sz);
		$jc = $cxml->createElement('jc');
		$jc->setAttribute('val',$_POST[$pjc]);
		$style->appendChild($jc);
		//设置字体
		$rFonts = $cxml->createElement('rFonts');
		$rFonts->setAttribute('ascii', $_POST[$ascii]);
		$rFonts->setAttribute('hAnsi', $_POST[$hascii]);
		$rFonts->setAttribute('eastAsia', $_POST[$eastAsia]);
		$rFonts->setAttribute('cs', $_POST[$coms]);
		$style->appendChild($rFonts);
		//
		$cb = $cxml->createElement('b');
		$cb->setAttribute('val', $_POST[$pcb]);
		$style->appendChild($cb);
		
		$cu = $cxml->createElement('u');
		$cu->setAttribute('val', $_POST[$pcu]);
		$style->appendChild($cu);
		
		$ci = $cxml->createElement('i');
		$ci->setAttribute('val', $_POST[$pci]);
		$style->appendChild($ci);
		
		$bk = $cxml->createElement('pgBreak');
		$bk->setAttribute('val', $_POST[$pgbreak]);
		$style->appendChild($bk);
		
		$style->setAttribute('styleId', $i);
		$docEle->appendChild($style);
		
	}
	for($i = 1;$i <= $h;$i++)
	{
		$header =$cxml->createElement('header');
		$hname = "hname".$i;
		$htype = "htype".$i;
		$htext = "htext".$i;
		$hsz = "hsz".$i;
		$heastAsia = "heastAisa".$i;
		$hcoms = "hcoms".$i;
		$hascii = "hascii".$i;
		$hhascii = "hhascii".$i;
		$hjc = "hjc".$i;
		$hcb = "hcb".$i;
		$hci = "hci".$i;
		$hcu = "hcu".$i;
		
		$name = $cxml->createElement('name');
		$name->setAttribute('val', $_POST[$hname]);
		$header->appendChild($name);
		
		$type = $cxml->createElement('type');
		$type->setAttribute('val', $_POST[$htype]);
		$header->appendChild($type);
		
		$text = $cxml->createElement('text');
		$text->setAttribute('val', $_POST[$htext]);
		$header->appendChild($text);
		
		$sz = $cxml->createElement('sz');
		$sz->setAttribute('val', $_POST[$hsz]);
		$header->appendChild($sz);
		//设置字体
		$rFonts = $cxml->createElement('rFonts');
		$rFonts->setAttribute('ascii', $_POST[$hascii]);
		$rFonts->setAttribute('hAnsi', $_POST[$hhascii]);
		$rFonts->setAttribute('eastAsia', $_POST[$heastAsia]);
		$rFonts->setAttribute('cs', $_POST[$hcoms]);
		$header->appendChild($rFonts);
		
		$cb = $cxml->createElement('b');
		$cb->setAttribute('val', $_POST[$hcb]);
		$header->appendChild($cb);
		
		$cu = $cxml->createElement('u');
		$cu->setAttribute('val', $_POST[$hcu]);
		$header->appendChild($cu);
		
		$ci = $cxml->createElement('i');
		$ci->setAttribute('val', $_POST[$hci]);
		$header->appendChild($ci);
		
		$jc = $cxml->createElement('jc');
		$jc->setAttribute('val',$_POST[$hjc]);
		$header->appendChild($jc);
		
		$docEle->appendChild($header);
		
	}
	
	$tbl = $cxml->createElement('table');
	$tborder = $cxml->createElement('border');
	$tborder->setAttribute('top', $_POST['tbltop']);
	$tborder->setAttribute('bottom', $_POST['tblbottom']);
	$tborder->setAttribute('left', $_POST['tblleft']);
	$tborder->setAttribute('right', $_POST['tblright']);
	$tbl->appendChild($tborder);
	
	for($i = 1;$i < 3;$i++){
		$t = null;
		if($i == 1){
			$tmp = $cxml->createElement('caption');
			$sz = $cxml->createElement('sz');
			$sz->setAttribute('val', $_POST['tblcap']);
			$tmp->appendChild($sz);
			$t = $tmp->cloneNode(TRUE);
		}
		else{
			$tem = $cxml->createElement('tbody');
			$sz = $cxml->createElement('sz');
			$sz->setAttribute('val', $_POST['tblinsz']);
			$tem->appendChild($sz);
			$t = $tem->cloneNode(TRUE);	
		}
		
			$heastAsia = "teastAisa".$i;
		$hcoms = "tcoms".$i;
		$hascii = "tascii".$i;
		$hhascii = "thascii".$i;
		$hjc = "tjc".$i;
		$hcb = "tcb".$i;
		$hci = "tci".$i;
		$hcu = "tcu".$i;
		
		$rFonts = $cxml->createElement('rFonts');
		$rFonts->setAttribute('ascii', $_POST[$hascii]);
		$rFonts->setAttribute('hAnsi', $_POST[$hhascii]);
		$rFonts->setAttribute('eastAsia', $_POST[$heastAsia]);
		$rFonts->setAttribute('cs', $_POST[$hcoms]);
		$t->appendChild($rFonts);
		
		$cb = $cxml->createElement('b');
		$cb->setAttribute('val', $_POST[$hcb]);
		$t->appendChild($cb);
		
		$cu = $cxml->createElement('u');
		$cu->setAttribute('val', $_POST[$hcu]);
		$t->appendChild($cu);
		
		$ci = $cxml->createElement('i');
		$ci->setAttribute('val', $_POST[$hci]);
		$t->appendChild($ci);
		
		$jc = $cxml->createElement('jc');
		$jc->setAttribute('val',$_POST[$hjc]);
		$t->appendChild($jc);
		
		$tbl->appendChild($t);
		
	}
	$docEle->appendChild($tbl);
	/*
	 * 已写完段落，表格，页眉，
	 * 就差页面，图片两个较简单的了
	 */
	/*
	 * 添加图片样式...
	 */
	$pic = $cxml->createElement('pic');
	$picjc = $cxml->createElement('jc');
	$picjc->setAttribute('val', $_POST['picjc']);
	$pic->appendChild($picjc);
	$picCon = $cxml->createElement('controlSize');
	$picCon->setAttribute('val', $_POST['picControl']);
	$pic->appendChild($picCon);
	$docEle->appendChild($pic);
	/*
	 * 添加图片样式结束
	 * 图方便，就没写函数，一共就写两个节点..
	 * _POST['picjc']是图片对齐方式
	 * _POST['picControl']是是否控制图片的大小，
	 * 在conf.htm是一checkbox。
	 */
	/*
	 * 将页面配置信息写入xml中
	 */
	$sect = $cxml->createElement('secPr');
	$totalChara = $cxml->createElement('Characters');
	$totalChara->setAttribute('val', $_POST['totalChara']);
	$sect->appendChild($totalChara);
	$pgszW = NULL;
	$pgszH = NULL;
	switch ($_POST['paper']){
		case 1: $pgszH = 800;$pgszW=1024;break;
		case 2: break;
		case 3:break;
		case 4:break;
		case 5:break;
	}
	$pgsz = $cxml->createElement('pgSz');
	$pgsz->setAttribute('w', $pgszW);
	$pgsz->setAttribute('h', $pgszH);
	$sect->appendChild($pgsz);
	$docEle->appendChild($sect);
	/*
	 * 添加页面部分..
	 * 此处多一个用select传入用户定义的打印纸张..
	 * 然后用switch跟据传入数据，
	 * 设置纸张高$pgszH,
	 * 纸张宽度：$pgszW.
	 * 不想再写函数了，就这么一写..
	 * 这几个添加其实都可以写成函数的。
	 */
	$cxml->appendChild($docEle);
	$cxml->save('/home/joker/file/x.xml');
?>