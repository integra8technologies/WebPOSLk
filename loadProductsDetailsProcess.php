<?php
include "connection.php";

// Capture the search term if it exists
$search = isset($_POST["s"]) ? $_POST["s"] : "";

// Base Query
$query = "SELECT product.*, category.name AS cname FROM `product` 
          INNER JOIN `category` ON product.category_id = category.id";

// 1. Filter by Search Term (Name or SKU)
if (!empty($search)) {
    $query .= " WHERE (product.product_name LIKE '%$search%' OR product.product_id LIKE '%$search%')";
}

$query .= " ORDER BY product.product_name ASC";

$rs = Database::search($query);
$num = $rs->num_rows;

if ($num > 0) {
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
?>
        <tr class="hover:bg-slate-50/50 transition-colors">
            <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-slate-100 rounded-lg border border-slate-200 flex items-center justify-center overflow-hidden">
                        <?php if(!empty($d["path"])): ?>
                            <img src="<?php echo $d["path"]; ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="font-semibold text-slate-800"><?php echo $d["product_name"] ?></div>
                        <div class="text-xs text-slate-500 font-mono"><?php echo $d["product_id"] ?></div>
                    </div>
                </div>
            </td>
            
            <td class="px-6 py-4 text-sm text-slate-600"><?php echo $d["cname"] ?></td>
            
            <td class="px-6 py-4 text-sm font-bold text-slate-800">Rs. <?php echo number_format($d["cost_price"], 2) ?></td>
            <td class="px-6 py-4 text-sm font-bold text-slate-800">Rs. <?php echo number_format($d["selling_price"], 2) ?></td>
            <td class="px-6 py-4 text-sm text-slate-600"><?php echo $d["stock_qty"] ?> Units</td>
            
            <td class="px-6 py-4">
                <?php if($d["status"] == 1): ?>
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-[11px] font-bold rounded-full uppercase">Active</span>
                <?php else: ?>
                    <span class="px-2.5 py-1 bg-red-100 text-red-700 text-[11px] font-bold rounded-full uppercase">Inactive</span>
                <?php endif; ?>
            </td>

            <td class="px-6 py-4 text-right">
                <div class="flex justify-end gap-2">
                    <button onclick="editProduct('<?php echo $d['product_id']; ?>');" 
                            class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Edit">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button onclick="deleteProduct('<?php echo $d['product_id']; ?>');" 
                            class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr><td colspan="7" class="px-6 py-10 text-center text-slate-400 font-medium tracking-tight">No products found matching your search.</td></tr>';
}
?>