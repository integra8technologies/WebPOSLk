<?php
include "connection.php";
session_start();

// Final Gatekeeper Logic
if (isset($_SESSION["a"])) {
    $user = $_SESSION["a"];
?>
    <!doctype html>
    <html lang="en" class="h-full">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Product | WebPOSLk</title>
        <script src="https://cdn.tailwindcss.com/3.4.17"></script>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'IBM Plex Sans', sans-serif;
            }

            body {
                background-color: #f8fafc;
            }
        </style>
    </head>

    <body class="h-full overflow-hidden flex flex-col">
        <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-4">
                <a href="productManagement.php" class="p-2 hover:bg-slate-100 rounded-lg text-slate-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-xl font-bold text-slate-800">Create New Product</h1>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 scrollbar-thin">
            <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h2 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6">General Information</h2>
        <div id="msgDiv1" class="mb-4">
    <div class="text-xs font-bold text-rose-500" id="msg1"></div>
</div>

        <div id="msgDiv1" class="mb-4">
            <div class="text-xs font-bold text-rose-500" id="msg1"></div>
        </div>

        <div class="space-y-4">
            <div>
    <label class="block text-xs font-bold text-slate-500 mb-1">Product Id</label>
    <input type="text" id="product_id" 
        value="<?php echo "PRD-" . strtoupper(substr(md5(time()), 0, 8)); ?>" 
        readonly
        class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-sm outline-none text-slate-500 cursor-not-allowed">
</div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1">Product Name</label>
                <input type="text" id="product_name" placeholder="Wireless Mechanical Keyboard" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h2 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6">Pricing & Inventory</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1">Category</label>
                <select class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none" id="product_category">
                    <option value="0">Select Category</option>
                    <?php
                    $rs = Database::search("SELECT * FROM `category`");
                    while ($data = $rs->fetch_assoc()) {
                        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1">Cost Price ($)</label>
                <input type="number" id="product_base_price" placeholder="0.00" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1">Selling Price ($)</label>
                <input type="number" id="product_cost_price" placeholder="0.00" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1">Stock Quantity</label>
                <input type="number" id="product_qty" placeholder="0" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none">
            </div>
        </div>

        <h2 class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 mt-6">Product Image</h2>
        <div class="bg-white border border-slate-200 rounded-2xl p-1 shadow-sm">
            <label for="file-upload" class="relative border-2 border-dashed border-slate-100 rounded-xl min-h-[220px] flex flex-col items-center justify-center text-center hover:bg-slate-50 hover:border-blue-300 transition-all cursor-pointer group overflow-hidden">
                
                <input type="file" id="file-upload" class="hidden" accept="image/*" onchange="previewProductImage(this)">

                <img id="image-preview" src="#" class="hidden absolute inset-0 w-full h-full object-cover z-10">

                <div id="upload-placeholder" class="flex flex-col items-center z-0">
                    <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-500">Upload Product Image</span>
                </div>

                <div id="change-overlay" class="hidden absolute inset-0 bg-blue-900/40 z-20 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="bg-white text-blue-900 px-4 py-2 rounded-lg text-xs font-bold">Change Image</span>
                </div>
            </label>
        </div>

        <div class="flex gap-3 mt-6">
            <button onclick="regProduct();" class="flex-1 py-3 bg-blue-800 text-white rounded-xl text-xs font-bold hover:bg-blue-900 shadow-lg shadow-blue-800/20 transition-all active:scale-95">Save Product</button>
            <button class="flex-1 py-3 bg-slate-100 text-slate-500 rounded-xl text-xs font-bold hover:bg-slate-200 transition-all">Discard</button>
        </div>
    </div>
</div>

                <div class="space-y-6">


                    <!-- <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm" style="background-color: #89bef3b0;">
                        <h2 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4">Organization</h2>
                        <div class="space-y-4" style="margin-top: 31px;">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Category</label>
                                <select class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none" id="category">
                                    <option value="0">Select Category</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1">Status</label>
                                <div class="flex gap-2">
                                    <button class="flex-1 py-2 bg-blue-50 text-blue-700 border border-blue-200 rounded-lg text-xs font-bold">Active</button>
                                    <button class="flex-1 py-2 bg-slate-50 text-slate-500 border border-slate-200 rounded-lg text-xs font-bold">Draft</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>


        <script src="./assets/js/script.js"></script>
    </body>

    </html>
<?php
} else {
    // If someone tries to access this page directly without logging in:
    header("Location: index.php");
    exit();
}
?>