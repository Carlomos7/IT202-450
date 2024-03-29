<table><tr><td> <em>Assignment: </em> Init DB Setup</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 7/6/2022 11:13:12 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/init-db-setup/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <p>Reminder: Make sure you start in dev and it's up to date</p><ul><li>git checkout dev</li><li>git pull origin dev</li><li>git checkout -b ProjectSetup</li></ul><p>Steps:</p><ol><li>Create a new folder in public_html called Project</li><li>create a new folder in Project called sql</li><li>Create a new file in sql called init_db.php</li><li>Paste the content from&nbsp;<a href="https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea">https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea</a><ul><li>You will get errors if this is not in the proper location</li></ul></li><li>Create another file in sql called 001_create_table_users.sql</li><li>Paste the content from&nbsp;<a href="https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e">https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e</a></li><li>Add/commit/push these to the new branch (if you haven't yet)</li><li>Create the pull request on github but do not complete it yet</li><li>Create a new folder in public_html called M4</li><li>Create a new file in the M4 folder called m4_submission.md</li><li>Fill out the below deliverables and paste the generated markdown in the file</li><li>Add/commit/push the new changes</li><li>Verify all of the files appear as expected in the ProjectSetup branch<ol><li>M4/m4_submission.md</li><li>Project/sql/init_db.php</li><li>Project/sql/001_create_table_users.sql</li></ol></li><li>Complete the merge/pull request from step 8</li><li>Create a new pull request from dev to prod and complete it</li><li>Go back to your local repo</li><li><code>git checkout dev</code></li><li><code>git pull origin dev</code></li><li>On github, navigate to the prod branch</li><li>Go to the M4 folder</li><li>Click the m4_submission.md</li><li>Paste that url to Canvas as the submission</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Verify Proper Setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Visit the init_db.php file in the browser on heroku dev and screenshot the working output (If it says blocked this is still valid)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174503947-7294ee22-e59d-4088-9dc3-c1421927bbe3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Displays Database Helper tool and that table is blocked from running<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Go to your MySQL VS Code extension, click the new table that was generated, screenshot the table shown</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174504012-c88ba815-8b3c-4794-affc-3392efc0fe21.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot MySQL extension and Users table with some entries<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly talk about something you learned (from the readings is preferred over the slides/class)</td></tr>
<tr><td> <em>Response:</em> <p>I learned that SQL (Structured Query Language) allows you to access and manipulate<br>databases. There are several powerful SQL statements I learned to manipulate databases and<br>tables. For example, &quot;SELECT&quot; allows me to grab data from a different database<br>and is stored in a result set. Addtionally, the &quot;FROM statement coupled with<br>&quot;SELECT&quot; lets me specify which table.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Talk about any issues or difficulties you had in any of the processes and how you resolved them. If you didn't have issues this HW mentions a recently resolved issue that wasn't discussed before. Otherwise, just mention "no issues"</td></tr>
<tr><td> <em>Response:</em> <p>no issues<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link (ProjectSetup to Dev)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/16">https://github.com/Carlomos7/IT202-450/pull/16</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Paste the direct link from heroku prod to the init_db.php file (i.e., https://mt85-prod.herokuapp.com/Project/sql/init_db.php)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-dev.herokuapp.com/Project/sql/init_db.php">https://cs525-dev.herokuapp.com/Project/sql/init_db.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/init-db-setup/grade/cs525" target="_blank">Grading</a></td></tr></table>