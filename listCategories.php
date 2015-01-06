<div class="col-md-3">
					<p class="lead">
						Драмски видови
					</p>
					
					<div class="list-group">
						<?php	
						 include_once 'delete_reservations.php';
						//citanje na ID-to pratu preku get baranje	
						 $id=0;				
								if (isset($_GET['id'])) {
								    $id=$_GET['id'];
								}
						$categories=mysqli_query($link, "SELECT * FROM genres");
						while ($cat=mysqli_fetch_assoc($categories)) {
							$tmp=$cat['id'];	
							//proverka koja kategorija e aktivna , za da se dodeli soodvetnata klasa :)
							if($id==$tmp){
								$class="list-group-item  active";
							}
							else{
								$class="list-group-item";
							}		
							
					?>
						<a href='<?php echo "ItemsFromCategory.php?id=$tmp"?>' class='<?php echo $class ?>'><?php echo$cat['name'] ?></a>
							<?php } ?>
					</div>
					<!--facebook integration  -->
					
		
		<div width="262px" class="fb-like-box" data-href="https://www.facebook.com/etheatremk" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>		
	
		
					
	</div>
	
		