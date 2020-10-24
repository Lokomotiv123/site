
<?php 
// підключення БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "Головна";
// підключення хедера
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';

// підлючення файлу пагінації
include 'modules/products/pagination_product.php';


?>
<!-- створення категорій товарів та карток товарів -->
<div class="container" >
	  <div class="row  m-2">
		  <div class="col-3">
		   <?php
		   		// приєдную навігацію по категоріям
			   include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
		    ?>

		  </div>

		  <!-- блок карток товарів -->
		  <div class="col-9">

			  	<div class="container">
						  		
					<div class="row" id="products">

						<?php 

						// Запит на виведення записів лімті обмежуєтья кількістю $kol та через кількість товарів $art
						$result = $conn->query("SELECT * FROM products LIMIT $kol OFFSET " . $art);
						// поки наявний результат виводимо товари
						while ($row = mysqli_fetch_assoc($result)) {

							include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';

						}
						
						?>
						
					</div>

					<?php
					/*
					1. Вивести блок з корозиною done
					2. Таблицю в базі данних для збереження замолвень done
					3. Додавання товарів в корзину done
					 3.1 Зробити клік по кнопці довити в корзину done
					 3.2 Добавити товар в кукі корзини done
					 3.3 Відобразити що товар добавився на корзині done
					4. Зробити сторінку корзини
					5. Зробити оформлення замовлень
					*/

					 ?>

					 <!-- кнока пагінації та виведення додаткових товарів на екран -->
					<div class="row">
						<div class="col-4 offset-5">
							<input type="hidden" value="1" id="current-page" >
							<button class="btn btn-primary btn-lg" id="show-more" > Показати ще</button>

						</div>

					</div>

					<?php
					// формуємо пагінацію
					for ($i = 1; $i <= $str_pag; $i++){
						// підключаю файл кодом пагінації
						include 'parts/pagination.php';
					}
					
					 ?>

			  	</div> 

		  </div><!-- /.col-9-->

		</div> <!-- row  m-2-->
</div> <!-- /.container -->

<?php
// підключаємо футер (нижній колонтитул) 
include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';

?>