<?php
// Buttons
$lang['button_login'] = "Login";
$lang['button_forgot'] = "Forgot password";
$lang['button_reset'] = "Reset";
$lang['button_add_new_server'] = "Add new Computer";
$lang['button_force'] = "Force Check Now";
$lang['button_download_connector'] = "Download Connector";
$lang['button_download_connector_script'] = "Download connector script";
$lang['button_edit'] = "Edit";
$lang['button_remove'] = "Remove";
$lang['button_edit_server'] = "Edit Computer";
$lang['button_add_server'] = "Add Computer";
$lang['button_delete_server'] = "Delete Computer";
$lang['button_register_server'] = "Register Computer now";
$lang['button_add_service'] = "Add service";
$lang['button_edit_user'] = "Edit User";
$lang['button_save'] = "Save";
$lang['button_install'] = "Install";
$lang['button_save_new_password'] = "Save New Password";
$lang['button_delete'] = "Delete";
$lang['button_save_settings'] = "Save settings";
$lang['button_delete_user'] = "Delete User";
$lang['button_set_schedule'] = "Set Schedule";
$lang['button_yes_install'] = "Yes, add a Computer now";
$lang['button_no_later'] = "No, i\'ll do it later";

// Text field placeholders (all should be lowercase)
$lang['placeholder_hostname'] = "username";
$lang['placeholder_database'] = "database";
$lang['placeholder_name'] = "your name";

$lang['placeholder_username'] = "username";
$lang['placeholder_password'] = "password";
$lang['placeholder_confirm_password'] = "confirm password";
$lang['placeholder_email'] = "email address";
$lang['placeholder_path'] = "path to script";
$lang['placeholder_service_name'] = "service name";
$lang['placeholder_port'] = "port";

// First install
$lang['first_install1'] = "First time setup";
$lang['first_install2'] = "You have just completed installing the system and currently have no servers, would you like to add one now?";

// Titles
$lang['title_install'] = "Install Severus";
$lang['title_database_setup'] = "Database settings";
$lang['title_admin_setup'] = "Admin settings";


$lang['title_login'] = "Login to"; // for the "Login to severus" page
$lang['title_reset'] = "Reset Password?";
$lang['title_services'] = "Services";
$lang['title_add_server'] = "Add Computer";
$lang['title_connector_script'] = "Connector script";
$lang['title_settings'] = "Settings";
$lang['title_edit_user'] = "Edit user";

// Messages
$lang['message_setup1'] = "The database configuration file could not be written, please chmod application/config/database.php file to 777";
$lang['message_setup2'] = "The database could not be created, please verify your settings.";
$lang['message_setup3'] = "The database tables could not be created, please verify your settings.";
$lang['message_setup4'] = "Not all fields have been filled in correctly. The host, username, password, and database name are required as are all Admin settings fields.";
$lang['message_setup5'] = "Please make the application/config/database.php file writable.";
$lang['message_setup6'] = "Example: chmod 777 application/config/database.php";

$lang['message_reset1'] = "Reset Password?";
$lang['message_reset2'] = "You have successfully reset your password.";

$lang['message_cron1'] = "Could not automatically delete cron job, please delete it manually";
$lang['message_cron2'] = "Scheduled updates successfully disabled";
$lang['message_cron3'] = "Entry exists in cron job, but the time interval could not be updated, please update your cron job manually it manually";
$lang['message_cron4'] = "Schedule has been successfully updated";
$lang['message_cron5'] = "Could not automatically update cron job, please update it manually";
$lang['message_cron6'] = "Scheduled updates successfully disabled";
$lang['message_cron7'] = "Scheduled updates successfully disabled";

$lang['message_home1'] = "Your username and/or password is incorrect.";
$lang['message_home2'] = "eset your Password.";
$lang['message_home3'] = "To reset your password please click the link below and follow the instructions:";
$lang['message_home4'] = "If you did not request to reset your password then please just ignore this email and no changes will occur.";
$lang['message_home5'] = "Note: This reset code will expire after";
$lang['message_home6'] = "We couldn\'t find that email address in our system.";

$lang['message_server1'] = "Could not register the server, the connector script has the wrong key, download the connector script again and re-upload it";
$lang['message_server2'] = "Could not register the server, the most likely cause of this is the address you supplied is incorrect, double check the path details";
$lang['message_server3'] = "There was an error registering the server - ";
$lang['message_server4'] = "Error: A server with this IP address already exists, to view this server";
$lang['message_server5'] = "click here";
$lang['message_server6'] = "The server was successfully registered, "; // part of "The server was successfully registered, click here to view/configure it or add another server below"
$lang['message_server7'] = "to view/configure it or add another server below"; // see above comment
$lang['message_server8'] = "Error: There was a problem adding the server to the database";

$lang['message_settings1'] = "Settings updated";

$lang['message_users1'] = "User successfully created";
$lang['message_users1'] = "User successfully updated";
$lang['message_users1'] = "You do not have permission to edit that user";
$lang['message_users1'] = "User deleted";

// Navigation
$lang['nav_dashboard'] = "Dashboard";
$lang['nav_servers'] = "Machines";
$lang['nav_users'] = "Users";
$lang['nav_settings'] = "Settings";
$lang['nav_services'] = "Services";
$lang['nav_schedule'] = "Schedule";
$lang['nav_support'] = "Report";

// Home
$lang['home_total'] = "Total";
$lang['home_online'] = "Computers Online";
$lang['home_master'] = "Master Server";

// Server page / options
$lang['server_online'] = "Online";
$lang['server_offline'] = "Offline";
$lang['server_unknown'] = "Unknown";
$lang['server_never'] = "Never";
$lang['server_server'] = "Server";
$lang['server_load'] = "Load";
$lang['server_response'] = "Response";
$lang['server_model'] = "Model";
$lang['server_processes'] = "Processes";
$lang['server_memory'] = "Memory";
$lang['server_ip'] = "IP Address";
$lang['server_tab_all'] = "All Machines";
$lang['server_tab_add'] = "Add New";
$lang['server_add_script1'] = "The first thing you need to do is download the connector script by clicking the button below and upload it to your website.";
$lang['server_add_script2'] = "Note: trying to hit the connector script directly yourself will 404 this is normal and expected.";
$lang['server_settings_text'] = "When you have uploaded the connector script to your server set the web address to the script (i.e. http://domain.com/connector_script.php)";

// Users page
$lang['users_tab_all'] = "All Users";
$lang['users_tab_add'] = "Add New";
$lang['users_last_login'] = "Last Login";
$lang['users_label_username'] = "Username";
$lang['users_label_password'] = "Password (leave blank to keep current)";
$lang['users_label_email'] = "Email";
$lang['users_label_active'] = "Active";
$lang['users_option_enabled'] = "Enabled";
$lang['users_option_disabled'] = "Disabled";

// Settings page
$lang['settings_label_public'] = "Public page";
$lang['settings_public_text'] = "If you enable the public page then an overview of the servers will be visible without logging in, otherwise the login page will be displayed";
$lang['settings_label_high_load_linux'] = "High load value (linux)";
$lang['settings_high_load_linux_text'] = "Set the server load value that will trigger a server to show up in the warning list.";
$lang['settings_label_high_load_windows'] = "High load value (windows)";
$lang['settings_high_load_windows_text'] = "Windows servers don't have a load value like linux servers so set the CPU percent value.";
$lang['settings_public_enabled'] = "Enable public page";
$lang['settings_public_disabled'] = "Disable public page";
$lang['settings_label_email_notification'] = "Email Notification";
$lang['settings_text_email_notification'] = "Leave blank to disable or enter you email address to receive emails when a server goes offline";


// Services page
$lang['services_current_services'] = "Current Services";
$lang['services_add_new_service'] = "Add new service";

// Schedule page
$lang['schedule_server_checks'] = "Schedule server checks";
$lang['schedule_text'] = "Scheduling allows server checks to be run automatically without any intervention, you can still manually force a check whenever you want, in some cases we may not be able to create the job automatically.";
$lang['schedule_option1'] = "Disable automatic checks";
$lang['schedule_option2'] = "Every minute";
$lang['schedule_optionx'] = "Every x minutes";

// Support page
$lang['support_title'] = "Report";
$lang['support_text1'] = "We have worked hard to make Severus as simple and intuitive to use as possible, however, if you are still struggling to get something working please contact us on the CodeCanyon discussion board and we will do our best to help you.";
$lang['support_text2'] = "Rate us";
$lang['support_text3'] = "Please rate us on the CodeCanyon marketplace. If you are going to rate us less than 4 stars, please contact us first and let us know why, and how we could improve the app to get a higher rating.";
$lang['support_text4'] = "FAQs";
$lang['support_text5'] = "How do I set which services are on my server";
$lang['support_text6'] = "When you edit a server, a list of all the possible services are available, to enable a service, just input the port (or leave at the default), tick the checkbox and click save.";
$lang['support_text7'] = "I've change the services but they don't show up";
$lang['support_text8'] = "Services will be updated at the next server check, if you want it to be applied immediately click the force server check button on the dashboard.";
$lang['support_text9'] = "I want to schedule checks for an interval not listed, how do I do it?";
$lang['support_text10'] = "The easiest way to do this is disable the schedule, then in an ssh session with your server type \"crontab -e\" and the command you need to execute is";
$lang['support_text11'] = "an example for a weekly cron would be";
$lang['support_text12'] = "check every 4 hours";
$lang['support_text13'] = "doing it this way will mean you don't have a countdown to the next check however, however, if you are comfortable editing the database you can go to the settings table and edit the \"setting_heartbeat_interval\" to the value you picked in seconds, so if you have a check running every 4 hours set this value as ";
$lang['support_text13'] = "My server is showing up as \"replace connector script\", what does that mean?";
$lang['support_text13'] = "It could mean you have reinstalled the master server but haven't updated the remote connector script. When the master server is installed it creates a unique key it uses to communicate with the remote server, when you download the script it embeds this code, so if you re-install the code will no longer match without re-uploading the connector script";
 