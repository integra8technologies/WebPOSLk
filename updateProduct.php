<?php
include "connection.php";
if (isset($_GET["id"])) {
    $pid = $_GET["id"];
    $product_rs = Database::search("SELECT * FROM `product` WHERE `product_id` = '$pid'");
    $product_data = $product_rs->fetch_assoc();
} else {
    header("Location: productManagement.php");
    exit();
}
?>

<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | Integra8</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 h-full font-['IBM_Plex_Sans']">
    <div class="max-w-5xl mx-auto py-10 px-6">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <nav class="flex text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 gap-2">
                    <a href="productManagement.php" class="hover:text-blue-800">Inventory</a>
                    <span>/</span>
                    <span class="text-slate-800">Update Product</span>
                </nav>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Edit Item: <span class="text-blue-800"><?php echo $pid; ?></span></h1>
            </div>
            <button onclick="updateProduct();" class="px-6 py-3 bg-blue-800 text-white rounded-xl font-bold text-sm shadow-lg shadow-blue-800/20 hover:bg-blue-900 transition-all flex items-center gap-2">
                Save Changes
            </button>
        </div>

        <div class="grid grid-cols-3 gap-8">
            <div class="col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6 border-b border-slate-100 pb-4">General Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Product Name</label>
                            <input type="text" id="n" value="<?php echo $product_data['product_name']; ?>" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Cost Price (Rs.)</label>
                                <input type="number" id="cp" value="<?php echo $product_data['cost_price']; ?>" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Selling Price (Rs.)</label>
                                <input type="number" id="sp" value="<?php echo $product_data['selling_price']; ?>" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6 border-b border-slate-100 pb-4">Inventory Logic</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Stock Quantity</label>
                            <input type="number" id="qty" value="<?php echo $product_data['stock_qty']; ?>" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Availability Status</label>
                            <select id="st" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none">
                                <option value="1" <?php if($product_data['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if($product_data['status'] == 0) echo 'selected'; ?>>Inactive / Hidden</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm text-center">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-4 text-left">Product Image</label>
                    <div class="w-full aspect-square bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden mb-4 group cursor-pointer relative">
                        <img src="<?php echo !empty($product_data['path']) ? $product_data['path'] : ''; ?>" id="prev" class="w-full h-full object-cover">
                        <input type="file" id="img" class="absolute inset-0 opacity-0 cursor-pointer" onchange="changeImage();">
                    </div>
                    <p class="text-[10px] text-slate-400 font-medium leading-relaxed">Recommended size: 800x800px. Click image to upload a new one.</p>
                </div>
                
                <button onclick="window.history.back();" class="w-full py-4 text-slate-500 font-bold text-sm hover:text-slate-800 transition-all">Cancel & Return</button>
            </div>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>