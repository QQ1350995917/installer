<?php
/* $Id: phpadmin.dingpw.com,v1.2 2014/09/23 10:43:24 $ */
// vim: expandtab sw=4 ts=4 sts=4:
/**
* phpMyAdmin Configuration File
*
* All directives are explained in Documentation.html
*/

/**
* Sets the php error reporting - Please do not change this line!
*/
if (!isset($old_error_reporting)) {
    error_reporting(E_ALL);
    @ini_set('display_errors', '1');
}

/**
* Your phpMyAdmin url
*
* Complete the variable below with the full url ie
*    http://www.your_web.net/path_to_your_phpMyAdmin_directory/
*
* It must contain characters that are valid for a URL, and the path is
* case sensitive on some Web servers, for example Unix-based servers.
*
* In most cases you can leave this variable empty, as the correct value
* will be detected automatically. However, we recommend that you do
* test to see that the auto-detection code works in your system. A good
* test is to browse a table, then edit a row and save it.  There will be
* an error message if phpMyAdmin cannot auto-detect the correct value.
*
* If the auto-detection code does work properly, you can set to TRUE the
* $cfg['PmaAbsoluteUri_DisableWarning'] variable below.
*/

$cfg['PmaAbsoluteUri'] = 'http://phpadmin.dingpw.com'; # -----这里设置你的phpmyadmin的URL，如：http://localhost/phpmyadmin/

/**
* Disable the default warning about $cfg['PmaAbsoluteUri'] not being set
* You should use this if and ONLY if the PmaAbsoluteUri auto-detection
* works perfectly.
*/
$cfg['PmaAbsoluteUri_DisableWarning'] = FALSE;
/**
* Disable the default warning that is displayed on the DB Details Structure page if
* any of the required Tables for the relationfeatures could not be found
*/
$cfg['PmaNoRelation_DisableWarning']  = FALSE;
/**
* The 'cookie' auth_type uses blowfish algorithm to encrypt the password. If
* at least one server configuration uses 'cookie' auth_type, enter here a
* passphrase that will be used by blowfish.
$cfg['blowfish_secret'] = '';-----设定好root密码后这里也要填写
/**
* Server(s) configuration
*/
$i = 0;
// The $cfg['Servers'] array starts with $cfg['Servers'][1].  Do not use $cfg['Servers'][0].
// You can disable a server config entry by setting host to ''.
$i++;
$cfg['Servers'][$i]['host']          = 'localhost'; // MySQL hostname or IP address----这里可以设定远程MySQL服务器IP地址
$cfg['Servers'][$i]['port']          = '3306';      // MySQL port - leave blank for default port-----默认为3306
$cfg['Servers'][$i]['socket']        = '';          // Path to the socket - leave blank for default socket
$cfg['Servers'][$i]['connect_type']  = 'tcp';       // How to connect to MySQL server ('tcp' or 'socket')-----连接MySQL服务器的方式
$cfg['Servers'][$i]['compress']      = FALSE;       // Use compressed protocol for the MySQL connection
                                                    // (requires PHP >= 4.3.0)-----是否使用压缩协议，PHP版本须>= 4.3.0
$cfg['Servers'][$i]['controluser']   = '';          // MySQL control user settings
                                                    // (this user must have read-only
$cfg['Servers'][$i]['controlpass']   = '';          // access to the "mysql/user"
                                                    // and "mysql/db" tables)-----MySQL控制用户设定，该用户只对mysql数据库下的user和db表有完全权限
$cfg['Servers'][$i]['auth_type']     = 'http';    // Authentication method (config, http or cookie based)?-----如果PHP安装模式为Apache，可以使用http和cookie；如果PHP安装模式为CGI，可以使用cookie；默认为config，是不安全的，不推荐。
$cfg['Servers'][$i]['user']          = 'phpadmin';      // MySQL user-----MySQL连接用户
$cfg['Servers'][$i]['password']      = 'phpadmin';          
// MySQL password (only needed with 'config' auth_type)-----MySQL连接密码，建议在安装好PHP和MySQL后，先用phpmyadmin设定root密码，然后在这里填写
$cfg['Servers'][$i]['only_db']       = '';          // If set to a db-name, only this db is displayed at left frame It may also be an array of db-names-----如果在这里设定一个数据库的名字，那么登陆后框架左边将只显示这个数据库
$cfg['Servers'][$i]['verbose']       = '';          // Verbose name for this host - leave blank to show the hostname
$cfg['Servers'][$i]['pmadb']         = '';          // Database used for Relation, Bookmark and PDF Features
                                                    // (see scripts/create_tables.sql)
                                                    //   - leave blank for no support
                                                    //     DEFAULT: 'phpmyadmin'
$cfg['Servers'][$i]['bookmarktable'] = '';          // Bookmark table
                                                    //   - leave blank for no bookmark support
                                                    //     DEFAULT: 'pma_bookmark'
$cfg['Servers'][$i]['relation']      = '';          // table to describe the relation between links (see doc)
                                                    //   - leave blank for no relation-links support
                                                    //     DEFAULT: 'pma_relation'
$cfg['Servers'][$i]['table_info']    = '';          // table to describe the display fields
                                                    //   - leave blank for no display fields support
                                                    //     DEFAULT: 'pma_table_info'
$cfg['Servers'][$i]['table_coords']  = '';          // table to describe the tables position for the PDF schema
                                                    //   - leave blank for no PDF schema support
                                                    //     DEFAULT: 'pma_table_coords'
$cfg['Servers'][$i]['pdf_pages']     = '';          // table to describe pages of relationpdf
                                                    //   - leave blank if you don't want to use this
                                                    //     DEFAULT: 'pma_pdf_pages'
$cfg['Servers'][$i]['column_info']   = '';          // table to store column information
                                                    //   - leave blank for no column comments/mime types
                                                    //     DEFAULT: 'pma_column_info'
$cfg['Servers'][$i]['history']       = '';          // table to store SQL history
                                                    //   - leave blank for no SQL query history
                                                    //     DEFAULT: 'pma_history'
$cfg['Servers'][$i]['verbose_check'] = TRUE;        // set to FALSE if you know that your pma_* tables
                                                    // are up to date. This prevents compatibility
                                                    // checks and thereby increases performance.
$cfg['Servers'][$i]['AllowDeny']['order']           // Host authentication order, leave blank to not use
                                     = '';
$cfg['Servers'][$i]['AllowDeny']['rules']           // Host authentication rules, leave blank for defaults
                                     = array();

$i++;
$cfg['Servers'][$i]['host']            = '';
$cfg['Servers'][$i]['port']            = '';
$cfg['Servers'][$i]['socket']          = '';
$cfg['Servers'][$i]['connect_type']    = 'tcp';
$cfg['Servers'][$i]['compress']        = FALSE;
$cfg['Servers'][$i]['controluser']     = '';
$cfg['Servers'][$i]['controlpass']     = '';
$cfg['Servers'][$i]['auth_type']       = 'config';
$cfg['Servers'][$i]['user']            = 'root';
$cfg['Servers'][$i]['password']        = '';
$cfg['Servers'][$i]['only_db']         = '';
$cfg['Servers'][$i]['verbose']         = '';
$cfg['Servers'][$i]['pmadb']           = ''; // 'phpmyadmin' - see scripts/create_tables.sql
$cfg['Servers'][$i]['bookmarktable']   = ''; // 'pma_bookmark'
$cfg['Servers'][$i]['relation']        = ''; // 'pma_relation'
$cfg['Servers'][$i]['table_info']      = ''; // 'pma_table_info'
$cfg['Servers'][$i]['table_coords']    = ''; // 'pma_table_coords'
$cfg['Servers'][$i]['pdf_pages']       = ''; // 'pma_pdf_pages'
$cfg['Servers'][$i]['column_info']     = ''; // 'pma_column_info'
$cfg['Servers'][$i]['history']         = ''; // 'pma_history'
$cfg['Servers'][$i]['verbose_check']   = TRUE;
$cfg['Servers'][$i]['AllowDeny']['order']
                                       = '';
$cfg['Servers'][$i]['AllowDeny']['rules']
                                       = array();
$i++;
$cfg['Servers'][$i]['host']            = '';
$cfg['Servers'][$i]['port']            = '';
$cfg['Servers'][$i]['socket']          = '';
$cfg['Servers'][$i]['connect_type']    = 'tcp';
$cfg['Servers'][$i]['compress']        = FALSE;
$cfg['Servers'][$i]['controluser']     = '';
$cfg['Servers'][$i]['controlpass']     = '';
$cfg['Servers'][$i]['auth_type']       = 'config';
$cfg['Servers'][$i]['user']            = 'root';
$cfg['Servers'][$i]['password']        = '';
$cfg['Servers'][$i]['only_db']         = '';
$cfg['Servers'][$i]['verbose']         = '';
$cfg['Servers'][$i]['pmadb']           = ''; // 'phpmyadmin' - see scripts/create_tables.sql
$cfg['Servers'][$i]['bookmarktable']   = ''; // 'pma_bookmark'
$cfg['Servers'][$i]['relation']        = ''; // 'pma_relation'
$cfg['Servers'][$i]['table_info']      = ''; // 'pma_table_info'
$cfg['Servers'][$i]['table_coords']    = ''; // 'pma_table_coords'
$cfg['Servers'][$i]['pdf_pages']       = ''; // 'pma_pdf_pages'
$cfg['Servers'][$i]['column_info']     = ''; // 'pma_column_info'
$cfg['Servers'][$i]['history']         = ''; // 'pma_history'
$cfg['Servers'][$i]['verbose_check']   = TRUE;
$cfg['Servers'][$i]['AllowDeny']['order']
                                       = '';
$cfg['Servers'][$i]['AllowDeny']['rules']
                                       = array();
// If you have more than one server configured, you can set $cfg['ServerDefault']
// to any one of them to autoconnect to that server when phpMyAdmin is started,
// or set it to 0 to be given a list of servers without logging in
// If you have only one server configured, $cfg['ServerDefault'] *MUST* be
// set to that server.[color]=red]-----是否显示所有的MySQL服务器
$cfg['ServerDefault'] = 1;              // Default server (0 = no default server)
$cfg['Server']        = '';
unset($cfg['Servers'][0]);

/**
* Other core phpMyAdmin settings
*/
$cfg['OBGzip']                  = 'auto'; // use GZIP output buffering if possible (TRUE|FALSE|'auto')-----有必要的话是否使用GZIP输出缓冲
$cfg['PersistentConnections']   = FALSE;  // use persistent connections to MySQL database-----是否使用MySQL持久连接，即pconnect
$cfg['ExecTimeLimit']           = 300;    // maximum execution time in seconds (0 for no limit)-----最大脚本执行时间，单位：秒
$cfg['SkipLockedTables']        = FALSE;  // mark used tables, make possible to show
                                          // locked tables (since MySQL 3.23.30)
$cfg['ShowSQL']                 = TRUE;   // show SQL queries as run-----运行查询时显示SQL查询语句
$cfg['AllowUserDropDatabase']   = FALSE;  // show a 'Drop database' link to normal users-----是否对普通用户显示“删除数据库”连接
$cfg['Confirm']                 = TRUE;   // confirm 'DROP TABLE' & 'DROP DATABASE'-----删除数据表/库前是否出现确认提示框
$cfg['LoginCookieRecall']       = TRUE;   // recall previous login in cookie auth. mode or not-----是否收回先前cookie认证模式的cookie
$cfg['UseDbSearch']             = TRUE;   // whether to enable the "database search" feature
                                          // or not
$cfg['IgnoreMultiSubmitErrors'] = FALSE;  // if set to true, PMA continues computing multiple-statement queries
                                          // even if one of the queries failed
$cfg['VerboseMultiSubmit']      = TRUE;   // if set to true, PMA will show the affected rows of EACH statement on
                                          // multiple-statement queries. See the read_dump.php file for hardcoded
                                          // defaults on how many queries a statement may contain!
$cfg['AllowArbitraryServer']    = FALSE;  // allow login to any user entered server in cookie based auth
// Left frame setup-----左侧框架设置
$cfg['LeftFrameLight']        = TRUE;   //-----是否使用下拉框显示当前数据库// use a select-based menu and display only the
                                        // current tables in the left frame
$cfg['LeftFrameTableSeparator']= '__';  // Which string will be used to generate table prefixes
                                        // to split tables into multiple categories
$cfg['LeftFrameTableLevel']   = '1';    // How many sublevels should be displayed when splitting
                                        // up tables by the above Separator
$cfg['ShowTooltip']           = TRUE;   // display table comment as tooltip in left frame-----是否在框架左侧显示数据表内容提示
$cfg['ShowTooltipAliasDB']    = FALSE;  // if ShowToolTip is enabled, this defines that table/db comments
$cfg['ShowTooltipAliasTB']    = FALSE;  // are shown (in the left menu and db_details_structure) instead of
                                        // table/db names
$cfg['LeftDisplayLogo']       = TRUE;   // display logo at top of left frame-----是否在框架左侧显示phpmyadmin的logo
$cfg['LeftDisplayServers']    = FALSE;  // display server choice at top of left frame-----是否显示MySQL服务器选择选项
// In the main frame, at startup...-----右侧主框架设置(刚进入时)
$cfg['ShowStats']             = TRUE;   // allow to display statistics and space usage in
                                        // the pages about database details and table
                                        // properties
$cfg['ShowMysqlInfo']         = FALSE;  //-----是否显示MySQL运行时间// whether to display the "MySQL runtime
$cfg['ShowMysqlVars']         = FALSE;  //-----是否显示MySQL系统变量// information", "MySQL system variables", "PHP
$cfg['ShowPhpInfo']           = FALSE;  //-----是否显示PHP信息// information" and "change password" links for
$cfg['ShowChgPassword']    = FALSE;  //-----修改密码选项// simple users or not
$cfg['SuggestDBName']       = TRUE;   //-----是否显示要建立的数据库默认名字// suggest a new DB name if possible (false = keep empty)
// In browse mode...
$cfg['ShowBlob']              = FALSE;  // display blob field contents
$cfg['NavigationBarIconic']   = TRUE;   // do not display text inside navigation bar buttons
$cfg['ShowAll']               = FALSE;  // allows to display all the rows-----是否显示所有数据表行
$cfg['MaxRows']               = 30;     // maximum number of rows to display-----数据表行每页显示的数量
$cfg['Order']                 = 'ASC';  // default for 'ORDER BY' clause (valid
                                        // values are 'ASC', 'DESC' or 'SMART' -ie
                                        // descending order for fields of type
                                        // TIME, DATE, DATETIME & TIMESTAMP,
                                        // ascending order else-)
// In edit mode...
$cfg['ProtectBinary']         = 'blob'; // disallow editing of binary fields
                                        // valid values are:
                                        //   FALSE  allow editing
                                        //   'blob' allow editing except for BLOB fields
                                        //   'all'  disallow editing
$cfg['ShowFunctionFields']    = TRUE;   // Display the function fields in edit/insert mode
$cfg['CharEditing']           = 'input';
                                        // Which editor should be used for CHAR/VARCHAR fields:
                                        //  input - allows limiting of input length
                                        //  textarea - allows newlines in fields
// For the export features...
$cfg['ZipDump']               = TRUE;   // Allow the use of zip/gzip/bzip
$cfg['GZipDump']              = TRUE;   // compression for
$cfg['BZipDump']              = TRUE;   // dump files
$cfg['CompressOnFly']         = TRUE;   // Will compress gzip/bzip2 exports on
                                        // fly without need for much memory.
                                        // If you encounter problems with
                                        // created gzip/bzip2 files disable
                                        // this feature.
// Tabs display settings
$cfg['LightTabs']             = FALSE;  // use graphically less intense menu tabs
$cfg['PropertiesIconic']      = TRUE;   // Use icons instead of text for the table display of a database (TRUE|FALSE|'both')
$cfg['PropertiesNumColumns']  = 1;      // How many columns should be used for table display of a database?
                                        // (a value larger than 1 results in some information being hidden)
$cfg['DefaultTabServer']      = 'main.php';
                                   // Possible values:
                                   // 'main.php' = the welcome page
                                   // (recommended for multiuser setups)
                                   // 'server_databases.php' = list of databases
                                   // 'server_status.php' = runtime information
                                   // 'server_variables.php' = MySQL server variables
                                   // 'server_privileges.php' = user management
                                   // 'server_processlist.php' = process list
$cfg['DefaultTabDatabase']    = 'db_details_structure.php';
                                   // Possible values:
                                   // 'db_details_structure.php' = tables list
                                   // 'db_details.php' = sql form
                                   // 'db_search.php' = search query
$cfg['DefaultTabTable']       = 'tbl_properties_structure.php';
                                   // Possible values:
                                   // 'tbl_properties_structure.php' = fields list
                                   // 'tbl_properties.php' = sql form
                                   // 'tbl_select.php = select page
                                   // 'tbl_change.php = insert row page
/**
* Export defaults
*/
$cfg['Export']['format']                    = 'sql';  // sql/latex/excel/csv/xml-----导出文件的格式
$cfg['Export']['compression']               = 'none'; // none/zip/gzip/bzip2-----导出文件是否压缩
$cfg['Export']['asfile']                    = FALSE;  //----是否导出为文件
$cfg['Export']['onserver']                  = FALSE;  //-----导出到服务器
$cfg['Export']['onserver_overwrite']        = FALSE;  //-----是否使用导出覆盖
$cfg['Export']['remember_file_template']    = TRUE;   //-----记住文件模板
$cfg['Export']['csv_columns']               = FALSE;
$cfg['Export']['csv_null']                  = 'NULL';
$cfg['Export']['csv_separator']             = ';';
$cfg['Export']['csv_enclosed']              = '&quot;';
$cfg['Export']['csv_escaped']               = '//';
$cfg['Export']['csv_terminated']            = 'AUTO';
$cfg['Export']['excel_columns']             = FALSE;
$cfg['Export']['excel_null']                = 'NULL';
$cfg['Export']['latex_structure']           = TRUE;
$cfg['Export']['latex_data']                = TRUE;
$cfg['Export']['latex_columns']             = TRUE;
$cfg['Export']['latex_relation']            = TRUE;
$cfg['Export']['latex_comments']            = TRUE;
$cfg['Export']['latex_mime']                = TRUE;
$cfg['Export']['latex_null']                = '/textit{NULL}';
$cfg['Export']['latex_caption']             = TRUE;
$cfg['Export']['latex_data_label']          = 'tab:__TABLE__-data';
$cfg['Export']['latex_structure_label']     = 'tab:__TABLE__-structure';
$cfg['Export']['sql_structure']             = TRUE;
$cfg['Export']['sql_data']                  = TRUE;
$cfg['Export']['sql_drop_database']         = FALSE;
$cfg['Export']['sql_drop_table']            = FALSE;
$cfg['Export']['sql_auto_increment']        = TRUE;
$cfg['Export']['sql_backquotes']            = TRUE;
$cfg['Export']['sql_relation']              = FALSE;
$cfg['Export']['sql_columns']               = FALSE;
$cfg['Export']['sql_extended']              = FALSE;
$cfg['Export']['sql_comments']              = FALSE;
$cfg['Export']['sql_mime']                  = FALSE;
/**
* Link to the official MySQL documentation.
* Be sure to include no trailing slash on the path.
* See http://www.mysql.com/documentation/index.html for more information
* about MySQL manuals and their types.
*/
$cfg['MySQLManualBase'] = 'http://www.mysql.com/doc/en';//-----MySQL在线手册地址
/**
* Type of MySQL documentation:
*   old        - old style used in phpMyAdmin 2.3.0 and sooner
*   searchable - "Searchable, with user comments"
*   chapters   - "HTML, one page per chapter"
*   big        - "HTML, all on one page"
*   none       - do not show documentation links
*/
$cfg['MySQLManualType'] = 'searchable';

/**
* PDF options
*/
$cfg['PDFPageSizes']        = array('A3', 'A4', 'A5', 'letter', 'legal');
$cfg['PDFDefaultPageSize']  = 'A4'; //-----PDF页默认大小

/**
* Language and charset conversion settings
*/
// Default language to use, if not browser-defined or user-defined
$cfg['DefaultLang'] = 'zh'; //-----如果想使phpmyadmin直接显示中文，这里填：zh
// Force: always use this language - must be defined in
//        libraries/select_lang.lib.php
// $cfg['Lang']     = 'en-iso-8859-1';
// Default charset to use for recoding of MySQL queries, does not take
// any effect when charsets recoding is switched off by
// $cfg['AllowAnywhereRecoding'] or in language file
// (see $cfg['AvailableCharsets'] to possible choices, you can add your own)
$cfg['DefaultCharset'] = 'iso-8859-1'; //-----默认的phpmyadmin语言，可设置为：gb2312

// Allow charset recoding of MySQL queries, must be also enabled in language
// file to make harder using other language files than unicode.
// Default value is FALSE to avoid problems on servers without the iconv
// extension and where dl() is not supported
$cfg['AllowAnywhereRecoding'] = FALSE;
// You can select here which functions will be used for charset conversion.
// Possible values are:
//      auto   - automatically use available one (first is tested iconv, then
//               recode)
//      iconv  - use iconv or libiconv functions
//      recode - use recode_string function
$cfg['RecodingEngine'] = 'auto';
// Specify some parameters for iconv used in charset conversion. See iconv
// documentation for details:
// http://www.gnu.org/software/libi ... v/iconv_open.3.html 
$cfg['IconvExtraParams'] = '';
// Available charsets for MySQL conversion. currently contains all which could
// be found in lang/* files and few more.
// Charsets will be shown in same order as here listed, so if you frequently
// use some of these move them to the top.
$cfg['AvailableCharsets'] = array(
    'iso-8859-1',
    'iso-8859-2',
    'iso-8859-3',
    'iso-8859-4',
    'iso-8859-5',
    'iso-8859-6',
    'iso-8859-7',
    'iso-8859-8',
    'iso-8859-9',
    'iso-8859-10',
    'iso-8859-11',
    'iso-8859-12',
    'iso-8859-13',
    'iso-8859-14',
    'iso-8859-15',
    'windows-1250',
    'windows-1251',
    'windows-1252',
    'windows-1257',
    'koi8-r',
    'big5',
    'gb2312',
    'utf-8', ,
    'utf-7',
    'x-user-defined',
    'euc-jp',
    'ks_c_5601-1987',
    'tis-620',
    'SHIFT_JIS'
);
// Loads language file
require('./libraries/select_lang.lib.php');

/**
* Customization & design -----页面格式设定，以内容较多，可自行根据注释详细设定，这里给出部分注释
*/
$cfg['LeftWidth']           = 150;          // left frame width-----左侧框架宽度
$cfg['LeftBgColor']         = '#D0DCE0';    // background color for the left frame-----框架左侧的背景颜色
$cfg['RightBgColor']        = '#F5F5F5';    // background color for the right frame-----框架右侧的背景颜色
$cfg['RightBgImage']        = '';           // path to a background image for the right frame-----框架右侧的背景图片地址，不使用背景图片请留空
                                            // (leave blank for no background image)
$cfg['LeftPointerColor']    = '#CCFFCC';    // color of the pointer in left frame
                                            // (blank for no pointer)-----框架左侧的指向点颜色
$cfg['Border']              = 0;            // border width on tables-----表格宽度
$cfg['ThBgcolor']           = '#D3DCE3';    // table header row colour-----表格头颜色
$cfg['BgcolorOne']          = '#CCCCCC';    // table data row colour-----表格中数据所在行的颜色
$cfg['BgcolorTwo']          = '#DDDDDD';    // table data row colour, alternate-----表格中数据所在行的交替颜色
$cfg['BrowsePointerColor']  = '#CCFFCC';    // color of the pointer in browse mode
                                            // (blank for no pointer)
$cfg['BrowseMarkerColor']   = '#FFCC99';    // color of the marker (visually marks row
                                            // by clicking on it) in browse mode
                                            // (blank for no marker)
$cfg['TextareaCols']        = 40;           // textarea size (columns) in edit mode
                                            // (this value will be emphasized (*2) for sql
                                            // query textareas and (*1.25) for query window)
$cfg['TextareaRows']        = 7;            // textarea size (rows) in edit mode
$cfg['LongtextDoubleTextarea'] = TRUE;      // double size of textarea size for longtext fields
$cfg['TextareaAutoSelect']  = TRUE;         // autoselect when clicking in the textarea of the querybox
$cfg['CharTextareaCols']    = 40;           // textarea size (columns) for CHAR/VARCHAR
$cfg['CharTextareaRows']    = 2;            // textarea size (rows) for CHAR/VARCHAR
$cfg['CtrlArrowsMoving']    = TRUE;         // Enable Ctrl+Arrows moving between fields when editing?
$cfg['LimitChars']          = 50;           // Max field data length in browse mode for all non-numeric fields
$cfg['ModifyDeleteAtLeft']  = TRUE;         // show edit/delete links on left side of browse
                                            // (or at the top with vertical browse)
$cfg['ModifyDeleteAtRight'] = FALSE;        // show edit/delete links on right side of browse
                                            // (or at the bottom with vertical browse)
$cfg['DefaultDisplay']      = 'horizontal'; // default display direction
                                            // (horizontal|vertical|horizontalflipped)
$cfg['DefaultPropDisplay']  = 'horizontal'; // default display direction for altering/
                                            // creating columns (tbl_properties)
                                            // (horizontal|vertical)
$cfg['HeaderFlipType']      = 'css';        // table-header rotation via faking or css? (css|fake)
                                            // NOTE: CSS only works in IE browsers!
$cfg['ShowBrowseComments']  = TRUE;         // shows stored relation-comments in 'browse' mode.
$cfg['ShowPropertyComments']= TRUE;         // shows stored relation-comments in 'table property' mode.
$cfg['RepeatCells']         = 100;          // repeat header names every X cells? (0 = deactivate)
$cfg['QueryFrame']          = TRUE;         // displays a new frame where a link to a querybox is always displayed.
$cfg['QueryFrameJS']        = TRUE;         // whether to use javascript functions for opening a new window for SQL commands.
                                            // if set to 'false', the target of the querybox is always the right frame.
$cfg['QueryFrameDebug']     = FALSE;        // display JS debugging link (DEVELOPERS only)
$cfg['QueryWindowWidth']    = 550;          // Width of Query window
$cfg['QueryWindowHeight']   = 310;          // Height of Query window
$cfg['QueryHistoryDB']      = FALSE;         // Set to TRUE if you want DB-based query history.
                                            // If FALSE, this utilizes JS-routines to display
                                            // query history (lost by window close)
$cfg['QueryWindowDefTab']   = 'sql';        // which tab to display in the querywindow on startup
                                            // (sql|files|history|full)
$cfg['QueryHistoryMax']     = 25;           // When using DB-based query history, how many entries
                                            // should be kept?
$cfg['BrowseMIME']          = TRUE;         // Use MIME-Types (stored in column comments table) for
$cfg['MaxExactCount']       = 20000;        // When approximate count < this, PMA will get exact count for
                                            // table rows.
$cfg['WYSIWYG-PDF']         = TRUE;         // Utilize DHTML/JS capabilities to allow WYSIWYG editing of
                                            // the PDF page editor. Requires an IE6/Mozilla based browser.
/**
* SQL Query box settings
* These are the links display in all of the SQL Query boxes
*/
$cfg['SQLQuery']['Edit']      = TRUE;       // Edit link to change a query
$cfg['SQLQuery']['Explain']   = TRUE;       // EXPLAIN on SELECT queries
$cfg['SQLQuery']['ShowAsPHP'] = TRUE;       // Wrap a query in PHP
$cfg['SQLQuery']['Validate']  = FALSE;      // Validate a query (see $cfg['SQLValidator'] as well)

/**
* Webserver upload/save/import directories
*/
$cfg['UploadDir']             = '';         // Directory for uploaded files that can be executed by
                                            // phpMyAdmin. For example './upload'. Leave empty for
                                            // no upload directory support
$cfg['SaveDir']               = '';         // Directory where phpMyAdmin can save exported data on
                                            // server. For example './save'. Leave empty for no save
                                            // directory support.
$cfg['docSQLDir']             = '';         // Directory for docSQL imports, phpMyAdmin can import
                                            // docSQL files from that directory. For example
                                            // './docSQL'. Leave empty for no docSQL import support.

/**
* Misc. settings
*/
$cfg['GD2Available']          = 'auto';     // Is GD >= 2 available? Set to yes/no/auto. 'auto'
                                            // does autodetection, which is a bit expensive for
                                            // php < 4.3.0, but it is the only safe vay how to
                                            // determine GD version.
/**
* SQL Parser Settings
*/
]$cfg['SQP']['fmtType']      = 'html';       // 查询语句输出样式 (html, text, none)
$cfg['SQP']['fmtInd']       = '1';             // 每行间距(floats ok)
$cfg['SQP']['fmtIndUnit']   = 'em';         // 每行的缩进单位 (CSS Types - {em,px,pt})
$cfg['SQP']['fmtColor']     = array(         // 语法颜色数据
    'comment'            => '#808000',
    'comment_mysql'      => '',
    'comment_ansi'       => '',
    'comment_c'          => '',
    'digit'              => '',
    'digit_hex'          => 'teal',
    'digit_integer'      => 'teal',
    'digit_float'        => 'aqua',
    'punct'              => 'fuchsia',
    'alpha'              => '',
    'alpha_columnType'   => '#FF9900',
    'alpha_columnAttrib' => '#0000FF',
    'alpha_reservedWord' => '#990099',
    'alpha_functionName' => '#FF0000',
    'alpha_identifier'   => 'black',
    'alpha_variable'     => '#800000',
    'quote'              => '#008000',
    'quote_double'       => '',
    'quote_single'       => '',
    'quote_backtick'     => ''
);

/**
* If you wish to use the SQL Validator service, you should be
* aware of the following:
* All SQL statements are stored anonymously for statistical purposes.
* Mimer SQL Validator, Copyright 2002 Upright Database Technology.
* All rights reserved.
*/
$cfg['SQLValidator']['use']      = FALSE;   // Make the SQL Validator available
$cfg['SQLValidator']['username'] = '';      // If you have a custom username, specify it here (defaults to anonymous)
$cfg['SQLValidator']['password'] = '';      // Password for username
/**
* Developers ONLY!
* To use the following, please install the DBG extension from http://dd.cron.ru/dbg/
*/
$cfg['DBG']['enable'] = FALSE;              // Make the DBG stuff available
$cfg['DBG']['profile']['enable'] = FALSE;   // Produce profiling results of PHP
$cfg['DBG']['profile']['threshold'] = 0.5;  // Threshold of long running code to display
                                            // Anything below the threshold is not displayed

/**
* MySQL settings
*/
// Column types;
// varchar, tinyint, text and date are listed first, based on estimated popularity
$cfg['ColumnTypes'] = array(
   'VARCHAR',
   'TINYINT',
   'TEXT',
   'DATE',
   'SMALLINT',
   'MEDIUMINT',
   'INT',
   'BIGINT',
   'FLOAT',
   'DOUBLE',
   'DECIMAL',
   'DATETIME',
   'TIMESTAMP',
   'TIME',
   'YEAR',
   'CHAR',
   'TINYBLOB',
   'TINYTEXT',
   'BLOB',
   'MEDIUMBLOB',
   'MEDIUMTEXT',
   'LONGBLOB',
   'LONGTEXT',
   'ENUM',
   'SET'
);
// Atributes
$cfg['AttributeTypes'] = array(
   '',
   'BINARY',
   'UNSIGNED',
   'UNSIGNED ZEROFILL'
);
// Available functions
if ($cfg['ShowFunctionFields']) {
    $cfg['Functions'] = array(
       'ASCII',
       'CHAR',
       'SOUNDEX',
       'LCASE',
       'UCASE',
       'NOW',
       'PASSWORD',
       'MD5',
       'ENCRYPT',
       'RAND',
       'LAST_INSERT_ID',
       'COUNT',
       'AVG',
       'SUM',
       'CURDATE',
       'CURTIME',
       'FROM_DAYS',
       'FROM_UNIXTIME',
       'PERIOD_ADD',
       'PERIOD_DIFF',
       'TO_DAYS',
       'UNIX_TIMESTAMP',
       'USER',
       'WEEKDAY',
       'CONCAT'
    );
    
    // Which column types will be mapped to which Group?
    $cfg['RestrictColumnTypes'] = array(
       'VARCHAR'      => 'FUNC_CHAR',
       'TINYINT'      => 'FUNC_NUMBER',
       'TEXT'         => 'FUNC_CHAR',
       'DATE'         => 'FUNC_DATE',
       'SMALLINT'     => 'FUNC_NUMBER',
       'MEDIUMINT'    => 'FUNC_NUMBER',
       'INT'          => 'FUNC_NUMBER',
       'BIGINT'       => 'FUNC_NUMBER',
       'FLOAT'        => 'FUNC_NUMBER',
       'DOUBLE'       => 'FUNC_NUMBER',
       'DECIMAL'      => 'FUNC_NUMBER',
       'DATETIME'     => 'FUNC_DATE',
       'TIMESTAMP'    => 'FUNC_DATE',
       'TIME'         => 'FUNC_DATE',
       'YEAR'         => 'FUNC_DATE',
       'CHAR'         => 'FUNC_CHAR',
       'TINYBLOB'     => 'FUNC_CHAR',
       'TINYTEXT'     => 'FUNC_CHAR',
       'BLOB'         => 'FUNC_CHAR',
       'MEDIUMBLOB'   => 'FUNC_CHAR',
       'MEDIUMTEXT'   => 'FUNC_CHAR',
       'LONGBLOB'     => 'FUNC_CHAR',
       'LONGTEXT'     => 'FUNC_CHAR',
       'ENUM'         => '',
       'SET'          => ''
    );
    // Map above defined groups to any function
    $cfg['RestrictFunctions'] = array(
        'FUNC_CHAR'   => array(
            'ASCII',
            'CHAR',
            'SOUNDEX',
            'LCASE',
            'UCASE',
            'PASSWORD',
            'MD5',
            'ENCRYPT',
            'LAST_INSERT_ID',
            'USER',
            'CONCAT'
        ),
        'FUNC_DATE'   => array(
            'NOW',
            'CURDATE',
            'CURTIME',
            'FROM_DAYS',
            'FROM_UNIXTIME',
            'PERIOD_ADD',
            'PERIOD_DIFF',
            'TO_DAYS',
            'UNIX_TIMESTAMP',
            'WEEKDAY'
        ),
        'FUNC_NUMBER' => array(
            'ASCII',
            'CHAR',
            'MD5',
            'ENCRYPT',
            'RAND',
            'LAST_INSERT_ID',
            'COUNT',
            'AVG',
            'SUM'
        )
    );
    
} // end if

/**
* Unset magic_quotes_runtime - do not change!
*/
set_magic_quotes_runtime(0);
/**
* File Revision - do not change either!
*/
$cfg['FileRevision'] = '$Revision: 1.204.2.1 $';
?>
