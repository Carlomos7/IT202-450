<table><tr><td> <em>Assignment: </em> IT202 JavaScript and CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 6/16/2022 11:28:53 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-javascript-and-css-challenge/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul><li>Reminder: Make sure you start in dev and it's up to date<ol><li><code>git checkout dev</code></li><li><code>git pull origin dev</code></li><li><code>git checkout -b M3-Challenge-HW</code></li></ol></li></ul><ol><li>Create a copy of the template given here:&nbsp;<a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a></li><li>Implement the changes defined in the body of the code</li><li><strong>Do not</strong>&nbsp;edit anything where the comments tell you not to edit, you will lose points for not following directions</li><li>Make changes where the comments tell you (via TODO's or just above the lines that tell you not to edit below)<ol><li><strong>Hint</strong>: Just change things in the designated&nbsp;<code>&lt;style&gt;</code>&nbsp;and&nbsp;<code>&lt;script&gt;</code>&nbsp;tags</li><li><strong>Important</strong>: The function that drives one of the challenges is&nbsp;<code>updateCurrentPage(str)</code>&nbsp;which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li></ol></li><li>Create a branch called M3-Challenge-HW if you haven't yet</li><li>Add this template to that branch (git add/git commit)</li><li>Make a pull request for this branch once you push it</li><li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li><li>Create a new file&nbsp;<strong>m3_submission.md</strong>&nbsp;file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li><li>Add, commit, and push the submission file</li><li>Close the pull request by merging it to dev (double-check all looks good on dev)</li><li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li><li>Complete the merge to deploy to production</li><li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li></ol><style>` and `<script>` tags
    2. **Important**: The function that drives one of the challenges is `updateCurrentPage(str)` which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.  
5. Create a branch called M3-Challenge-HW if you haven't yet
6. Add this template to that branch (git add/git commit)
7. Make a pull request for this branch once you push it
8. You may manually deploy the HW branch to dev to get the evidence for the below prompts
9. Create a new file **m3_submission.md** file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)
10. Add, commit, and push the submission file
11. Close the pull request by merging it to dev (double-check all looks good on dev)
12. Manually create a new pull request from dev to prod (i.e., base: prod <- compare: dev)
13. Complete the merge to deploy to production
14. Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission
</style></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> 5 Screenshots based on the checklist items for this task</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174218169-6588f1f9-5284-4a24-afd3-ed2f8b7a79e9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the primary page with the checklist items completed<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174218254-4a64fcdf-4564-4fde-bb84-bef6378d8342.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the page after the login link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174218347-d961a716-e7b3-4097-bb1f-3e65572d0fb4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the page after the register link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174218557-7cbdb175-62ca-41f6-b93f-c18cd18be80b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the page after the profile link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/174218614-5df9f84a-f876-4216-94c4-2684e0f08c30.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing the page after the logout link is clicked with URL shown<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>I used the following CSS selector to make the navigation horizontal:<div><div style="color: rgb(212,<br>212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; line-height: 19px;<br>white-space: pre;"><span style="color: #d7ba7d;">nav</span> &gt; <span style="color: #d7ba7d;">ul</span> &gt; <span style="color: #d7ba7d;">li</span>{<span style="color:<br>#9cdcfe;">display</span>:<span style="color: #ce9178;">inline</span>;}</div></div><div style="color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas,<br>&quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;">The selector closely matches the hierarchy for<br>the navigation list articles.</div><div style="color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family:<br>Consolas, &quot;Courier New&quot;, monospace; line-height: 19px; white-space: pre;">The declaration includes the display property<br>and inline value which is what makes the nav horizontal.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>The navigation list item markers were removed upon using the following CSS selector:<div>&lt;span<br>style=&quot;font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; color: rgb(215, 186, 125);&quot;&gt;nav</span><span style="color: rgb(212,<br>212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; background-color: rgb(30, 30, 30);"><br>&gt; </span><span style="font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; color: rgb(215, 186, 125);">ul</span>&lt;span<br>style=&quot;color: rgb(212, 212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; background-color: rgb(30,<br>30, 30);&quot;&gt; &gt; </span><span style="font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; color: rgb(215,<br>186, 125);">li</span><span style="color: rgb(212, 212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre;<br>background-color: rgb(30, 30, 30);">{</span><span style="font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; color: rgb(156,<br>220, 254);">display</span><span style="color: rgb(212, 212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre;<br>background-color: rgb(30, 30, 30);">:</span><span style="font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre; color: rgb(206,<br>145, 120);">inline</span><span style="color: rgb(212, 212, 212); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre;<br>background-color: rgb(30, 30, 30);">;}</span><br></div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <p>To give the navigation bar background, I used the background-color property and set<br>it a value of lightblue.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>To change the surrounding area color for the links on mouser/hover I used<br>the hover selector.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>To change the challenge list bullet points to checkmarks I used the &#39;list-style-type&#39;<br>property and set the value to &quot;<span style="color: rgb(206, 145, 120); background-color: rgb(30,<br>30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; white-space: pre;">✓&quot;</span><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>To make the first character of the h1 tags and anchor tags uppercase<br>I used the text-transform property with a value of capitalize.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>I made the body color lavender by using the background-color property.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>I only changed the body tags.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>I used the query selector on the body and attached an event listener<br>for mouse clicks. Then I used the target and closest methods on the<br>anchor tags and assigned them to a variable. Then I used the if<br>statement to make sure the anchor is not null and passed the text<br>content of the anchor tag clicked to the provided updateCurrentPage method to change<br>the title and h1 tag.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>I used the query selector on the body and attached an event listener<br>for mouse clicks. Then I used the target and closest methods on the<br>anchor tags and assigned them to a variable. Then I used the if<br>statement to make sure the anchor is not null and passed the text<br>content of the anchor tag clicked to the provided updateCurrentPage method to change<br>the title and h1 tag.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>I learned about HTML basics like elements &amp; forms. CSS Selectors are composed<br>of a declaration containing a property and its respective value.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/8">https://github.com/Carlomos7/IT202-450/pull/8</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/M3/challenge.html">https://cs525-prod.herokuapp.com/M3/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-javascript-and-css-challenge/grade/cs525" target="_blank">Grading</a></td></tr></table>