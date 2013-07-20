=== ABASE ===
Contributors: richhalverson
Donate link: 
Tags: abase, sql, query, shortcode, mysql, database, email
Requires at least: 3.3
Tested up to: 3.5.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

MySQL interface. Create forms to insert, update and search. Embed tables or single values into pages. Foreign keys. Password records. Send email.

== Description ==

This plugin provides the ability to add MySQL forms and reports to your WordPress pages. Forms can be created for searching, inserting, updating or deleting database records. Reports can consist of table view, record view or single value outputs embedded within a Wordpress page.
<P>
Tables can contain foreign keys using the InnoDB Storage Engine and links are automatic. Records can be individually passworded. An ABASE output can be specified as an email. A closing [/abase] shortcode allows additional text content provided with the output, a feature useful for emails.
<P>
Files uploaded are stored in a separately specified directory and referenced in cells.
<h3>Shortcode</h3>
An ABASE shortcode looks as follows with optional attribtes.
<P>
[abase ack="?" alink="?" center="?" cols="?" columns="?" database="?" db="?" echo="?" elements="?" emailbcc="?" emailcc="?" emailfrom="?" emailsubject="?" emailto="?" fields="?" files="?" form="?" from="?" group="?" images="?" insert="?" limit="?" notitle="?" order="?" password="?" required="?" right="?" rlink="?" rownum="?" search="?" select="?" sql="?" style="?" table="?" update="?" where="?" /]&lt;content&gt;[/abase]
<P>
The question mark represents a parameter value or a list of values separated by commas (,). Empty fields need not be specified. Using the shortcode with no attributes ([abase]) lists the tables in the current database. Otherwise, either the <B>sql</B>, <B>from</B>, or <B>table</B> attribute is used to specify part or all of a database operation. The attribute designators must be lower case.
<P>
Use of trailing "/", &lt;content&gt; and "[/abase]" is optional unless &lt;content&gt; is specified. The shortcode name "abase" can be all lower-case or all upper-case but not mixed case. Each functions identically but are treated separately so a closing shortcode must be case identical. For example [ABASE sql="SHOW TABLES"] and [abase sql="SHOW TABLES"] are identical and both show the tables in the database, however would be different when including &lt;content&gt;. This allows embedding of one tag within the content field of another.
<h3>Databases</h3>
ABASE can connect to up to 3 databases, numbered 1, 2 and 3. (In <nobr>Settings->ABASE for MySQL.</nobr> Expand to full settings.) ABASE shortcodes default to using database 1. A db="1", db="2" or db="3" attribute in a shortcode will change the default database for this and the remaining shortcodes on the page. Therefore if the page uses database 2, you only need to specify [abase db="2"] in the first shortcode, then not specify a <B>db</B> attribute in any of the remaining shortcodes on that page.
<P>
In addition to [abase] and [ABASE] shortcodes, two more are available. Shortcode [abase2] will use the database 2 regardless of the default, and will not change the default. Shortcode [abase3] will use database 3 and not change the default.
<h3>Attributes</h3>
<ul>
	<li><strong>ack</strong> - ack=" ( &lt;verbosity&gt; ) ( , ) ( &lt;url&gt; ) ( , ) ( &lt;color&gt; )" - for acknowledging a record insert, update or search.
		<ul><li>&lt;verbosity&gt;="1" or "2" or "3" or "4"<li>&lt;url&gt;=path-file of an update form for a record insert or update<li>&lt;color&gt;=HTML color of acknowledgement. If color is in all caps, acknowlegement will display in bold</ul>
	<li><strong>alink</strong> - alink=" &lt;column&gt; ( , &lt;url&gt; ( , &lt;append&gt;  ( , &lt;target&gt; ) ) )"
		<ul><li>&lt;column&gt; - column name whose content will become a link to a &lt;url&gt; that is appended with the contents of column &lt;append&gt;.<li>&lt;target&gt; specifies the target window for the link (e.g., target="_blank" will open a new browser window.</ul>
	<li><strong>center</strong> - center=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more table columns to center when displaying.
	<li><strong>cols</strong> - cols=" &lt;field_spec&gt; ( , &lt;field_spec&gt; )" - Specifies the column names to be displayed as a table. Two or more records to be displayed are required. Designed to be used in conjunction with fields specification. See &lt;field_spec&gt; below under <B>fields</B>.
	<li><strong>columns</strong> - columns=" &lt;field_spec&gt; ( , &lt;field_spec&gt; )" - Specifies the columns to be displayed in a table. Zero or more records will be displayed. See &lt;field_spec&gt; below under <B>fields</B>.
	<li><strong>database</strong> - database="?" Change default database. Choose database 1, 2  or 3 as specified in Settings. Exactly the same as db (next).
	<li><strong>db</strong> - db="?" Change default database. Same as database.
	<li><strong>echo</strong> - echo="&lt;color&gt;" will display (i.e., echo) the shortcode in the specified HTML &lt;color&gt; (e.g., echo="red").
	<li><strong>elements</strong> - elements=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more fields in a form with form elements for either searching, adding to or updating the database.
	<li><strong>emailbcc</strong> - emailbcc="?" specify blind copy email address(es). Either a specific email address or a column name that contains an email address. emailto must be specified to send a email.
	<li><strong>emailcc</strong> - emailcc="?" specify copy email address(es). Either a specific email address or a column name that contains an email address. emailto must be specified to send a email.
	<li><strong>emailfrom</strong> - emailfrom="?" specify from email address. Either a specific email address or a column name that contains an email address. emailto must be specified to send a email.
	<li><strong>emailsubject</strong> - emailsubject="?" specify email subject. emailto must be specified to send a email.
	<li><strong>emailto</strong> - emailto="?" specify email recipient. Either a specific email address or a column name that contains an email address. Only one email can be sent per shortcode execution.
	<li><strong>fields</strong> - fields=" &lt;field_spec&gt; ( , &lt;field_spec&gt; )" - Specifies the column names to be displayed in record view. Record view is a two column table with the field names in the first column and the values in the second column.
		<ul><li>Meta language: terms in parentheses are optional, vertical bar (|) - OR operator. (Exception - vertical bar (|) preceded &lt;foreign_column&gt;.)
			<li>&lt;field_spec&gt; ::= ( &lt;column_title&gt;^ ) &lt;column_name&gt; ( |&lt;foreign_column&gt; ) ( ! ( '( &lt;element_type&gt; &lt;space&gt; ) &lt;element_style&gt;' ) ) ( [&gt;|&gt;=|=|&lt;=|&lt;|!=] ( % ) &lt;operand&gt; ) ( % ) ( $ ( &lt;button_value&gt; ) )
			<li>&lt;operand&gt; ::= &lt;surrogate&gt; | &lt;integer&gt; | ' &lt;constant&gt; '
			<li>&lt;column_title&gt; = optionally precedes &lt;column_name&gt; using a carrot (^) character. It replaces &lt;column_name&gt; as column title in table view and field name in record view.
			<li>&lt;column_name&gt; = name of a column returned from the SELECT
			<li>&lt;foreign_column&gt; = follows &lt;column_name&gt; after a vertical-bar (|) character, is the name of the column in the foreign table containing the value to display instead of the foreign key contained in this column.
			<li>&lt;button_value&gt; = text displayed on the submit button.
			<li>&lt;element_type&gt; = form element type (e.g., button, checkbox, email, file, hidden, image, number, password, radio, reset, submit, tel, text, textarea, time or url)
			<li>&lt;element_style&gt; = can be either (a) one to three integer values separated with semicolons (;), (b) a style attribute for a form element or image, or (c) date and time format. A single integer value is interpreted as the width of the textbox in pixels. The default height is 18 pixels. A pair of integer values separated by a semicolon is interpreted as the width of the element in pixels followed by the height in pixels. A third integer value specifies the vertical alignment. Therefore, '250;25;-5' would be interpreted as style="width:250px;height:15px;vertical-align:-5px;" in the HTML element tag. Date and time formats are PHP defined, e.g., 'l, F j, Y g:ia e' would format <I>Friday, July 19, 2013 8:33pm UTC</I> at that time. Note that date and time inputs are translated to Unix time using the PHP <I>strtotime</I> function, accepting virtually any format for entering the date and time (e.g., "today" translates to today's date.) 
			<li>&lt;surrogate&gt; = name of a form element to test against the current field value in a search.
			<li>&lt;constant&gt; = value field of a checkbox.
			<li>&lt;integer&gt; = digits consisting of 0-9.
			<li>&lt;space&gt; = blank space.
		</ul>
	<li><strong>files</strong> - files=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more columns that will contain URLs of uploaded files. The insert and update form elements are file selection boxes with browse buttons. Inserting or updating values in <B>files</B> fields involves file uploading to the File Upload Directory (specified in Settings). The uploaded file will be stored in the directory and the directory path and file name will be stored in the database table cell. A <B>files</B> column field type should be varchar(255).
	<li><strong>form</strong> - form="( &lt;form_type&gt; , ) &lt;tag_code&gt; ( , &lt;form_action&gt; )"  Beginning and/or end of HTML form.
		<ul>
			<li>tag_code="1" specifies this shortcode as an entire form. A &lt;form ...&gt; tag will appear at the beginning and a &lt;/form&gt; tag will appear at the end. 
			<li>tag_code="2" specifies this shortcode as the beginning of a form. A &lt;form ...&gt; tag will appear at the beginning.
			<li>tag_code="3" specifies this shortcode as the end of a form. A &lt;/form&gt; tag will appear at the end.
			<li>tag_code="4" specifies this shortcode as an entire form to delete a record.
			<li>form_type="search" specifies this is a form to search the database.
			<li>form_type="insert" specifies this is a form to insert a new record into the database.
			<li>form_type="update" specifies this is a form to update a record in the database.
			<li>form_action - specifies a URL action for the form. If not specified, the current URL is used.
		</ul>
	<li><strong>from</strong> - Specifies the table_references clause in the MySQL SELECT statement. Default is table specified.
	<li><strong>group</strong> - Specifies the GROUP BY clause and can include a HAVING part.
	<li><strong>images</strong> - images=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more columns that will contain URLs of uploaded images. Similar to <B>files</B> except when an <B>images</B> column is displayed, it is displayed as an HTML image tag with the cell content defining the image source. The insert and update form elements are file selection boxes with browse buttons. Inserting or updating values in <B>images</B> fields involves file uploading to the File Upload Directory (specified in Settings). The uploaded file will be stored in the directory and the directory path and file name will be stored in the database table cell. An <B>images</B> column field type should be varchar(255).
	<li><strong>insert</strong> - insert="?" (depreciated. Use form="insert".)
	<li><strong>limit</strong> - Specifies a LIMIT clause.
	<li><strong>notitle</strong> - notitle="1" will cause the table in a cols="" or columns="" specification to display without the column titles.
	<li><strong>order</strong> - Specifies the ORDER BY clause.
	<li><strong>password</strong> - password="?" specify password field. Password entry and match is required to update or delete table record.
	<li><strong>required</strong> - required=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more columns in an insert or update form that must have a filled in value or the submit will not be accepted. An error alert message will appear.
	<li><strong>right</strong> - right=" &lt;column&gt; ( , &lt;column&gt; )" specifies one or more columns to right justify.
	<li><strong>rlink</strong> - rlink=" &lt;column&gt; ( , &lt;url&gt; ( , &lt;target&gt; ) )" Record link. Link which specifies the primary index &lt;name&gt;=&lt;value&gt; pair in query string. Used to display a single record in the database.
		<ul>
			<li>&lt;column&gt; column that will be a link. 
			<li>&lt;url&gt; if specified, the URL of the page to display the record. If not specified, link will be to the current page.
			<li>&lt;target&gt; specifies the target window for the link (e.g., target="_blank" will open a new browser window.
		</ul>
	<li><strong>rownum</strong> - rownum="1" will add line numbers to the display tables.
	<li><strong>search</strong> - search="?" (depreciated. Use form="search".)
	<li><strong>select</strong> - Specifies the select_expr clause in the MySQL SELECT statement. Default is * (all columns).
	<li><strong>sql</strong> - Specifies a complete MySQL statement to be executed.
	<li><strong>style</strong> - This will specify a style="" attribute for the table that encloses the shortcode display.
	<li><strong>table</strong> - Specifies the database table to be searched or updated.
	<li><strong>update</strong> - update="?" (depreciated. Use form="update".)
	<li><strong>where</strong> - Specifies the where_condition clause in the MySQL SELECT statement.
</ul>
<h3>Displaying Fields</h3>
<ul>
<li>Use <strong>cols=""</strong>, <strong>columns=""</strong> or <strong>fields=""</strong>
<li>Use cols="&lt;field_spec&gt; ( , &lt;field_spec&gt; )" to display 2 or more records in table view.
<li>Use columns="&lt;field_spec&gt; ( , &lt;field_spec&gt; )" to display any number of records in table view.
<li>Use fields="&lt;field_spec&gt; ( , &lt;field_spec&gt; )" to display one record in record view.
<li>cols="" and fields="" can be used in the same shortcode.
</ul>

== Installation ==

1. Activate the plugin through the 'Plugins' menu in WordPress.
2. Place shortcode [abase] in a page or post to display the current user and database settings and list of database tables.
3. Change the user or database under Settings -> ABASE for MySQL

== Frequently asked questions ==

= What is the ABASE shortcode? =

[abase]

Putting "[abase]" on a page will display the current ABASE version, the default database, default user and a list of all the accessible database tables. Add attributes to access MySQL databases, create forms, display tables, and create Internet database applications in WordPress.

= What are all these attributes? Where's a ABASE reference guide? =

In the WordPress Admin section, click Settings on the left, and then "ABASE for MySQL." This is where you set the database and user. Below that is the most up-to-date reference guide for ABASE.

= How do I know that ABASE is installed properly? =

In the WordPress Admin section, clicking Settings on the left, then "ABASE for MySQL" will show the configuration settings. This confirms the installation.

Another way is to place the shortcode [abase] in a page or post and it will display the current user and database settings. If the database contains any tables, their names and record counts are listed.

= How many ABASE shortcodes can I use on the same page? =

There is no limit. Note that a shortcode [abase] is different than [ABASE]. This is important if you embed an ABASE shortcode within another, e.g., [abase] ... [ABASE /] ... [/abase] should work.

= Where do I set the database and user? =

In the WordPress Admin menu, click Settings on the left, and the ABASE for MySQL.

= How do I create a new database? =

This step is performed outside ABASE. If you have cPanel, you can create a new database using the MySQL Databases or MySQL Database Wizard cPanel applications.

= I've created a new database but [abase] connects to a different database. Where do I change this? =

ABASE can connect to up to 3 databases. You change or add a database in the WordPress dashboard by clicking Settings on the left, then clicking on ABASE for MySQL. ABASE defaults to the first database. If no database is specified, it defaults to the WordPress database. If no user is specified it defaults to the WordPress user. It is recommended that you create your own database not use the WordPress database. You can create your database and give the WordPress user access using the MySQL Create Database application. To connect a second or third database you may need to Expand to full settings first.

ABASE shortcodes default to using database 1. A db="1", db="2" or db="3" attribute in a shortcode will specify a specific database to use AND change the default database for the remaining shortcodes on the page. Therefore if the page uses database 2, you only need to specify [abase db="2"] in the first shortcode. Shortcodes [abase2 ...] will use the database 2 regardless of the default, and will not change the default. Shortcode [abase3 ...] will use database 3 and not change the default.

= How do I create a new table? =

You can use phpMyAdmin, which is available in cPanel. You can also use the CREATE TABLE SQL statement in an ABASE shortcode using the sql="?" attribute.

For example, shortcode:

[abase sql="CREATE TABLE employees (employee_id int(11) NOT NULL AUTO_INCREMENT, first_name varchar(100) NOT NULL, last_name varchar(100) NOT NULL, PRIMARY KEY (`id`))"]

will create a table named 'employees' in the current database, with a primary key ID field named 'employee_id' and a first name field named 'first_name' and a last name field named 'last_name'. The primary key is autoincrement and the first and last names can each be up to 100 characters long.

= How do I display a table? =

There are different ways, depending on what you want to display.

[abase table="employees"] will display all the columns and all records in the employees table. If there are any foreign keys columns from those tables will also be displayed.

[abase table="employees" columns="first_name,last_name" ORDER="last_name,first_name"] will display only the first and last name columns in alphabetical order by last name.

[abase sql="SHOW COLUMNS FROM employees"] will display the structure of the employees table.

[abase sql="SHOW CREATE TABLE employees"] will display the SQL CREATE statement to create the table.

= How do I create a form to add a record to a table? =

[abase form="1,insert" table="employees" columns="first_name,last_name$Add Employee" elements="first_name,last_name" ack="red"]

The form and table attributes specify a form to insert a record into the employees table. The columns attribute specifies the first_name and last_name fields will be displayed and a submit button with "Add Employee" will follow the last_name field. The elements attribute specifies the first_name and last_name fields will be form input elements. The ack attribute requests an acknowledgement be displayed in red when data is inserted.

= How do I change the sizes and types of the input elements in a form? =

Formatting takes place in either the columns, fields or cols attribute. Changing the title of a column precedes the name with a carrot (^) character. Element formatting follows the name with an exclamation point (!) in single quotes ('). Within the single quotes can begin optionally with the type of form element followed by a space, then either (a) 1, 2 or 3 integers separated by semicolons, or (b) contents of an HTML style attribute. 1 to 3 integers correspond to width, height and vertical-align values in pixels. An HTML style attribute can specify width, height, vertical-align, font-size, font-family, and anything else. For example,

[abase form="1,insert" table="employees" columns="first_name!'width:100px;font-size:12pt;',Password^last_name!'password 100;15'$Add Employee" elements="first_name,last_name" ack="red"]

The format of the first name field will be a text box 100 pixels wide and the font size will be 12 point. The height defaults to 18 pixels. The last name field will be renamed on the form "Password" and the form element will be a password type (so what is typed on the screen is hidden). The password form element will be 100 pixels wide and 15 pixels in height.

= How do I create a search form? =

To specify a search form using ABASE, you will use at least the table="?", columns="?", elements="?" and form="?" attributes.

[abase form="1,search" table="employees" columns="first_name,last_name$Search Employees" elements="first_name,last_name"]

On the same page, place the following shortcode to display a table with the results of the search:

[abase table="employees" columns="first_name,last_name" ack="green"]

= How do I create a form to update a record in a table? =

First you need a way to identify the record you want to update. To do so, we can use the rlink attribute to specify the first name as a "record" link.

[abase table="employees" columns="first_name,last_name" rlink="first_name" echo="blue"]

The first name will appear as a link. Clicking on a link first name will re-display the page with the primary key and value in the query string. To create the form, place the following shortcode on the same page.

[abase form="1,update" table="employees" elements="first_name,last_name" fields="first_name,last_name$Update Employee" ack="brown" echo="blue"]

When a record identified by its primary key is in the query string, an update form for that record will be produced.

= How do I send an email? =

The execution results from a shortcode execution is sent as an email if there is a valid emailto="&lt;email_address&gt;" attribute is present. &lt;email_address&gt; can be either an actual email address or a column name that contains valid email addresses. If an email address is specified as a column, the email will be sent if the shortcode execution results in exactly one record. If the email is sent, the content will not display on the page.

To produce more readable email content, add a &lt;content&gt; field followed by a [/abase] closing shortcode, and &lt;content&gt; will appear before the original shortcode output.

For example, the following ABASE shortcode will send an email to xyz@123.45 that says "Hello Joe, how are you?"

[abase emailto="xyz@123.45"]Hello Joe, how are you?[/abase]

Replace xyz@123.45 with your email address and view the page with the shortcode. You should not see the email content on the page but you should get the email.

ABASE shortcodes can be placed within &lt;content&gt; as long as the ABASE shortcodes within &lt;content&gt; use "ABASE" if the email shortcode uses "abase" (or vice versa). So, for example, the following shortcodes will email the contents of the employee table:

[ABASE emailto="xyz@123.45"]
Joe, here is the contents of the employee table:
[abase table="employees"]
Fred.
[/ABASE]

= How do I add a field to a table without using phpMyAdmin? =

Use an SQL statement. For example, to add an integer field "employee_level" to the employees database, execute the following just once:

[abase sql="ALTER TABLE `employees` ADD `employee_level` INT NOT NULL"]

Once the page containing the shortcode is displayed (and the new field added to the table) then be sure to delete or disable the shortcode so it doesn't execute again.

= How do I upload an image or PDF file? =

File uploads are associated with a field in a database record. When uploading a file, the file is stored in a directory defined by the table name, column name and primary index. The address of the file (path and file name) is stored in the table cell defined by the table name, column name and primary index. The images or files attribute specify columns that correspond to file uploads.

For example, if we start by creating a table as follows with an employee first name, last name and picture:

[abase sql="CREATE TABLE `employees` ( `employee_id` int(11) NOT NULL AUTO_INCREMENT, `first_name` varchar(100) NOT NULL, `last_name` varchar(100) NOT NULL, `picture` varchar(250) NOT NULL, PRIMARY KEY (`employee_id`) )"]

A form to add an employee with the picture field identified as an image would produce a browser file upload form element for the picture entry:

[abase form="1,insert" table="employees" elements="first_name,last_name,picture" columns="first_name!'100',last_name!'100',picture!100$Add Employee" images="picture" ack="green"]

Displaying the employees table with pictures would be as follows:

[abase table="employees" columns="picture!'width:50px;vertical-align:-25px;',first_name,last_name" images="picture" style="width:500px;"]

The images attribute declares picture as an image. The exclamation point (!) precedes formatting for the image. width:50px will resize the image to 50 pixels wide and vertical-align:-25 will lower it 25 pixels so the adjacent rows will appear in the middle instead of at the bottom of the row.

= How can I put individual passwords on table records? =

A password on a record will prevent updates or deletions to the record without a password. In the shortcode declaring an update or delete form, include a password attribute identifying the column password. The password input must equal the contents of the password field for the update or delete to take place. 

== Screenshots ==

1. Configuration, documentation, FAQ and examples can be found by clicking ABASE for MySQL under Settings.

2. Expanding to full settings allows full configuration of up to 3 databases.

== Changelog ==

= 1.13.7.19 =

First version available through WordPress.

== Upgrade notice ==

= 1.13.7.19 =

First version available through WordPress.


