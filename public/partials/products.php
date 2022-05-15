<?php

include_once("./config/Item.php");

$Item = new Item();

$results = $Item->getAllItems();


?>

<div class="bg-white">
  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-4xl font-bold my-20">All Products</h2>

    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <?php while ($rows = mysqli_fetch_array($results)) { ?>
        <form action='./config/RequestHandler.php' method='GET'>
          <a href="#" class="group">
            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
              <img src="<?php echo $rows["img"]; ?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700"><?php echo $rows["name"]; ?></h3>
            <div class="flex justify-between">
              <div class="w-8">
                <p class="mt-1 text-lg font-medium text-gray-900"><?php echo $rows["price"] ?></p>
              </div>
              <div class="w-8">
                <?php echo '<input type="hidden" name="addItem" value="' . $rows["id"] . '">' ?>
              </div>
            </div>
            <input type="number" class="form-control" name="quantity" value="1">
            <div class="product-btn">
              <button class="bg-gray-800 text-white p-2 rounded-lg">
                ADD TO CART
              </button>
            </div>
        </form>
        </a>
      <?php } ?>

      <!-- More products... -->
    </div>
  </div>
</div>