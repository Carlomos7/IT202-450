 <table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 7/6/2022 11:05:24 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177624191-a926263a-e136-4bd0-bb30-07cebb8bf0f9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>1 The result of enterting an invalid email address. The email adress intially<br>entered for this warning is also provided.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177626869-7ca82b85-5b5a-45ca-8474-e71c9facc4fc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>2.1 My screenshot shows the built in validation. For some reason I was<br>unable to get the flash message as this was preventing me from going<br>through. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177627186-4ce31962-720f-47b0-9c4d-f78e108912bb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>2.2 A screenshot of my code for server-side validation to prove it was<br>implemented<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177627387-0e7b2603-121c-4666-961b-ed926ac3af05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>2.3 A screenshot of my validate(form) function to prove it was implemented<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177627450-a4d2c5ea-f939-48f1-a4c7-cefbaaeb1e1f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>3 Two mismatched passwords<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177628527-a6d60f4e-eeac-4a84-998a-1349b7cca49a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>4  Email not available message prompted after using an already registered email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177628699-c3455f34-6be3-4a16-8e91-66021e4421f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>5 Username unavailable as it is already registered to a preexisting account<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177628938-4c4ca6ac-3264-45a6-946f-163a0e17a984.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>6 Form with the valid data to be submited. Password &amp; Confirm are<br>more than 8 characters and matching<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177629198-74db33e2-feb5-40eb-b658-25812ce473f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of users table showing the valid data previously entered. (email: <a href="mailto:&#118;&#x61;&#x6c;&#105;&#100;&#x40;&#101;&#109;&#97;&#105;&#x6c;&#46;&#x63;&#x6f;&#109;">&#118;&#x61;&#x6c;&#105;&#100;&#x40;&#101;&#109;&#97;&#105;&#x6c;&#46;&#x63;&#x6f;&#109;</a>, username:<br>valid_user)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/11">https://github.com/Carlomos7/IT202-450/pull/11</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/register.php">https://cs525-prod.herokuapp.com/Project/register.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The data entered must be validated to be accepted when registering a new<br>account. Several different functions handle the validation for username, password, and email:<div><ul><li>is_valid_email() -<br>returns true if a valid email is entered</li><li>is_valid_username() - returns true if the<br>username matches the given pattern</li><li>is_valid_password() - returns true if the password is equal<br>to or more than eight characters</li><li>Password &amp; confirm are passed through empty() to<br>check that they are not left blank</li><li>Password &amp; confirm are checked for matching<br>values</li><li>If any of the above is invalid, the hasError variable is set to<br>true</li></ul><div>When receiving valid data, hasError returns true, and the passwords can then be<br>hashed. The hashing process is done with the password_hash function using the BCRYPT<br>encryption method. The hashed password is then associated in the database with the<br>respective user.</div><div><br></div><div>Finally, on form submission, the javascript function validate ()is run. The function<br>validate() is a client-side validation that checks the form inputs for valid data.</div><div><br></div></div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177635048-78ad8279-8730-433c-977b-f50eccb4b0a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed upon entering an invalid password ( a password which doe not<br>match the user&#39;s associated record in the DB)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177635254-6f8038ac-ee07-4c73-aa12-d52575f5e7bb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed upon entering a username for a non-existing user. I have also<br>typed in the username I used to test this feature<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177638354-25ec8a75-cb5f-4587-aa5a-9715780ecf14.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed upon sucessful login attempt<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/32">https://github.com/Carlomos7/IT202-450/pull/32</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/login.php">https://cs525-prod.herokuapp.com/Project/login.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The user&#39;s credentials must exist and match the database for a successful login.<br>The same server-side validation from register.php is reused in login.php. If there are<br>no errors, then the user&#39;s record is fetched from the DB rather than<br>entered. Firstly, if there are no errors with email/username and password, a database<br>statement is prepared that collects the id, email, username, and password and returns<br>a result set. Next, it tries to execute the statement if the email/username<br>exists in the database. If so, the respective record is stored as an<br>array. Then, the password being input for login is compared to the hash.<br>If it is the same, the session is set from the database. After,<br>the associated roles are fetched from the DB, and if the user has<br>a role, it&#39;ll be available; otherwise, it&#39;ll be set to an empty array.<br>Finally, the user is sent to the home page with a welcome message.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177642000-37551f71-ba31-4c04-ba0c-a87722aadecc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after a successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177642015-e97eac29-445c-4140-b5d4-96e6dfbb2dc1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after attempting to view a login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/14">https://github.com/Carlomos7/IT202-450/pull/14</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/13">https://github.com/Carlomos7/IT202-450/pull/13</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/logout.php">https://cs525-prod.herokuapp.com/Project/logout.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The session is started via the session_start() function then reset via the reset_session()<br>function. This resets the array variables so they should be blank and no<br>one is logged in<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177643341-d5d208a9-6658-4957-8eb6-b5a299b194f6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after attempting to view a login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177643772-d848571f-8732-4f1a-9983-3e70cf6ec08d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after a user without an admin role attempts to access the<br>role-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177644299-3af7b6b6-61d0-44d3-8161-08a25dbfe299.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of roles table with admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177644608-c314ee9b-3511-4b5a-ac22-8aedbd66c949.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the UserRoles table with valid data. User_id 5 is the admin<br>user.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177645434-34f707ca-ddd1-4c62-8c45-5142eea229c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of user_id 5 to show the respective admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/31">https://github.com/Carlomos7/IT202-450/pull/31</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/assign_roles.php">https://cs525-prod.herokuapp.com/Project/admin/assign_roles.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/create_role.php">https://cs525-prod.herokuapp.com/Project/admin/create_role.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/list_roles.php">https://cs525-prod.herokuapp.com/Project/admin/list_roles.php</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>If the user is not logged in, they will be redirected to the<br>login page with a message stating they must be logged in to view<br>the page. This is done via the is_logged_in().&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>If the user does not have the associated role to view the protected<br>page, they will be redirected to the home page with a warning message.<br>This is done via the has_role() function.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177646474-7809081a-0645-4ff1-ba1c-8659898c9124.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of styled navigation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177646618-0422f262-c9f8-4cb4-93fe-5d2f322dfc3a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of styled form<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/30">https://github.com/Carlomos7/IT202-450/pull/30</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/home.php">https://cs525-prod.herokuapp.com/Project/home.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I updated the navigation list to have a green background color by selecting<br>all &lt;li&gt; (list items) inside the &lt;nav&gt; (set of navigation links), with the<br>following reference: li nav{ display: inline; background-color: rgb(4,144,65);<div>I kept the list inline cause<br>it looked pretty.</div><div><br><div><div>I used a similar reference to select the &lt;a&gt; (hyperlink tags)<br>and set the font color to black: li nav a{color: black}</div></div><div><br></div><div>For the &lt;input&gt;,<br>I updated the border-radius to 5% for slightly rounded edges: input{border-radius:5%}</div><div><br></div><div>For the &lt;body&gt;,<br>I updated the background color to a grayish white (rgb(220,220,220)) and the font<br>color to a green (rgb(4,144,64)).</div><div><br></div></div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177647435-cbad4898-34aa-45fa-ac40-795ab6db6481.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Created role message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177647469-8b79e15b-e26f-499d-92d5-f086fab39539.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile saved message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/30">https://github.com/Carlomos7/IT202-450/pull/30</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/18">https://github.com/Carlomos7/IT202-450/pull/18</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Using the flash messages function, I displayed messages on the screen for the<br>user to read. These messages explained where input from the user might be<br>invalid or preexisting. The flash function also allows for an alert rating from<br>these three options: success, warning, and danger.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177647832-546674fb-1c2a-4044-8887-e884923a37d2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the user&#39;s profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/19">https://github.com/Carlomos7/IT202-450/pull/19</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/profile.php">https://cs525-prod.herokuapp.com/Project/profile.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>Data is retrieved via the get_user_email() and get_username() functions from the $_SESSSION array.<br>Then, the input field&#39;s value is populated with the respective email and username.<br>Passwords are not filled out.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177654362-eb447359-1a0a-44e5-8067-837d938ba9e6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after updated username<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177654453-194489ad-46cc-4040-841f-efddb492c10f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after updated email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177654479-20662999-0072-4c1a-ace8-78773ac83e64.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after updated password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177654494-117d6e7f-d7a5-4e1d-8a91-b50e7111b953.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after mismatch password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177654512-b70018a0-89b5-49f5-b6b6-75ed826d176a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed after trying to use an in-use username<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177655250-5930a7ba-e7b6-49e2-8693-65d1ed549cbd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screnshot of record before profile update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177655257-396c649a-1ecb-48ab-8ada-2096da4fcfad.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of record after profile update<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/19">https://github.com/Carlomos7/IT202-450/pull/19</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>If the $_POST &quot;save&quot; variable is set, the current input for email and<br>username will be retrieved. A parameter for overriding these variables in the database<br>will be set. This parameter also retrieves the respective user_id. The params will<br>try to be executed through a statement (previously set) to update the user&#39;s<br>email and/or username according to the user_id. Upon successful completion, a user-friendly message<br>is flashed to the screen.<div>Fresh data from the table will be selected from<br>a new statement variable. It will try to execute matching the user ids.<br>The corresponding user record is fetched and set to a variable. If this<br>user exists, the session will update with the data previously entered.</div><div><br></div><div>The current input<br>for the passwords (pass, new, confirm)&nbsp; will be set to variables. If all<br>password fields are not empty and the new password equals the confirm, another<br>statement will be prepared to select the password from the Users table where<br>id matches. The respective user record array is then fetched. If the array<br>contains a password then it will be cross-verified with the current password before<br>proceeding. Then, a query is set up to update the User password where<br>the id matches. The new password will then be hashed and set. Upon<br>successful completion, the user is prompted with a message.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177655890-a470f5e7-cd1e-4a47-9a2c-3350c03cf9e3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board screenshot Issues 1 to 5 (all closed)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/177656087-2582db8b-ca88-4258-a869-ca35ae56e364.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board issues 6 to 9 (all closed)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/projects/1">https://github.com/Carlomos7/IT202-450/projects/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/login.php">https://cs525-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/cs525" target="_blank">Grading</a></td></tr></table>