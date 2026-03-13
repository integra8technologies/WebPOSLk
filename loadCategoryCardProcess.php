<?php
include "connection.php";

// 1. Updated Query with INNER JOIN to get the category name
$query = "SELECT * FROM `category`";

$rs = Database::search($query);
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
?>
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all flex flex-col items-start gap-4">

                        <h3 class="text-2xl font-bold text-[#0f2942] tracking-tight">
                            <?php echo $d["name"] ?>
                        </h3>

                        <button onclick="deleteCategory('<?php echo $d['id']; ?>');" 
        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-colors group" 
        title="Delete Category">
    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
    </svg>
</button>
                    </div>
<?php
}
?>