<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Carlos Segarra(cs525)</td></tr>
<tr><td> <em>Generated: </em> 7/20/2022 11:10:02 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180086798-51c166ce-b512-4ff2-bcb6-2e6a2fde103f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of my create products page, which is titled &quot;Sell&quot;<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180087362-e4011983-8560-4851-a281-49e053a2080e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing products table. Last entry is the product created in the previous screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>To access the add products page, the user must have an &quot;Admin&quot; role.<br>A form is populated with respective fields for the columns we want the<br>user to enter data for. If the submitted data is valid, it will<br>be inserted into the table using the sava_data function. This function takes in<br>the table name (Products) and the POST array, which contains all the data<br>gathered by the input fields in the form. First, a query for inserting<br>in the table is set to a variable. Then, a column variable is<br>set by filtering the values of the POST array. The callback function used<br>here inherits the $ignore variable and returns it if it is in the<br>array. Next placeholders are set via array_map function(), which uses a function to<br>append &#39;:&#39; to each item in the $column. Next, params are set to<br>an empty bracket and then built out by a for each loop. Here<br>the placeholders are set to their respective values from POST. Finally, the query<br>is prepared and executed according to the parameters. Upon success, the last inserted<br>ID should be returned; otherwise, -1.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/51">https://github.com/Carlomos7/IT202-450/pull/51</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/add_products.php">https://cs525-prod.herokuapp.com/Project/admin/add_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180096000-6a9e74ec-1d6e-4619-9254-f40342158ec7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing screenshots of shop page with 10 results<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180096258-ec3e1526-4658-45d0-b057-57c9f4eeb3c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Searched for sample products under name &quot;same&quot; and aplied Cost and Down filters/sortings<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180096473-d181aa01-eae4-432c-bd56-ec3732c6ea87.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing category filter for &quot;technology&quot;. The card headers indicate the category as well<br>for reference<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180098315-0abdcd90-151d-45ad-8fa0-20f429367dd0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing dropdown list for categories. This is also used in the sorts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180096756-b3bbf8fa-c770-43f0-a325-a73663ea2acf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>I am attempting to filter by columns( cost, stock, name, created) , partial<br>name match, and category. I am also attempting to sort in ascending and<br>descending order<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180097175-7a420b4c-1c1b-4923-9361-49e97d48a005.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to execute statement based on params changed in the if statements. I<br>also attempted to select distinict values from the category column in Product.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <div>Results are shown on a case-by-case basis.&nbsp;</div><div><br></div><div>Filters</div><div>If the user has an Admin role,<br>then products with false visibility (0) will be shown.</div><div>If the shop search bar<br>value is not empty, products with similar names will be shown.</div><div>If the category<br>value is not empty, then products with the category selected will be shown.</div><div>Sorting</div><div>If<br>the col value and the order value are not empty, the products will<br>be filtered by col in either ascending or descending order.</div><div>The user selects these<br>values on the front end. I have implemented drop-downs as shown in the<br>screenshots.</div><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/55">https://github.com/Carlomos7/IT202-450/pull/55</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/shop.php">https://cs525-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180098777-ff05d41a-959a-46e7-8f25-47b3ef858a07.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing alll products as populated by just click &quot;enter.&quot; Here i have also<br>highlighted a product with visibility false (0).<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <div>The user specifies what product they want to see from the form input.<br>This sets the "productName" in the POST array. If this product name is<br>set then, the php gets the database and prepares a query to select<br>to id, name, description, category, stock, cost, image, and visibility, from the Products<br>table where the name for the product is like the placeholder (:name). This<br>comparison is further extended in the execute[] parameters. It uses the placeholder(":name") and<br>%s to look for matches similar to "productName."</div><div><br></div><div>Note: The matches in question are<br>populated as a table, and this will include any possible matches.</div><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/51">https://github.com/Carlomos7/IT202-450/pull/51</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/list_products.php">https://cs525-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101166-9dc7b521-6bcd-469a-b45f-186b1977737c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button is accessible on shop page with admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101205-bd720a2d-1bb2-4641-bd06-d2af5e6a91d9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button is accessible on product details page with admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the edit button visible to the Admin on the Admin Product List Page (The admin page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180099133-0bbd27e3-935c-4c85-8fb4-299bee4f302c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button is accessible on product list admin page with admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101498-f0fd294d-4e98-408a-bfe2-75c31ccfea98.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before editing a product<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101589-111068dd-fe56-47af-a848-7c2cf913f06b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Editing product via Product edit page accesible only to admins<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101659-692c5445-2a2d-4c33-b0a4-49249552b90f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After editing a product<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <div>When a user of role Admin clicks the edit button, they are redirected<br>to the product's edit page. The GET array will already have the 'id'<br>variable set.</div><div>Next, a variable for an array of columns in the Products table<br>is set, and an ignore variable is set for what columns to ignore.<br>Then, the 'id' in the GET array is set to variable $id. After<br>that, the query is prepared to select the record that matches the id<br>in the GET array. This is further specified in the execute parameters. Upon<br>successfully selecting the record from the products table, an input form of method<br>POST will be created with fields not specified in the ignore variable.&nbsp;</div><div>Note: the<br>map_column function sets each input field to accept types corresponding to the table.</div><div><br></div><div>The<br>POST array will have a "submit" set if the user submits the data.<br>Then the table will be updated via the update_data() function, which takes the<br>table name, the id in the GET array, and the POST array (which<br>has all the data to be inserted).</div><div>To update the data, the columns from<br>POST are set to a variable. Then the values "id" and "submit are<br>removed from the array. Next, the query is built to update the table's<br>corresponding values. The params in the execute specify that the id in GET<br>must match the id in the Products table to be applied. Upon success,<br>this returns true.</div><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/51">https://github.com/Carlomos7/IT202-450/pull/51</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/52">https://github.com/Carlomos7/IT202-450/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/admin/edit_products.php?id=3">https://cs525-prod.herokuapp.com/Project/admin/edit_products.php?id=3</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101890-0489eef5-f4da-49b8-9ae2-f4ea4036555e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The link is accessible via the product name on product card in the<br>shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180101981-e03f1271-c8ee-4354-bcc6-5f508d3fe726.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Product details page for item with id 3<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <div>Users who click on a product for more info are redirected to the<br>product's detail page. The GET array will already have the 'id' variable set.</div><div>Next,<br>A variable for an array of columns in the Products table is set,<br>and an ignore variable is set for what columns to ignore. Then, the<br>'id' in the GET array is set to variable $id. After that, the<br>query is prepared to select the record that matches the id in the<br>GET array. This is further specified in the execute parameters. An HTML card-like<br>product is built after successfully selecting the record from the products table. I<br>borrowed ideas from the edit product page but didn't make a form input<br>for the product.</div><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/55">https://github.com/Carlomos7/IT202-450/pull/55</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/55">https://github.com/Carlomos7/IT202-450/pull/55</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/product_details.php?id=3">https://cs525-prod.herokuapp.com/Project/product_details.php?id=3</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180102204-46f18d99-82d3-4fcd-ad86-c239401e4ef8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success message when adding to crt<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180102345-bd997c3d-77af-4e59-9444-ce074bbcbd72.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before clicking add to cart while not logged in<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180102399-07bd1cd8-238d-40c3-8a1d-722d8d88f727.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After clicking add to cart while not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180102471-580d8bb0-5d34-4728-bad1-5d708e0c8490.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cart table with products<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>For my cart page, I went with the recommended approach where the user<br>can only have one cart, and the user_id and product_id are unique composite<br>keys.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>A form input of method POST gathers the product id and desired quantity<br>and adds it to cart.php when the user clicks add to cart. The<br>action for clicking add to cart has a value of add.&nbsp;<div><br><div>On the cart<br>page, if the action is not empty and equals &quot;add,&quot; a query will<br>be prepared to insert the product_id, desired_quantity, unit_price, user_id, and select the cost<br>from the products table where the id matches the product being added. It<br>also updates the desired_quantity to plus equal itself should the user add it<br>to the cart again. Then the values for product id, desired quantity, and<br>user od are bound to their respective placeholders and ensured to be ints.<br>Next, the statement is executed, adding the product to the cart.</div></div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/52">https://github.com/Carlomos7/IT202-450/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180104331-e513ede9-f57e-46d1-8395-527645513138.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Mouse is hovering over product details link on cart page. Showing subtotal, total,<br>update quantity, checkout, and clear cart.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>The user&#39;s cart is pulled from the cart database. The query selects items<br>from the cart that match/line up in the cart and products table. What<br>the cart has for the user&#39;s unit_price is multiplied by what the cart<br>has for the desired quantity to equal a subtotal. I built a table<br>with these values for each item in the cart. If there is anything,<br>the subtotal will be calculated and displayed for each item. A total variable<br>with preset to 0 and calculated by adding the subtotal each time a<br>row is created.<div><br></div><div>The cart pulled is always the latest information from the table.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/52">https://github.com/Carlomos7/IT202-450/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/cart.php">https://cs525-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180104585-6471a74e-7798-48a6-8571-a3207ff3a8a1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before quantity update. Last item has a quantity of 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180104639-4def1701-d00d-4b12-ba91-01edf9fc0481.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After quantity update. Last item has a quantity of 1. Success Message for<br>updating quantity at the top<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180104808-96f9d16c-2575-4d65-9ad0-cfca62f5bda2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before setting quantity to 0 on last item. Mouse hovering over Update Qauntity<br>button<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180104939-a190f08e-3bde-4757-aa86-c24c68d551f7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After setting quantity to 0 on last item. Success Message for updating quantity<br>at the top<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105021-73eefa7b-7ddd-4187-8cd4-33a9afe92431.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before setting negative quantity on last item (-1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105116-b86f2d12-c6e7-44f7-aefd-39aa9c87a0b9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After setting negative quantity on last item<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>If the action equals update, then the query will be set to Update<br>the cart table and set the desired quantity for the respective cart id<br>and user id.<div><br></div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/52">https://github.com/Carlomos7/IT202-450/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105202-719bb3c2-7cbe-4e57-b099-3191555d507d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before deleting last item from cart (Xbox)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105263-0d9fd37b-fce8-426e-bfb4-abaf7622b057.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After deleting last item from cart (xbox is no longer there). Product deleted<br>message at the top<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105395-2c77a7c1-6614-4ccd-8622-6879d24f5e51.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing three itmes in cart before clicking clear cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180105473-efd14032-6cb3-4794-8ed5-510689c50f51.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing empty cart after clicking clear cart. Cart cleared message at the top<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>If the action is &quot;delete,&quot; then the query is to delete the record<br>from the cart table where the id is equivalent to the cart id<br>and is the respective user id.<div><br></div><div>The clear function I did is more straightforward:<br>delete every Cart table record.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Carlomos7/IT202-450/pull/52">https://github.com/Carlomos7/IT202-450/pull/52</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180106219-ef712d26-0650-4b30-aa8d-556a6a75aa53.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Completed project board issues (1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/106279547/180106174-3cda1769-a156-4193-997a-3b38c5b01dbe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Completed project board issues (2)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your herok prod project's login page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://cs525-prod.herokuapp.com/Project/login.php">https://cs525-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-shop-project/grade/cs525" target="_blank">Grading</a></td></tr></table>