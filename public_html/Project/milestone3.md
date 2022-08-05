<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 8/4/2022 11:29:29 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Orders will be able to be recorded </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182977223-48125bb7-5fa7-42c6-87bc-43323ed51e0d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Orders table with valid data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182977263-e849bf8f-c7d5-4999-aa7a-9771ed146dc9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of OrderProducts table with valid data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182982494-d5c1b420-ecf4-484c-b139-cd2f3a73c968.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Checkout (purchase) form UI with cart summary to the right<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot showing the items pending purchase from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182982612-e9fdac55-3c22-4460-93ba-3a884a23036f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout summary pictured to the far right. The orginal price for the marker<br>was $1, it has gone up $1 so that&#39;s a 100% increase as<br>seen.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182983045-c2136f09-ee6c-42b1-aeeb-82b8af49f9dd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Javascript validations for onsubmit=&quot;validate(this)&quot; in POST method checkout form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182983326-fc6e8674-125c-4984-a687-c5dd04585039.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Server-side validation for form entries before submitting<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a screenshot showing the Order Process validations from the UI (Heroku)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182984817-d1c7abfc-7af4-4bd4-b7d3-de1d8348686c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing product out of stock message for product with stock = 0 from<br>Products Table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182985318-8f2635ea-5800-42a1-9699-caa6f50bfbcf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before purchasing with the incorrect amount. Total is 150, I am entering 125<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182985434-7c35ab00-bcb1-483e-b778-2ede84be3e71.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After trying to place order. Message tells me I can&#39;t afford the items<br>in my cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <ul><li>User adds an item to their cart. This updates the cart table with<br>desired quantity, product cost, product name, and subtotal (desired quantity * product cost)</li><li>On<br>the cart page, the user clicks the checkout button. This sends the user<br>to checkout.php</li><li>The user fills out the checkout form. If the form variables are<br>valid they can be inserted into the orders table.</li><li>The cart values for the<br>user are selected from the database. Also, the total cost is calculated and<br>assigned to a variable</li><li>If the user can afford the total cost of the<br>cart then the transaction can begin</li><li>A query to insert the user information (address,<br>payment method, money received, etc.) along with the total cost is prepared and<br>then executed.&nbsp;</li><li>Then the next order id (previously set to 0) is set to<br>the last inserted id of the orders table</li><li>if the next order id is<br>greater than 0 then a query to update the products table's stock from<br>the user's purchase is prepared and then executed (deducting stock)</li><ul><li>if there is an<br>error then the transaction is rolled back and the user will get a<br>message indicating the error (product out of stock or product desired amount more<br>than stock)</li></ul><li>Then if the next order id is greater than 0 the cart<br>details are copied into the OrderProducts with the orderid from the previous steps<br>(last inserted)</li><li>Next if the order is greater than 0 the cart table's entries<br>are deleted</li><li>finally if the next order id exist/is true then the changed are<br>committed</li></ul><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/68">https://github.com/Carlomos7/IT202-450/pull/68</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/69">https://github.com/Carlomos7/IT202-450/pull/69</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/53">https://github.com/Carlomos7/IT202-450/pull/53</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/75">https://github.com/Carlomos7/IT202-450/pull/75</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/checkout.php">https://cs525-prod.herokuapp.com/Project/checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182985858-7c7f7350-727b-4923-a035-cf697bd267b6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of order confirmation page with info derivered from the Orders and OrderProducts<br>table. Additionally, there is a thank you message at the top.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>Upon successful checkout, the user is sent to the confirmation page. I made<br>it so that the link is order_confirmation.php has an id equivalent to next_order_id<br>(ex: order_confirmation/php?id=1). The order id is retrieved from the GET array.&nbsp; The query<br>selects from the OrderProducts table and uses&nbsp; INNER JOINs from Orders and Products<br>where the user&#39;s id matches the one associated with the order and the<br>order id matches the one from the GET array.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/70">https://github.com/Carlomos7/IT202-450/pull/70</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/order_confirmation.php?id=18">https://cs525-prod.herokuapp.com/Project/order_confirmation.php?id=18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/order_confirmation.php">https://cs525-prod.herokuapp.com/Project/order_confirmation.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182986270-e2a8a538-57bf-44b9-abb9-aa9679666191.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Purchase History page. Also shows that orders are clickable links to<br>the order details page. (Ex: Order No: 8)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182986544-fe5cf023-487b-4f21-949b-526ea21a8b1a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Order Details page without thank you message from order confirmaiton page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <div>Similar to the order confirmation page I grabbed the order id from the<br>associative array populated by the selection query. I tacked this on to the<br>order_details.php link for each order. (ex: order_detail.php?id=2). The order id is retrieved from<br>the GET array.&nbsp; The query selects from the OrderProducts table and uses&nbsp; INNER<br>JOINs from Orders and Products where the user's id matches the one associated<br>with the order and the order id matches the one from the GET<br>array.<br></div><div><div><br></div><div><br></div></div><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/71">https://github.com/Carlomos7/IT202-450/pull/71</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/72">https://github.com/Carlomos7/IT202-450/pull/72</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/73">https://github.com/Carlomos7/IT202-450/pull/73</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/purchase_history.php">https://cs525-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182988382-4e610c85-021d-4692-a819-db30d7d2e9fa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of purchase history from Admin perspective. Showing username of respective user who<br>placed the order. Indicated by @ symbol. Ordernumbers are hyperlinks to order details<br>page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182988753-e0387343-4415-4278-acec-2e5d869cce85.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Order Details page from non-admin perspective<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>For a regular user, the query selects fields from the Orders table where<br>the user id matches their own. For each order entry, I populate a<br>card content container with a summary of the order. In contrast, for the<br>Admin, I used an if statement to omit the part of the query<br>matching the user&#39;s own id. This allows the admin user to see all<br>users&#39; purchase history.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/71">https://github.com/Carlomos7/IT202-450/pull/71</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/72">https://github.com/Carlomos7/IT202-450/pull/72</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/73">https://github.com/Carlomos7/IT202-450/pull/73</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/77">https://github.com/Carlomos7/IT202-450/pull/77</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/purchase_history.php">https://cs525-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart page showing the button to place an order</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182988884-eb691c38-eaab-4eeb-9729-7d63433a84ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of cart page with checkout button to go to checkout page. From<br>the checkout page the user can place an order<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182989112-beb7dce5-96c4-4ef5-a0f1-d1b5125d9673.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot part 1 of completed project board issue for milestone3. &quot;Done&quot; column header<br>shown in part 2.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/182989242-53faa671-37f8-4b20-99bb-ace6ad9130b6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot part 2 of completed project board issue for milestone3<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>