<?php 
$readme=file_get_contents('readme.txt', FILE_USE_INCLUDE_PATH);
$startdesc=strpos(strtolower($readme),'== description ==')+strlen('== Description ==');
$enddesc=strpos($readme,'==',$startdesc);
$desc=substr($readme,$startdesc,$enddesc-$startdesc);

$desc=str_replace("\n==","\n<H3>",$desc);
$desc=str_replace("==\n","</H3>\n",$desc);
$desc=str_replace("\n=","\n<H4>",$desc);
$desc=str_replace("=\n","</H4>\n",$desc);
$desc=str_replace("\n\n","\n<P>\n",$desc);
echo $desc;
?>
<h3>Frequently Asked Questions</h3>
<?php 
$startfaq=strpos(strtolower($readme),'== frequently asked questions ==')+strlen('== frequently asked questions ==');
$endfaq=strpos($readme,'==',$startfaq);
$faq=substr($readme,$startfaq,$endfaq-$startfaq);

$faq=str_replace("\n==","\n<H3>",$faq);
$faq=str_replace("==\n","</H3>\n",$faq);
$faq=str_replace("\n=","\n<H4>",$faq);
$faq=str_replace("=\n","</H4>\n",$faq);
$faq=str_replace("\n\n","\n<P>\n",$faq);
echo $faq;
?>