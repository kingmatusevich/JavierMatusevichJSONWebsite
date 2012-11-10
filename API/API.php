<?php
// Global constants
include_once 'constants.php';
include_once 'errors.php';
//Global System fixed Variables DO NOT TOUCH
$APImode 	 = getvars('mode');
$APIprint 	 = getvars('pp');
$APIquery 	 = getvars('query');
$APIclass 	 = getvars('class');
$APIcount 	 = getvars('count');
$APIuser	 = getvars('user');
$APIsecret	 = getvars('secret');
$APItest 	 = getvars('test');
$APIextName  = getvars('extname');
$APIextUser  = getvars('extuser');
$APIextLevel = getvars('extlevel');
$APIextDesc  = getvars('extdesc');
$APIextPic	 = getvars('extpic');
$APIextURL	 = getvars('exturl');
// Global System Variables
$INTdb		 = 'main';
$INThost	 = 'localhost';
$INTuser	 = 'root';
$INTpassword = '5f5xqa';
$INTdebug	 = DEBUG_UNSET;
// GET vars setter
function getvars($GETname){
	if(isset($_GET[$GETname])) {
		return $_GET[$GETname];
	} else {
		return '';
	}
}
// Debug mode checker
function checkdebug(){
	global $APItest, $INTdebug;
	if ($INTdebug == DEBUG_UNSET) {
		switch($APItest){
			case TRUE:
				if(checklevels(1) == TRUE) {$INTdebug =DEBUG_TRUE;} else {$INTdebug = DEBUG_FALSE;};
				break;
			case FALSE:
			 	$INTdebug = DEBUG_FALSE;
				break;
			default:
				$INTdebug = DEBUG_FALSE;
		}
		return $INTdebug;	
	}
}
// Error and log establishing function
function loge($LOGtext){
	if (checkdebug() == DEBUG_TRUE) {
		error_log($LOGtext);
	}
}
//security function
function checklevels($CHlevel){
	$CHresult = database(null, DB_SAFE);
	$CHnumRows = mysql_num_rows($CHresult);
	if($CHnumRows != 0){
		$CHtestLevel = @mysql_result($CHresult, 0, 'level');
	} else {
		// ERROR LEVEL
		loge('level check error');
		$CHtestLevel = 99999;
	}
	if ($CHtestLevel <= $CHlevel && $CHnumRows != 0 && $CHtestLevel != 99999){
		return TRUE;
	} else {
		return ERROR_BAD_LEVEL;
	}
}
//output function
function output($OUTarray) {
	global $APIprint;
	$OUTresult = '';
	switch ($APIprint){
		case TRUE:
			//currently PP is not supported in PHP 5.3.6 Supported in 5.4.0
			//$OUTresult = json_encode($OUTarray, JSON_PRETTY_PRINT);
			$OUTresult = json_encode($OUTarray);
			break;
		case FALSE:
			$OUTresult = json_encode($OUTarray);
			break;
		default:
			$OUTresult = json_encode($OUTarray);
	}
	echo $OUTresult;
}
//Database function
function database($DBquery, $DBmode) {
	global $INThost, $INTuser, $INTpassword, $INTdb, $APIuser, $APIsecret;
	if (!isset($DBmode)) $DBmode = '';
	$DBlink = mysql_connect($INThost, $INTuser, $INTpassword);
	mysql_select_db($INTdb, $DBlink);
	if(empty($DBquery) != TRUE){
        switch($DBmode){
            case DB_QUERY:
                $DBresult = mysql_query($DBquery, $DBlink) or die('error DB_QUERY: '.mysql_error());
                $DBreturn = $DBresult;
                break;
            case DB_INSERT:
                $DBresult = mysql_query($DBquery, $DBlink) or die('error DB_INSERT: '.mysql_error());
                $DBreturn = TRUE;
                break;
            case DB_SAFE:
                $SFuser  = md5($APIuser);
                $DBquery = sprintf("SELECT * FROM `auth` WHERE user='%s' AND secret='%s'", mysql_real_escape_string($SFuser), mysql_real_escape_string($APIsecret));
                $DBresult = mysql_query($DBquery, $DBlink) or die('error DB_SAFE: '.mysql_error());
                $DBreturn = $DBresult;
                break;
            default:
                $DBresult = mysql_query($DBquery, $DBlink) or die('error DB_DEFAULT: '.mysql_error());
                $DBreturn = $DBresult;
                break;		
                
        }
        mysql_close();
        return $DBreturn;
    } else return ERROR_EMPTY_QUERY;
    
}
//Modes
function FIXcontent() {
	global $APIclass;
	switch($APIclass) {
		case CLASS_GET_PARTNERS:
			CLgetPartners();
			break;
		case CLASS_GET_PARTNER:
			CLgetPartner();
			break;
		case CLASS_ADD_PARTNER:
			CLaddPartner();
			break;
		default:
			print ERROR_BAD_API;
	}
}
function AUTHadmin() {
	global $APIclass, $APIextUser;
	switch($APIclass) {
		case CLASS_ADD_USER:
			CLnewUser();
			break;
		case CLASS_GET_USER:
			CLgetUser($APIextUser);
			break;
		default:
			echo ERROR_BAD_API;
	}
}
//Classes
function CLaddPartner(){
	global $APIextName, $APIextDesc, $APIextURL; 
	$CLcheck = checklevels(1);
    if($CLcheck == TRUE){
		$CLpicURL = CLaddPicture();
		if (empty($APIextName) == FALSE && empty($APIextURL) == FALSE ) {
			$CLquery = sprintf("INSERT INTO partners (name, desc, pic, URL) VALUES ('%s', '%s', '%s', '%s')", mysql_real_escape_string($APIextName), mysql_real_escape_string($APIextDesc), mysql_real_escape_string($CLpicURL), $APIextURL);
			loge($CLquery);
			database($CLquery, DB_INSERT);
			CLgetPartner();
		} else print ERROR_BAD_INPUT;
	} else print $CLcheck;
}
function CLgetPartners(){
	$CLcheck = checklevels(2);
    if($CLcheck == TRUE){
		$CLresult 	= database('SELECT * FROM `partners`', null);
		$CLcount = 0;
		while($CLrow = mysql_fetch_array($CLresult,MYSQL_ASSOC)){
			$CLarray[$CLcount] = $CLrow;
			$CLcount++;
		}
		output($CLarray);
		return TRUE;	
	} else print $CLcheck;
}
function CLgetPartner($CLintName){
	global $APIextName;
	$CLcheck = checklevels(2);
    if($CLcheck == TRUE){
		if(empty($APIextName) == FALSE){
			$CLquery = sprintf("SELECT * FROM `partners` WHERE name='%s'", $APIextName);
			$CLresult= database($CLquery, DB_QUERY);
			$CLcount = 0;
			while($CLrow = mysql_fetch_array($CLresult,MYSQL_ASSOC)){
				$CLarray[$CLcount] = $CLrow;
				$CLcount++;
			}
			output($CLarray);
			return TRUE;
		} else print ERROR_BAD_INPUT;
	} else print $CLcheck;
}
function CLgetUser($AUTHuser){
	$CLcheck = checklevels(1);
    if($CLcheck == TRUE){
		$AUTHquery = sprintf("SELECT * FROM `auth` WHERE user='%s'", md5($AUTHuser));
		$AUTHresult= database($AUTHquery, DB_QUERY);
		$AUTHcount = 0;
		while($AUTHrow = mysql_fetch_array($AUTHresult,MYSQL_ASSOC)){
			$AUTHarray[$AUTHcount] = $AUTHrow;
			$AUTHcount++;
		}
		output($AUTHarray);
		return TRUE;
	} else print $CLcheck;
}
function CLnewUser() {
	global $APIextUser, $APIextName, $APIextLevel;
	$CLcheck = checklevels(1);
    if($CLcheck == TRUE){
		$AUTHuser = md5($APIextUser);
		$AUTHsecret = md5($APIextName.$APIextUser);
		if (empty($APIextUser) == FALSE && empty($APIextName) == FALSE ) {
			$AUTHquery = sprintf("INSERT INTO auth (name, user, secret, level) VALUES ('%s', '%s', '%s', '%s')", mysql_real_escape_string($APIextName), mysql_real_escape_string($AUTHuser), mysql_real_escape_string($AUTHsecret), $APIextLevel);
			loge($AUTHquery);
			database($AUTHquery, DB_INSERT);
			CLgetUser($APIextUser);
		} print ERROR_BAD_INPUT;
	} else print $CLcheck;
}
function CLaddPicture(){
	global $APIextPic;
	//to be implemented in a future version
	$CLpicURL = $APIextPic;	// This needs to be completed obviously
	print "to be implemented in a near future.";
	return $CLpicURL;
}
//API Switch
switch ($APImode) {
	case MODE_STATIC:
		FIXcontent();
		break;
	case MODE_AUTH:
		AUTHadmin();
		break;
	default:
		print ERROR_BAD_API;
}
?>