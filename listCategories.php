<div class="col-md-3">
					<p class="lead">
						Драмски видови
					</p>
					
					<div class="list-group">
						<?php		
						 $id=0;				
								if (isset($_GET['id'])) {
								    $id=$_GET['id'];
								}
						$categories=mysqli_query($link, "SELECT * FROM categories");
						while ($cat=mysqli_fetch_assoc($categories)) {
							$tmp=$cat['categoryId'];	
							//proverka koja kategorija e aktivna , za da se dodeli soodvetnata klasa :)
							if($id==$tmp){
								$class="list-group-item  active";
							}
							else{
								$class="list-group-item";
							}		
							
					?>
						<a href='<?php echo "ItemsFromCategory.php?id=$tmp"?>' class='<?php echo $class ?>'><?php echo$cat['category_name'] ?></a>
							<?php } ?>
					</div>
	</div>