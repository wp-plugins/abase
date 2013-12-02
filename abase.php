<?php
/*
Plugin Name: ABASE for Accessing MySQL Databases
Plugin URI: http://abase.com/
Description: Create a form, display a table or send an email. Short code: [abase ack="" alink="" center="" cols="" columns="" database="" db="" echo="" elements="" emailbcc="" emailcc="" emailfrom="" emailorigin="" emailsubject="" emailto="" fields="" files="" form="" from="" group="" images="" insert="" left="" limit="" notable="" notitle="" or="" order="" password="" required="" right="" rlink="" rownum="" search="" select="" sql="" style="" table="" update="" where=""]. To setup up to 3 databases and for complete attribute documentation, click Settings link at left.
Version: 2.2.1
Author: Richard Halverson
Author URI: http://abase.com/
License: GPLv2. See http://www.gnu.org/licenses/gpl.html
*/

// WordPress database fields for [ABASE ] and predecessor [bus311-table-display ] are prefixed with 'bus311mtd_' (e.g., in wp_options table)

// require 'plugin-updates/plugin-update-checker.php';
// $MyUpdateChecker = new PluginUpdateChecker('http://abase.com/plugins/abase.json',__FILE__,'abase');

add_action( 'admin_menu', 'table_display_plugin_menu' );

$GLOBALS['bus311mtd_Settings_Option_Text']='ABASE for MySQL';
$GLOBALS['bus311mtd_Settings_Header_Text']='ABASE Access MySQL Database Options';
$GLOBALS['bus311mtd_Settings_Page_Slug']='abase';

function table_display_plugin_menu() {
	add_options_page( $GLOBALS['bus311mtd_Settings_Header_Text'], $GLOBALS['bus311mtd_Settings_Option_Text'], 'manage_options', $GLOBALS['bus311mtd_Settings_Page_Slug'], 'table_display_plugin_options' );
}

function register_my_setting() {
	register_setting( 'my_options_group', 'my_option_name', 'intval' ); 
} 

add_action( 'admin_init', 'register_my_setting' );


include("abase_plugin_options.php");

add_shortcode("ABASE", "ABASE_handlerA");
add_shortcode("abase", "abase_handler");
add_shortcode("abase2", "abase_handler2");
add_shortcode("abase3", "abase_handler3");
add_shortcode("bus311-table-display", "bus311tabledisplay_handler");

function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page='.$GLOBALS['bus311mtd_Settings_Page_Slug'].'">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
};

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );
function abase_handler($incomingfrompost, $content = null) {
	record_progress(__LINE__,'abase');
	$incomingfrompost=shortcode_atts(array("db"=>'', "form"=>'', "table"=>'', "elements"=>'', "emailto"=>'', "emailfrom"=>'', "emailsubject"=>'', "emailcc"=>'', "emailbcc"=>'', "emailorigin"=>'', "password"=>'', "required"=>'', "select"=>'', "from"=>'', "sql"=>'', "where"=>'', "or"=>'', "group"=>'', "order"=>'', "limit"=>'', "cols"=>'', "columns"=>'', "fields"=>'', "files"=>'', "images"=>'', "notable"=>'', "notitle"=>'', "rownum"=>'', "style"=>'', "center"=>'', "left"=>'', "right"=>'', "rlink"=>'', "alink"=>'', "ack"=>'', "echo"=>'', "link"=>'', "update"=>'', "search"=>'', "insert"=>'', "database"=>'', "image_style"=>'', "input_styles"=>'', "styles"=>''), $incomingfrompost);
	$abase_output = bus311tabledisplay_function(0,$incomingfrompost,$content);
	return $abase_output;
};

// "image_style"=>'', "input_styles"=>'', "styles"=>'' are no longer used and should be removed

function abase_handler2($incomingfrompost, $content = null) {
	record_progress(__LINE__,'abase2');
	$incomingfrompost=shortcode_atts(array("db"=>'', "form"=>'', "table"=>'', "elements"=>'', "emailto"=>'', "emailfrom"=>'', "emailsubject"=>'', "emailcc"=>'', "emailbcc"=>'', "emailorigin"=>'', "password"=>'', "required"=>'', "select"=>'', "from"=>'', "sql"=>'', "where"=>'', "or"=>'', "group"=>'', "order"=>'', "limit"=>'', "cols"=>'', "columns"=>'', "fields"=>'', "files"=>'', "images"=>'', "notable"=>'', "notitle"=>'', "rownum"=>'', "style"=>'', "center"=>'', "left"=>'', "right"=>'', "rlink"=>'', "alink"=>'', "ack"=>'', "echo"=>'', "link"=>'', "update"=>'', "search"=>'', "insert"=>'', "database"=>'', "image_style"=>'', "input_styles"=>'', "styles"=>''), $incomingfrompost);
	$abase_output = bus311tabledisplay_function(2,$incomingfrompost,$content);
	return $abase_output;
};
function abase_handler3($incomingfrompost, $content = null) {
	record_progress(__LINE__,'abase3');
	$incomingfrompost=shortcode_atts(array("db"=>'', "form"=>'', "table"=>'', "elements"=>'', "emailto"=>'', "emailfrom"=>'', "emailsubject"=>'', "emailcc"=>'', "emailbcc"=>'', "emailorigin"=>'', "password"=>'', "required"=>'', "select"=>'', "from"=>'', "sql"=>'', "where"=>'', "or"=>'', "group"=>'', "order"=>'', "limit"=>'', "cols"=>'', "columns"=>'', "fields"=>'', "files"=>'', "images"=>'', "notable"=>'', "notitle"=>'', "rownum"=>'', "style"=>'', "center"=>'', "left"=>'', "right"=>'', "rlink"=>'', "alink"=>'', "ack"=>'', "echo"=>'', "link"=>'', "update"=>'', "search"=>'', "insert"=>'', "database"=>'', "image_style"=>'', "input_styles"=>'', "styles"=>''), $incomingfrompost);
	$abase_output = bus311tabledisplay_function(3,$incomingfrompost,$content);
	return $abase_output;
};
function ABASE_handlerA($incomingfrompost, $content = null) {
	record_progress(__LINE__,'ABASE');
	$incomingfrompost=shortcode_atts(array("db"=>'', "form"=>'', "table"=>'', "elements"=>'', "emailto"=>'', "emailfrom"=>'', "emailsubject"=>'', "emailcc"=>'', "emailbcc"=>'', "emailorigin"=>'', "password"=>'', "required"=>'', "select"=>'', "from"=>'', "sql"=>'', "where"=>'', "or"=>'', "group"=>'', "order"=>'', "limit"=>'', "cols"=>'', "columns"=>'', "fields"=>'', "files"=>'', "images"=>'', "notable"=>'', "notitle"=>'', "rownum"=>'', "style"=>'', "center"=>'', "left"=>'', "right"=>'', "rlink"=>'', "alink"=>'', "ack"=>'', "echo"=>'', "link"=>'', "update"=>'', "search"=>'', "insert"=>'', "database"=>'', "image_style"=>'', "input_styles"=>'', "styles"=>''), $incomingfrompost);
	$abase_output = bus311tabledisplay_function('-1',$incomingfrompost,$content);
	return $abase_output;
};
function bus311tabledisplay_handler($incomingfrompost, $content = null) {
	record_progress(__LINE__,'bus311-table-display');
	$incomingfrompost=shortcode_atts(array("db"=>'', "form"=>'', "table"=>'', "elements"=>'', "emailto"=>'', "emailfrom"=>'', "emailsubject"=>'', "emailcc"=>'', "emailbcc"=>'', "emailorigin"=>'', "password"=>'', "required"=>'', "select"=>'', "from"=>'', "sql"=>'', "where"=>'', "or"=>'', "group"=>'', "order"=>'', "limit"=>'', "cols"=>'', "columns"=>'', "fields"=>'', "files"=>'', "images"=>'', "notable"=>'', "notitle"=>'', "rownum"=>'', "style"=>'', "center"=>'', "left"=>'', "right"=>'', "rlink"=>'', "alink"=>'', "ack"=>'', "echo"=>'', "link"=>'', "update"=>'', "search"=>'', "insert"=>'', "database"=>'', "image_style"=>'', "input_styles"=>'', "styles"=>''), $incomingfrompost);
	$abase_output = bus311tabledisplay_function(1,$incomingfrompost,$content);
	return $abase_output;
};


function record_progress($ln,$msg){
	$testing_remote_address='';
	if($testing_remote_address!=''){
		$progress_log_file="abase_progress.txt";
		$date = date("r");
		$secs = date('s');
		$remote_addr=$_SERVER['REMOTE_ADDR'];
		if($remote_addr==$testing_remote_address){
			$sip=preg_split("/\./",$remote_addr); $submitip=(($sip[0]*31+$sip[1])*31+$sip[2])*31+$sip[3];
			$submitip=time().':'.$remote_addr;
			$addr_sip="$remote_addr ($submitip)";
			if(strtolower($msg)=='start'){
				$msg2="********************************* START EXECUTION ********************************** $addr_sip";
				$msg3="\n\n$msg2\n$date, Line: $ln, Path: ".$_SERVER['REQUEST_URI'];
				if($_SERVER['QUERY_STRING']>''){$msg3.="?".$_SERVER['QUERY_STRING'];};
				if($_POST['_submit']>''){$msg3.="  Submitter Code: ".$_POST['_submit'];};
				$msg3.="\n";
				if($GLOBALS['bus311mtd_short_code']>''){$msg3.="\n".$GLOBALS['bus311mtd_short_code']."\n";};
				$postvals='';
				foreach ($_POST as $key=>$values){
					if(is_array($values)){
						$iv=0;
						foreach ($values as $value){
							$postvals.="\n".$key.'['.$iv.'] = '.$value;
							$iv+=1;
						};
					}else{
						$val=$values;
						if(strlen($val)>1000){
							$postvals.="\n".$key.' = '.$val.' ...';
						}else{
							$postvals.="\n".$key.' = '.$val;
						};
					};
				};
				if($postvals>''){$msg3.=$postvals."\n";};
				error_log($msg3, 3, $progress_log_file);
			}else if(strtolower($msg)=='end'){
				$msg2="********************************** END EXECUTION *********************************** $addr_sip";
				error_log("\n$date, Line:".$ln."\n".$msg2."\n\n", 3, $progress_log_file);
			}else{
				error_log("\nLine ".$ln." ($secs): ".$msg."\n", 3, $progress_log_file);
			};
		};
	};
};

function verify_form(){
	$timeip=$_POST['_submit'];
	$form_min = get_option('bus311mtd_form_min');
	$form_max = get_option('bus311mtd_form_max');

//	if $form_min==0 and $form_max==0 then no enforcement
//	if $form_max>0 and $form_min==0 then no min time
//	if $form_min>0 and $form_max==0 then $form_max=86400
//	return 1 for VALID. return -2 for expired. return 0 for doesn't exist. return -1 for minimum time not yet reached.

	if($form_min>0 || $form_max>0){
		$dir="abase_valid_forms";
		if(!is_dir($dir)){mkdir($dir);};
		$ret=0;
		$enforce=1;
		if($form_min==0 && $form_max==0){
			$enforce=0;
		}else if($form_max==0){
			$form_max=86400;
		};
		if($enforce==1){
			if(file_get_contents("$dir/$timeip",true)){
				$tim=file_get_contents("$dir/$timeip",true);
				if(time()<$tim+$form_min){
	//	minimum time hasn't been reached yet
					$ret=-1;
				}else if(time()<=$tim+$form_max){
	//	minimum time has been reached, maximum time has not been reached VALID
					$ret=1;
					unlink("$dir/$timeip");
				}else{
	//	maximum time has been exceeded
					$ret=-2;
				};
			}else{
				$ret=0;
			};
		}else{
			$ret=1;
		};
	// clean house
		foreach(glob($dir.'/*.*') as $file) {
			$tim=file_get_contents($file,true);
			if(time()>$tim+$form_max){
				unlink($file);
			};
		};
	}else{
		$ret=1;
	};
	return $ret;
};

function add_valid_form($timeip){
	$form_min = get_option('bus311mtd_form_min');
	$form_max = get_option('bus311mtd_form_max');
	$dir="abase_valid_forms";
	if($form_min>0 || $form_max>0){
		if(!is_dir($dir)){mkdir($dir);};
		list($tim,$ip)=preg_split("/\:/",$timeip);
		file_put_contents("$dir/$timeip",$tim);
// clean house
		foreach(glob($dir.'/*.*') as $file) {
			$tim=file_get_contents($file,true);
			if(time()>$tim+$form_max){
				unlink($file);
			};
		};
	};
};

function bus311tabledisplay_field_split($key_in){
//	<field_spec> ::= ( <column_title>^ ) <column_name> ( |<foreign_column> ) ( @'<value_format>' ) ( !'<element_style>' ) ( [>|>=|=|<=|<|!=] ( % ) <operand> ) ( % ) ( $ ( <button_value> ) )
//	special characters: ^ | $ > >= = <= < != %
//	<operand> ::= <surrogate> | <integer> | ' <constant> '
	$wkey=htmlspecialchars_decode($key_in);
	$column_title=''; $column_name=''; $foreign_column=''; $submit_button=''; $button_value=''; $op=''; $operand=''; $got_pct=''; $got_pct0=''; $operand_is_constant=0; $element_style=''; $value_format=''; $delete_value='';$element_type='';
	$input_types=array();
	$input_types['button']=1;
	$input_types['checkbox']=1;
	$input_types['email']=1;
	$input_types['file']=1;
	$input_types['hidden']=1;
	$input_types['image']=1;
	$input_types['number']=1;
	$input_types['password']=1;
	$input_types['radio']=1;
	$input_types['reset']=1;
	$input_types['submit']=1;
	$input_types['tel']=1;
	$input_types['text']=1;
	$input_types['time']=1;
	$input_types['url']=1;
	$input_types['textarea']=1;

	if(strpos(" $wkey",'^')){
		$column_title=substr($wkey,0,strpos($wkey,'^'));
		$wkey=substr($wkey,strpos($wkey,'^')+1);
	};
//	if(substr($wkey,0,1)=='(' && strpos($wkey,')')>0){
//		$column_name=substr($wkey,0,strpos($wkey,')'));
//		$wkey=substr($wkey,strpos($wkey,')')+1);
//	};

	if(strpos($wkey,'$')){
		$submit_button='$';
		$button_value=substr($wkey,strpos($wkey,'$')+1);
		$wkey=substr($wkey,0,strpos($wkey,'$'));
	};


	if(substr($wkey,-1,1)=='%'){
		$got_pct='%';
		$wkey=substr($wkey,0,strlen($wkey)-1);
	};

	if(strpos($wkey,'>=')){
		$op='>=';
	}else if(strpos($wkey,'<=')){
		$op='<=';
	}else if(strpos($wkey,'!=')){
		$op='!=';
	}else if(strpos($wkey,'<')){
		$op='<';
	}else if(strpos($wkey,'>')){
		$op='>';
	}else if(strpos($wkey,'=')){
		$op='=';
	}else if(strpos(strtolower($wkey),' like ')){
		$op='LIKE';
	};
	if($op>''){
		$operand=substr($wkey,strpos($wkey,$op)+strlen($op));
		$wkey=substr($wkey,0,strpos($wkey,$op));
		if(substr($operand,0,1)=='%'){
			$got_pct0='%';
			$operand=substr($operand,1);
		};
		if($operand=='' || is_numeric($operand)){$operand_is_constant=1;};
		if(substr($operand,0,1)=="'" && substr($operand,-1,1)=="'"){$operand=substr($operand,1,strlen($operand)-2); $operand_is_constant=1;};
	};
	if(strpos($wkey,'!')){
		$element_style=substr($wkey,strpos($wkey,'!')+1);
		if(substr($element_style,0,1)=="'" && substr($element_style,-1,1)=="'"){$element_style=substr($element_style,1,strlen($element_style)-2);};
		if(strpos($element_style,' ')>0){
			$tmp=substr($element_style,0,strpos($element_style,' '));
			if($input_types[$tmp]==1){
				$element_type=$tmp;
				$element_style=substr($element_style,strpos($element_style,' ')+1);
			};
		};
// check if style just 1, 2 or 3 integers. If so, they are width, height and vertical-align in pixels.
		if(strlen($element_style)>0){
			if(preg_match("#^[0-9\;\-]+$#", $element_style)){
				$dims=preg_split("/\;/",$element_style);
				if(count($dims)==1){
					$element_style="width:".$dims[0]."px;height:18px;";
				}else if(count($dims)==2){
					$element_style="width:".$dims[0]."px;height:".$dims[1]."px;";
				}else if(count($dims)==3){
					$element_style="width:".$dims[0]."px;height:".$dims[1]."px;vertical-align:".$dims[2]."px;";
				};
			};
		};
		$wkey=substr($wkey,0,strpos($wkey,'!'));
	};
	if(strpos($wkey,'@')){
		$value_format=substr($wkey,strpos($wkey,'@')+1);
		if(substr($value_format,0,1)=="'" && substr($value_format,-1,1)=="'"){$value_format=substr($value_format,1,strlen($value_format)-2);};
		$wkey=substr($wkey,0,strpos($wkey,'@'));
	};
	if(strpos(" $wkey",'|')){
		$foreign_column=substr($wkey,strpos($wkey,'|')+1);
		$wkey=substr($wkey,0,strpos($wkey,'|'));
	};
	if($column_name==''){$column_name=$wkey;};
	if($submit_button=='$' && $button_value==''){$button_value='$';};
	if($operand=='' && $operand_is_constant==0){$operand=$column_name;};
	if($op==''){$op='=';};

	return array($column_title,$column_name,$foreign_column,$button_value,$op,$operand,$got_pct,$got_pct0,$operand_is_constant,$element_style,$value_format,$element_type);
};

function send_email($to='',$subject='',$body='',$from='',$cc='',$bcc=''){
	$send_email_ret=0;
	if(strpos($to,'@')&& strrpos($to,'.')>strpos($to,'@')){
		$headers='';
		if($from>'' || $cc>'' || $bcc>''){
			if($from>''){$headers .= "From: $from\r\nReply-To: $from\r\n";};
			if($cc>''){$headers .= "cc: $cc\r\n";};
			if($bcc>''){$headers .= "bcc: $bcc\r\n";};
		};
		$message='';
		if($body>''){
			$random_hash = md5(date('r', time()));
			$headers.="Content-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
			$message.="--PHP-alt-$random_hash\r\n";
			$message.='Content-Type: text/plain; charset="iso-8859-1"'."\r\n";
			$message.='Content-Transfer-Encoding: 7bit'."\r\n";
			$message.="\r\n";
			$message.=strip_tags($body);
			$message.="\r\n";
			$message.="\r\n--PHP-alt-$random_hash\r\n";
			$message.='Content-Type: text/html; charset="iso-8859-1"'."\r\n";
			$message.='Content-Transfer-Encoding: 7bit'."\r\n";
			$message.="\r\n";
			$message.=$body;
			$message.="\r\n";
			$message.="\r\n--PHP-alt-$random_hash--\r\n";
		};
		if(mail($to,$subject,$message,$headers)){$send_email_ret=1;};
	};
	return $send_email_ret;
};

function bus311tabledisplay_function($pval,$incomingfromhandler,$content) {
	record_progress(__LINE__,'start');

	$debug_string='';
	$error_string='';
	$fatal_error=0;
	$maxJoinCount=20;
	$maxJoinDepth=20;
	$error_color="#800517";
	$siteurl=get_option("siteurl");
	$bus311mtd_default_file_upload_directory='files'; // setting must be declared in abase.php and abase_plugin_options.php
	$database_in=$incomingfromhandler['database'];
	$db_in=$incomingfromhandler['db'];
//	if($db_in=='' && $database_in>''){$db_in=$database_in;}
	$pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$remote_addr = $_SERVER["REMOTE_ADDR"];
	$server_addr = $_SERVER["SERVER_ADDR"];
// THIS CHANGED when database="" can override the database
// global database variable defaults to database 1.
// db or database will set the global database variable. [abase uses the global database variable if db or database is not specified.
// [abase2 and [abase3 use databases 2 or 3 respective but does not change the global database variable.

	if($db_in>='1' && $db_in<='3'){$GLOBALS['bus311mtd_setdb']=$db_in; $GLOBALS['bus311mtd_setdatabase']='';};

	if($GLOBALS['bus311mtd_setdb']!='1' && $GLOBALS['bus311mtd_setdb']!='2' && $GLOBALS['bus311mtd_setdb']!='3'){$GLOBALS['bus311mtd_setdb']='1';};

	if($db_in==''){
		if($pval==2){
			$db_in='2';
		}else if($pval==3){
			$db_in='3';
		}else{
			$db_in=$GLOBALS['bus311mtd_setdb'];
		};
	};

	if($db_in=='2'){
		$sqlHost = get_option('bus311mtd_dbhost2');  
		$sqlDatabase = get_option('bus311mtd_dbname2');  
		$sqlUser = get_option('bus311mtd_dbuser2');  
		$sqlPass = get_option('bus311mtd_dbpwd2'); 
		$dbFileDir = get_option('bus311mtd_dbfiles2'); 
	}else if($db_in=='3'){
		$sqlHost = get_option('bus311mtd_dbhost3');  
		$sqlDatabase = get_option('bus311mtd_dbname3');  
		$sqlUser = get_option('bus311mtd_dbuser3');  
		$sqlPass = get_option('bus311mtd_dbpwd3'); 
		$dbFileDir = get_option('bus311mtd_dbfiles3');
	}else{
		$sqlHost = get_option('bus311mtd_dbhost');  
		$sqlDatabase = get_option('bus311mtd_dbname');  
		$sqlUser = get_option('bus311mtd_dbuser');  
		$sqlPass = get_option('bus311mtd_dbpwd'); 
		$dbFileDir = get_option('bus311mtd_dbfiles'); 
		$db_in='1';
	};
	$db_num=$db_in;
	if($db_num==1){$db_num='';};

	$database_overridden='';
	$sqlDatabase=trim($sqlDatabase);

	if($pval!=2 && $pval!=3){
		if(strlen($database_in)>1){$GLOBALS['bus311mtd_setdatabase']=$database_in;};
		if(strlen($GLOBALS['bus311mtd_setdatabase'])>1){
			if($sqlDatabase != $GLOBALS['bus311mtd_setdatabase']){$database_overridden=$sqlDatabase;};
			$sqlDatabase=$GLOBALS['bus311mtd_setdatabase'];
		};
	}else{
		if(strlen($database_in)>1){$sqlDatabase=$database_in;};
	};

// if database="" is never specified, then database is specified by the db_num.
// if database="" is specified, it is specified for the db_num.
// If the db_num changes, database returns to the default specified by db_num.

	$sqlDatabase=trim($sqlDatabase);

	if($sqlHost==''){$sqlHost=DB_HOST;};
	if($sqlDatabase==''){$sqlDatabase=DB_NAME;};
	if($sqlPass==''){$sqlPass=DB_PASSWORD;};
	if($sqlUser==''){$sqlUser=DB_USER;};

	$sqlDatabase=trim($sqlDatabase);

	$GLOBALS['bus311mtd_instance']+=1;
	$date = date("Y-m-d H:i:s");

	$echo_in=$incomingfromhandler['echo'];
	$sql_in=$incomingfromhandler['sql'];
	$select_in=$incomingfromhandler['select'];
	$table_in=$incomingfromhandler['table'];
	$from_in=$incomingfromhandler['from'];
	$where_in=$incomingfromhandler['where'];

	$group_in=$incomingfromhandler['group'];
	$or_in=$incomingfromhandler['or'];
	$order_in=$incomingfromhandler['order'];
	$limit_in=$incomingfromhandler['limit'];
	$notitle_in=$incomingfromhandler['notitle'];
	$notable_in=$incomingfromhandler['notable'];
	$style_in=$incomingfromhandler['style'];
	$image_style_in=$incomingfromhandler['image_style'];
	$input_styles_in=$incomingfromhandler['input_styles'];
	$styles_in=$incomingfromhandler['styles'];
	$rownum_in=$incomingfromhandler['rownum'];
	$fullalink_in=$incomingfromhandler['alink'];
	$fullrlink_in=$incomingfromhandler['rlink'];
	$center_in=$incomingfromhandler['center'];
	$right_in=$incomingfromhandler['right'];
	$left_in=$incomingfromhandler['left'];
	$cols_in=$incomingfromhandler['cols'];
	$files_in=$incomingfromhandler['files'];
	$images_in=$incomingfromhandler['images'];
	$columns_in=$incomingfromhandler['columns'];
	$fields_in=$incomingfromhandler['fields'];
	$update_in=$incomingfromhandler['update'];
	$updateack_in=$incomingfromhandler['ack'];
	$search_in=$incomingfromhandler['search'];
	$form_in=$incomingfromhandler['form'];
	$insert_in=$incomingfromhandler['insert'];
	$elements_in=$incomingfromhandler['elements'];
	$password_in=$incomingfromhandler['password'];
	$emailto=$incomingfromhandler['emailto'];
	$emailfrom=$incomingfromhandler['emailfrom'];
	$emailcc=$incomingfromhandler['emailcc'];
	$emailbcc=$incomingfromhandler['emailbcc'];
	$emailorigin=$incomingfromhandler['emailorigin'];
	$emailto_in=$incomingfromhandler['emailto'];
	$emailfrom_in=$incomingfromhandler['emailfrom'];
	$emailcc_in=$incomingfromhandler['emailcc'];
	$emailbcc_in=$incomingfromhandler['emailbcc'];
	$emailsubject=$incomingfromhandler['emailsubject'];
	$required_in=$incomingfromhandler['required'];

	$short_code='';
	if($pval==0){
		$short_code.='abase';
	}else if($pval=='-1'){
		$short_code.='ABASE';
	}else if($pval=='2'){
		$short_code.='abase2';
	}else if($pval=='3'){
		$short_code.='abase3';
	}else{
		$short_code.='bus311-table-display';
	};
	$short_code_close='[/'.$short_code.']';
	$short_code='['.$short_code;

	$full_short_code=$short_code;
	$complete_empty_short_code=$short_code;

//	if($pval>1){$full_short_code.=$pval;};
	$concatenated_values='';
	$concatenated_values_except_echo='';
	$concatenated_values_except_db='';
	$concatenated_values_except_db_echo='';
	foreach ($incomingfromhandler as $key=>$val){
		if($val!=''){
			if($key!='db'){
				$short_code.=' '.$key.'="'.$val.'"';
			};
			$full_short_code.=' '.$key.'="'.$val.'"';
		};
		$concatenated_values.=$val;
		if($key!='echo'){$concatenated_values_except_echo.=$val;};
		if($key!='db' && $key!='database'){$concatenated_values_except_db.=$val;};
		if($key!='db' && $key!='echo' && $key!='database'){$concatenated_values_except_db_echo.=$val;};
		$complete_short_code.=' '.$key.'="'.$val.'"';
	};
	if(strlen($content)>0){
		$short_code.=']';
		$full_short_code.=']';
		$complete_empty_short_code.=']';
		$full_short_code.=$content.$short_code_close;
		$short_code.=$content.$short_code_close;
	}else{
		$short_code.=']';
		$full_short_code.=']';
		$complete_empty_short_code.=']';
	};
	$GLOBALS['bus311mtd_page_shortcodes'].='#<B>'.$GLOBALS['bus311mtd_instance'].'.</B> '.htmlspecialchars($full_short_code).'<BR>';
	$GLOBALS['bus311mtd_short_code']=$full_short_code;

	$sup_db_in='';
	if($db_in>'1' && $pval<2){$sup_db_in="<sup> $db_in</sup>";};


	if($cols_in=='' && $columns_in=='' && $fields_in==''){
		if($form_in=='' && ($sql_in!='' || $table_in!='' || $from_in!='')){
			$columns_in='*';
		}else{
			$columns_in=$elements_in;
			if($columns_in>'' &&$columns_in!='*'){$cols_columns_fields.=','.$columns_in;};
		};
	};
	if($form_in>'' && $elements_in==''){
		if($columns_in>''){$elements_in=$columns_in;}else if($fields_in>''){$elements_in=$fields_in;};
	};

	if($elements_in>''){
		$eles=split(',',$elements_in);
		$elements_in='';
		for($j=0;$j<count($eles);$j+=1){
			if($eles[$j]>''){
				list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($eles[$j]);
				$asurro='*'.$surro;
				if($key>''){$elements_in.=','.$key;};
			};
		};
		$elements_in=substr($elements_in,1);
	};
	$pageURLemail=str_replace('.',' ',$pageURL);
	$email_tail="<BR>\n_____<BR>\n<font size='1'>$pageURLemail $remote_addr</font>";
	if($emailorigin=='0' || strtolower(substr($emailorigin,0,1))=='n'){$email_tail=='';
	}else if(strtolower(substr($emailorigin,0,1))=='p'){$email_tail="<BR>\n_____<BR>\n<font size='1'>$pageURLemail</font>";
	}else if(strtolower(substr($emailorigin,0,1))=='r'){$email_tail="<BR>\n_____<BR>\n<font size='1'>$remote_addr</font>";
	};
	$sip=preg_split("/\./",$remote_addr); $submitip=(($sip[0]*31+$sip[1])*31+$sip[2])*31+$sip[3];$submitip=time().':'.$remote_addr;
	$GLOBALS['bus311mtd_submitip']=$submitip;
	$cols_columns_fields='';
	if($cols_in>'' && $cols_in!='*'){$cols_columns_fields.=','.$cols_in;};
	if($columns_in>'' && $columns_in!='*'){$cols_columns_fields.=','.$columns_in;};
	if($fields_in>'' && $fields_in!='*'){$cols_columns_fields.=','.$fields_in;};
	if($elements_in>'' && $elements_in!='*'){$cols_columns_fields.=','.$elements_in;};

	$lost_table_error='';

	$abase_conn = mysql_connect($sqlHost, $sqlUser, $sqlPass)	or die("<BR><font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes']."<B>Fatal Error</B>  (".__LINE__.") - Couldn't connect to MySQL server on '$sqlHost'.<BR><BR>This shortcode uses Database #$db_in. If this is correct, then see the <B>Warning</B> above. One or more of the following settings for Database #$db_in is probably not correct.<OL style='background-color: white;'><LI> Database host: '$sqlHost'.<LI> Database user: '$sqlUser'.<LI> Database user password: '$sqlPass'.</OL></font>.");


	$db = mysql_select_db($sqlDatabase, $abase_conn)
		or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes']."<B>Fatal Error</B>  (".__LINE__.") - Couldn't select database '$sqlDatabase'.<BR>" . mysql_error() . "<BR><font style='color: $error_color; background-color: white;'><BR>This shortcode uses Database #$db_in. If this is correct, then one or more of the following settings for Database #$db_in is probably not correct.<OL style='background-color: white;'><LI> Database name: '$sqlDatabase'.<LI> Database '$sqlDatabase' must be accessible by user '$sqlUser'.</OL></font>");
	
// get all the tables for this database in 
//SELECT * FROM information_schema.TABLES WHERE TABLE_SCHEMA='jasonlee_campus'
	record_progress(__LINE__,"SELECT * FROM information_schema.TABLES WHERE TABLE_SCHEMA='$sqlDatabase'");
	$sqlTables = mysql_query("SELECT * FROM information_schema.TABLES WHERE TABLE_SCHEMA='$sqlDatabase'", $abase_conn)
		or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes'].$lost_table_error."<B>Fatal Error</B>  (".__LINE__.")<BR><BR></font><font style='background-color: white;'>" . mysql_error() . "</font></font>");
	$database_tables='';
	$database_table_rows='';
	$database_table_types=array();
	while($sqlTab = mysql_fetch_assoc($sqlTables)){
		$database_tables.=", ".$sqlTab['TABLE_NAME'];
		$database_table_rows.=", ".$sqlTab['TABLE_NAME']." (".$sqlTab['TABLE_ROWS'].")";
		$database_table_types[$sqlTab['TABLE_NAME']]=$sqlTab['ENGINE'];
	};
	$database_tables=substr($database_tables,2);
	$database_table_rows=substr($database_table_rows,2);
	record_progress(__LINE__,"SHOW TABLES FROM $sqlDatabase");
	$sqlTables2 = mysql_query("SHOW TABLES FROM $sqlDatabase", $abase_conn)
		or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes'].$lost_table_error."<B>Fatal Error</B>  (".__LINE__.")<BR><BR></font><font style='background-color: white;'>" . mysql_error() . "</font></font>");
	$inaccessible_tables='';
	$accessible_tables='';
	$niats=0;
	$nats=0;
	$database_tables2='';
	while($sqlTab2 = mysql_fetch_assoc($sqlTables2)){
		$database_tables2.=", ".$sqlTab2['Tables_in_'.$sqlDatabase];
		if(array_key_exists($sqlTab2['Tables_in_'.$sqlDatabase],$database_table_types)){
			$accessible_tables.=", ".$sqlTab2['Tables_in_'.$sqlDatabase];
			$nats+=1;
		}else{
			$inaccessible_tables.=", ".$sqlTab2['Tables_in_'.$sqlDatabase];
			$niats+=1;
		};
	};
	$database_tables2=substr($database_tables2,2);
//	$database_tables.=" (OR ".$database_tables2.")";
	if($niats>0){
		$inaccessible_tables=substr($inaccessible_tables,2);
		$accessible_tables=substr($accessible_tables,2);
		$lost_table_error.="WARNING: There is an unrecoverable error in database <EM>$sqlDatabase</EM>.";
		if($niats>1){
			$lost_table_error.=" Tables <EM>$inaccessible_tables</EM> are not accessible.";
		}else{
			$lost_table_error.=" Table <EM>$inaccessible_tables</EM> is not accessible.";
		};
		if($nats>1){
			$lost_table_error.=" (Tables <EM>$accessible_tables</EM> are still accessible.)";
		}else if($nats==1){
			$lost_table_error.=" (Table <EM>$accessible_tables</EM> is still accessible.)";
		};
		$lost_table_error.="<BR>";
		$lost_table_error.="<BR>";
	};
	$form='';$form_url='';$form_type='';
	if($form_in>''){
		$frms=split(',',$form_in);
		foreach($frms as $fm){
			$debug_string.=" ,fm=$fm";
			if(is_numeric($fm)){
				$form=$fm;
				$debug_string.=",form=$fm";
			}else if(strpos(' '.$fm,'/') || strpos($fm,'.')){
				$form_url=$fm;
				$debug_string.=",form_url=$fm";
			}else{
				$form_type=$fm;
				$debug_string.=",form_type=$fm";
			};
		};
//		$form_in=$form;
		$form_type_defined=0;
		if($form=='4'){
			$form_type='delete';
			$form_type_defined=1;
		};
		if(strtolower($form_type)=='update'){
			$update_in=$elements_in;
			$form_type_defined=1;
			$update=$elements;
		}else if(strtolower($form_type)=='insert'){
			$insert_in=$elements_in;
			$form_type_defined=1;
			$insert=$elements;
		}else if(strtolower($form_type)=='search'){
			$search_in=$elements_in;
			$search=$elements;
			$form_type_defined=1;
		}else if(strtolower($form_type)=='delete'){
			$form_type_defined=1;
			$form='4';
		};
		if($form_type==''){
			if($update_in>''){
				$form_type='update';
				$form_type_defined=1;
			}else if($insert_in>''){
				$form_type='insert';
				$form_type_defined=1;
			}else if($search_in>''){
				$form_type='search';
				$form_type_defined=1;
			};
		};
		if($form_type_defined==0){
			if($form_in>''){
				$error_string.=", Attribute <EM>form=\"$form_in\"</EM> is ";
				if($form_type>''){$error_string.="incorrect.";}else{$error_string.="incomplete.";};
			}else{
				$error_string.=", Input form type not specified.";
			};
			$error_string.=" Use <EM>form=\"$form,search\"</EM> or <EM>form=\"$form,input\"</EM> or <EM>form=\"$form,update\"</EM>.";
		};
	};

	$ranstr='';
	if($GLOBALS['bus311mtd_form_start']){
		if(strlen($GLOBALS['bus311mtd_form_start'])>1){
			$ranstr=$GLOBALS['bus311mtd_form_start'];
		};
	};
	if($ranstr==''){
		$ranstr=$GLOBALS['bus311mtd_instance'].'_';
	};
	$form_name='bus311mtd_'.$ranstr.'form';
	if($form%10==1 || $form%10==2 || $form==4){
		$GLOBALS['bus311mtd_form_start']=$ranstr;
	};

	$sql=htmlspecialchars_decode($sql_in);
	$select=htmlspecialchars_decode($select_in);
	$table=htmlspecialchars_decode($table_in);
	$from=htmlspecialchars_decode($from_in);
	$where=htmlspecialchars_decode($where_in);

	$columns_in=htmlspecialchars_decode($columns_in);
	$fields_in=htmlspecialchars_decode($fields_in);
	$cols_in=htmlspecialchars_decode($cols_in);

	$table_error='';
	if($table>''){
		if(!array_key_exists($table,$database_table_types)){
			$table_error="Table <I>$table</I> does not exist.";
			if($database_tables>''){
				$table_error.=" Valid table names in <I>$sqlDatabase</I>: $database_tables.";
			}else{
				$table_error.=" Database <I>$sqlDatabase</I> has no tables.";
			};
		};
	};
	if($table_error>''){$error_string.=", $table_error";};

	$group=$group_in;
	$order=$order_in;
	$limit=$limit_in;
	if($limit=='' && ($search_in>'')){$limit='1';};
	if($insert_in>''){$limit='0';};
	$notitle=$notitle_in;
	$notable=$notable_in;
	$style=$style_in;
	$image_style=$image_style_in;
	$rownum=$rownum_in;
	$fullalink=$fullalink_in;
	$fullrlink=$fullrlink_in;

	$insert=','.$insert_in.',';
	$required=','.$required_in.',';
	$update=','.$update_in.',';
	$elements=','.$elements_in.',';
	$files=','.$files_in.',';
	$files=$files_in;
	$files_path='';
	if(strpos($files,'^')){
		$files_path=substr($files,0,strpos($files,'^'));
		$files=substr($files,strpos($files,'^')+1);
	};
	$files=','.$files.',';
	$images=$images_in;
	$images_path='';
	if(strpos($images,'^')){
		$images_path=substr($images,0,strpos($images,'^'));
		$images=substr($images,strpos($images,'^')+1);
	};
	$images=','.$images.',';
	$search=','.$search_in.',';
	$center=','.$center_in.',';
	$right=','.$right_in.',';
	$left=','.$left_in.',';
//	$ack=strtolower($updateack_in);
	$ack='';$ack_url='';$ack_color='';
	if($updateack_in>''){
		$acks=split(',',$updateack_in);
		foreach($acks as $ak){
			$debug_string.=" ,ak=$ak";
			if($ak>='1' && $ak<='4'){
				$ack=$ak;
				$debug_string.=",ack=$ak";
			}else if(strpos(' '.$ak,'/') || strpos($ak,'.')){
				$ack_url=$ak;
				$debug_string.=",ack_url=$ak";
			}else{
				$ack_color=$ak;
				$debug_string.=",ack_color=$ak";
			};
			if($ack=='' && $ack_url.$ack_color>''){
				$ack='1';
				$debug_string.=",ack='1'";
			};
		};
	};

//	checkForUpdates();

	$alink=$fullalink;
	$rlink=$fullrlink;

	$updatePosted='';
	if(is_array($_POST['_update'])){
		foreach ($_POST['_update'] as $post_update) {$updatePosted.=','.$post_update;};
		$updatedPosted=substr($updatePosted,1);
	};
	$insertPosted='';
	if(is_array($_POST['_insert'])){
		foreach ($_POST['_insert'] as $post_insert) {$insertPosted.=','.$post_insert;};
		$insertPosted=substr($insertPosted,1);
	};

	$requiredPosted='';
	if(is_array($_POST['_required'])){
		foreach ($_POST['_required'] as $require_update) {$requiredPosted.=','.$require_update;};
		$requiredPosted=substr($requiredPosted,1);
	};
	$filesPosted='';
	$files_pathPosted=''; // not used for anything
	if(is_array($_POST['_files'])){
		foreach ($_POST['_files'] as $file_update) {
			if(strpos($file_update,'^')){
				$files_pathPosted=substr($file_update,0,strpos($file_update,'^'));
				$file_update=substr($file_update,strpos($file_update,'^')+1);
			};
			$filesPosted.=','.$file_update;
		};
		$filesPosted=substr($filesPosted,1);
	};
	$imagesPosted='';
	$images_pathPosted=''; // not used for anything
	if(is_array($_POST['_images'])){
		foreach ($_POST['_images'] as $images_update) {
			if(strpos($images_update,'^')){
				$images_pathPosted=substr($images_update,0,strpos($images_update,'^'));
				$images_update=substr($images_update,strpos($images_update,'^')+1);
			};
			$imagesPosted.=','.$images_update;
		};
		$imagesPosted=substr($imagesPosted,1);
	};
	$acknowledgePosted='';
	if(is_array($_POST['_acknowledge'])){
		foreach ($_POST['_acknowledge'] as $acknowledge_update) {$acknowledgePosted.=','.$acknowledge_update;};
		$acknowledgePosted=substr($acknowledgePosted,1);
	};
	$formPosted='';
	if($_POST['_form']){$formPosted=$_POST['_form'];};

	$random=mt_rand();

	$sqlQuery='';
//	rlink="<column> ( , <url> ( , <target> ) )"
	$rlink_url='';
	$rlink_target='';
	if(strpos(' '.$rlink,',')){
		$rlink_parts=preg_split('/\,/',$rlink);
		$rlink=trim($rlink_parts[0]);
		$rlink_url=trim($rlink_parts[1]);
		$rlink_target=trim($rlink_parts[2]);
	};
	$rlink_alias='';
	if(strpos($rlink,'|')){
		$rlink_parts=preg_split('/\|/',$rlink);
		$rlink=trim($rlink_parts[0]);
		$rlink_alias=trim($rlink_parts[1]);
	};
//	alink="<column> ( , <url> ( , <append>  ( , <target> ) ) )"
	$alink_url='';
	$alink_append='';
	$alink_target='';
	if(strpos(' '.$alink,',')){
		$alink_parts=preg_split('/\,/',$alink);
		$alink=trim($alink_parts[0]);
		$alink_url=trim($alink_parts[1]);
		$alink_append=trim($alink_parts[2]);
		$alink_target=trim($alink_parts[3]);
	};
	if(strpos($table,' ') && substr($table,0,1)!='`'){$table='`'.$table.'`';};
	if($from=='' && $table>''){$from=$table;};
	$fieldType=array();
	$foreignKeyTable=array();
	$foreignKeyColumn=array();
	$element_op=array();
	$element_pseudo=array();
	$element_field=array();
	$element_pct=array();
	$col_params=array();
	$fromJoin='';
	$sqlQueryB4Where='';
	$qwhere='';
	$column_list=',';
	if($sql>''){
		$sqlQuery=$sql_in;
		$sqlQueryB4Where=$sqlQuery;
	}else if($from>''){
		$sqlQuery='SELECT ';
		if($select==''){$sqlQuery.='*';}else{$sqlQuery.=$select;};
		$sqlQuery.=' FROM '.$from;
		if($table>'' && $table_error==''){
			record_progress(__LINE__,"SHOW COLUMNS FROM $table");
			$sqlColumns = mysql_query("SHOW COLUMNS FROM $table", $abase_conn)
				or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes'].$lost_table_error."<B>Fatal Error</B>  (".__LINE__.")<BR><BR><font style='background-color: white;'>" . mysql_error() . "</font><BR><BR><font style='color: $error_color; background-color: white;'>1. Be sure table \"$table_in\" is spelled correctly with the correct upper and lower case in the table=\"$table_in\" attribute. Valid table names in <I>$sqlDatabase</I> are <I>$database_tables</I>.<BR>2. Be sure \"$sqlDatabase\" is the correct database as specified in Settings.</font>");

			$qwhere='';
			while($sqlCol = mysql_fetch_assoc($sqlColumns)){
				if($sqlCol['Key']=='PRI'){
					$idField=$sqlCol['Field'];
				};
				if($_GET[$sqlCol['Field']]>''){
					$qwhere.=' AND `'.$sqlCol['Field']."`='".$_GET[$sqlCol['Field']]."'";
				};
				$fieldType[$sqlCol['Field']]=$sqlCol['Type'];
			};

// SELECT TABLE_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_SCHEMA = 'richardh_campus'
			$sqlQ="SELECT TABLE_NAME,COLUMN_NAME,REFERENCED_TABLE_SCHEMA,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE";
			$sqlQ.=" WHERE TABLE_SCHEMA='$sqlDatabase' AND REFERENCED_TABLE_SCHEMA='$sqlDatabase'";
			record_progress(__LINE__,$sqlQ);
			$sqlKeys = mysql_query($sqlQ, $abase_conn)
				or die("Couldn't perform query (".__LINE__."): $sqlQ -- " . mysql_error() . '.');
			$i=0;
			while($sqlKey = mysql_fetch_assoc($sqlKeys)){
				$key_TABLE[]=$sqlKey['TABLE_NAME']; 
				$key_COLUMN[]=$sqlKey['COLUMN_NAME'];
				$key_REF_TABLE[]=$sqlKey['REFERENCED_TABLE_NAME']; 
				$key_REF_COLUMN[]=$sqlKey['REFERENCED_COLUMN_NAME'];
			};
			$tables[]=$table; // insert table and itself as alias
			$tables[]=$table;
			record_progress(__LINE__,"SHOW COLUMNS FROM ".$table);
			$sqlColumns = mysql_query("SHOW COLUMNS FROM ".$table, $abase_conn)
				or die("Couldn't perform query (".__LINE__."): SHOW COLUMNS FROM ".$table . mysql_error() . '.');
			while($sqlColumn = mysql_fetch_assoc($sqlColumns)){
				$column_list.=$sqlColumn['Field'].',';
			};
			$joinCount=0;
			while(count($tables)>0 && $joinCount<$maxJoinCount && count($tables)<$maxJoinDepth){
				$joinCount+=1;
				$tab=array_shift($tables);
				$alias=array_shift($tables);
				$alias=str_replace('`','',$alias);
		//		$debug_string.= "<br>[$tab,$alias]";
				for($i=0;$i<count($key_TABLE);$i+=1){
		//			$debug_string.='<br>&nbsp;&nbsp;('.$key_TABLE[$i].','.$key_COLUMN[$i].','.$key_REF_TABLE[$i].','.$key_REF_COLUMN[$i].')';
					if($tab==$key_TABLE[$i] && $key_REF_TABLE[$i]>''){
		//				$debug_string.='*';
						$foreignKeyTable[$key_COLUMN[$i]]=$key_REF_TABLE[$i];
						$foreignKeyColumn[$key_COLUMN[$i]]=$key_REF_COLUMN[$i];

						$tableAlias=$alias.'$'.$key_COLUMN[$i].'$'.$key_REF_TABLE[$i];
						$tables[]=$key_REF_TABLE[$i];
						$tables[]=$tableAlias;
						$fromJoin.=" LEFT JOIN `".$key_REF_TABLE[$i]."` AS `".$tableAlias.'`';
						$fromJoin.=" ON `".$alias."`.".$key_COLUMN[$i];
						$fromJoin.="=`".$tableAlias."`.".$key_REF_COLUMN[$i];
						record_progress(__LINE__,"SHOW COLUMNS FROM `".$key_REF_TABLE[$i].'`');
						$sqlColumns = mysql_query("SHOW COLUMNS FROM `".$key_REF_TABLE[$i].'`', $abase_conn)
							or die("Couldn't perform query (".__LINE__."): SHOW COLUMNS FROM ".$key_REF_TABLE[$i] . mysql_error() . '.');

						while($sqlColumn = mysql_fetch_assoc($sqlColumns)){
							$column_list.=$sqlColumn['Field'].',';
						};
					};
				};
			};
			if($joinCount==$maxJoinCount){
				$error_string.=", Maximum table JOIN of $maxJoinCount reached. You may have a recursive foreign key specification in one of your tables.<BR><font size=1>".substr($fromJoin,0,300).'...</font>';
				$fromJoin='';
			}else if(count($tables)==$maxJoinDepth){
// JOIN build failed. Something wrong with foreign key links.
				$error_string.=", Maximum table JOIN depth of $maxJoinDepth reached. You may have a recursive foreign key specification in one of your tables.<BR><font size=1>".substr($fromJoin,0,300).'...</font>';
				$fromJoin='';
			};
			if($from==$table){$sqlQuery.=$fromJoin;};
// check for invalid column names
			$cols=split(',',$cols_columns_fields);
			$invalid_cols=''; $num_ics=0;
			$key_processed=',';
			for($j=0;$j<count($cols);$j+=1){
				if($cols[$j]>''){
					list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($cols[$j]);$asurro='*'.$surro;
					if(!strpos(' '.$column_list,",$key,") && !strpos(' '.$key_processed,",$key,")){
						$invalid_cols.=", $key";
						$num_ics+=1;
						$key_processed.=$key.',';
					};
				};
			};
			if($invalid_cols>'' && $select_in=='' && $sql_in==''){
				$invalid_cols=substr($invalid_cols,2);
				$error_string.=", Unknown field name in ";
				if($fields_in && $cols_in && $elements_in){
					$error_string.="<I>fields</I>, <I>cols</I> or <I>elements</I>";
				}else if($fields_in && $cols_in){
					$error_string.="<I>fields</I> or <I>cols</I>";
				}else if($fields_in && $elements_in){
					$error_string.="<I>fields</I> or <I>elements</I>";
				}else if($fields_in){
					$error_string.="<I>fields</I>";
				}else if($cols_in){
					$error_string.="<I>cols</I>";
				}else if($columns_in && $elements_in){
					$error_string.="<I>columns</I> or <I>elements</I>";
				}else if($columns_in){
					$error_string.="<I>columns</I>";
				}else if($elements_in){
					$error_string.="<I>elements</I>";
				};
				$error_string.=" attribute specification. Invalid ";
				if($num_ics==1){
					$error_string.="name: <I>$invalid_cols</I>.";
				}else{
					$error_string.="names: <I>$invalid_cols</I>.";
				};
				$column_list_spaced=substr($column_list,1,strlen($column_list)-2);
				$column_list_spaced=str_replace(',',', ',$column_list_spaced);
				$error_string.="<BR>Valid names in <I>$sqlDatabase.$table</I>: <I>$column_list_spaced</I>.";
			};
		};


		$wher='';
		$criteria='';
		if($insert_in=='' && $update_in==''){
			if(is_array($_POST['_term'])){
		// _term[]" type=hidden value="'.$pseudo.','.$key.','.$op.','.$surro.','.$pct.','.$pct0.','.$constant
				foreach ($_POST['_term'] as $term) {
					$parts=preg_split('/\,/',$term);
					list($pseudo,$key,$keyOption,$submit,$oper,$surro,$pct,$pct0,$constant,$or)=preg_split('/\,/',$term);$asurro='*'.$surro;
					$and_or=' AND ';
					if(strtolower($or)=='or'){$and_or=' or ';};

		//                   0     1    2      3     4    5       6
		//	CHECK TO MAKE SURE $key IS A FIELD IN TABLE
					if(strpos(" $column_list",','.$key.',')){
// record_progress(__LINE__,"$column_list : $key - ".$_POST[$asurro]);

						if($_POST[$asurro]>''){
							if(($pct=='%' || $pct0=='%') && $oper=='='){
								$wher.=strtoupper($and_or);
								if(is_array($_POST['_or'])){
									$wher3='';
									foreach ($_POST['_or'] as $or_set) {
										$wher2=''; $kymtch=0;
										$or_terms=preg_split('/\|/',$or_set);
										foreach ($or_terms as $or_term){
											$wher2.=" OR `$or_term`"." LIKE '".$pct0.$_POST[$asurro].$pct."'";
											if($or_term==$key){$kymtch=1;};
										};
										if($kymtch==1){$wher3=$wher2;};
									};
									if($wher3>''){
										$wher.='('.substr($wher3,4).')';
									}else{
										$wher.="`".$key."`"." LIKE '".$pct0.$_POST[$asurro].$pct."'";
									};
								}else{
									$wher.="`".$key."`"." LIKE '".$pct0.$_POST[$asurro].$pct."'";
								};
								$p3=$_POST[$asurro];
								if($pct=='%'){$p3.='...';};
								if($pct0=='%'){$p3='...'.$p3;};
								$criteria.=$and_or.$pseudo.' = '.$p3;
							}else{
								$val=$_POST[$asurro];
								if($fieldType[$key]=='date'){
									$val=date('Y-m-d',strtotime($val));
								}else if($fieldType[$key]=='datetime'){
									$val=date('Y-m-d H:i:s',strtotime($val));
								};
								$wher.=strtoupper($and_or);
// record_progress(__LINE__,$val);

								if(is_array($_POST['_or'])){
									$wher3='';
									foreach ($_POST['_or'] as $or_set) {
										$wher2=''; $kymtch=0;
										$or_terms=preg_split('/\|/',$or_set);
										foreach ($or_terms as $or_term){
											$wher2.=" OR `$or_term`".$oper."'".$val."'";
											if($or_term==$key){$kymtch=1;};
										};
										if($kymtch==1){$wher3=$wher2;};
									};
									if($wher3>''){
										$wher.='('.substr($wher3,4).')';
									}else{
										$wher.="`".$key."`".$oper."'".$val."'";
									};
								}else{

									$wher.="`".$key."`".$oper."'".$val."'";
								};

								if($foreignKeyTable[$key]>'' && $foreignKeyColumn[$key]>''){
									$sqlQ="SELECT `$keyOption` FROM "."`".$foreignKeyTable[$key]."`"." WHERE `".$foreignKeyColumn[$key]."`='".$_POST[$asurro]."'";
									record_progress(__LINE__,$sqlQ);
									$sqlForeignOption = mysql_query($sqlQ, $abase_conn)
										or die("Couldn't perform query (".__LINE__."): ".$sqlQ . mysql_error() . '.');
									$sqlFKey = mysql_fetch_assoc($sqlForeignOption);
									$opernd=$sqlFKey[$keyOption];
								}else{
									$opernd=$_POST[$asurro];
								};
								$criteria.=$and_or.$pseudo.$oper.$opernd;
							};
						}else if($_POST[$key_]>'' && $constant==1){
							$wher.=strtoupper($and_or);
							if(is_array($_POST['_or'])){
								$wher3='';
								foreach ($_POST['_or'] as $or_set) {
									$wher2=''; $kymtch=0;
									$or_terms=preg_split('/\|/',$or_set);
									foreach ($or_terms as $or_term){
										$wher2.=" OR `$or_term`".$oper."'".$surro."'";
										if($or_term==$key){$kymtch=1;};
									};
									if($kymtch==1){$wher3=$wher2;};
								};
								if($wher3>''){
									$wher.='('.substr($wher3,4).')';
								}else{
									$wher.="`".$key."`".$oper."'".$surro."'";
								};
							}else{

								$wher.="`".$key."`".$oper."'".$surro."'";
							};

							$criteria.=$and_or.$pseudo.$oper."'".$surro."'";
						};
					};
				};

				if($wher>'' && $where==''){$where=substr($wher,5);};
				$criteria=substr($criteria,5);
			};
		};

		if($qwhere>''){
			if($where>''){$where='('.$where.') '.$qwhere;}else{$where=substr($qwhere,4);};
		};


		$sqlQueryB4Where=$sqlQuery;
		if($search_in>''){
	// does this do anything?
			$sqlQuery.=" LIMIT 1";
		}else{
			if($where>''){$sqlQuery.=" WHERE $where";};
			if($group>''){$sqlQuery.=" GROUP BY $group";};
			if($order>''){$sqlQuery.=" ORDER BY $order";};
			if($limit>='0'){$sqlQuery.=" LIMIT $limit";};
		};
//		if($progress_log==1){error_log("\nFrom: ".$_SERVER['REMOTE_ADDR'].", At $date, Line:".__LINE__."\n".$sqlQuery."\n", 3, "abase_progress.txt");};
		record_progress(__LINE__,$sqlQuery);

	}else if($concatenated_values>'' && $concatenated_values_except_db==''){
		$table_error=1;
	}else if($emailto>''){
	}else{

		$top_output = '';
		$top_output.="<font style='color:$error_color; background-color: white;'>";
		$settings=htmlspecialchars($full_short_code);
		$settings_link="<A HREF='/wp-admin/options-general.php?page=".$GLOBALS['bus311mtd_Settings_Page_Slug']."' target='_blank' style='color:$error_color;'>";
		if($GLOBALS['bus311mtd_instance']>1){
			$top_output.='<B>#'.$GLOBALS['bus311mtd_instance'].'. ';
			$top_output.=htmlspecialchars($full_short_code).'</B>';
		}else{
			$top_output.='<B>'.htmlspecialchars($full_short_code).'</B>';
		};
		$sqlUserItalics="<I>$sqlUser</I>";
		if(strlen($database_overridden)>1){$sqlUserItalics.='*';};
		if($concatenated_values_except_db_echo==''){
			$top_output.=' <font size=2>(';
			$ver.=file_get_contents('version.txt',FILE_USE_INCLUDE_PATH);
			$top_output.=$ver;
			$db_list=str_replace(',','<li>',$database_table_rows);
			if($db_list>''){
				$top_output.=")<BR>Page: <I>$pageURL</I> from <I>$remote_addr</I><BR>User: $sqlUserItalics<BR>Database: <I>$sqlDatabase</I> containing tables:<ol><li>$db_list</ol>";
			}else{
				$top_output.=")<BR>Page: <I>$pageURL</I> from <I>$remote_addr</I><BR>User: $sqlUserItalics<BR>Database: <I>$sqlDatabase</I> contains no tables.<BR>";
			};
			if($lost_table_error){$top_output.=substr($lost_table_error,0,strlen($lost_table_error)-4);};
			$top_output.='</font>';
		}else{
			$error_string.=", At minimum, attribute <STRONG>sql=\"...\"</STRONG>, <STRONG>table=\"...\"</STRONG> or <STRONG>from=\"...\"</STRONG> must be specified.";
//			$error_string.=' Database: '.$sqlDatabase;
//			$error_string.=', User: '.$sqlUser;
			$top_output.="<BR><STRONG>Non-Fatal Error</STRONG> (".__LINE__.")<br>".substr($error_string,2);
			$top_output.="<BR>Tables in database <I>$sqlDatabase</I>: $database_tables<BR>";
			$top_output.="Click <nobr><STRONG><A HREF='/wp-admin/options-general.php?page=".$GLOBALS['bus311mtd_Settings_Page_Slug']."' target='_blank' style='color:$error_color;'>".$GLOBALS['bus311mtd_Settings_Option_Text']."</A></STRONG> in the WordPress Admin section for more information using ABASE.</nobr><BR>";
			if($lost_table_error){$top_output.=substr($lost_table_error,0,strlen($lost_table_error)-4);};
		};
		$top_output.='</font>';
		record_progress(__LINE__,'end');
		return $top_output;
	};

	$top_output = '';
	$ntt='';
//	$top_output.="\n\n<!-- Global Instance bus311mtd_instance='".$GLOBALS['bus311mtd_instance']."' -->\n\n";
// style="word-wrap:break-word;-webkit-hyphens:none;-moz-hyphens:none;hyphens:none;" to remove auto-hyphenate
	if($error_string>''){
		$top_output.="<font style='color:$error_color; background-color: white;'>";
		$top_output.='<STRONG>#'.$GLOBALS['bus311mtd_instance'].'.</STRONG> '.htmlspecialchars($full_short_code);
		$top_output.="<br><STRONG>Non-Fatal Error</STRONG> (".__LINE__.")<br>".substr($error_string,2);
		$top_output.='</font>';
		$top_output.="<BR>";
	}else if($echo_in=='0' || $echo_in=='comment'){
		$top_output.="<!--";
		if($error_string>''){$top_output.=' #'.$GLOBALS['bus311mtd_instance'].'. '.'SHORTCODE ERROR: '.substr($error_string,2)."\n";};
		$top_output.="\n<B>#".$GLOBALS['bus311mtd_instance'].".</B> $full_short_code";
//		if($db_in=='2' || $db_in=='3'){$top_output.=' ('.$db_in.')';};
		$top_output.="\n".'DB_HOST="'.$sqlHost.'"';
		$top_output.=' DB_NAME="'.$sqlDatabase.'"';
		$top_output.=' DB_USER="'.$sqlUser.'"';
		$top_output.="\n".$sqlQuery;
		$top_output.="\n-->";
	}else if($echo_in=='1'){
		$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.htmlspecialchars($short_code);
		if($error_string>''){$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.'SHORTCODE ERROR: '.substr($error_string,2).'<BR>';};
		if($pval<2 && ($db_in=='2' || $db_in=='3')){$top_output.='<sup> ('.$db_in.')</sup>';};
		$top_output.="<BR>";
	}else if($echo_in=='99'){
		$top_output.="<font style='color:$error_color; background-color: white;'>";
		if($error_string>''){$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.'SHORTCODE ERROR: '.substr($error_string,2).'<BR>';};
		$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.htmlspecialchars($short_code);
		if($pval<2 && ($db_in=='2' || $db_in=='3')){$top_output.='<sup> ('.$db_in.')</sup>';};
		$top_output.="<BR>".$sqlQuery.$debug_string;
		$top_output.="<BR>";
	}else if(strlen($echo_in)>1){
//		$top_output.='<font color="'.$echo_in.'">';
		$top_output.="<font style='color:$echo_in; background-color: white;'>";
		if($error_string>''){$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.'SHORTCODE ERROR: '.substr($error_string,2).'<BR>';};
		$top_output.='#'.$GLOBALS['bus311mtd_instance'].'. '.htmlspecialchars($short_code);
		if($pval<2 && ($db_in=='2' || $db_in=='3')){$top_output.='<sup> ('.$db_in.')</sup>';};
		$top_output.='</font>';
		$top_output.="<BR>";
	};
	$ntt=$top_output;
	$temp=" table_error = '$table_error' cols_in = '$cols_in' fields_in = '$fields_in' columns_in = '$columns_in'  form = '$form' ";
	
	if($table_error=='' && ($cols_in>'' || $fields_in>'' || $columns_in>'' || $form>'')){

		$updateMsg='';
		$updateFromToMsg='';
		$updateFromToSummary='';
		$updateToFromMsg='';
		$updateToFromSummary='';
		$updateToMsg='';
		$updateToSummary='';
		$updateMsg='';
		$updateSummary='';
		$updateFailed='';

// RECORD INSERT

//		if($insert_in>'' && $insertPosted==$insert_in){
		if(($form%10==1 || $form%10==2) && $insertPosted>'' && $form_name==$formPosted){
//			$top_output.="\n\n<!-- _insert[] = $insertPosted - _form = ".$formPosted." -->\n\n";
			$cols=split(',',$insertPosted);
			$set=''; $numUpdates=0; $wh=''; $updateString='';

//SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = $sqlDatabase AND TABLE_NAME = $table
			$sqlGetAI="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$sqlDatabase' AND TABLE_NAME = '$table'";
			record_progress(__LINE__,$sqlGetAI);
			$sqlGetAIresult = mysql_query($sqlGetAI, $abase_conn)
				or die("Couldn't perform query (".__LINE__."): $sqlGetAI - " . mysql_error() . '.');
			$sqlGetAIr = mysql_fetch_assoc($sqlGetAIresult);
			$nextId=$sqlGetAIr['AUTO_INCREMENT'];

//			$top_output.="\n\n<!-- $sqlGetAI $nextId -->\n\n";

			for($j=0;$j<count($cols);$j+=1){

				list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($cols[$j]);$asurro='*'.$surro;
				$key_=$key.'_';
				if($key>''){
					if($pseudo==''){$pseudo=$key;};

	$strPosition=strpos(' ,'.$filesPosted.','.$imagesPosted.',',",$key,");
	$stringLength=strlen(basename( $_FILES[$key_]['name'] ));
	//$top_output.="\n\n<!-- pseudo = $pseudo; strPosition = $strPosition; stringLength=$stringLength -->\n\n";


					if(strpos(' ,'.$filesPosted.','.$imagesPosted.',',",$key,")){
	// file upload code goes here
						
						$fname=basename( $_FILES[$key_]['name'] );
						if($fname>''){
	//	set dbfiles directory to default if not defined
							if($dbFileDir==''){
								$dbFileDir=$bus311mtd_default_file_upload_directory;
							};

							$target_Path = $dbFileDir;
							if(substr($target_Path,-1,1) == '/'){$target_Path=substr($target_Path,0,strlen($target_Path)-1);};
							$target_Path.='/'.$table.'/'.$key.'/'.$nextId.'/';
							if(substr($target_Path,0,1) == '/'){$target_Path=substr($target_Path,1);};
							$target_Pathfile = $target_Path.$fname;


	//			$top_output.="\n\n<!-- $target_Pathfile -->\n\n";

							$dirs=split('/',$target_Path);
							$dir='';
							for($d=0;$d<count($dirs);$d+=1){
								$dir.=$dirs[$d].'/';
								if(!is_dir($dir)){mkdir($dir);};
							};
							move_uploaded_file( $_FILES[$key_]['tmp_name'], $target_Pathfile );
							$set.=", `$key`='".$target_Pathfile."'";
							$wh.=" AND `$key`='".$target_Pathfile."'";
							if(strpos(' ,'.$acknowledgePosted,",$key,")){$updateString.=" ".$fname;};
							$numUpdates+=1;
						};
					}else{
						if($_POST[$key_]){$val=$_POST[$key_];}else if($_POST[$key]){$val=$_POST[$key];}else{$val='';};
						if($fieldType[$key]=='date'){
							if(substr($val,0,10)!='0000-00-00'){$val=date('Y-m-d',strtotime($val));}
						}else if($fieldType[$key]=='datetime'){
							if(substr($val,0,10)!='0000-00-00'){$val=date('Y-m-d H:i:s',strtotime($val));}
						};

						$set.=", `$key`='".$val."'";
						$wh.=" AND `$key`='".$val."'";
						if(strpos(' ,'.$acknowledgePosted.',',",$key,")){$updateString.=" ".$val;};
						$numUpdates+=1;
					};
				};
			};
			if($wh>''){$wh=' WHERE '.substr($wh,5);};
			$no_update=0;
			if($set>''){
				$sqlUpdateQuery="INSERT INTO $table SET ".substr($set,2);
//				$top_output .= "\n\n<!-- $sqlUpdateQuery -->\n\n";
				if($no_update==1){
					$top_output .= $sqlUpdateQuery."<BR>";
				}else{
					$updateMsg=substr($updateString,1);
					if($ack_color>''){
						if($ack_color==strtoupper($ack_color)){$updateMsg="<strong>$updateMsg</strong>";};
						$updateMsg='<font color="'.$ack_color.'">'.$updateMsg.'</font>';
					};
					$verify_form=verify_form();	//	return 1 for VALID. return -2 for expired. return 0 for doesn't exist. return -1 for minimum time not yet reached.
					if($verify_form==1){
						record_progress(__LINE__,$sqlUpdateQuery);
						$sqlUpdateResult = mysql_query($sqlUpdateQuery, $abase_conn)
							or die("Couldn't perform (".__LINE__.") $sqlUpdateQuery $update_in $elements_in " . mysql_error() . '.');
						$sqlConfirm="SELECT `$idField` FROM $table $wh ORDER BY `$idField` DESC LIMIT 1";
						record_progress(__LINE__,$sqlConfirm);
						$sqlResultConfirm = mysql_query($sqlConfirm, $abase_conn)
							or die("Couldn't perform query (".__LINE__."): $sqlConfirm - " . mysql_error() . '.');
						$num_rows = mysql_num_rows($sqlResultConfirm);
						$sqlID = mysql_fetch_assoc($sqlResultConfirm);
						if(strlen($ack_url)>0){
							$updateMsg='<a href="'.$ack_url.'?'.$idField."=".$sqlID[$idField].'">'.$updateMsg.'</a> added.';
						}else if(strlen($ack)==1){
							$updateMsg=$updateMsg." added.";
						};
					}else if($verify_form==-2){
						$updateMsg=$updateMsg." - not added. Form submitted too late. Time expired ($verify_form).";
					}else if($verify_form==-1){
						$updateMsg=$updateMsg." - not added. Form submtted too soon. Submit again ($verify_form).";
					}else{
						$updateMsg=$updateMsg." - not added. Form not valid ($verify_form).";
					};
				};
			};
		};
		if($sql_in>''){
			$mysql_msg.="You are using the sql=\"\" attribute so make sure it contains a valid SQL statement. Check to make sure the spelling of all table or column names within the SQL statement are exactly correct. Valid table names in <I>$sqlDatabase</I>: $database_tables.";
		}else{
			$mysql_msg="Check to make sure the upper and lower case spelling of your table and column names are all exactly correct. Valid table names in <I>$sqlDatabase</I>: $database_tables.";
			$mysql_msg.="<BR><BR>$sqlQuery";
		};
		record_progress(__LINE__,$sqlQuery);
		$sqlResult = mysql_query($sqlQuery, $abase_conn)
			or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes'].$lost_table_error."<B>Fatal Error</B> (".__LINE__.")</font><BR><font style='background-color: white;'>" . mysql_error() . "</font><BR><font style='color: $error_color; background-color: white;'>$mysql_msg  $temp</font>");
		$num_rows=0;
// $top_output.="\n\n<!-- HERE 11/11/2013 $num_rows  $form  ".$_POST['_delete']." - $sqlResult -->\n\n";
		if($sqlResult && $sqlResult != '1'){
			$num_rows = mysql_num_rows($sqlResult);
			$delete_took_place=0;
// $top_output.="\n\n<!-- HERE 11/12/2013 1 num_rows = $num_rows  -->\n\n";
			if($num_rows==1 && $form==4 && $_POST['_delete']){
//				$idField_=$idField.'_'; 
				$idField_=$idField; // 20131112
// $top_output.="\n\n<!-- HERE 11/12/2013 2 _POST[$idField_] =  ".$_POST[$idField_]." -  _GET[$idField] =  ".$_GET[$idField]." -->\n\n";
				if($_POST[$idField_]>0 && $_POST[$idField_]==$_GET[$idField]){
					$sqlDelete="DELETE FROM $table WHERE $idField='".$_GET[$idField]."'";
// $top_output.="\n\n<!-- HERE 11/12/2013 3 $sqlDelete  -->\n\n";
					if(strlen($password_in)>0){
						$password_value=addslashes($_POST[$password_in.'_']);
						$sqlDelete.=" AND `$password_in`='$password_value'";
					};
					$sqlDelete.=" LIMIT 1";
					record_progress(__LINE__,$sqlDelete);
					$sqlDeleteConfirm = mysql_query($sqlDelete, $abase_conn)
						or die("Couldn't perform query (".__LINE__."): $sqlDelete - " . mysql_error() . '.');
					if(mysql_affected_rows()){
						$delete_took_place=1;
					}else{
						$delete_took_place=0;
					};
					if($delete_took_place==1){
						$updateMsg="Record ".$idField."=".$_GET[$idField]." deleted.";
					}else{
						$updateMsg="Record ".$idField."=".$_GET[$idField]." not deleted.";
					};
				};
			};
		};

// RECORD UPDATE

//		if($update_in>'' && strpos($updatePosted.',',$update_in) && $form_name==$formPosted){
//		$top_output.="\n\n<!--- RECORD UPDATE SECTION  $form_name==$formPosted --->\n\n";
//		$top_output.="\n\n<!--- update $updatePosted --->\n\n";

		if(($form%10==1 || $form%10==2) && $updatePosted>'' && $form_name==$formPosted){


//			$top_output.="\n\n<!--- files $filesPosted --->\n\n";
//			$top_output.="\n\n<!--- images $imagesPosted --->\n\n";

//			if($fields_in>''){
//				$cols=split(',',$fields_in);
//			}else if($columns_in>''){
//				$cols=split(',',$columns_in);
//			};
			
			$cols=split(',',$updatePosted);
//$top_output.="\n\n<!--- updatePosted $updatePosted --->\n\n";

			$set=''; 
			$numUpdates=0;
			$numFailures=0;
			$password_value='';
			$sqlRow = mysql_fetch_assoc($sqlResult);
			for($j=0;$j<count($cols);$j+=1){

				list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($cols[$j]);$asurro='*'.$surro;
				if($pseudo==''){$pseudo=$key;};
//				$top_output.="\n\n<!--- KEY = $key  - ".$_POST[$key_]." --->\n\n";
//				$top_output.="\n\n<!--- password_in = $password_in  --->\n\n";
				$key_=$key.'_';
				if(strpos(' ,'.$filesPosted.','.$imagesPosted.',',",$key,")){
// file upload code goes here
					
					$fname=basename( $_FILES[$key_]['name'] );
//					$fname=basename( $_FILES[$key]['name'] );
					if($fname>''){
//						if(strpos(' ,'.$filesPosted.',',",$key,") && $files_pathPosted>''){
//							$dbFileDir=$files_pathPosted;
//						}else if(strpos(' ,'.$imagesPosted.',',",$key,") && $images_pathPosted>''){
//							$dbFileDir=$images_pathPosted;
//						};

//	set dbfiles directory to default if not defined
						if($dbFileDir==''){
							$dbFileDir=$bus311mtd_default_file_upload_directory;
						};
						$target_Path = $dbFileDir;
						if(substr($target_Path,-1,1) == '/'){$target_Path=substr($target_Path,0,strlen($target_Path)-1);};
						$target_Path.='/'.$table.'/'.$key.'/'.$sqlRow[$idField].'/';
						if(substr($target_Path,0,1) == '/'){$target_Path=substr($target_Path,1);};
						$target_Pathfile = $target_Path.$fname;

						$dirs=split('/',$target_Path);
						$dir='';
						for($d=0;$d<count($dirs);$d+=1){
							$dir.=$dirs[$d].'/';
							if(!is_dir($dir)){mkdir($dir);};
						};
						$oldValue=htmlspecialchars_decode($_POST[$key.'_01d']);
						if($oldValue>'' && substr($oldValue,0,strlen($target_Path))==$target_Path){
							unlink($oldValue);
						};
						move_uploaded_file( $_FILES[$key_]['tmp_name'], $target_Pathfile );
						$set.=", `$key`='".$target_Pathfile."'";
						$numUpdates+=1;
					};
				}else if(strlen($password_in)>0 && $password_in==$key){
					$password_value=addslashes($_POST[$key_]);
					if($_POST[$key_]){$password_value=addslashes($_POST[$key_]);}else if($_POST[$key]){$password_value=addslashes($_POST[$key]);}else{$val='';};

//					$top_output.="\n\n<!--- $key='$password_value' --->\n\n";
				}else{
					$oldValue=htmlspecialchars_decode($_POST[$key.'_01d']);
					$post_key=$_POST[$key_];
					if($_POST[$key_]){$post_key=$_POST[$key_];}else if($_POST[$key]){$post_key=$_POST[$key];}else{$post_key='';};

					if($fieldType[$key]=='int' && $post_key==''){$post_key='0';$_POST[$key_]='0';};
					if($fieldType[$key]=='date'){
//						if(substr($post_key,0,10)!='0000-00-00'){$post_key=date('Y-m-d',strtotime($post_key));};
						if(strtotime($post_key)!=0){
							$post_key=date('Y-m-d',strtotime($post_key));
							if($post_key != $oldValue){$set.=", `$key`='".$post_key."'";$numUpdates+=1;};
						};
					}else if($fieldType[$key]=='datetime'){
//						if(substr($post_key,0,10)!='0000-00-00'){$post_key=date('Y-m-d H:i:s',strtotime($post_key));};
						if(strtotime($post_key)!=0){
							$post_key=date('Y-m-d H:i:s',strtotime($post_key));
							if($post_key != $oldValue){$set.=", `$key`='".$post_key."'";$numUpdates+=1;};
						};
					}else{
						if($post_key != $oldValue){$set.=", `$key`='".$post_key."'";$numUpdates+=1;};
					};
				};
//				$top_output.="\n\n<!--- SET: $set --->\n\n";

			};
			$no_update=0;
			if($set>''){
				$sqlUpdateQuery="UPDATE $table SET ".substr($set,2)." WHERE `$idField`='".$sqlRow[$idField]."'";
				if(strlen($password_in)>0){$sqlUpdateQuery.=" AND `$password_in`='$password_value'";};
				if($no_update==1){
					$top_output .= $sqlUpdateQuery."<BR>";
				}else{
//					$top_output.="\n\n<!--- form $form_name: $sqlUpdateQuery --->\n\n";
					record_progress(__LINE__,$sqlUpdateQuery);
					$sqlUpdateResult = mysql_query($sqlUpdateQuery, $abase_conn)
						or die("Couldn't perform UPDATE (".__LINE__."): $sqlUpdateQuery " . mysql_error() . '.');
					record_progress(__LINE__,"SELECT * FROM $table WHERE `$idField`='".$sqlRow[$idField]."'");
					$sqlResultConfirm = mysql_query("SELECT * FROM $table WHERE `$idField`='".$sqlRow[$idField]."'", $abase_conn)
						or die("Couldn't perform query (".__LINE__."): $sqlQuery - " . mysql_error() . '.');
					$num_rows = mysql_num_rows($sqlResultConfirm);
					$sqlRowUpdate = mysql_fetch_assoc($sqlResultConfirm);

					for($j=0;$j<count($cols);$j+=1){
						list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($cols[$j]);$asurro='*'.$surro;
						$key_=$key.'_';
						if($pseudo==''){$pseudo=$key;};

//						if(1 || strpos(' '.$update,",$key,")){
						if(strlen($key)>0 && !(strlen($password_in)>0 && $password_in==$key)){
							$oldValue=htmlspecialchars_decode($_POST[$key.'_01d']);
							$asl=addslashes($sqlRow[$key]);
							$post_key ='';
							if(strpos(' ,'.$filesPosted.','.$imagesPosted.',',",$key,")){
								$fname=basename( $_FILES[$key_]['name'] );
								if($fname>''){
									$target_Path = $dbFileDir;
									if(substr($target_Path,-1,1) == '/'){$target_Path=substr($target_Path,0,strlen($target_Path)-1);};
									$target_Path.='/'.$table.'/'.$key.'/'.$sqlRow[$idField].'/';
									if(substr($target_Path,0,1) == '/'){$target_Path=substr($target_Path,1);};
									$post_key = $target_Path.$fname;
								};
							}else{
								$post_key=$_POST[$key_];
								if($_POST[$key_]){$post_key=$_POST[$key_];}else if($_POST[$key]){$post_key=$_POST[$key];}else{$post_key='';};
								if($fieldType[$key]=='date'){
//									if(substr($post_key,0,10)!='0000-00-00'){$post_key=date('Y-m-d',strtotime($post_key));};
									if(strtotime($post_key)!=0){
										$post_key=date('Y-m-d',strtotime($post_key));
									};
								}else if($fieldType[$key]=='datetime'){
//									if(substr($post_key,0,10)!='0000-00-00'){$post_key=date('Y-m-d H:i:s',strtotime($post_key));};
									if(strtotime($post_key)!=0){
										$post_key=date('Y-m-d H:i:s',strtotime($post_key));
									};
								};
							};
//$top_output.="\n\n<!--- $key='$post_key' from '$oldValue' --->\n\n";
//							if(substr($fieldType[$key],0,3)=='int' && $post_key==''){$post_key='0';};
							if(strpos(' ,'.$acknowledgePosted.',',",$key,") && $post_key != $oldValue){
								if($post_key==$sqlRowUpdate[$key] || $post_key==addslashes($sqlRowUpdate[$key])){
									$updateFromToMsg.=", $pseudo updated from '".$oldValue."' to '".$_POST[$key_]."'";
									$updateFromToSummary.=", $pseudo from '".$oldValue."' to '".$_POST[$key_]."'";
									$updateToFromMsg.=", $pseudo updated to '".$_POST[$key_]."' from '".$oldValue."'";
									$updateToFromSummary.=", $pseudo to '".$_POST[$key_]."' from '".$oldValue."'";
									$updateToMsg.=", $pseudo updated to '".$_POST[$key_]."'";
									$updateToSummary.=", $pseudo to '".$_POST[$key_]."'";
									$updateMsg.=", $pseudo updated";
									$updateSummary.=", $pseudo";
								}else if(! strpos(' ,'.$filesPosted.','.$imagesPosted.',',",$key,")){
									$updateFailed.=", $pseudo update FAILED. Not updated from '".$oldValue."' to '".$_POST[$key_]."'"; $numFailures+=1;
								};
							};
						};
					};
					if($ack=='4'){$updateSummary=$updateToFromSummary; $updateMsg=$updateToFromMsg;
					}else if($ack=='3'){$updateSummary=$updateFromToSummary; $updateMsg=$updateFromToMsg;
					}else if($ack=='2'){$updateSummary=$updateToSummary; $updateMsg=$updateToMsg;
					}else if($ack=='1'){$updateSummary=$updateSummary; $updateMsg=$updateMsg;
					}else if($ack==''){$updateSummary=''; $updateMsg='';};
					if($updateSummary>''){
						if($ack>'1' && $numUpdates>1){
							$updateMsg="Updates: ".substr($updateSummary,2).".";
						}else if($ack>'1' && $numUpdates==1){
							$updateMsg=substr($updateMsg,2).".";
						}else if($ack=='1' && $numUpdates>1){
							$updateMsg=substr($updateSummary,2)." updated.";
						}else if($ack=='1' && $numUpdates==1){
							$updateMsg=substr($updateMsg,2).".";
						};
					};
					if($numFailures>0){$updateMsg.=substr($updateFailed,1).".";};

		//			if($updateMsg>''){$top_output .= $sqlUpdateQuery."<BR>";};

					if($updateMsg>''){
						if($ack_color>''){
							if($ack_color==strtoupper($ack_color)){$updateMsg="<strong>$updateMsg</strong>";};
							$updateMsg='<font color="'.$ack_color.'">'.$updateMsg.'</font>';
						};
					};
				};
			};
			record_progress(__LINE__,$sqlQuery);
			$sqlResult = mysql_query($sqlQuery, $abase_conn)
				or die("Couldn't perform query (".__LINE__."): $sqlQuery - " . mysql_error() . '.');
			$num_rows = mysql_num_rows($sqlResult);
		};
// END RECORD UPDATE

	//	mysql_data_seek($sqlResult,0);

//		$top_output.="<BR>$fromJoin<BR>";

		$output='';
//		$top_output .= "<!--\n\nupdate=*".$update_in."* num_rows=*".$num_rows."* insert=*".$insert_in."* cols=*".$cols_in."* columns=*".$columns_in."* fields=*".$fields_in."* \n\n-->";
		$idFieldOK=0;
		if($idField>'' && $_GET[$idField] && $_GET[$idField]>0){$idFieldOK=1;};


		if($form%10==1 || $form%10==2 || $form==4){
			if($updateMsg>'' && $formPosted==$form_name){$top_output.=$updateMsg; $ntt.=$updateMsg;};
//			$top_output .= "<!--\n\nFORM STARTS $form_name HERE: update=*".$update_in."* search=*".$search_in."* insert=*".$insert_in."* required=*".$required_in."*\n\n -->";
			$output .="<script language='JavaScript'>var bus311mtd_".$ranstr."required=[];</script>";
			$output .="<FORM method=".'"post" name="bus311mtd_'.$ranstr.'form"';
			if(1 || $form>10){$output .=' enctype="multipart/form-data"';};
			if($form_url != ''){
				$output .=' action="'.$form_url.'"';
			}else{
				$output .=' action="'.$_SERVER['REQUEST_URI'].'"';
			};
			if($form==4){
				$output .= " onsubmit='return confirm(".'"Are you sure you want to delete this record?")'."'";
			}else{
				$output .= " onsubmit='return bus311mtd_".$ranstr."check_entries();'";
			};
			$output .= ">";
			$output .='<input type=hidden name="_form" value="'.$form_name.'">';
			if($_GET[$idField]){
				$idval=$_GET[$idField];
				if($idval>0){
					$output .='<input type=hidden name="';
					$output .=$idField.'" value="'.$idval;
					$output.='"'.">";
				};
			};
		}else if($update_in.$search_in.$insert_in.$required_in>''){
//			$top_output .= "\n\n<!-- FORM $form_name CONTINUES HERE: update=*".$update_in."* search=*".$search_in."* insert=*".$insert_in."* required=*".$required_in."* -->\n\n";
		};
		if($update_in>''){
			$output .='<input type=hidden name="';
			$output .='_update[]" value="'.$update_in;	// array because update form can span several shortcodes
			$output.='"'.">";
		};
		if($search_in>''){
			$output .='<input type=hidden name="';
			$output .='_search[]" value="'.$search_in;	// array because search form can span several shortcodes
			$output.='"'.">";
		};
		if($insert_in>''){
			$output .='<input type=hidden name="';
			$output .='_insert[]" value="'.$insert_in; // is now an array - insert form need not be entirely in one shortcode
			$output.='"'.">";
		};
		if($required_in>''){
			$output .='<input type=hidden name="';
			$output .='_required[]" value="'.$required_in;
			$output.='"'.">";
		};
		if($files_in>''){
			$output .='<input type=hidden name="';
			$output .='_files[]" value="'.$files_in;
			$output.='"'.">";
		};
		if($images_in>''){
			$output .='<input type=hidden name="';
			$output .='_images[]" value="'.$images_in;
			$output.='"'.">";
		};
//		if($columns_in>''){
//			$output .='<input type=hidden name="';
//			$output .='_columns[]" value="'.$columns_in;
//			$output.='"'.">";
//		}else if($fields_in>''){
//			$output .='<input type=hidden name="';
//			$output .='_columns[]" value="'.$fields_in;
//			$output.='"'.">";
//		};
		if($ack>0 && $elements_in>''){
			$output .='<input type=hidden name="';
			$output .='_acknowledge[]" value="'.$elements_in;
			$output.='"'.">";
		};

		$ntt.=$output;

		if((($update_in>'' && $idFieldOK) || $update_in=='' ) && 
			(($insert_in>'' && $num_rows==0) || $insert_in=='' ) && 
			(($form_type!='delete' && $form_type!='update') || $idFieldOK ) && 
			(($cols_in>'' && $num_rows>1) || $columns_in>'' || $fields_in>'')){


			$view='table';
			if(($num_rows==1 || $search_in>'') && $fields_in>''){$view='record';};
			$fields_cols_columns='';
			$table_columns='';
			if($view=='table'){
				$col_columns_in=$cols_in;
				if($col_columns_in==''){$col_columns_in=$columns_in;};
				if($col_columns_in=='*'){
					$fields_cols_columns='*';
					if($sqlResult && $sqlResult != '1'){
						$sqlRow = mysql_fetch_assoc($sqlResult);
						if($sqlRow){
							foreach ($sqlRow as $key=>$col){$col_columns_in.=','.$key;};
							$col_columns_in=substr($col_columns_in,2);
							record_progress(__LINE__,$sqlQuery);
							$sqlResult = mysql_query($sqlQuery, $abase_conn)
								or die("Couldn't perform query (".__LINE__."): $sqlQuery - " . mysql_error() . '.');
						};
					};
				};
				$table_columns=$col_columns_in;
				$cols=split(',',$col_columns_in);

			}else if($view=='record'){
				if($fields_in=='*'){
					$fields_cols_columns='*';
					$sqlRow = mysql_fetch_assoc($sqlResult);
					foreach ($sqlRow as $key=>$col){$fields_in.=','.$key;};
					$fields_in=substr($fields_in,2);
					record_progress(__LINE__,$sqlQuery);
					$sqlResult = mysql_query($sqlQuery, $abase_conn)
						or die("Couldn't perform query (".__LINE__."): $sqlQuery - " . mysql_error() . '.');
//					$output .="<BR><BR>$fields_in<br><BR>";
				};
				$table_columns=$fields_in;
				$cols=split(',',$fields_in);
			};
			$left=str_replace('*',$table_columns,$left);
			$center=str_replace('*',$table_columns,$center);
			$right=str_replace('*',$table_columns,$right);
			$fields_cols_columns='';
			$styles=split(',',$styles_in);

//			$output .="\n\n<!-- $sqlQuery -->\n\n";
			if($notable!='1'){
				if($style!=''){
					$output .='<table style="'.$style.'"'.">";
				}else{
//					$output .="<table style='width:auto; padding:0 1.0em;'>";
					if($form>=1){
						$output .="<table style='width:auto;'>";
					}else{
						$output .="<table>";
					};
				};
			};
			if($view=='record'){
				if(0 && $updateMsg>''){
					$output .="<TR>";
					if($rownum=='1'){
						$output .="<td>&nbsp;</td>";
					};
					if($numUpdates==1){
						$output .="<td>&nbsp;</td><TD><EM>$updateMsg</EM></TD>";
					}else{
						$output .="<TD colspan=2><EM>$updateMsg</EM></TD>";
					};
					$output .="</TR>";
				};
				if($criteria>'' && $search_in=='' && $update_in==''){
					if($rownum=='1'){
						$output .="<td>&nbsp;</td>";
					};
					if($numUpdates==1){
						$output .="<td>&nbsp;</td><TD><EM>$criteria</EM></TD>";
					}else{
						$output .="<TD colspan=2><EM>$criteria</EM></TD>";
					};
					$output .="</TR>";
				};
			};
			$rw=0;
			$rowLoop=0;
			$cellCount=0;
			$enableZeroRecords=0;
			if($insert_in>''){$enableZeroRecords=1;};
			$lastValue='';
			$javascript='';
			if($sqlResult=='1'){
				$output=$sqlResult;
			}else{
// TABLE ROW LOOP STARTS HERE
				while($sqlResult && $sqlResult != '1' && ($sqlRow = mysql_fetch_assoc($sqlResult)) || ($enableZeroRecords==1 && $rowLoop==0)){
					$rowLoop+=1;
					$abase_row='';
					$abase_names='';
					if($view=='table'){
						$rw+=1;
						if($rownum=='1'){
							$abase_names.="<th>#</th>";
							$abase_row .="<td>".$rw.".</td>";
						};
					};
					if($fields_cols_columns=='*'){
						unset($cols);
						$cols=array();
					//	$abase_row .="<!-- ";
						foreach ($sqlRow as $key=>$col){
							$cols[]=$key;
							$vals[]=$col;
					//		$abase_row .=" [key=$key, col=$col]";
						};
					//	$abase_row .=" -->";
					};
// ROW COLUMN LOOP STARTS HERE
					for($j=0;$j<count($cols);$j+=1){
						list($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)=bus311tabledisplay_field_split($cols[$j]);$asurro='*'.$surro;
						$pseudo_original=$pseudo;
						if($pseudo==''){$pseudo=$key;};
						if($key>''){
							$cellCount+=1;
// $ntt .="<!--($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant,$element_style,$value_format,$element_type)-->";

							if($fields_cols_columns=='*'){$sqlRowKey=$vals[$j];}else{$sqlRowKey=$sqlRow[$key];};

							$sty='';
							$commaedKey=','.$key.',';
							if($key==$emailto && strpos($sqlRowKey,'@')>0){$emailto=$sqlRowKey;};
							if($key==$emailfrom && strpos($sqlRowKey,'@')>0){$emailfrom=$sqlRowKey;};
							if($key==$emailcc && strpos($sqlRowKey,'@')>0){$emailcc=$sqlRowKey;};
							if($key==$emailbcc && strpos($sqlRowKey,'@')>0){$emailbcc=$sqlRowKey;};
// $output.="\n\n<!--	key=$key, sqlRowKey=$sqlRowKey, emailto=$emailto	-->\n\n";
							if($view=='record'){
								$output .="<tr>";
								$abase_row='';
								$rw+=1;
								if($rownum=='1'){$output .="<td>".$rw.".</td>";};
							}else{
//  $output.="\n\n<!--	center_in=$center_in, right_in=$right_in, left_in=$left_in	-->\n\n";
//  $output.="\n\n<!--	center=$center, right=$right, left=$left	-->\n\n";
								if(strpos(' '.$center_in,'*')){
									$sty=' style="text-align:center;"';
								};
								if(strpos(' '.$right_in,'*')){
									$sty=' style="text-align:right;"';
								};
								if(strpos(' '.$left_in,'*')){
									$sty=' style="text-align:left;"';
								};
								if(!strpos(' '.$center_in,'*') && strpos(' '.$center,$key)){
									$sty=' style="text-align:center;"';
								};
								if(!strpos(' '.$right_in,'*') && strpos(' '.$right,$key)){
									$sty=' style="text-align:right;"';
								};
								if(!strpos(' '.$left_in,'*') && strpos(' '.$left,$key)){
									$sty=' style="text-align:left;"';
								};
//  $output.="\n\n<!--	key=$key, sty=$sty	-->\n\n";
								$abase_names.="<th$sty>";
								$abase_names .= $pseudo;
								if(strpos(' '.$required,$commaedKey)){$abase_names .= "*";};
								$abase_names .= "</th>";
							};
							$ftype=$fieldType[$key];
							$fsize='';
							if(strpos(' '.$ftype,'(')){
								$fsize=substr($ftype,strpos($ftype,'(')+1,strpos($ftype,')')-strpos($ftype,'(')-1);
								$ftype=substr($ftype,0,strpos($ftype,'('));
							};
							if($view=='record'){
								$output .="<th style='text-align:left;'>".$pseudo;
							//	$output .=" [".$ftype.";".$fsize."]";
								$output .="</th>";
							};
							$val=htmlspecialchars($sqlRowKey);
							$optionList='';
							if(strpos(' '.$update,$commaedKey) || strpos(' '.$search,$commaedKey) || strpos(' '.$insert,$commaedKey)){
								if($foreignKeyTable[$key]>'' && $foreignKeyColumn[$key]>''){
									if($keyOption==''){
										$sqlFTQry="SHOW COLUMNS FROM `".$foreignKeyTable[$key]."`";
										$strng='';
										record_progress(__LINE__,$sqlFTQry);
										$sqlFTColumns = mysql_query($sqlFTQry, $abase_conn)
											or die("Couldn't perform query (".__LINE__."): $sqlFTQry - $foreignKeyColumn[$key] - " . mysql_error() . '.');
										while($sqlFTCol = mysql_fetch_assoc($sqlFTColumns)){
											$strng.=$sqlFTCol['Field'].',';
											if($keyOption=='' && $sqlFTCol['Field'] != $foreignKeyColumn[$key]){$keyOption=$sqlFTCol['Field'];};
										};
									};
								//	$optionList="SELECT $key,$keyOption FROM ".$foreignKeyTable[$key];
									$opt_val=$keyOption;
									if(strpos($opt_val,'.')){
										$opt_val=substr($opt_val,strpos($opt_val,'.')+1);
									};
									$sqlQry="SELECT `$foreignKeyColumn[$key]`,`$opt_val` FROM `".$foreignKeyTable[$key]."` ORDER BY `".$opt_val."`";
									record_progress(__LINE__,$sqlQry);
									$sqlKeys = mysql_query($sqlQry, $abase_conn)
										or die("Couldn't perform query (".__LINE__."): $sqlQry -- $foreignKeyColumn[$key] -- $strng -- " . mysql_error() . '.');
									while($sqlKey = mysql_fetch_assoc($sqlKeys)){
										$optionList.="<option value='".$sqlKey[$foreignKeyColumn[$key]]."'";
										if(strpos(' '.$update,$commaedKey) && $sqlRowKey==$sqlKey[$foreignKeyColumn[$key]]){$optionList.=" SELECTED";};
										$optionList.=">".$sqlKey[$opt_val];

									};
								};
							};
							if(($ftype=='date' || $ftype=='datetime')){
								if(substr($sqlRowKey,0,10) != '0000-00-00' && $sqlRowKey != 0){
									if($value_format>''){
										$sqlRowKey=date($value_format,strtotime($sqlRowKey));
									}else if($element_style>''){
										$sqlRowKey=date($element_style,strtotime($sqlRowKey));
									};
								}else{
									$sqlRowKey='';
								};
							};
			//	Record Link
							if($key==$rlink){
								$href_url=$rlink_url;
								if($href_url==''){
									if(strpos($_SERVER['REQUEST_URI'],'=')>0){
										$href_url=$_SERVER['REQUEST_URI'].'&';
									}else{
										$href_url=$_SERVER['REQUEST_URI'].'?';
									};
								}else if(strpos($href_url,'=')>0){
									$href_url='?'.$href_url.'&';
								}else{
									$href_url.='?';
								};
								if($rlink_alias>''){
									if($rlink_target==''){
										$abase_row .="<td $sty><a href=$href_url$rlink_alias=".$sqlRow[$idField].">".$sqlRowKey."</a></td>";
										$ntt .="<a href=$href_url$rlink_alias=".$sqlRow[$idField].">".$sqlRowKey."</a>";

									}else{
										$abase_row .="<td $sty><a href=$href_url$rlink_alias=".$sqlRow[$idField]." target=".$rlink_target.">".$sqlRowKey."</a></td>";
										$ntt .="<a href=$href_url$rlink_alias=".$sqlRow[$idField]." target=".$rlink_target.">".$sqlRowKey."</a>";
									};
								}else{
									if($rlink_target==''){
										$abase_row .="<td $sty><a href=$href_url$idField=".$sqlRow[$idField].">".$sqlRowKey."</a></td>";
										$ntt .="<a href=$href_url$idField=".$sqlRow[$idField].">".$sqlRowKey."</a>";

									}else{
										$abase_row .="<td $sty><a href=$href_url$idField=".$sqlRow[$idField]." target=".$rlink_target.">".$sqlRowKey."</a></td>";
										$ntt .="<a href=$href_url$idField=".$sqlRow[$idField]." target=".$rlink_target.">".$sqlRowKey."</a>";
									};
								};
			//	Appended Link
							}else if($key==$alink){
								if($alink_target==''){
									$abase_row .="<td $sty><a href=$alink_url".$sqlRow[$alink_append].">".$sqlRowKey."</a></td>";
									$ntt .="<a href=$alink_url".$sqlRow[$alink_append].">".$sqlRowKey."</a>";
								}else{
									$abase_row .="<td $sty><a href=$alink_url".$sqlRow[$alink_append]." target=".$alink_target.">".$sqlRowKey."</a></td>";
									$ntt .="<a href=$alink_url".$sqlRow[$alink_append]." target=".$alink_target.">".$sqlRowKey."</a>";
								};
			//	Update or Insert Form Element
							}else if(strpos(' '.$update.$insert,$commaedKey) || ($form_type=='delete' && strlen($password_in)>0 && $password_in==$key)){
								$abase_row .="<td$sty>";
								$ordr=split(',',$update_in.$insert_in);
								$styls=split(',',$input_styles_in);
								$input_style='';
								for($i=0;$i<count($ordr);$i+=1){
									if($ordr[$i]==$key){
										$input_style=$styls[$i];
									};
								};
								if($styles[$j]>''){$input_style=$styles[$j];};
								$input_style=$element_style;
								if($input_style>''){$input_style=' style="'.$input_style.'" ';};
		//bus311mtd_dbpwd2

								if(strpos(' '.$files.$images,$commaedKey)){
									if($sqlRowKey>''){
										$fs=split('/',$sqlRowKey);
										$fn=$fs[count($fs)-1];
										$abase_row .='<a href="/'.$sqlRowKey.'">'.$fn.'</a><BR>';
										$ntt .='<a href="/'.$sqlRowKey.'">'.$fn.'</a>';
									};
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=file>";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=file>";
								}else if($element_type=='text'){
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value='".$sqlRowKey."'>";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value='".$sqlRowKey."'>";
								}else if($element_type=='password' || ($element_type=='' && strlen($password_in)>0 && $password_in==$key)){
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' autocomplete='off' type=password $input_style value=''>";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' autocomplete='off' type=password $input_style value=''>";
								}else if($element_type=='textarea'){
									$abase_row .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
									$ntt .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
								}else if($optionList>''){
									$abase_row .="<select name='".$key."_' id='bus311mtd_".$ranstr.$key."'>".$optionList."</select>";
									$ntt .="<select name='".$key."_' id='bus311mtd_".$ranstr.$key."'>".$optionList."</select>";
								}else if($element_type!=''){
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type='".$element_type."' $input_style value='".$sqlRowKey."'>";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value='".$sqlRowKey."'>";
								}else if($ftype=='date'){
									if($input_style==''){$input_style="size='10'";};
									
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value=".'"'.$sqlRowKey.'"'.">";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value=".'"'.$sqlRowKey.'"'.">";
								}else if($ftype=='longtext'){
									if($input_style==''){$input_style=' style="width:600px;height:400px;vertical-align:0px;$element_style" ';};
									if(!strpos($input_style,'vertical-align')){$input_style=' style="vertical-align:0px;'.substr($input_style,strpos($input_style,'="')+2);};
									$abase_row .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
									$ntt .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
								}else if($ftype=='text'){
									if($input_style==''){$input_style=' style="width:600px;height:40px;vertical-align:0px;$element_style" ';};
									if(!strpos($input_style,'vertical-align')){$input_style=' style="vertical-align:0px;'.substr($input_style,strpos($input_style,'="')+2);};
									$abase_row .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
									$ntt .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
								}else if($fsize==''){
									$numRows=20;
									if($input_style==''){$input_style="cols=60 rows='".$numRows."'";};
									$abase_row .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
									$ntt .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
								}else if($fsize==1 && $ftype=='int'){
									$abase_row .="<input type=checkbox name='".$key."_' id='bus311mtd_".$ranstr.$key."' value=1";
									$ntt .="<input type=checkbox name='".$key."_' id='bus311mtd_".$ranstr.$key."' value=1";
									if($sqlRowKey=='1'){$abase_row .=" checked";$ntt .=" checked";};
									$abase_row.=">";
									$ntt.=">";
								}else if($fsize>60){
									$numRows=intval($fsize/60);
									if($numRows==0){$numRows=1;};
									$widthpx=$fsize*3;
									if($input_style==''){$input_style=' style="width:'.$widthpx.'px;height:18px;vertical-align:none;" ';};
									if(!strpos($input_style,'vertical-align')){$input_style=' style="vertical-align:0px;'.substr($input_style,strpos($input_style,'="')+2);};
		//								if($input_style==''){$input_style="cols=60 rows='".$numRows."'";};
									$abase_row .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
									$ntt .="<textarea name='".$key."_' id='bus311mtd_".$ranstr.$key."' $input_style>".$sqlRowKey."</textarea>";
								}else{
									$widthpx=$fsize*8;
									if($input_style==''){
										$input_style=' style="width:'.$widthpx.'px;" ';
									};
									$abase_row .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value='".$sqlRowKey."'>";
									$ntt .="<input name='".$key."_' id='bus311mtd_".$ranstr.$key."' type=text $input_style value='".$sqlRowKey."'>";
								};
								if(strpos(' '.$required,$commaedKey)){
									$javascript.='if(document.getElementById("bus311mtd_'.$ranstr.$key.'").value==""){emsg+="'.$pseudo.' required."};';
									$output .='<script language="JavaScript">bus311mtd_'.$ranstr.'required.push("'.$key.'","'.$pseudo.'");</script>';
									$ntt .='<script language="JavaScript">bus311mtd_'.$ranstr.'required.push("'.$key.'","'.$pseudo.'");</script>';
								};
								if($element_type=='password'){
									$abase_row .="<input name='".$key."_01d' type=hidden value=".'"">';
									$ntt .="<input name='".$key."_01d' type=hidden value=".'"">';
								}else{
									$abase_row .="<input name='".$key."_01d' type=hidden value=".'"'.$val.'">';
									$ntt .="<input name='".$key."_01d' type=hidden value=".'"'.$val.'">';
								};
								if(0 && $submit>''){
									$abase_row .="&nbsp; &nbsp; <input type=submit value='".$submit."'>";
								};
								$abase_row .="</td>";

			//	Search Form Element ($pseudo,$key,$keyOption,$submit,$op,$surro,$pct,$pct0,$constant)
							}else if(strpos(' '.$search,$commaedKey)){
								$abase_row .="<td$sty>";

								$input_style=$element_style;
								if($input_style>''){$input_style=' style="'.$input_style.'" ';};
								

								if($constant==1){
									$abase_row .='<input type=checkbox name="'.$key.'_" value="'.$surro.'" style="vertical-align:-3px;">'.$surro;
									$ntt .='<input type=checkbox name="'.$key.'_" value="'.$surro.'" style="vertical-align:-3px;">'.$surro;
								}else if($optionList>''){
									$abase_row .="<select name='".$asurro."' $input_style><option value=''>".$optionList."</select>";
									$ntt .="<select name='".$asurro."' $input_style><option value=''>".$optionList."</select>";
								}else if($ftype=='date'){
									if($input_style==''){$input_style=" size='10' ";};
									$abase_row .="<input name='".$asurro."' type=text $input_style";
									$ntt .="<input name='".$asurro."' type=text $input_style";

					//				$demolo_row.=" placeholder=".'"e.g., ';
					//				if(strpos(' '.$op,'>')){
					//					$abase_row .= date("Y-m-",time()-60*86400).'01';
					//				}else{
					//					$abase_row .= date("Y-m-d");
					//				};
					//				$abase_row .= '"';

									$abase_row.=">";
									$ntt.=">";
								}else if($fsize==1 && $ftype=='int'){
									$abase_row .="<input type=checkbox name='".$asurro."' value=1>";
									$ntt .="<input type=checkbox name='".$asurro."' value=1>";
								}else if($fsize<20){
									$numRows=intval($fsize/60);
									if($input_style==''){$input_style=" size='$numRows' ";};
									$abase_row .="<input name='".$asurro."' type=text $input_style value=".'"'.'"'.">";
									$ntt .="<input name='".$asurro."' type=text $input_style value=".'"'.'"'.">";
								}else{
									if($input_style==''){$input_style=" size='20' ";};
									$abase_row .="<input name='".$asurro."' type=text $input_style value=".'"'.'"'.">";
									$ntt .="<input name='".$asurro."' type=text $input_style value=".'"'.'"'.">";
								};
								$abase_row .='<input name="_term[]" type=hidden value="'.$pseudo.','.$key.','.$keyOption.','.$submit.','.$op.','.$surro.','.$pct.','.$pct0.','.$constant.'">';
								$ntt .='<input name="_term[]" type=hidden value="'.$pseudo.','.$key.','.$keyOption.','.$submit.','.$op.','.$surro.','.$pct.','.$pct0.','.$constant.'">';
								if($or_in>''){
									$or_sets=preg_split('/\,/',$or_in);
									foreach ($or_sets as $or_set){
										$or_terms=preg_split('/\|/',$or_set);
										$kymtch=0;
										foreach ($or_terms as $or_term){
											if($or_term==$key){$kymtch=1;};
										};
										if($kymtch==1){
											$abase_row .='<input name="_or[]" type=hidden value="'.$or_set.'">';
											$ntt .='<input name="_or[]" type=hidden value="'.$or_set.'">';
										};
									};
								};
								if(0 && $submit>''){
									$abase_row .="&nbsp; &nbsp; <input type=submit value='".$submit."'>";
								};
								$abase_row .="</td>";
								if(0 && $submit>''){
									$abase_row .="<td$sty><input type=submit value='".$submit."'></td>";
								};
							}else if(strpos(' '.$images,$commaedKey)){
								$abase_row .="<td$sty>";
								if($sqlRowKey>''){
									$site_path=$images_path;
									if($site_path==''){$site_path=$siteurl.'/';};
									$abase_row .="<a href='".$site_path.$sqlRowKey."'>"."<img src='".$site_path.$sqlRowKey."' style='".$element_style."'></a>";
									$ntt .="<a href='".$site_path.$sqlRowKey."'>"."<img src='".$site_path.$sqlRowKey."' style='".$element_style."'></a>";
								};
								$abase_row .="</td>";
							}else{
								$abase_row .="<td$sty>".$sqlRowKey."</td>";
								$ntt .=$sqlRowKey;
							};
							if($form!=4 && $submit>''){
								$abase_row .="<td$sty><input type=submit value='".$submit."'></td>";
								$ntt .="&nbsp;<input type=submit value='".$submit."'>";
							}else if($form==4 && ($submit>'' || $delete>'') && $num_rows==1 && $delete_took_place==0){
								if($_GET[$idField] && $_GET[$idField]>0){
									$abase_row .="<td$sty><input type=submit name='_delete' value='".$delete.$submit."'></td>";
									$ntt .="&nbsp;<input type=submit name='_delete' value='".$delete.$submit."'>";
								};
							}else if($form==4 && ($submit>'' || $delete>'') && $num_rows==1 && $delete_took_place==1){
								$abase_row .="<td$sty><EM>Deleted</EM></td>";
								$ntt .="Deleted";
							};


						};


						if($view=='record'){
							$output .="$abase_row</tr>";
						};
					};
					if($view=='table'){
						if(0 && $updateMsg>'' && $rw==1){
							$output .="<TR>";
							$output .="<TD colspan=".count($cols)."><EM>$updateMsg</EM></TD>";
							$output .="</TR>";
						};
						if($criteria>'' && $rw==1 && $ack>'' && $search_in=='' && $update_in=='' && $insert_in==''){
							$output .='<TR>';
							$output .="<TD colspan=".count($cols).">";
							if($ack_color>''){
								$output .='<font color="'.$ack_color.'">';
								$output .="<EM>$num_rows in list. $criteria.</EM>";
								$output .='</font>';
							}else{
								$output .="<EM>$num_rows in list. $criteria.</EM>";
							};
							$output .="</TD>";
							$output .="</TR>";
						};

						if($notitle!='1' && $rw==1){$output .="<tr>".$abase_names."</tr>";};
						$output .="<tr>".$abase_row."</tr>";
					};
//					$lastValue=$ntt;
				};
				if($notable!='1'){$output .="</table>";};
			};
		};

		$outputx='';
		if($form%10==1 || $form%10==3 || $form==4){
			if($form_type=='delete' || $form_type=='insert' || $form_type=='update'){
				$submitip=time().':'.$remote_addr;
				add_valid_form($submitip);
				$outputx .="<input type='hidden' name='_submit' value='$submitip'>";
			};
			$outputx .="</FORM>";
			$outputx .="<script language='JavaScript'>";
			$outputx.="function bus311mtd_".$ranstr."check_entries(){";
			$outputx.="var emsg='';var key='';var pseudo='';";
			$outputx.="while(bus311mtd_".$ranstr."required.length>0){";
			$outputx.="pseudo=bus311mtd_".$ranstr."required.pop();key=bus311mtd_".$ranstr."required.pop();";
			$outputx.="if(document.getElementById('bus311mtd_".$ranstr."'+key).value==''){emsg+=pseudo+".'" required. "};'."";
			$outputx.="};";
			$outputx.="if(emsg>''){alert(emsg); return false}else{return true};";
			$outputx.="};";
			$outputx.="</script>";
			$output .= $outputx;
//			$output .= "\n<!-- FORM $form_name ENDS HERE: update=*".$update_in."* search=*".$search_in."* insert=*".$insert_in."* required=*".$required_in."* -->\n\n";
			$ntt.=$outputx;
			$GLOBALS['bus311mtd_form_start']='';
		}else if($update_in.$search_in.$insert_in.$required_in>''){
//			$output .= "\n\n<!-- FORM $form_name CONTINUATION ENDS HERE: update=*".$update_in."* search=*".$search_in."* insert=*".$insert_in."* required=*".$required_in."* -->\n\n";
		};

	};
	$history_response='<STRONG>OK</STRONG>';
	if($error_string>''){
		$history_response="<STRONG>Non-Fatal Error</STRONG> (".__LINE__.")<br>".substr($error_string,2);
	};
	$GLOBALS['bus311mtd_page_shortcodes'].="$history_response<BR><BR>";

	$sc_content=do_shortcode($content);

	$dnames=split("\.",$_SERVER['SERVER_NAME']);
	$nm=count($dnames);
	$dname=$dnames[$nm-2].'.'.$dnames[$nm-1];
	$send_the_email=0;
	if(strpos($emailto,'@')>0 && strpos($emailto,'.',strpos($emailto,'@'))>strpos($emailto,'@')){
		if($rowLoop==1){
			if($table_in=='' || $where!=''){
				$send_the_email=1;
			};
		}else if($rowLoop>1){
			if($emailto==$emailto_in && $emailfrom==$emailfrom_in && $emailcc==$emailcc_in && $emailbcc=$emailbcc_in){
//	if this fails then an email was meant to be sent upon a record match.
				$send_the_email=1;
			};
		}else if($rowLoop==0){
			if($table_in=='' && $from_in=='' && $sql_in==''){
//	this verifies there was no database search - just send an email
				$send_the_email=1;
			};
		};
	};
	if($cellCount==1 && ($notitle == '1' || $pseudo_original=='')){
		$outputx=trim(strip_tags($ntt));
		$ntt=$sc_content.$ntt;
//		if(strlen($where.$sql)>0 && $rowLoop<=1 && strlen($ntt)>0 && strpos($emailto,'@')>0 && strpos($emailto,'.',strpos($emailto,'@'))>strpos($emailto,'@')){
// function send_email($to='',$subject='',$body='',$from='',$cc='',$bcc='')
		if($send_the_email==1){
			if($emailsubject==''){$emailsubject='Server message';};
			if($emailfrom==''){$emailfrom='server@'.$dname;};
			$ntt.=$email_tail;
			send_email($emailto,$emailsubject,$ntt,$emailfrom,$emailcc,$emailbcc);
			$ntt='';
		};
		record_progress(__LINE__,'end');
		reopen_wpdb();
		return $ntt;
	}else{
		$outputx=trim(strip_tags($output));
		$output=$sc_content.$output;
//		if(strlen($where.$sql)>0 && $rowLoop<=1 && strlen($output)>0 && strpos($emailto,'@')>0 && strpos($emailto,'.',strpos($emailto,'@'))>strpos($emailto,'@')){
// function send_email($to='',$subject='',$body='',$from='',$cc='',$bcc='')
		if($send_the_email==1){
			if($emailsubject==''){$emailsubject='Server message';};
			if($emailfrom==''){$emailfrom='server@'.$dname;};
			$output.=$email_tail;
			send_email($emailto,$emailsubject,$output,$emailfrom,$emailcc,$emailbcc);
			$output='';
		};
		record_progress(__LINE__,'end');
		reopen_wpdb();
		return $top_output.$output;
	};
	record_progress(__LINE__,'end');
};
	
function reopen_wpdb(){
//	mysql_close($abase_conn);
	$sqlWpHost=DB_HOST;
	$sqlWpDatabase=DB_NAME;
	$sqlWpPass=DB_PASSWORD;
	$sqlWpUser=DB_USER;
	$wp_conn = mysql_connect($sqlWpHost, $sqlWpUser, $sqlWpPass) 
		or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes']."<B>Fatal Error</B>  (".__LINE__.") - Couldn't reconnect to host '$sqlWpHost'.<BR>" . mysql_error());
	$wp_db = mysql_select_db($sqlWpDatabase, $wp_conn)
		or die("<font style='color: $error_color; background-color: white;'>".$GLOBALS['bus311mtd_page_shortcodes']."<B>Fatal Error</B>  (".__LINE__.") - Couldn't reselect database '$sqlWpDatabase'.<BR>" . mysql_error());
};

?>