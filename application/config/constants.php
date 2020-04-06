<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


# custom constant start here
defined('APP_TITLE')            OR define('APP_TITLE','PMKS Sistem');
defined('APP_CODE')             OR define('APP_CODE', 'BGNB');
defined('ID_ASKRED')            OR define('ID_ASKRED', 1);
defined('ID_ASJIW')             OR define('ID_ASJIW', 2);
defined('ASKRED_TEXT')          OR define('ASKRED_TEXT', 'Asuransi Kredit');
defined('ASJIW_TEXT')           OR define('ASJIW_TEXT', 'Asuransi Jiwa');
defined('PPH_RATE_CONFIG')      or define('PPH_RATE_CONFIG','PPH_RATE');
defined('PPN_RATE_CONFIG')      or define('PPN_RATE_CONFIG','PPN_RATE');
defined('ASKRED_RATE_CAPTION')  or define('ASKRED_RATE_CAPTION', 'KOMISI_BSM_KREDIT');
defined('ASJIW_RATE_CAPTION')   or define('ASJIW_RATE_CAPTION', 'KOMISI_BSM_JIWA');

defined('ROLE_USER_ROOT')      OR define('ROLE_USER_ROOT', 1);
defined('ROLE_USER_USER')      OR define('ROLE_USER_USER', 2);
defined('USER_ACTIVE')         OR define('USER_ACTIVE', 1);

defined('STATUS_BAYARPREMI_BARU')               OR define('STATUS_BAYARPREMI_BARU', 0);
defined('STATUS_BAYARPREMI_OK')                 OR define('STATUS_BAYARPREMI_OK', 1);
defined('STATUS_BAYARPREMI_KURANGBAYAR')        OR define('STATUS_BAYARPREMI_KURANGBAYAR', 2);
defined('STATUS_BAYARPREMI_LEBIHBAYAR')         OR define('STATUS_BAYARPREMI_LEBIHBAYAR', 3);

defined('JENISCOVERING_OTOMATIS')  OR define('JENISCOVERING_OTOMATIS', 1);
defined('JENISCOVERING_NONOTOMATIS')  OR define('JENISCOVERING_NONOTOMATIS', 2);

// Service Path
defined('SVC_PATH_COVERFLAG') or define('SVC_PATH_COVERFLAG', 'SVC_PATH_COVERFLAG');
defined('SVC_PATH_NEGOFLAG') or define('SVC_PATH_NEGOFLAG', 'SVC_PATH_NEGOFLAG');
defined('SVC_PATH_CLAIM_DOC_CONFIRM') or define('SVC_PATH_CLAIM_DOC_CONFIRM', 'SVC_PATH_CLAIM_DOC_CONFIRM');
defined('SVC_PATH_CLAIM_NOM_CONFIRM') or define('SVC_PATH_CLAIM_NOM_CONFIRM', 'SVC_PATH_CLAIM_NOM_CONFIRM');
defined('SVC_PATH_CLAIM_INFO') or define('SVC_PATH_CLAIM_INFO', 'SVC_PATH_CLAIM_INFO');
defined('SVC_PATH_CLAIM_INFO_CANCEL') or define('SVC_PATH_CLAIM_INFO_CANCEL', 'SVC_PATH_CLAIM_INFO_CANCEL');
defined('SVC_PATH_CLAIM_FLAG') or define('SVC_PATH_CLAIM_FLAG', 'SVC_PATH_CLAIM_FLAG');
/**
 * SERVICE TYPE
 */
defined('SERVICE_REST') or define('SERVICE_REST', 0);
defined('SERVICE_SOAP') or define('SERVICE_SOAP', 1);


defined('STATUS_COVERING_LAIN') or define('STATUS_COVERING_LAIN', 0);
defined('STATUS_COVERING_AKTIF') or define('STATUS_COVERING_AKTIF', 1);
defined('STATUS_COVERING_REFUND') or define('STATUS_COVERING_REFUND', 2);
defined('STATUS_COVERING_CLAIM') or define('STATUS_COVERING_CLAIM', 3);
defined('STATUS_COVERING_CANCEL') or define('STATUS_COVERING_CANCEL', 9);

/*
 * ASURANSI STATUS KONFIRMASI CLAIM
 */
defined('CLAIM_CONFIRM_INIT') or define('CLAIM_CONFIRM_INIT', 0);
defined('CLAIM_CONFIRM_APPROVE') or define('CLAIM_CONFIRM_APPROVE', 1);
defined('CLAIM_CONFIRM_REVISE') or define('CLAIM_CONFIRM_REVISE', 2);

defined('JOB_INCOMPLETE') or define('JOB_INCOMPLETE', 0);
defined('JOB_COMPLETE') or define('JOB_COMPLETE', 1);