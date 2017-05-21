<?PHP

//define(database, Yenko-Buddy);


require_once("web.php");

$web = new Web();

//Provide your site name here
$web->SetWebsiteName('yenkobuddy.co.za');

//Provide the email address where you want to get notifications
$web->SetAdminEmail('yenkobuddy@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$web->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'yenko-buddy',
                      /*table name*/'');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$web->SetRandomKey('qSRcVS6DrTzrPvr');

?>