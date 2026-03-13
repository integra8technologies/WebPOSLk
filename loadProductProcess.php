<?php
include "connection.php";

// Get the search term from AJAX
$search = isset($_POST["s"]) ? $_POST["s"] : "";

// Join category so we can display the category name on the card
$query = "SELECT product.*, category.name AS cat_name FROM `product` 
          INNER JOIN `category` ON product.category_id = category.id 
          WHERE product.status = '1'";

if (!empty($search)) {
    $query .= " AND product.product_name LIKE '%" . $search . "%'";
}

$rs = Database::search($query);
$num = $rs->num_rows;

if ($num > 0) {
    // Starting the grid with your specific responsive classes
    echo '<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">';

    while ($data = $rs->fetch_assoc()) {
?>
        <div onclick="addToCart('<?php echo $data['product_id']; ?>', '<?php echo addslashes($data['product_name']); ?>', <?php echo $data['selling_price']; ?>, <?php echo $data['stock_qty']; ?>);"
            class="product-card group bg-white p-3 rounded-2xl border border-slate-200 hover:border-blue-400 hover:shadow-xl hover:shadow-blue-900/5 transition-all cursor-pointer relative">

            <div class="aspect-square bg-slate-50 rounded-xl mb-3 flex items-center justify-center text-slate-300 relative overflow-hidden">
                <?php if (!empty($data['path'])): ?>
                    <img src="<?php echo $data['path']; ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <svg class="w-8 h-8 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                <?php endif; ?>

                <div class="add-overlay absolute inset-0 bg-blue-900/20 opacity-0 flex items-center justify-center">
                    <div class="bg-blue-800 text-white p-3 rounded-full shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <h3 class="text-sm font-bold text-slate-800 truncate px-1"><?php echo $data['product_name']; ?></h3>
            <p class="text-[10px] text-slate-400 mb-2 font-bold uppercase tracking-tighter px-1"><?php echo $data['cat_name']; ?></p>

            <div class="flex items-center justify-between mt-3 px-1">
                <p class="text-sm font-black text-blue-800">Rs.<?php echo number_format($data['selling_price'], 2); ?></p>
                <span style="background-color: #74fa86; color:black;" class="text-[9px] font-bold px-2 py-1 rounded-md">Stock: <?php echo $data['stock_qty']; ?></span>
            </div>
        </div>
<?php
    }
    echo '</div>';
} else {
    echo '<div class="flex flex-col items-center justify-center h-64 text-slate-400 font-medium">No products match your search.</div>';
}
?>