<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 8/7/2022 9:55:18 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone4 branch</li><li>Create a new markdown file called milestone4.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone4.md</li><li>Add/commit/push the changes to Milestone4</li><li>PR Milestone4 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes</li><li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183316904-0300bb63-e315-4e54-95e5-eb5a97726098.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing new column, visibility, with tinyint value for true false<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183317439-f12976c1-f8e0-4fe3-8480-b9c9c137c338.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile edit view with new &quot;View Proifle&quot; button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183317498-b1bef529-fc4b-4dc0-98cb-5f7bb40503c6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile view view with new user&#39;s ratings on products and &quot;Edit Profile&quot; button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/88">https://github.com/Carlomos7/IT202-450/pull/88</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/profile.php">https://cs525-prod.herokuapp.com/Project/profile.php</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>Profile visibility is a new column added to the Users table. By default,<br>profile visibility is set to private (false). A user can update their profile&#39;s<br>visibility to the public (true) by selecting the &quot;Toggle Visibility&quot; in the edit<br>form view and clicking &quot;save changes&quot; (submit). Upon submitting, the visibility value is<br>retrieved from the GET array and passed into the respective parameters. Once executed,<br>the value is updated with any other form data in the Users table.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183318097-692e820e-b41d-4251-8bf6-7b4f2c056926.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Ratings table with data. There are (NULL) values for some product ids but<br>this was  from orginal testing and can no longer happen.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183322945-fd0c2ac9-c66c-4191-9c42-3bbc0c7fbc6b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated reviews on product details page. Per-page = 2.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183323049-e2b4adc1-390a-4f2d-bcff-e0a5d0ae4e94.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>2nd page of product details reviews. The rating range bar is how users<br>input ratings.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183318438-2fa458f7-e39e-4aab-ae93-9a4fcd85b8ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before uploading a review on a product the user hasn&#39;t bought<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183318358-f04d9c11-7a94-4023-89d0-f52a79309d01.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message recieved upon trying to upload a review from a product a<br>user hasn&#39;t bought<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/89">https://github.com/Carlomos7/IT202-450/pull/89</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/90">https://github.com/Carlomos7/IT202-450/pull/90</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/product_details.php?id=20&page=1">https://cs525-prod.herokuapp.com/Project/product_details.php?id=20&page=1</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <div>First, I verified on the client and server-side if the rating is between<br>1 and 5, if the message contains anything, if there's a product id<br>in the GET array, and if the user has previously purchased this product.<br>To check if the user has the product in their purchase history, I<br>selected from Orders, and inner joined it with the OrderProducts table where the<br>product id from the product detail and the user id matches those in<br>the OrderProducts. If anything is returned upon execution, the user has a history<br>of purchasing the product. If any checks didn't pass, I update a variable<br>called hasError and set it to true. Assuming no errors, the rating can<br>be inserted into the Ratings table. I select the product id, rating number,<br>and comment from the GET array. The user_id is retrieved from get_user_id(). Also,<br>if there's a duplicate entry, the user is flashed with a message saying<br>they cannot upload more than one review.</div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183319731-b295f061-7431-49e7-b5e2-315c4814ecd0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated purchase history filtered by 8/4/22 to 8/6/22 and sorted by total lowest<br>to highest.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/90">https://github.com/Carlomos7/IT202-450/pull/90</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/purchase_history.php?fromdate=2022-08-04&todate=2022-08-06&col=total_price&order=asc">https://cs525-prod.herokuapp.com/Project/purchase_history.php?fromdate=2022-08-04&todate=2022-08-06&col=total_price&order=asc</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183319903-977ebdbb-8b23-4ce3-9e02-69464de73ec5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated store owner purchase history filtered by 8/4/22 and sorted by total descending<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/90">https://github.com/Carlomos7/IT202-450/pull/90</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/all_purchase_history.php?searchOrders=&fromdate=2022-08-04&todate=&col=total_price&order=asc">https://cs525-prod.herokuapp.com/Project/admin/all_purchase_history.php?searchOrders=&fromdate=2022-08-04&todate=&col=total_price&order=asc</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>After creating the selection query and executing it based on the sorts and<br>filters, I used a for loop through each record and added the total_price<br>to a total value set outside the for loop. This updates each time<br>the sorts and filters change the query.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183320792-79a51d6a-8de3-494e-a956-efea370bb0b8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated shop page sorted by stock on the second page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/58">https://github.com/Carlomos7/IT202-450/pull/58</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/shop.php?searchShop=&col=stock&order=asc&page=2">https://cs525-prod.herokuapp.com/Project/shop.php?searchShop=&col=stock&order=asc&page=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183321091-8f7db7c6-8ba3-4a9e-9f68-3353009ce285.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated List Products page sorted by stock ascending. All out of stock items<br>are zero so they are at the top.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/92">https://github.com/Carlomos7/IT202-450/pull/92</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/list_products.php?productName=&productStock=&col=stock&order=asc">https://cs525-prod.herokuapp.com/Project/admin/list_products.php?productName=&productStock=&col=stock&order=asc</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>I implemented sorting by stock, created, and category. It&#39;s similar to sorting and<br>filtering applied to the shop page. If sort by stock on ascending (up)<br>is selected the query will be updated to ORDER BY stock ASC.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183321494-b4db6062-6d2e-4d58-aa3f-5a42e35d1328.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Paginated shop page sorted by rating low to high on second page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183321582-bd3b3d21-a51b-42f2-b6a1-ea2a86e38fd9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of products table with new average rating column. The (NULL) values have<br>not been updated yet.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/93">https://github.com/Carlomos7/IT202-450/pull/93</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/shop.php?searchShop=&col=average_rating&order=asc&page=2">https://cs525-prod.herokuapp.com/Project/shop.php?searchShop=&col=average_rating&order=asc&page=2</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on shop</td></tr>
<tr><td> <em>Response:</em> <p>On the products details page, in the try statement for inserting ratings into<br>the Ratings table. I have an update query to update the average rating<br>column in the products table from the average rating selected from the Ratings<br>table (AVG(Ratings. rating)) where the product ids are equivalent. The product_id placeholder check<br>is pulled from the GET array.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/183322511-00369dc0-9d86-4693-b178-b83f75ebf3c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of all completed issues on project board for milestone4<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>