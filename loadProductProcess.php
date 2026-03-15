<?php
include "connection.php";

$search = isset($_POST["s"]) ? $_POST["s"] : "";

$query = "SELECT product.*, category.name AS cat_name FROM `product` 
          INNER JOIN `category` ON product.category_id = category.id 
          WHERE product.status = '1'";

if (!empty($search)) {
    $query .= " AND product.product_name LIKE '%" . $search . "%'";
}

$rs = Database::search($query);
$num = $rs->num_rows;

if ($num > 0) {
    // 1. Define the grid container OUTSIDE the loop
    // Mobile: 2 cols | Tablet (md): 3 cols | Desktop (lg): 4 cols | Wide (xl): 5-6 cols
    echo '<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3 md:gap-5">';

    while ($data = $rs->fetch_assoc()) {
?>
        <div onclick="addToCart('<?php echo $data['product_id']; ?>', '<?php echo addslashes($data['product_name']); ?>', <?php echo $data['selling_price']; ?>, <?php echo $data['stock_qty']; ?>);"
            class="product-card group bg-white p-2 md:p-4 rounded-2xl border border-slate-200 hover:border-blue-400 hover:shadow-xl hover:shadow-blue-900/5 transition-all cursor-pointer flex flex-col justify-between">

            <div class="aspect-square bg-slate-50 rounded-xl mb-3 flex items-center justify-center text-slate-300 relative overflow-hidden">
                <?php if (!empty($data['path'])): ?>
                    <img src="<?php echo $data['path']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php else: ?>
                    <svg class="w-8 h-8 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                <?php endif; ?>

                <div class="add-overlay absolute inset-0 bg-blue-900/10 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-all">
                    <div class="bg-blue-800 text-white p-2 md:p-3 rounded-full shadow-lg">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex-1">
                <h3 class="text-[13px] md:text-sm font-bold text-slate-800 line-clamp-2 px-1 leading-tight mb-1">
                    <?php echo $data['product_name']; ?>
                </h3>
                <p class="text-[9px] md:text-[10px] text-slate-400 font-bold uppercase tracking-tight px-1">
                    <?php echo $data['cat_name']; ?>
                </p>
            </div>

            <div class="mt-3 px-1">
                <p class="text-[13px] md:text-sm font-black text-blue-800">
                    Rs. <?php echo number_format($data['selling_price'], 2); ?>
                </p>
                <div class="flex items-center justify-between mt-1">
                    <span class="text-[8px] md:text-[9px] font-bold px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-700">
                        Stock: <?php echo $data['stock_qty']; ?>
                    </span>
                </div>
            </div>
        </div>
<?php
    }
    echo '</div>'; // End Grid
} else {
    echo '<div class="flex flex-col items-center justify-center h-64 text-slate-400 font-medium">
            <svg class="w-12 h-12 mb-2 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            No products match your search.
          </div>';
}
?>